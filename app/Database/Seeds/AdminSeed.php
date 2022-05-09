<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeed extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin'
        ];

        // Using Query Builder
        $this->db->table('admin')->insert($data);
    }
}
