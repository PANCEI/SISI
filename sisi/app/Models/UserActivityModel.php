<?php

namespace App\Models;

use CodeIgniter\Model;

class UserActivityModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_activity';
    protected $primaryKey       = 'NO_ACTIVITY';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ID_USER', 'Diskripsi', 'STATUS', 'MENU_ID', 'CREATE_BY', 'DELETE_MARK'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'CREATE_DATE';
    protected $updatedField  = '';
}
