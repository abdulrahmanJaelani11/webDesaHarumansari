<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatistikStatusKawin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'auto_increment' => true,
            ],
            'status_kawin' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'jumlah' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],

        ]);

        $this->forge->addKey('id');
        $this->forge->createTable('statistik_status_kawin');
    }

    public function down()
    {
        $this->forge->dropTable('statistik_status_kawin');
    }
}
