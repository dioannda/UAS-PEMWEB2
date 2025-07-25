<?php namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'nama', 'tipe'];
    protected $returnType = 'array';
}
