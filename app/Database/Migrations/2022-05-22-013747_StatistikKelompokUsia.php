<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatistikKelompokUsia extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'auto_increment' => true,
            ],
            'usia' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'jumlah' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],

        ]);

        $this->forge->addKey('id');
        $this->forge->createTable('statistik_kelompok_usia');
    }

    public function down()
    {
        $this->forge->dropTable('statistik_kelompok_usia');
    }
}
