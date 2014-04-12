<?php

/* 
 * Класс для работы с юзерами
 */

class Users {
    //Метод отображения параметров юзера
    static function showUsersId($id){
        $db = DB::MySQLiConnect();
        $sql = "SELECT idusers, login, email, role FROM users WHERE idusers = $id";
        $query = $db->query($sql) or die($db->error);
        $result = $query->fetch_assoc();
        
        return $result;
    }
    /*
     * Изменение данных юзера
     */
    static function updateUser($login, $email, $role, $id){
        $db = DB::MySQLiConnect();
        $sql_update = "UPDATE users SET login= '$login', email = '$email', role = '$role' "
                . "WHERE idusers = $id";
            $query = $db->query($sql_update) or die($db->error); 
            
            return true;
            
    }
    /*
     * 
     * Удаление юзера
     */
    static function deleteUser ($id){
        $db = DB::MySQLiConnect();
        $sql_del = "DELETE FROM users WHERE idusers = $id";
        $query = $db->query($sql_del) or die($db->error); 
            
            return true;
    }
}