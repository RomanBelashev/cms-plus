<?php

/*
 * Ошибки системы
 */
class Errors {
    public static function installError($flag){
        $installErrors = array(
            
            'errorFiles' => "Ошибка при создании файла конфигурации",
            'emailError' => "Вы не ввели Email",
            'none' => "ВЫ заполнили не все поля",
            'errorDB' => "Ошибка при создании базы данных",
            'errorTableDB' => "Ошибка при заливке таблиц",
            'errorUsers' => "Ошибка при создании администратора сайта",
            'errorsFileDB' => "Ошибка при создании БД. Обратитесь к админу"
            
            
        );
        return $installErrors[$flag];
    }
    public static function DBError($flag){
        $DBError = array(
            'GlobalErrorDB' => 'Ошибка при выборке данных из БД'
        );
        
        return $DBError[$flag];
    }
}
?>
