<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiTable extends Migration
{
public function up()
{
    $this->forge->addField([
        'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
        'user_id'    => ['type' => 'INT', 'unsigned' => true],
        'tanggal'    => ['type' => 'DATE'],
        'kategori'   => ['type' => 'VARCHAR', 'constraint' => 50],
        'tipe'       => ['type' => 'ENUM', 'constraint' => ['pemasukan', 'pengeluaran']],
        'nominal'    => ['type' => 'INT'],
        'keterangan' => ['type' => 'TEXT', 'null' => true],
        'created_at' => ['type' => 'DATETIME', 'null' => true],
        'updated_at' => ['type' => 'DATETIME', 'null' => true],

    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('transaksi');
}


    public function down()
    {
        //
    }
}
