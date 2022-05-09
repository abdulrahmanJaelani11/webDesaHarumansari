<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = "komentar";
    protected $primaryKey = "id";
    protected $allowedFields = ['nama', 'tlp', 'komentar', 'alamat', 'tanggal', 'id_berita'];

    public function semua()
    {
        return $this->findAll();
    }
}
