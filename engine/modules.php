<?php

/*
 * Список модулей, нужных для работы движка
 * 
 */
$modules = array(
    //Системный модуль
    'Module' => 'engine/system/Modules.php',
    //Модуль для работы с шаблонами
    'Templater' => 'tmp/templater.php',
    //Модуль отладки движка
    'Debug' => 'debug/debug.php',
    //Модули обработки ошибок
    'GlobalErrors' => 'errors/errorexception.php',
    'UserErrors' => 'errors/usererrors.php',
    //модуль отключения системы
    'Shutdown' => 'shutdown.php',
    //Модуль регистрации на сайте
    'Register' => 'register/register.php',
    //Модуль работы с почтой
    'Mail' => 'mail/mail.php'
);
?>
