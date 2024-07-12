<?php

namespace App\Controllers;

use App\Models\Jadwal as JadwalModel;
use App\Models\Matkul;
use App\Models\Dosen;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class Jadwal extends BaseController
{
    protected JadwalModel $jadwal;
    protected Dosen $dosen;
    protected Matkul $matkul;
    protected array $rules;

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

    public function index(): string
    {
        $data = [
            'data'  => $this->jadwal->withMatkul()->withDosen()->paginate(perPage: '5', group: 'jadwal'),
            'title' => 'List Jadwal',
            'pager' => $this->jadwal->pager,
        ];

        return view(name: 'jadwal/index', data: $data);
    }

    public function create(): string
    {
        $data = [
            'title' => 'Tambah Jadwal',
            'dosen' => $this->dosen->findAll(),
            'matkul' => $this->matkul->findAll(),
        ];

        return view(name: 'jadwal/create', data: $data);
    }

    /**
     * @throws ReflectionException
     */
    public function store(): RedirectResponse
    {
        $data = $this->request->getPost();

        if (! $this->validateData(data: $data, rules: $this->rules)) {
            return redirect()->back()->with(key: 'message', message:  $this->validator->getErrors());
        }

        $this->jadwal->save(row: $data);

        return redirect()->route(route: 'Jadwal::index')->with(key: 'message', message: 'Sukses tambah data');
    }

    public function edit(int $id): string
    {
        $data = [
            'title' => 'Edit Jadwal',
            'jadwal' => $this->jadwal->withDosen()->withMatkul()->find(id: $id),
            'dosen' => $this->dosen->findAll(),
            'matkul' => $this->matkul->findAll(),
        ];

        return view(name: 'jadwal/edit', data: $data);
    }

    /**
     * @throws ReflectionException
     */
    public function update(int $id): RedirectResponse
    {
        $data = $this->request->getPost();

        if (! $this->validateData(data: $data, rules: $this->rules)) {
            return redirect()->back()->with(key: 'message', message:  $this->validator->getErrors());
        }

        $this->jadwal->update(id: $id, row: $data);

        return redirect()->route(route: 'Jadwal::index')->with(key: 'message', message: 'Sukses ubah data');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->jadwal->delete(id: $id);

        return redirect()->back()->with(key: 'message', message: 'Sukses hapus data');
    }
}