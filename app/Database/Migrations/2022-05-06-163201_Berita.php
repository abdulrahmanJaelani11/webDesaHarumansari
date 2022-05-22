<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'auto_increment' => true,
                'unsigned' => true
            ],
            'judul' => [
                'type' => "VARCHAR",
                'constraint' => 30
            ],
            'keterangan' => [
                'type' => "TEXT",
            ],
            'penulis' => [
                'type' => "VARCHAR",
                'constraint' => 50
            ],
            'id_kategori' => [
                'type' => "VARCHAR",
                'constraint' => 50
            ],
            'tanggal' => [
                'type' => "VARCHAR",
            ],
            'img' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ]
        ]);

        $this->forge->addKey('id');
        $this->forge->createTable("berita");
    }

    public function down()
    {
        $this->forge->dropTable("berita");
    }
}
