<?php

namespace App\Models;

use CodeIgniter\Model;

class dataAgamaModel extends Model
{
    protected $table = "statistik_agama";
    protected $primaryKey = "id";
    protected $allowedFields = ['agama', 'jumlah'];

    public function semua()
    {
        return $this->findAll();
    }
}
