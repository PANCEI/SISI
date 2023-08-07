<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\UserActivity;
use App\Models\UserActivityModel;
use App\Models\UserModel;

class Activity extends BaseController
{
    protected $activity;
    protected $user;
    public function __construct()
    {
        $this->activity = new UserActivityModel();
        $this->user = new UserModel();
    }
    public function index()
    {
        $data = [
            "title" => "Activity User",
            "user" => $this->user->getUserId(session('id_user')),
            "activity" => activityAll()
        ];
        return view('activity/activity', $data);
    }
    public function cek()
    {
        $mark = $this->request->getVar('id');

        $data = [
            "DELETE_MARK" => "0"
        ];
        $this->activity->update($mark, $data);


        session()->setFlashdata('success', "Activity Berhasil DI Hapus");
    }
}
