<?php

namespace App\Controllers;

use App\Models\Jadwal;
use CodeIgniter\HTTP\RedirectResponse;

class Dashboard extends BaseController
{
    public Jadwal $jadwal;

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

        return view(name: 'home',data:  $data);
    }

    public function hadir(int $id): RedirectResponse
    {
        $jadwal = $this->jadwal->withMatkul()->withDosen()->find(id: $id);

        $msg = "Assalamu'alaikum wr.wb.,\n\nPemberitahuan untuk matakuliah $jadwal->nama_matkul pada semester $jadwal->semester dengan dosen $jadwal->nama_dosen akan masuk seperti biasanya.\n\nSekian terimakasih,\nWassalamualaikum wr.wb.";

        sendTelegramNotification(text: $msg);

        return redirect()->route(route: 'Dashboard::index')->with(key: 'message', message: 'Notifikasi terkirim!');
    }

    public function tidakHadir(int $id): RedirectResponse
    {
        $jadwal = $this->jadwal->withMatkul()->withDosen()->find(id: $id);

        $msg = "Assalamu'alaikum wr.wb.,\n\nPemberitahuan untuk matakuliah $jadwal->nama_matkul pada semester $jadwal->semester dengan dosen $jadwal->nama_dosen tidak dapat mengisi perkuliahan.\n\nSekian terimakasih,\nWassalamualaikum wr.wb.";

        sendTelegramNotification(text: $msg);

        return redirect()->route(route: 'Dashboard::index')->with(key: 'message', message: 'Notifikasi terkirim!');
    }
}
