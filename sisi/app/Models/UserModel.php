<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table            = 'user';
    protected $primaryKey       = 'ID_USER';
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'CREATE_DATE';
    protected $updatedField  = 'UPDATE_DATE';
    protected $table2        =  'user_foto';
    protected $on      = 'user_foto.ID_USER=user.ID_USER';
    public function GetUserName($name)
    {
        return $this->where(['USERNAME' => $name])
            ->join($this->table2, $this->on)
            ->first();
    }
    public function getUserId($id)
    {
        return $this->where(['user.ID_USER' => $id])->join($this->table2, $this->on)->first();
    }
}
