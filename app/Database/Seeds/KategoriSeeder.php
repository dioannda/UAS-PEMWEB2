<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['user_id' => null, 'nama' => 'Makanan & Minuman', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Transportasi', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Belanja (Pakaian & Kebutuhan)', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Hiburan & Rekreasi', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Pendidikan', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Kesehatan', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Tagihan (Listrik, Air, Internet)', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Sewa/Cicilan Rumah', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Asuransi', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Perawatan Kendaraan', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Donasi/Amal', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Hewan Peliharaan', 'tipe' => 'pengeluaran'],
            ['user_id' => null, 'nama' => 'Biaya Tak Terduga', 'tipe' => 'pengeluaran'],

            ['user_id' => null, 'nama' => 'Gaji Pokok', 'tipe' => 'pemasukan'],
            ['user_id' => null, 'nama' => 'Pendapatan Sampingan', 'tipe' => 'pemasukan'],
            ['user_id' => null, 'nama' => 'Penjualan Barang', 'tipe' => 'pemasukan'],
            ['user_id' => null, 'nama' => 'Bonus', 'tipe' => 'pemasukan'],
            ['user_id' => null, 'nama' => 'Hadiah', 'tipe' => 'pemasukan'],
        ];

        $this->db->table('kategori')->insertBatch($data);
    }
}