<?php

namespace App\Models;

use CodeIgniter\Model;

class UmkmModel extends Model
{
    protected $table = 'umkms';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_pemilik', 'nama_umkm', 'produk_umkm', 'alamat_umkm', 'foto_umkm'];
}