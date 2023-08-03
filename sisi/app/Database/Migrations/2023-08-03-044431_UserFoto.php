<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class UserFoto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NO_FOTO' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
                'auto_increment' => true
            ],
            'ID_USER' => [
                'type'          => 'VARCHAR',
                'constraint'    =>  '30',
            ],
            'FOTO' => [
                'type'          => 'VARCHAR',
                'constraint'    => '300',
            ],
            'CREATE_BY' => [
                'type'          => 'VARCHAR',
                'constraint'    => '30'
            ],
            'CREATE_DATE'       => [
                'type'          => 'TIMESTAMP',
                'null'          => true
            ],
            'DELETE_MARK'       => [
                'type'         => 'VARCHAR',
                'constraint'    => '1'
            ],
            'UPDATE_BY'         => [
                'type'          => 'VARCHAR',
                'constraint'    => '30'
            ],
            'UPDATE_DATE'       => [
                'type'          => 'TIMESTAMP',
                'null'          => true
            ]
        ]);
        $this->forge->addKey('NO_FOTO', true);
        // $this->forge->addForeignKey('ID_USER', 'USER', 'ID_USER', 'CASCADE', 'CASCADE');
        $this->forge->createTable('USER_FOTO');
    }

    public function down()
    {
        $this->forge->dropTable('USER_FOTO');
    }
}
