<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AparaturDesaSeed extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => "Dede Rosita",
            'jabatan' => "Kepala Desa",
            'wa' => '+6283874908004',
            'email' => 'kepaladesa@gmail.com'
        ];

        $this->db->table('aparatur_desa')->insert($data);
    }
}
