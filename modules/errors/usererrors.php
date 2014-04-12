<?php

/* 
 * Ошибки порождённые юзерами сайта
 */
class UserErrors{
    function __construct($error, $module) {
        return printf($error, $module);
    }
}
?>
