<?php namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id', 'tanggal', 'kategori', 'tipe', 'nominal', 'keterangan'
    ];

    protected $useTimestamps = true;
    protected $returnType = 'array';
}
