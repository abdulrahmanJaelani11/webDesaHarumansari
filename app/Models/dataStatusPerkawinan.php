<?php

namespace App\Models;

use CodeIgniter\Model;

class dataStatusPerkawinan extends Model
{
    protected $table = "statistik_status_kawin";
    protected $primaryKey = "id";
    protected $allowedFields = ['status_kawin', 'jumlah'];

    public function semua()
    {
        return $this->findAll();
    }
}
