<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatistikAgama extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'auto_increment' => true,
            ],
            'agama' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'jumlah' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],

        ]);

        $this->forge->addKey('id');
        $this->forge->createTable('statistik_desa');
    }

    public function down()
    {
        $this->forge->dropTable('statistik_desa');
        //
    }
}
