<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class dataAgamaSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'agama' => "Islam",
                'jumlah' => 4696
            ],
            [
                'agama' => "Kristen",
                'jumlah' => 0
            ],
            [
                'agama' => "Katholik",
                'jumlah' => 0
            ],
            [
                'agama' => "Hindu",
                'jumlah' => 0
            ],
            [
                'agama' => "Budha",
                'jumlah' => 0
            ],
            [
                'agama' => "Konghucu",
                'jumlah' => 0
            ],
        ];

        // Using Query Builder
        $this->db->table('statistik_agama')->insertBatch($data);
    }
}
