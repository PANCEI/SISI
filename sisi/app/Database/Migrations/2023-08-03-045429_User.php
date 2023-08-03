<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID_USER' => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
                'unsigned'       => false,
                'auto_increment' => false,
            ],
            'NAMA_USER' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',

            ],
            'USERNAME' => [
                'type'       => 'VARCHAR',
                'constraint' => "60",

            ],
            'PASSWORD' => [
                'type'       => 'VARCHAR',
                'constraint' => '225',

            ],
            'EMAIL' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',

            ],
            'NO_HP' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'WA' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'PIN' => [
                'type'       => 'INT',
                'constraint' => '30',
            ],
            'ID_JENIS_USER' => [
                'type'       => 'VARCHAR',
                'constraint' => '3',
            ],
            'STATUS_USER' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'DELETE_MARK' => [
                'type' => 'VARCHAR',
                'constraint' => '1'
            ],
            'CREATE_BY' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'CREATE_DATE' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'UPDATE_BY' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'UPDATE_DATE' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ]

        ]);
        $this->forge->addKey('ID_USER', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
