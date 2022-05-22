<?php

namespace App\Models;

use CodeIgniter\Model;

class JnsLayananModel extends Model
{
    protected $table = "jns_layanan";
    protected $primaryKey = "id";
    protected $allowedFields = ['layanan', 'singkatan'];

    public function semua()
    {
        return $this->findAll();
    }
}
