<?php

namespace App\Models;

use CodeIgniter\Model;

class dataDesaModel extends Model
{
    protected $table = "data_desa";
    protected $primaryKey = "id";
    protected $allowedFields = ['atribut', 'jumlah'];

    public function semua()
    {
        return $this->findAll();
    }

    public function getOne($id)
    {
        return $this->find($id);
    }
}
