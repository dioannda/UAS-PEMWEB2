<?php
namespace App\Models;

use CodeIgniter\Model;

class PengingatPembayaranModel extends Model
{
    protected $table = 'pengingat_pembayaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'deskripsi', 'tanggal_pembayaran', 'status'];
}
