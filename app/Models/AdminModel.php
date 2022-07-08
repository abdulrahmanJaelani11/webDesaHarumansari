<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = "admin";
    protected $primaryKey = "id";
    protected $allowedFields = ['email', 'username', 'password', 'token', 'nama_lengkap', 'nik', 'img'];

    public function semua()
    {
        return $this->findAll();
    }
}
