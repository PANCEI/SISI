<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class MenuModel extends Model
{
    protected $table            = 'menu';
    protected $primaryKey       = 'MENU_ID';
    protected $protectFields    = true;
    protected $allowedFields    = ['MENU_ID', 'ID_LEVEL', 'MENU_NAME', 'MENU_LINK', 'MENU_ICON', 'PARENT_ID', 'CREATE_BY', 'DELETE_MARK', 'UPDATE_BY'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'CREATE_DATE';
    protected $updatedField  = 'UPDATE_DATE';
    protected $table2         = 'menu_level';
    protected $on            =  'menu_level.ID_LEVEL=menu.ID_LEVEL';
    public function all()
    {
        $db = Database::connect();
        return $db->query("SELECT * FROM menu JOIN menu_level ON menu.ID_LEVEL=menu_level.ID_LEVEL")->getResultArray();
    }
}
