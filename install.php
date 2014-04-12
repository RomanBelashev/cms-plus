<?php

/*
 * Файл инсталляции cms
 * 
 */
//Подключение файла конфигурации
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

//Подключение инсталла
require_once 'engine/install/install.php';

//Экземпляр класса install
$install = new install();

//Запуск установки
$install->show();
?>
