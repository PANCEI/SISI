<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\UserActivity;
use App\Models\ErrorModel;
use App\Models\UserActivityModel;
use App\Models\UserModel;
use App\Models\MenuModel;
use App\Models\MenuUserModel;

class Akses extends BaseController
{
    protected $error;
    protected $activity;
    protected $user;
    protected $menu;
    protected $menuUser;
    public function __construct()
    {
        $this->menuUser = new MenuUserModel();
        $this->error = new ErrorModel();
        $this->activity = new UserActivityModel();
        $this->user = new UserModel();
        $this->menu = new MenuModel();
    }
    public function index()
    {
        $data = [
            "title" => "Akses Menu User",
            "user" => $this->user->getUserId(session('id_user')),
            'all' => $this->user->findAll(),

        ];
        return view('akses/akses', $data);
    }
    public function add()
    {
        $data = [
            "title" => "Tambah Akses",
            "user" => $this->user->getUserId(session('id_user')),
            "menu" => $this->menu->findAll(),
            "menuUser" => $this->menuUser
        ];
        return view('akses/add', $data);
    }
    public function addAkses()
    {
        $id_user = $this->request->getVar('idm');
        $menu_id = $this->request->getVar('menu_id');
        $date = $this->request->getVar('date');
        $cek = $this->menuUser->get($id_user, $menu_id);
        $idm = $this->request->getVar('module');


        if ($cek <= 0) {
            $this->menuUser->insert([
                "ID_USER" => $id_user,
                "MENU_ID" => $menu_id,
                "CREATE_DATE" => $date
            ]);
            $ac = [
                "ID_USER" => session('id_user'),
                "Diskripsi" => "Akses Berhasil DI Tambahkan",
                "STATUS" => "Success",
                "MENU_ID" => $idm,
                "CREATE_BY" => $this->request->getVar('created'),
                "DELETE_MARK" => '1'
            ];
            $this->activity->insert($ac);
            session()->setFlashdata('success', "Berhasil Menambahkan Akses User");
        } else {
            $this->menuUser->where(['ID_USER' => $id_user])
                ->where(['MENU_ID' => $menu_id])
                ->delete();
            $ac = [
                "ID_USER" => session('id_user'),
                "Diskripsi" => "Akses Berhasil DI Hapus",
                "STATUS" => "Success",
                "MENU_ID" => $idm,
                "CREATE_BY" => $this->request->getVar('created'),
                "DELETE_MARK" => '1'
            ];
            $this->activity->insert($ac);
            session()->setFlashdata('success', "Berhasil Menghapus Akses User");
        }
    }
}
