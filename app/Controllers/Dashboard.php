<?php

namespace App\Controllers;

use App\Models\Jadwal;

class Dashboard extends BaseController
{
    public $jadwal;

    public function __construct()
    {
        $this->jadwal = new Jadwal();
    }

    public function index(): string
    {
        $data = [
            'data'  => $this->jadwal->withMatkul()->withDosen()->findAll(),
            'title' => 'Dashboard',
        ];

        return view('home', $data);
    }

    public function hadir(int $id)
    {
        $jadwal = $this->jadwal->withMatkul()->withDosen()->find($id);

        $msg = "Assalamu'alaikum wr.wb.,\n\nPemberitahuan untuk matakuliah $jadwal->nama_matkul pada semester $jadwal->semester dengan dosen $jadwal->nama_dosen akan masuk seperti biasanya.\n\nSekian terimakasih,\nWassalamualaikum wr.wb.";

        sendTelegramNotification($msg);

        return redirect()->back()->with('message ', 'Notifikasi Terkirim!');
    }

    public function tidakHadir(int $id)
    {
        $jadwal = $this->jadwal->withMatkul()->withDosen()->find($id);

        $msg = "Assalamu'alaikum wr.wb.,\n\nPemberitahuan untuk matakuliah $jadwal->nama_matkul pada semester $jadwal->semester dengan dosen $jadwal->nama_dosen tidak dapat mengisi perkuliahan.\n\nSekian terimakasih,\nWassalamualaikum wr.wb.";

        sendTelegramNotification($msg);

        return redirect()->back()->with('message ', 'Notifikasi Terkirim!');
    }
}
