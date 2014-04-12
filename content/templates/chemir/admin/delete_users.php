<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/users.php';
if($_GET) {
    $id_del = (int)$_GET['delete_users'];
    try{
        if(!Users::deleteUser($id_del))
            throw new Exception('Ошибка при удалении юзера');
        else 
            echo 'Юзер удалён';
    } catch (Exception $ex) {
           die($ex->getMessage());
    }
}
