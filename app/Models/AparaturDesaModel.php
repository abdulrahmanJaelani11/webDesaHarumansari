<?php

namespace App\Models;

use CodeIgniter\Model;

class AparaturDesaModel extends Model
{
    protected $table = "aparatur_desa";
    protected $primaryKey = "id";
    protected $allowedFields = ['email', 'nama', 'jabatan', 'wa'];

    public function semua()
    {
        return $this->findAll();
    }
}
