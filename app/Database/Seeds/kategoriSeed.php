<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class kategoriSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'Bansos (bantuan sosial)',
            ],
            [
                'kategori' => 'Keagamaan',
            ],
            [
                'kategori' => 'Sosial',
            ],
        ];

        // Using Query Builder
        $this->db->table('kategori')->insertBatch($data);
    }
}
