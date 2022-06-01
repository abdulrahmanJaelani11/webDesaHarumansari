<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class dataStatusKawinSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'status_kawin' => "Belum Kawin",
                'jumlah' => 2136
            ],
            [
                'status_kawin' => "Kawin",
                'jumlah' => 2299
            ],
            [
                'status_kawin' => "Cerai Hidup",
                'jumlah' => 63
            ],
            [
                'status_kawin' => "Cerai Meninggal",
                'jumlah' => 198
            ],
        ];

        // Using Query Builder
        $this->db->table('statistik_status_kawin')->insertBatch($data);
    }
}
