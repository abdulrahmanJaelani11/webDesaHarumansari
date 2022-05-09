<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'auto_increment' => true,
                'unsigned' => true
            ],
            'kategori' => [
                'type' => "VARCHAR",
                'constraint' => 50
            ],
        ]);

        $this->forge->addKey("id");
        $this->forge->createTable("kategori");
    }

    public function down()
    {
        $this->forge->dropTable("kategori");
    }
}
