<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Desa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nama_desa' => [
                'type' => "VARCHAR",
                'constraint' => 100,
                'null' => true
            ],
            'kecamatan' => [
                'type' => "VARCHAR",
                'constraint' => 100,
                'null' => true
            ],
            'kabupaten' => [
                'type' => "VARCHAR",
                'constraint' => 100,
                'null' => true
            ],
            'provinsi' => [
                'type' => "VARCHAR",
                'constraint' => 100,
                'null' => true
            ],
            'alamat' => [
                'type' => "VARCHAR",
                'constraint' => 100,
                'null' => true
            ],
            'email' => [
                'type' => "VARCHAR",
                'constraint' => 100,
                'null' => true
            ],
            'tlp' => [
                'type' => "VARCHAR",
                'constraint' => 100,
                'null' => true
            ],
            'kode_pos' => [
                'type' => "INT",
                'null' => true,
                'constraint' => 5
            ],
            'visi' => [
                'type' => "TEXT",
                'null' => true
            ],
            'misi' => [
                'type' => "TEXT",
                'null' => true
            ],
            'sejarah' => [
                'type' => "TEXT",
                'null' => true
            ],
        ]);
        $this->forge->addKey("id");
        $this->forge->createTable("desa");
    }

    public function down()
    {
        $this->forge->dropTable("desa");
        // AIzaSyAnhQbXIdtanl9x-zSJJb8SeGKevu3m1zA
    }
}
