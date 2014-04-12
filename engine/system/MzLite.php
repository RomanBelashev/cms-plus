<?php
/*
 * 
 * Главный модуль системы
 */
class MzLite {
   // Проверяем, установленна ли система
    static public  $install = true;
    static function active()
    {
        //Если файл config.mzz.php существует, значит cms система установлена
        // иначе запускаем установку
        
        self::$install = is_file(DIR_INCLUDES."config.mzz.php");
        if(!self::$install) {
            // Установка системы
           
            require_once 'install.php';
        } else {
            
            // Немного настроим php.ini
            // Отключаем магические кавычки
            ini_set('magic_quots_gps', 0);
            ini_set('magic_quots_runtime', 0);
            ini_set('magic_quots_sybase', 0);
            ini_set('register_globals', 0);
            
            // Активация необходимых системе модули
            Module::activate('Module');
            // проверка, отключена или нет система
            Module::activate('Shutdown');
            // Подгрузка шаблона сайта
            
            Module::activate('Templater');
          
        }
    }
    }
?>
