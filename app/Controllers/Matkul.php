<?php

namespace App\Controllers;

use App\Models\Matkul as MatkulModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class Matkul extends BaseController
{
    protected MatkulModel $matkul;
    protected array $rules;

    public function __construct()
    {
        $this->matkul = new MatkulModel();
        $this->rules = [
            'kode_matkul' => 'required',
            'nama_matkul'   => 'required',
        ];
    }

    public function index(): string
    {
        $data = [
            'data'  => $this->matkul->paginate(perPage: '5', group: 'matkul'),
            'title' => 'List Matkul',
            'pager' => $this->matkul->pager,
        ];

        return view(name: 'matkul/index', data: $data);
    }

    public function create()
    {
        return view(name: 'matkul/create', data: ['title' => 'Tambah Matkul']);
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

        $this->matkul->save(row: $data);

        return redirect()->route(route: 'Matkul::index')->with(key: 'message', message: 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Matkul',
            'matkul' => $this->matkul->find(id: $id),
        ];

        return view(name: 'matkul/edit', data: $data);
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

        $this->matkul->update(id: $id, row: $data);

        return redirect()->route(route: 'Matkul::index')->with(key: 'message', message: 'Sukses ubah data');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->matkul->delete(id: $id);

        return redirect()->back()->with(key: 'message', message: 'Sukses hapus data');
    }
}