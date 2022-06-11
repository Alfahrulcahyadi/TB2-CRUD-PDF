<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'code_transaction' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'payment' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'consumer_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'operator_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
