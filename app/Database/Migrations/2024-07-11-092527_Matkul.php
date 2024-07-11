<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Matkul extends Migration
{
    public function up(): void
    {
        $this->forge->addField(fields: [
            'id_matkul'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_matkul'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'nama_matkul'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
        ]);
        $this->forge->addKey(key: 'id_matkul', primary: true);
        $this->forge->createTable(table: 'matkul');
    }

    public function down(): void
    {
        $this->forge->dropTable(tableName: 'matkul');
    }
}
