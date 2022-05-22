<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilDesa extends Model
{
    protected $table = "desa";
    protected $primaryKey = "id";
    protected $allowedFields = ['nama_desa', 'provinsi', 'kabupaten', 'kecamatan', 'email', 'tlp', 'visi', 'misi', 'alamat', 'kode_pos', 'sejarah',];

    public function semua()
    {
        return $this->findAll();
    }
}
