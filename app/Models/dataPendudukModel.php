<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPendudukModel extends Model
{
    protected $table = "data_penduduk";
    protected $primaryKey = "id";
    protected $allowedFields = ['jk', 'jumlah'];

    public function semua()
    {
        return $this->findAll();
    }
}
