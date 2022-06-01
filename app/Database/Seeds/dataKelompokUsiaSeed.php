<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class dataKelompokUsiaSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'usia' => "Usia 0-4 thn",
                'jumlah' => 287
            ],
            [
                'usia' => "Usia 5-9 thn",
                'jumlah' => 419
            ],
            [
                'usia' => "Usia 10-14 thn",
                'jumlah' => 436
            ],
            [
                'usia' => "Usia 15-19 thn",
                'jumlah' => 370
            ],
            [
                'usia' => "Usia 20-24 thn",
                'jumlah' => 439
            ],
            [
                'usia' => "Usia 25-29 thn",
                'jumlah' => 422
            ],
            [
                'usia' => "Usia 30-34 thn",
                'jumlah' => 352
            ],
            [
                'usia' => "Usia 35-39 thn",
                'jumlah' => 398
            ],
            [
                'usia' => "Usia 40-44 thn",
                'jumlah' => 323
            ],
            [
                'usia' => "Usia 45-49 thn",
                'jumlah' => 280
            ],
            [
                'usia' => "Usia 50-54 thn",
                'jumlah' => 262
            ],
            [
                'usia' => "Usia 55-59 thn",
                'jumlah' => 220
            ],
            [
                'usia' => "Usia 60-64 thn",
                'jumlah' => 197
            ],
            [
                'usia' => "Usia 65-69 thn",
                'jumlah' => 120
            ],
            [
                'usia' => "Usia 70-74 thn",
                'jumlah' => 74
            ],
            [
                'usia' => "Usia 75 thn ke atas",
                'jumlah' => 97
            ],
        ];

        // Using Query Builder
        $this->db->table('statistik_kelompok_usia')->insertBatch($data);
    }
}
