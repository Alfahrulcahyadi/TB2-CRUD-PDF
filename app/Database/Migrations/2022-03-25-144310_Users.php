<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'code_member' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'telephone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
