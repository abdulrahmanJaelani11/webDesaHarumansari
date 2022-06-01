<?php

namespace App\Models;

use CodeIgniter\Model;

class KelompokUsiaModel extends Model
{
    protected $table = "statistik_kelompok_usia";
    protected $primaryKey = "id";
    protected $allowedFields = ['usia', 'jumlah'];

    public function semua()
    {
        return $this->findAll();
    }
}
