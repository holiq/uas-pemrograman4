<?php

namespace App\Controllers;

use App\Models\Matkul as MatkulModel;

class Matkul extends BaseController
{
    protected $matkul;
    protected $rules;

    public function __construct()
    {
        $this->matkul = new MatkulModel();
        $this->rules = [
            'kode_matkul' => 'required',
            'nama_matkul'   => 'required',
        ];
    }

    public function index()
    {
        $data = [
            'data'  => $this->matkul->paginate('5', 'matkul'),
            'title' => 'List Matkul',
            'pager' => $this->matkul->pager,
        ];

        return view('matkul/index', $data);
    }

    public function create()
    {
        return view('matkul/create', ['title' => 'Tambah Matkul']);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->matkul->save($data);

        return redirect()->route('Matkul::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Matkul',
            'matkul' => $this->matkul->find($id),
        ];

        return view('matkul/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->matkul->update($id, $data);

        return redirect()->route('Matkul::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->matkul->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}