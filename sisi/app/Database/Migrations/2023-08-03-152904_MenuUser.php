<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenuUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NO_SETTING' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'ID_USER' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'MENU_ID' => [
                'type' => 'VARCHAR',
                'constraint' => '3'
            ],
            'CREATE_DATE' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'CREATE_TIME' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'DELETE_MARK' => [
                'type' => 'VARCHAR',
                'constraint' => '1'
            ],
            'UPDATE_DATE' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ]
        ]);
        $this->forge->addKey("NO_SETTING", true);
        $this->forge->createTable('menu_user');
    }

    public function down()
    {
        //
        $this->forge->dropTable('menu_user');
    }
}
