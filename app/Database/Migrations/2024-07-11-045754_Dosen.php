<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up(): void
    {
        $this->forge->addField(fields: [
            'id_dosen'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_dosen'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'nidn_dosen'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'alamat_dosen'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'status_dosen'       => [
                'type'           => 'TINYINT',
                'constraint'     => '1',
            ]
        ]);
        $this->forge->addKey(key: 'id_dosen', primary: true);
        $this->forge->createTable(table: 'dosen');
    }

    public function down(): void
    {
        $this->forge->dropTable(tableName: 'dosen');
    }
}
