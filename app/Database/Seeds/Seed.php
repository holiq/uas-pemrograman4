<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Seed extends Seeder
{
    public function run()
    {
        $dosen = [
            [
                'nama_dosen' => 'Indra Maulana, M.Kom.',
                'nidn_dosen' => '213772138',
                'alamat_dosen' => 'Tangerang',
                'status_dosen' => 1,
            ],
            [
                'nama_dosen' => 'Muhammad Nurfadillah, S.Pt., ME.',
                'nidn_dosen' => '6346239823',
                'alamat_dosen' => 'Bintaro',
                'status_dosen' => 1,
            ],
            [
                'nama_dosen' => 'Nunung Fatmawati, M.T.',
                'nidn_dosen' => '32874832324',
                'alamat_dosen' => 'Tangerang',
                'status_dosen' => 1,
            ]
        ];

        foreach ($dosen as $data) {
            $this->db->table('dosen')->insert($data);
        }

        $matkul = [
            [
                'kode_matkul' => 'PGRDSR',
                'nama_matkul' => 'Pemrograman Dasar',
            ],
            [
                'kode_matkul' => 'KTI',
                'nama_matkul' => 'Keamanan Teknologi Informasi',
            ],
            [
                'kode_matkul' => 'KLSDSR',
                'nama_matkul' => 'Kalkusul Dasar',
            ],
            [
                'kode_matkul' => 'STSK',
                'nama_matkul' => 'Statistik',
            ],
            [
                'kode_matkul' => 'FSKDSR',
                'nama_matkul' => 'Fisika Dasar',
            ],
            [
                'kode_matkul' => 'SPK',
                'nama_matkul' => 'Sistem Penunjang Keputusan',
            ]
        ];

        foreach ($matkul as $data) {
            $this->db->table('matkul')->insert($data);
        }

        $jadwal = [
            [
                'dosen_id' => 1,
                'matkul_id' => 1,
                'semester' => 2,
            ],
            [
                'dosen_id' => 1,
                'matkul_id' => 2,
                'semester' => 4,
            ],
            [
                'dosen_id' => 2,
                'matkul_id' => 3,
                'semester' => 2,
            ],
            [
                'dosen_id' => 2,
                'matkul_id' => 4,
                'semester' => 4,
            ],
            [
                'dosen_id' => 3,
                'matkul_id' => 5,
                'semester' => 2,
            ],
            [
                'dosen_id' => 3,
                'matkul_id' => 5,
                'semester' => 4,
            ],
        ];

        foreach ($jadwal as $data) {
            $this->db->table('jadwal')->insert($data);

        }
    }
}
