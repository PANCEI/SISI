<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenuLevel extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'ID_LEVEL' => [
                'type'      => 'VARCHAR',
                'constraint' => '3',
                'unsigned' => false,
            ],
            'LEVEL' => [
                'type'          => 'VARCHAR',
                'constraint'    => '30'
            ]
        ]);
        $this->forge->addKey('ID_LEVEL', true);
        $this->forge->createTable("MENU_LEVEL");
    }

    public function down()
    {
        $this->forge->dropTable('MENU_LEVEL');
    }
}
