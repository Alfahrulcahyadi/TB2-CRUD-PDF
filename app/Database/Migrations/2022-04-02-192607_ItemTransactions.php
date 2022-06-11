<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemTransactions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
            'unit' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
            'total' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
            'type_trash' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'status_item_transaction' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'operator_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'default' => null,
            ],
            'code_transaction' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('itemtransactions');
    }

    public function down()
    {
        $this->forge->dropTable('itemtransactions');
    }
}
