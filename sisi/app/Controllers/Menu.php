<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\UserActivity;
use App\Models\UserModel;
use App\Models\MenuModel;
use App\Models\ErrorModel;
use App\Models\UserActivityModel;

class Menu extends BaseController
{
    protected $userModel;
    protected $menu;
    protected $error;
    protected $activity;
    public function __construct()
    {
        $this->activity = new UserActivityModel();
        $this->error = new ErrorModel();
        $this->menu = new MenuModel();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => "Menu Management",
            'user' => $this->userModel->getUserId(session('id_user')),
            'menu' => $this->menu->all()
        ];
        return view('menu/menu', $data);
    }
    public function tambah()
    {
        $id = $this->request->getVar('id');
        if (!$this->validate([
            "menu_id" => "required",
            "createdby" => "required",
            "updatedby" => "required",
            "menu_name" => "required",
            "menulink" => "required",
            "menuicon" => "required",
            "id_level" => "required"
        ])) {
            $validasi = \Config\Services::validation();
            $data = [
                "ID_USER" => session('id_user'),
                "ERROR_DATE" => date('d'),
                "MODULES" => "Tambah Menu",
                "FUNCTION" => "menu/tambah",
                "ERROR_LINE" => '40',
                "ERROR_MESSAGE" => $validasi->listErrors(),
                "STATUS" => 'error',
                "PARAM" => "MENU_NAME,MENU_ICON,MENU_LINK,MENU_LEVEL",
                "CREATE_DATE" => date("d-m-Y"),
                "UPDATE_BY" => $this->request->getVar('createdby')
            ];
            $this->error->insert($data);
            session()->setFlashdata('error', "Gagal Memasukan Menu Baru");
            return redirect()->to("/Menu?id=$id")->withInput();
        }
        $data = [
            "MENU_ID" => htmlspecialchars($this->request->getVar('menu_id')),
            "CREATE_BY" => htmlspecialchars($this->request->getVar('createdby')),
            "UPDATE_BY" => htmlspecialchars($this->request->getVar('updatedby')),
            "MENU_NAME" => htmlspecialchars($this->request->getVar('menu_name')),
            "MENU_LINK" => htmlspecialchars($this->request->getVar('menulink')),
            "MENU_ICON" => htmlspecialchars($this->request->getVar('menuicon')),
            "ID_LEVEL" => htmlspecialchars($this->request->getVar('id_level')),
            "DELETE_MARK" => "1"
        ];
        $this->menu->insert($data);
        $ac = [
            "ID_USER" => session('id_user'),
            "Diskripsi" => "Data Berhasil Di Tambahkan",
            "STATUS" => "Success",
            "MENU_ID" => $id,
            "CREATE_BY" => $this->request->getVar('createdby')
        ];
        $this->activity->insert($ac);
        session()->setFlashdata('success', 'Menu Baru Berhasil DI Tambahkan');
        return redirect()->to("/menu?id=$id");
    }
    public function edit()
    {
        $id = $this->request->getVar('id_menu');
        if (!$this->validate([
            "id_menu" => "required",
            "menu_name" => "required",
            "menu_link" => "required",
            "menuicon" => "required",
            "id_level" => "required",
            "createdby" => "required",
        ])) {
            $validasi = \Config\Services::validation();
            $data = [
                "ID_USER" => session('id_user'),
                "ERROR_DATE" => date('d'),
                "MODULES" => "Menu Edit",
                "FUNCTION" => "menu/edit",
                "ERROR_LINE" => '88',
                "ERROR_MESSAGE" => $validasi->listErrors(),
                "STATUS" => 'error',
                "PARAM" => "MENU_NAME,MENU_ICON,MENU_LINK,MENU_LEVEL",
                "CREATE_DATE" => date("d-m-Y"),
                "UPDATE_BY" => $this->request->getVar('createdby')
            ];
            $this->error->insert($data);
            session()->setFlashdata('error', "Gagal Mengubah Menu");
            return redirect()->to("/Menu?id=$id")->withInput();
        }
        $idm = $this->request->getVar('id_menu');
        $data = [
            "ID_LEVEL" => $this->request->getVar('id_level'),
            "MENU_LINK" => $this->request->getVar('menu_link'),
            "MENU_ICON" => $this->request->getVar('menuicon'),
            "MENU_NAME" => $this->request->getVar('menu_name')
        ];
        $this->menu->update($idm, $data);

        $ac = [
            "ID_USER" => session('id_user'),
            "Diskripsi" => "Menu Berhasil Di Ubah",
            "STATUS" => "Success",
            "MENU_ID" => $id,
            "CREATE_BY" => $this->request->getVar('createdby')
        ];
        $this->activity->insert($ac);
        session()->setFlashdata('success', 'Menu Berhasil Di Edit');
        return redirect()->to("/menu?id=$id");
    }
    public function cek()
    {
        $active = $this->request->getVar('active');
        $id = $this->request->getVar('id');
        if ($active == 0) {
            $data = ['DELETE_MARK' => 1];
            $this->menu->update($id, $data);
        } else {
            $data = ["DELETE_MARK" => 0];
            $this->menu->update($id, $data);
        }
        $idm = $this->request->getVar('idm');
        $ac = [
            "ID_USER" => session('id_user'),
            "Diskripsi" => "Delete Mark Berhasil Di Ubah",
            "STATUS" => "Success",
            "MENU_ID" => $idm,
            "CREATE_BY" => $this->request->getVar('createdby')
        ];
        $this->activity->insert($ac);
        session()->setFlashdata('success', 'Anda Berhasil Mengubah Mark Menu');
    }
}
