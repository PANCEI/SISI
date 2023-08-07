<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ErrorModel;
use App\Models\UserActivityModel;

class User extends BaseController
{
    protected $user;
    protected $activity;
    protected $error;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->activity = new UserActivityModel();
        $this->error = new ErrorModel();
    }
    public function index()
    {
        $data = [
            "title" => "User Management",
            "user" => $this->user->getUserId(session('id_user')),
            "all" => $this->user->findAll()
        ];
        return view('user/user', $data);
    }
    public function tambah()
    {
        var_dump($_POST);
    }
}
