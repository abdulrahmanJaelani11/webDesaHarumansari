<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = "berita";
    protected $primaryKey = "id";
    protected $allowedFields = ['judul', 'keterangan', 'id_kategori', 'penulis', 'tanggal', 'img'];
    protected $useTimeStamp = true;

    public function semua()
    {
        return $this->findAll();
    }
}
