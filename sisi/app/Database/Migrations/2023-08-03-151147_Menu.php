<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'MENU_ID' => [
                'type' => 'VARCHAR',
                'constraint' => '3',
                'unsigned' => 'true',
                'auto_increment' => 'true'
            ],
            'ID_LEVEL' => [
                'type' => 'VARCHAR',
                'constraint' => '3'
            ],
            'MENU_NAME' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
            ],
            'MENU_LINK' => [
                'type' => 'VARCHAR',
                'constraint' => '300'
            ],
            'MENU_ICON' => [
                'type' => 'VARCHAR',
                'constraint' => '300'
            ],
            'PARENT_ID' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'CREATE_BY' => [
                'type' => "VARCHAR",
                'constraint' => '30'
            ],
            'CREATE_DATE' => [
                'type' => 'DATE',
                'null' => true
            ],
            'DELETE_MARK' => [
                'type' => 'VARCHAR',
                'constraint' => '1'
            ],
            'UPDATE_BY' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'UPDATE_DATE' => [
                'type' => "DATE",
                'null' => 'true'
            ]
        ]);
        $this->forge->addKey('MENU_ID', true);
        $this->forge->createTable('MENU');
    }

    public function down()
    {
        //
        $this->forge->dropTable('MENU');
    }
}
