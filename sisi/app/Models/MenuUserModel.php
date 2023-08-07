<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuUserModel extends Model
{
    protected $table            = 'menu_user';
    protected $primaryKey       = 'NO_SETTING';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['ID_USER', 'MENU_ID', 'CREATE_DATE', 'DELETE_MARK'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'CREATE_TIME';
    protected $updatedField  = 'UPDATE_DATE';
    public function get($user_id, $menuid)
    {
        return $this->where(["ID_USER" => $user_id])
            ->where(['MENU_ID' => $menuid])
            ->countAllResults();
    }
}
