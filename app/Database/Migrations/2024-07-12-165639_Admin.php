<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up(): void
    {
        $this->forge->addField(fields: [
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey(key: 'id_admin', primary: true);
        $this->forge->createTable(table: 'admin');
    }

    public function down(): void
    {
        $this->forge->dropTable(tableName: 'admin');
    }
}
