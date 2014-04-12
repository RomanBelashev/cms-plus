<?php
/**
 * Главный файл
 * 
 */
require_once 'config.php';
//Подключение файла модулей
require_once 'engine/system/Module.php';

//Подключение главного модуля системы
require_once 'engine/system/MzLite.php';


//Начинаем работать
MzLite::active();



?>
