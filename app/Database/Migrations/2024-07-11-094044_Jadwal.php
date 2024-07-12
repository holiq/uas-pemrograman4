<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jadwal extends Migration
{
    public function up(): void
    {
        $this->forge->addField(fields: [
            'id_jadwal'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'dosen_id'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'matkul_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'semester'           => [
                'type'           => 'INT',
                'constraint'     => 11,
            ]
        ]);
        $this->forge->addKey(key: 'id_jadwal', primary: true);
        $this->forge->addForeignKey(fieldName: 'dosen_id', tableName: 'dosen', tableField: 'id_dosen');
        $this->forge->addForeignKey(fieldName: 'matkul_id', tableName: 'matkul', tableField: 'id_matkul');
        $this->forge->createTable(table: 'jadwal');
    }

    public function down(): void
    {
        $this->forge->dropTable(tableName: 'jadwal');
    }
}
