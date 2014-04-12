<?php
/* 
 * Модуль для работы с почтой
 */
class Mail{
    //Метод отправки почты после регистрации
    public static function getMail($login,$email){
        $title = "Регистрация на сайте";
        $message = "Вы успешно зарегистрированны на сайте, \n"
                . "Ваш логин:".$login;
        $headers .= 'From: AdminCms <hur@ngs.ru>';
        //$headers .= 'Content-type:text/html; charset=utf-8';
        $sendemail = mail($email,$title,$massage,$headers);
        if(!$sendemail)
            return false;
        
        return true;
    }
}
