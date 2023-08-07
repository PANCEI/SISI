<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MenuUserModel;
use App\Models\ErrorModel;
use App\Models\UserModel;

class Error extends BaseController
{
    protected $user;
    protected $error;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->error = new ErrorModel();
    }
    public function index()
    {
        $data = [
            "title" => "Error Aplication",
            "user" => $this->user->getUserId(session('id_user')),
            'all' => $this->error->findAll()
        ];
        return view('error/error', $data);
    }
}
