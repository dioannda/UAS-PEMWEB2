<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengingatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'deskripsi' => 'Bayar Listrik',
                'tanggal_pembayaran' => '2025-07-15',
                'status' => 'belum',
            ],
            [
                'user_id' => 1,
                'deskripsi' => 'Cicilan Motor',
                'tanggal_pembayaran' => '2025-07-20',
                'status' => 'belum',
            ],
        ];

        $this->db->table('pengingat_pembayaran')->insertBatch($data);
    }
}
