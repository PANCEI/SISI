<?php
// untuk ambil semua menu user

use App\Database\Migrations\User;

function menuUser()
{
    $db = \Config\Database::connect();
    return $db->table('menu_user')
        ->getWhere(['ID_USER' => session('id_user')])
        ->getResultArray();
}
function Menu($id_menu)
{
    $db = \Config\Database::connect();
    return $db->table('menu')
        ->join('menu_level', 'menu_level.ID_LEVEL=menu.ID_LEVEL')
        ->getWhere(['MENU_ID' => $id_menu])
        ->getResultArray();
}
