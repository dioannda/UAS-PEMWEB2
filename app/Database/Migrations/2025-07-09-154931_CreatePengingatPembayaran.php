<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengingatPembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal_pembayaran' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['belum', 'selesai'],
                'default' => 'belum',
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengingat_pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pengingat_pembayaran');
    }
}
