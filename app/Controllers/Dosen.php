<?php

namespace App\Controllers;

use App\Models\Dosen as DosenModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class Dosen extends BaseController
{
    protected DosenModel $dosen;
    protected array $rules;

    public function __construct()
    {
        $this->dosen = new DosenModel();
        $this->rules = [
            'nama_dosen'   => 'required',
            'nidn_dosen'   => 'required',
            'alamat_dosen'  => 'required',
            'status_dosen' => 'required',
        ];
    }

    public function index(): string
    {
        $data = [
            'data'  => $this->dosen->paginate(perPage: '5', group: 'dosen'),
            'title' => 'List Dosen',
            'pager' => $this->dosen->pager,
        ];

        return view(name: 'dosen/index', data: $data);
    }

    public function create(): string
    {
        return view(name: 'dosen/create', data: ['title' => 'Tambah Dosen']);
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

        $this->dosen->save(row: $data);

        return redirect()->route(route: 'Dosen::index')->with(key: 'message', message: 'Sukses tambah data');
    }

    public function edit(int $id): string
    {
        $data = [
            'title' => 'Edit Dosen',
            'dosen' => $this->dosen->find(id: $id),
        ];

        return view(name: 'dosen/edit', data: $data);
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

        $this->dosen->update(id: $id, row: $data);

        return redirect()->route(route: 'Dosen::index')->with(key: 'message', message: 'Sukses ubah data');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->dosen->delete(id: $id);

        return redirect()->back()->with(key: 'message', message: 'Sukses hapus data');
    }
}