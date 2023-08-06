<?php

namespace App\Models;

use CodeIgniter\Model;

class ErrorModel extends Model
{
    protected $table            = 'error_aplication';
    protected $primaryKey       = 'ERROR_ID';
    protected $protectFields    = true;
    protected $allowedFields    = ['ID_USER', 'ERROR_DATE', 'MODULES', 'FUNCTION', 'ERROR_LINE', 'ERROR_MESSAGE', 'STATUS', 'PARAM', 'CREATE_DATE', 'DELETE_MARK', 'UPDATE_BY'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'CREATE_TIME';
    protected $updatedField  = 'UPDATE_DATE';
}
