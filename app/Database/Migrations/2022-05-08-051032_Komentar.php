<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Komentar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nama' => [
                'type' => "VARCHAR",
                'constraint' => 50
            ],
            'tlp' => [
                'type' => "VARCHAR",
                'constraint' => 50
            ],
            'alamat' => [
                'type' => "VARCHAR",
                'constraint' => 255
            ],
            'komentar' => [
                'type' => "TEXT",
            ],
            'tanggal' => [
                'type' => "VARCHAR",
                'constraint' => 20
            ],
            'id_berita' => [
                'type' => "INT",
                'constraint' => 100
            ]
        ]);

        $this->forge->addKey("id");
        $this->forge->createTable("komentar");
    }

    public function down()
    {
        $this->forge->dropTable("komentar");
        //
    }
}
