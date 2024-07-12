<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;
use CodeIgniter\HTTP\RedirectResponse;

class Login extends BaseController
{
    protected Admin $admin;
    protected array $rules;

    public function __construct()
    {
        $this->admin  = new Admin();
        $this->rules = [
            'username' => 'required',
            'password' => 'required',
        ];
    }
    public function index(): string
    {
        return view(name: 'login', data: ['title' => 'Login Admin']);
    }

    public function process(): RedirectResponse
    {
        $data = $this->request->getPost();

        if (! $this->validateData(data: $data, rules: $this->rules)) {
            return redirect()->back()->with(key: 'errors', message:  $this->validator->getErrors());
        }

        $check = $this->admin->where(key: 'username', value: $data['username'])->first();

        if ($check) {
            if ($check->password == md5($data['password'])) {
                session()->set('username', $check->username);

                return redirect()->route(route: 'Dashboard::index')->with(key: 'message', message: 'Selamat datang ' . $data['username']);
            }
        }

        return redirect()->back()->with(key: 'errors', message: ['Username atau Password salah!']);
    }

    public function destroy(): RedirectResponse
    {
        session()->destroy();

        return redirect()->route(route: 'Login::index');
    }
}