<?php
// untuk ambil semua menu user

use App\Database\Migrations\User;

function menuUser()
{
    $db = \Config\Database::connect();
    $id = session('id_user');
    return $db->query("SELECT * from menu_user WHERE ID_USER='$id' AND DELETE_MARK !='0'")->getResultArray();
}
function Menu($id_menu)
{
    $db = \Config\Database::connect();
    return $db->query("SELECT * FROM menu JOIN menu_level ON menu.ID_LEVEL = menu_level.ID_LEVEL WHERE menu.DELETE_MARK !='0' AND menu.MENU_ID='$id_menu'")->getResultArray();
}
function MenuLevel()
{
    $db = \Config\Database::connect();
    return $db->query("SELECT * FROM menu_level")->getResultArray();
}
function kode()
{
    $db = \Config\Database::connect();
    $q = "SELECT RIGHT(MENU_ID,2) as kode FROM menu ORDER BY MENU_ID DESC LIMIT 2";
    $count = $db->query($q)->getNumRows();
    if ($count <> 0) {
        $data_id = $db->query($q)->getRowArray();
        $kode = $data_id['kode'] + 1;
    } else {
        $kode = 1;
    }
    // buat kode Menu
    $buat_id = str_pad($kode, 2, "0", STR_PAD_LEFT);
    $menu = "M$buat_id";
    return $menu;
}
function deletemark($active)
{
    if ($active == 1) {
        return "checked='checked'";
    }
}
function cekAKses($id_user, $id_menu)
{
    $db = \Config\Database::connect();
    $jumlah = $db->query("SELECT   * FROM menu_user WHERE ID_USER='$id_user' AND MENU_ID='$id_menu'")->getNumRows();
    if ($jumlah > 0) {
        return "checked='checked'";
    }
}
function activityAll()
{
    $db = \Config\Database::connect();
    return $db->query("SELECT user_activity.* ,menu.MENU_NAME FROM user_activity JOIN menu ON menu.MENU_ID=user_activity.MENU_ID AND user_activity.DELETE_MARK !='0' ORDER BY user_activity.NO_ACTIVITY  DESC")->getResultArray();
}
function changeMArk($id)
{
    $db = \Config\Database::connect();
    return   $db->query("UPDATE user_activity set DELETE_MARK ='0' WHERE user_activityNO_ACTIVITY= '$id'")->getNumRows();
}
function kodeUser()
{
    $db = \Config\Database::connect();
    $q = "SELECT RIGHT(ID_USER,6) as kode FROM user ORDER BY ID_USER DESC LIMIT 2";
    $count = $db->query($q)->getNumRows();
    if ($count <> 0) {
        $data_id = $db->query($q)->getRowArray();
        $kode = $data_id['kode'] + 1;
    } else {
        $kode = 1;
    }
    // buat kode Menu
    $buat_id = str_pad($kode, 6, "0", STR_PAD_LEFT);
    $user = "U$buat_id";
    return $user;
}
