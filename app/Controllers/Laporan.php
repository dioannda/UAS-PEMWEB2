<?php
namespace App\Controllers;
require_once ROOTPATH . 'vendor/autoload.php';

use App\Models\TransaksiModel;
use TCPDF;

class Laporan extends BaseController
{
    public function index()
    {
        $bulan = $this->request->getPost('bulan') ?? date('m');
        $tahun = $this->request->getPost('tahun') ?? date('Y');

        $userId = session()->get('user_id');
        $transaksiModel = new TransaksiModel();

        $transaksi = $transaksiModel
            ->where('user_id', $userId)
            ->like('tanggal', "$tahun-$bulan", 'after')
            ->orderBy('tanggal', 'ASC')
            ->findAll();

        $pemasukan = 0;
        $pengeluaran = 0;

        foreach ($transaksi as $t) {
            if ($t['tipe'] == 'pemasukan')
                $pemasukan += $t['nominal'];
            else
                $pengeluaran += $t['nominal'];
        }

        $data = [
            'transaksi' => $transaksi,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'saldo' => $pemasukan - $pengeluaran
        ];

        return view('laporan/index', $data);
    }

    public function exportPdf()
    {
        $bulan = $this->request->getGet('bulan') ?? date('m');
        $tahun = $this->request->getGet('tahun') ?? date('Y');

        $userId = session()->get('user_id');
        $transaksiModel = new TransaksiModel();

        $transaksi = $transaksiModel
            ->where('user_id', $userId)
            ->like('tanggal', "$tahun-$bulan", 'after')
            ->orderBy('tanggal', 'ASC')
            ->findAll();

        $pemasukan = 0;
        $pengeluaran = 0;

        foreach ($transaksi as $t) {
            if ($t['tipe'] == 'pemasukan')
                $pemasukan += $t['nominal'];
            else
                $pengeluaran += $t['nominal'];
        }


        $pdf = new TCPDF();
        $pdf->SetTitle('Laporan Keuangan');
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);

        $html = "<h2>Laporan Keuangan Bulan $bulan-$tahun</h2>";
        $html .= "<p>Total Pemasukan: Rp " . number_format($pemasukan, 0, ',', '.') . "</p>";
        $html .= "<p>Total Pengeluaran: Rp " . number_format($pengeluaran, 0, ',', '.') . "</p>";
        $html .= "<p>Saldo: Rp " . number_format($pemasukan - $pengeluaran, 0, ',', '.') . "</p><br>";

        $html .= "<table border='1' cellpadding='4'><thead><tr>
            <th>Tanggal</th><th>Kategori</th><th>Nominal</th><th>Tipe</th><th>Keterangan</th>
        </tr></thead><tbody>";

        foreach ($transaksi as $t) {
            $html .= "<tr>
                <td>{$t['tanggal']}</td>
                <td>{$t['kategori']}</td>
                <td>Rp " . number_format($t['nominal'], 0, ',', '.') . "</td>
                <td>{$t['tipe']}</td>
                <td>{$t['keterangan']}</td>
            </tr>";
        }

        $html .= "</tbody></table>";
        $pdf->writeHTML($html);
        $pdf->Output("laporan-$bulan-$tahun.pdf", 'D');
    }
}
