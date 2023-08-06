<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\MenuLevelModel;
use App\Models\ErrorModel;
use App\Models\UserActivityModel;

class Level extends BaseController
{
    protected $usermodel;
    protected $level;
    protected $error;
    protected $activity;
    public function __construct()
    {
        $this->activity = new UserActivityModel();
        $this->error = new ErrorModel();
        $this->level = new MenuLevelModel();
        $this->usermodel = new UserModel();
    }
    public function index()
    {
        $data = [
            "title" => "MENU LEVEL",
            "user" => $this->usermodel->getUserId(session('id_user')),
            "level" => $this->level->findAll(),
        ];
        return view('level/level', $data);
    }
    public function tambah()
    {
        $id = $this->request->getVar('id');
        if (!$this->validate([
            "createdby" => "required",
            "id" => "required",
            "deskripsi" => "required",
            "status" => "required",
            "level" => "required",
            "id_level" => "required|max_length[3]|is_unique[menu_level.ID_LEVEL]"
        ])) {
            $validasi = \Config\Services::validation();
            $data = [
                "ID_USER" => session('id_user'),
                "ERROR_DATE" => date('d'),
                "MODULES" => "Tambah Levelt",
                "FUNCTION" => "Level Tambah",
                "ERROR_LINE" => '47',
                "ERROR_MESSAGE" => $validasi->listErrors(),
                "STATUS" => 'error',
                "PARAM" => "ID_LEVEL,LEVEL",
                "CREATE_DATE" => date("d-m-Y"),
                "UPDATE_BY" => $this->request->getVar('createdby')
            ];
            $this->error->insert($data);
            session()->setFlashdata('error', "Gagal Menambahkan Level Baru");
            return redirect()->to("/level?id=$id")->withInput();
        }
        $data = [
            "ID_LEVEL" => $this->request->getVar('id_level'),
            "LEVEL" => $this->request->getVar('level')
        ];
        $this->level->insert($data);
        $ac = [
            "ID_USER" => session('id_user'),
            "Diskripsi" => "Leve; Berhasil Di Tambahkan",
            "STATUS" => "Success",
            "MENU_ID" => $id,
            "CREATE_BY" => $this->request->getVar('createdby')
        ];
        $this->activity->insert($ac);
        session()->setFlashdata('success', 'Level Baru Berhasil DI Tambahkan');
        return redirect()->to("/level?id=$id");
    }
}
