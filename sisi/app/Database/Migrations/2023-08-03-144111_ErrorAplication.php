<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ErrorAplication extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ERROR_ID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_incremet' => true
            ],
            'ID_USER' => [
                'type' => 'VARCHAR',
                'constraint' => '60',
            ],
            'ERROR_DATE' => [
                'type' => 'VARCHAR',
                'constraint' => '3'
            ],
            'MODULES' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'FUNCTION' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'ERROR_LINE' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'ERROR_MESSAGE' => [
                'type' => 'VARCHAR',
                'constraint' => '1000'
            ],
            'STATUS' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'PARAM' => [
                'type' => "VARCHAR",
                'constraint' => '300'
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
            'UPDATE_BY' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'UPDATE_DATE' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ]
        ]);
        $this->forge->addKey('ERROR_ID', true);
        $this->forge->createTable('error_aplication');
    }

    public function down()
    {
        //
        $this->forge->dropTable('error_aplication');
    }
}
