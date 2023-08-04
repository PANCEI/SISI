<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            "title" => "Dashboard",
            "user" => $this->userModel->getUserId(session('id_user'))

        ];
        return view('dashboard/dashboard', $data);
    }
}
