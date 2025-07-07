<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['user_id' => 1, 'nama' => 'Makanan & Minuman', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Transportasi', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Belanja (Pakaian & Kebutuhan)', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Hiburan & Rekreasi', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Pendidikan', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Kesehatan', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Tagihan (Listrik, Air, Internet)', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Sewa/Cicilan Rumah', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Asuransi', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Perawatan Kendaraan', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Donasi/Amal', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Hewan Peliharaan', 'tipe' => 'pengeluaran'],
            ['user_id' => 1, 'nama' => 'Biaya Tak Terduga', 'tipe' => 'pengeluaran'],

            ['user_id' => 1, 'nama' => 'Gaji Pokok', 'tipe' => 'pemasukan'],
            ['user_id' => 1, 'nama' => 'Pendapatan Sampingan', 'tipe' => 'pemasukan'],
            ['user_id' => 1, 'nama' => 'Penjualan Barang', 'tipe' => 'pemasukan'],
            ['user_id' => 1, 'nama' => 'Bonus', 'tipe' => 'pemasukan'],
            ['user_id' => 1, 'nama' => 'Hadiah', 'tipe' => 'pemasukan'],
        ];

        $this->db->table('kategori')->insertBatch($data);
    }
}