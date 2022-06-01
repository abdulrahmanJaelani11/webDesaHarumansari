<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AparaturDesa extends Migration
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
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'wa' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('aparatur_desa');
    }

    public function down()
    {
        $this->forge->dropTable('aparatur_desa');
    }
}
