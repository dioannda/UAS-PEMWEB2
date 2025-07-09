<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'tanggal' => '2025-07-01',
                'kategori' => 'Makanan & Minuman',
                'tipe' => 'pengeluaran',
                'nominal' => 50000,
                'keterangan' => 'Makan siang',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'tanggal' => '2025-07-02',
                'kategori' => 'Gaji Pokok',
                'tipe' => 'pemasukan',
                'nominal' => 3000000,
                'keterangan' => 'Gaji bulan Juli',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'tanggal' => '2025-07-03',
                'kategori' => 'Transportasi',
                'tipe' => 'pengeluaran',
                'nominal' => 20000,
                'keterangan' => 'Biaya transportasi',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];


        $this->db->table('transaksi')->insertBatch($data);
    }
}
