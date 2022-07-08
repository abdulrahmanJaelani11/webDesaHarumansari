<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarSktm extends Model
{
    protected $table = "pendaftar_sktm";
    protected $primaryKey = "id";
    protected $allowedFields = ['nama', 'nik', 'status_surat', 'agama', 'status', 'status_kawin', 'alamat', 'pendidikan', 'ttl', 'jk', 'tlp', 'kepentingan', 'tgl_daftar', 'tgl_selesai'];

    public function semua()
    {
        return $this->findAll();
    }
}
