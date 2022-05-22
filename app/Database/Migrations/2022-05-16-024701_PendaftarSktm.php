<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PendaftarSktm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nama' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'nik' => [
                'type' => "INT",
                'constraint' => 16
            ],
            'jk' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'ttl' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'agama' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'status' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'pendidikan' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'status_kawin' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'alamat' => [
                'type' => "TEXT",
            ],
            'status_surat' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
            'tlp' => [
                'type' => "VARCHAR",
                'constraint' => 14
            ],
            'kepentingan' => [
                'type' => "VARCHAR",
                'constraint' => 50
            ],


        ]);

        $this->forge->addKey('id');
        $this->forge->createTable("pendaftar_sktm");
    }

    public function down()
    {
        $this->forge->dropTable("pendaftar_sktm");
    }
}
