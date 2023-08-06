<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuLevelModel extends Model
{
    protected $table            = 'menu_level';
    protected $primaryKey       = 'ID_LEVEL';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['ID_LEVEL', 'LEVEL'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
    protected $updatedField  = '';


    // Validation

}
