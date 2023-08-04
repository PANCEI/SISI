<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        return view("login/login");
    }
    public function cek()
    {
        $rules = [
            'username'   => ['rules' => 'required', 'errors' => ['required' => 'Username is required']],
            'password'   => ['rules' => 'required', 'errors' => ['required' => 'Password is required']],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Login gagal');
            return redirect()->to('/login')->withInput();
        }
        // ambil variablenya ,
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // ambil funct9ion get user name
        $user = $this->userModel->GetUserName($username);
        // cek jika user ada 
        if ($user) {
            // periksa apakah user active atau tidak 
            if ($user['STATUS_USER'] == 'active') {
                // cek password verify 
                if (password_verify($password, $user['PASSWORD'])) {
                    // buat session yang akan digunakan untuk nanti 
                    $data = [
                        'id_user' => $user['ID_USER'],
                    ];
                    session()->set($data);
                    return redirect()->to('/Dashboard');
                } else {
                    session()->setFlashdata('error', 'Maaf Password Anda Masukan Salah');
                    return  redirect()->to('/login')->withInput();
                }
            } else {
                session()->setFlashdata('error', 'Akun ANda Tidak Aktive silahakan Hubungi Admin Yang bersangkutan');
                return redirect()->to('Login')->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Maaf Anda TidakTerdaftar Dalam Sistem Mohon menghubungi admin yang bersangkutan');
            return redirect()->to('/login')->withInput();
        }
    }
}
