<?php
/*
 * Подключаем файл соединения в БД
 */
require_once 'engine/system/database/connect.php';

class Register {

    //Регистрация юзеров
    public static function UserToRegister($arr) {
        $login = Simple::ClearData($arr['login'], 's');
        $email = Simple::ClearData($arr['email'], 's');
        $password = Simple::HashPassword($arr['password']);
        if ($login == "" && $email == ""){
        return false;}

        //Проверка, существует ли юзер в БД
        if (!self::ErrorgetEmail($email)) {
            die('Пользователь с таким email уже существует');
        }
        //Добавление данных в БД
        if (!self::newUsers($login, $email, $password)) {
            return false;
        }
        try { 
            //Отправка письма пользователю
            if (!Mail::getMail($login, $email))
                throw new GlobalErrors('Errors SendMail');
        } catch (GlobalErrors $se) {
            die($se->setMessage());
        }
        return true;
    }

    //Авторизация юзеров
    public static function UserToAutorized($arr) { print_r($arr);
        $login = Simple::ClearData($arr['login'], 's');
        $password = Simple::HashPassword($arr['password'], 's');

        if (!self::getValidateAutorized($login, $password)) 
        {return false;}
        else {
        return true;}
    }

    //Метод сравнения данных
    private static function getValidateAutorized($login, $password) {
        //Соединение с БД
        $db = DB::MySQLiConnect(); 
        //Сравнение данных с БД
        $sql_autorized = "SELECT login, password FROM users WHERE login='$login'";
        $query = $db->query($sql_autorized);
       
        $result = $query->fetch_assoc(); 
        
        if ($result['login'] == $login && $result['password'] == $password) {
            //Записываем сессию
            try {
                if (!Session::newSessionUserLogin($login))
                    throw new GlobalErrors('Errors Session');
                else {
                    return true;
                }
            } catch (GlobalErrors $se) {
                return $se->setMessage();
            }
        } else {
            return false;
        } return;
    }

    /*
     *  Добавление данных в БД
     */

    private static function newUsers($login, $email, $password) { 
        //Соединение с БД
        
        $db = DB::MySQLiConnect();
        $sgl_register = "INSERT INTO users (login, email, password, role) VALUES ('$login', '$email','$password', 1)";
        $query = $db->query($sgl_register);
        if ($query) { 
            //Записываем сессию
           
                try {
                    if (!Session::newSessionUserLogin($login))
                        throw new GlobalErrors('Errors Session');
                    else {
                        return true;
                    }
                } catch (GlobalErrors $se) {
                    return $se->setMessage();
                }
            } else { 

                return false;
            }
        }
    
/*
*Проверка на существование юзера
*/
private static function ErrorgetEmail($email){
    //Соединение с БД
        $db = DB::MySQLiConnect();
        $sql_email = "SELECT email FROM users WHERE email='$email'";
        $query = $db->query($sql_email);
        $result = $query->fetch_assoc();
        if($result['email'] == $email)
            return false;
        else 
            return true;
}
}