<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'auto_increment' => true,
                'unsigned' => true
            ],
            'email' => [
                'type' => "VARCHAR",
                'constraint' => 50
            ],
            'username' => [
                'type' => "VARCHAR",
                'constraint' => 50
            ],
            'password' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
        ]);

        $this->forge->addKey("id");
        $this->forge->createTable("admin");
    }

    public function down()
    {
        $this->forge->dropTable("admin");
        //
    }
}
