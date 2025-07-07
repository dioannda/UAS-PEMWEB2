<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function prosesRegister()
    {
        $userModel = new UserModel();

        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $userModel->save($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function prosesLogin()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'user_nama' => $user['nama'],
                'logged_in' => true,
            ]);
            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Email atau Password salah!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
