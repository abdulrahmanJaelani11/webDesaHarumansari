<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtributDesa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'auto_increment',
                'unsigned' => true
            ],
            'atribut' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'jumlah' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
        ]);

        $this->forge->addKey('id');
        $this->forge->createTable("data_desa");
    }

    public function down()
    {
        $this->forge->dropTable("data_desa");
        //
    }
}
