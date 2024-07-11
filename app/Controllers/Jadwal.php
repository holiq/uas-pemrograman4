<?php

namespace App\Controllers;

use App\Models\Jadwal as JadwalModel;
use App\Models\Matkul;
use App\Models\Dosen;

class Jadwal extends BaseController
{
    protected $jadwal;
    protected $dosen;
    protected $matkul;
    protected $rules;

    public function __construct()
    {
        $this->jadwal = new JadwalModel();
        $this->dosen = new Dosen();
        $this->matkul = new Matkul();
        $this->rules = [
            'dosen_id'  => 'required',
            'matkul_id' => 'required',
            'semester'  => 'required',
        ];
    }

    public function index()
    {
        $data = [
            'data'  => $this->jadwal->withMatkul()->withDosen()->paginate('5', 'jadwal'),
            'title' => 'List Jadwal',
            'pager' => $this->jadwal->pager,
        ];

        return view('jadwal/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Jadwal',
            'dosen' => $this->dosen->findAll(),
            'matkul' => $this->matkul->findAll(),
        ];

        return view('jadwal/create', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->jadwal->save($data);

        return redirect()->route('Jadwal::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Jadwal',
            'jadwal' => $this->jadwal->withDosen()->withMatkul()->find($id),
            'dosen' => $this->dosen->findAll(),
            'matkul' => $this->matkul->findAll(),
        ];

        return view('jadwal/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->jadwal->update($id, $data);

        return redirect()->route('Jadwal::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->jadwal->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}