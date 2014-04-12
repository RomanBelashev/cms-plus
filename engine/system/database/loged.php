<?php

/* 
 * Различные запросы к БД
 */

class Loged {
    // Проверка админа и его роли
    static function admin(){
        $db = DB::MySQLiConnect();
        $query = $db->query('SELECT role FROM users WHERE idusers = 1');
        $result = $query->fetch_assoc();
        
        return $result['role'];
    }
    
    
    /*
     * Метод насторойки системы
     */
    static function settings($status = 1, $editor =1){
         $db = DB::MySQLiConnect();
         //Обновляем данные в БД
         $sql_update_settings = "UPDATE settings SET offline = $status, editor = $editor
                 WHERE idsettings = 1";
         $query = $db->query($sql_update_settings) or die($db->error);
         if(!$query) return false;
         
return  true;
    }
    /*
     * Получение id юзера
     */
    static function getIdUsers($login){
        $db = DB::MySQLiConnect();
        $sql_id_user = "SELECT idusers FROM users WHERE login = '$login'";
        $query = $db->query($sql_id_user) or die($db->error);
        $result = $query->fetch_assoc();
        
        return $result['idusers'];
    }
    
    /*
     * Выборка данных юзера
     */
    static function getUser($idusers){
       $db = DB::MySQLiConnect();
        $id = (int)$idusers;
        $sql_users = "SELECT login,email,role FROM users WHERE idusers = $id";
        $query = $db->query($sql_users) or die($db->error);
        $result = $query->fetch_assoc();
         
        return $result;
    }
    /*
     * Метод изменения данных
     */
    static function  setUser($login, $email, $password, $idusers = null){
        $db = DB::MySQLiConnect();
        $sqi_set_users = "UPDATE users SET login='$login', email='$email', password='$password' WHERE idusers='$id'";
        $query = $db->query($sqi_set_users) or die($db->error);       
    
        return true;
    }
    /*
     * Проверка, включён ли редактор
     * 
     */
    static function Editor(){
        $db = DB::MySQLiConnect();
        $sql_editor = "SELECT editor FROM settings WHERE idsettings = 1";
        $query = $db->query($sql_editor) or die($db->error);
        $result = $query->fetch_assoc();
        
        return $result['editor'];
    }
    /*
     * Запись файла в БД
     */
    static function newFile($path, $extansion = null, $type, $userid){
        $db = DB::MySQLiConnect();
        $sql_files = "INSERT INTO files (path, extension, type, users_idusers)"
                . "VALUES ('$path','$extansion', '$type', '$userid')";
       $db->query($sql_files) or die($db->error); 
       
       return true;
    }
    /*
     * Вывод всех файлов из БД
     */
    static function showFiles(){
        $db = DB::MySQLiConnect();
        $sql_files = "SELECT path, extension, type, users_idusers FROM files";
        $query = $db->query($sql_files) or die($db->error); 
        
        return $query;
    }
    /*
     * Метод отображения юзеров
     */
    static function  showUsers(){
         $db = DB::MySQLiConnect();
        $sql_users = "SELECT idusers, login, email, role FROM users";
         $query = $db->query($sql_users) or die($db->error); 
         
         return $query;
    }
    /*
     * Метод подсчёта пользователей
     */
    public static function CountToUsers(){
        $db = DB::MySQLiConnect();
        $sql_users = "SELECT COUNT(login) FROM users";
        $query = $db->query($sql_users) or die($db->error); 
        $result = $query->fetch_row();
        
        return $result[0];
        
    }
    /*
     * Изменяет шаблон в базе данных
     */
    public static function ReturnTemplate($template){
        $db = DB::MySQLiConnect();
        $up_tmp = "UPDATE settings SET tmp='$template' WHERE idsettings=1";
        $query = $db->query($up_tmp)or die($db->error); 
        
        return true;
    }
}