<?php
/*
 * Работа с сессиями
 */
class Session{
    public static function activation(){
        return session_start();
    }
    public static function newSessionUserLogin($this_session){
        $_SESSION['users']['login'] = $this_session;
        
        return $_SESSION['users']['login'];
    }
    /*Метод определения регистрации, авторизации*/
    public static function authtrue() {
        if($_SESSION['users']['login']){
            return true;
        }
        return FALSE;
    }
    //Удаление сессии
    public static function logout(){
        if($_SESSION['users']['login']){
            unset($_SESSION['users']['login']);
            return true;
        }  else {
            return false;
        }
    }
}  
?>
