<?php namespace App\Controllers;

use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $transaksiModel = new TransaksiModel();
        $userId = session()->get('user_id');

        $bulanIni = date('Y-m'); // contoh: 2025-07

        // Total pemasukan
        $pemasukan = $transaksiModel
            ->where('user_id', $userId)
            ->like('tanggal', $bulanIni, 'after')
            ->where('tipe', 'pemasukan')
            ->selectSum('nominal')
            ->first()['nominal'] ?? 0;

        // Total pengeluaran
        $pengeluaran = $transaksiModel
            ->where('user_id', $userId)
            ->like('tanggal', $bulanIni, 'after')
            ->where('tipe', 'pengeluaran')
            ->selectSum('nominal')
            ->first()['nominal'] ?? 0;

        $saldo = $pemasukan - $pengeluaran;
        // Cek apakah user sudah mencatat transaksi hari ini
$tanggalHariIni = date('Y-m-d');

$adaTransaksiHariIni = $transaksiModel
    ->where('user_id', $userId)
    ->where('tanggal', $tanggalHariIni)
    ->countAllResults() > 0;

$data['showReminder'] = !$adaTransaksiHariIni;


        $data = [
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'saldo' => $saldo,
            'showReminder' => !$adaTransaksiHariIni,
        ];

        return view('dashboard/index', $data);
    }
}
