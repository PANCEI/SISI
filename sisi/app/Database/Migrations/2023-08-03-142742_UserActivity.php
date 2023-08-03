<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class UserActivity extends Migration
{
    public function up()
    {
        // buat file table
        $this->forge->addField([
            'NO_ACTIVITY' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
                'auto_increment' => true
            ],
            'ID_USER'   => [
                'type'      => 'VARCHAR',
                'constraint' => 30
            ],
            'Diskripsi' => [
                'type'      => 'VARCHAR',
                'constraint' => '300',
            ],
            'STATUS'    => [
                'type'      => 'VARCHAR',
                'constraint' => '30'
            ],
            "MENU_ID" => [
                'type'      => 'VARCHAR',
                'constraint' => '3'
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
            ]
        ]);
        $this->forge->addKey('NO_ACTIVITY', true);
        $this->forge->createTable("user_activity");
    }

    public function down()
    {
        //
        $this->forge->dropTable('user_activity');
    }
}
