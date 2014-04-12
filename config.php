<?php
/*
 * Базовая конфигурация
 */
// Устанавливаем кодировку
header("Content-type:text/html; Charset:utf-8");
//Сессия
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/Session.php';
Session::activation();
//Уровень отображения ошибок
error_reporting(E_ALL & ~E_NOTICE);
/*
* Рабочие константы
 */
//Домен сайта, например cms.com
define ('DOMAIN', $_SERVER['HTTP_HOST']);

// Директория сайта, относительно домена (там, где index.php)
define('SITE_DIR', get_site_dir());

//Директория с файлами ядра движка
define('MZ_ENGINE', SITE_DIR.'engine/');

// Директория модулей сайта
define('MZ_MODULES', SITE_DIR.'modules/');

//Директория к файлам
define('MZ_CONTENT', SITE_DIR.'content/');

//Директория к подключаемым файлам
define('MZ_INCLUDES', SITE_DIR.'includes/');

//директория сайта на сервере
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'].SITE_DIR);

//директория к ядру движка
define('DIR_ENGINE', $_SERVER['DOCUMENT_ROOT'].MZ_ENGINE);

//Модули
define('DIR_MODULES', $_SERVER['DOCUMENT_ROOT'].MZ_MODULES);

//Файлы
define('DIR_CONTENT', $_SERVER['DOCUMENT_ROOT'].MZ_CONTENT);

// Подключаемые файлы
define('DIR_INCLUDES', $_SERVER['DOCUMENT_ROOT'].MZ_INCLUDES);


function get_site_dir(){ 
    
    if ($_SERVER['SCRIPT_FILENAME']== 'C:/OpenServer/domains/cms/index.php') {
        preg_match('|^'.rtrim($_SERVER['DOCUMENT_ROOT'], '/\\').'(.*)index\.php$|',$_SERVER['SCRIPT_FILENAME'], $find);

return $find[1];       }

if ($_SERVER['SCRIPT_FILENAME']== 'C:/OpenServer/domains/cms/admin.php') {
        preg_match('|^'.rtrim($_SERVER['DOCUMENT_ROOT'], '/\\').'(.*)admin\.php$|',$_SERVER['SCRIPT_FILENAME'], $find);

return $find[1];       }

if ($_SERVER['SCRIPT_FILENAME']== 'F:/OpenServer/domains/cms/index.php') {
        preg_match('|^'.rtrim($_SERVER['DOCUMENT_ROOT'], '/\\').'(.*)index\.php$|',$_SERVER['SCRIPT_FILENAME'], $find);

return $find[1];       }

if ($_SERVER['SCRIPT_FILENAME']== 'F:/OpenServer/domains/cms/admin.php') {
        preg_match('|^'.rtrim($_SERVER['DOCUMENT_ROOT'], '/\\').'(.*)admin\.php$|',$_SERVER['SCRIPT_FILENAME'], $find);

return $find[1];       }


}



//Подключение всех include-файлов
$includes = scandir(DIR_ROOT.'/includes');

unset($includes[0]);
unset($includes[1]); // потому что Array ( [0] => . [1] => .. [2] => config.db.php ) Array ( [2] => config.db.php ) 


if(!empty($includes)) {
    
    foreach ($includes as $include){
        
        require_once DIR_ROOT.'/includes/'.$include;
    }
}


//Подключение модуля соединения с БД
require_once DIR_ENGINE.'system/database/connect.php';

//Подключение модуля лобальных ошибок
require_once DIR_ENGINE.'system/errors/global.php';

//Файл вспомогательных функций
require_once DIR_ENGINE.'system/entity/simple.php';

