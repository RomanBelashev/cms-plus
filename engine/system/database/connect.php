<?php
/*
 * Соединение с БД
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

//Класс конфигурации, позволяет работать с разными СУБД
interface Connection{
static function SQLiteConnect($database);
static function MySQLiConnect();
}

class DB implements Connection{
    public static function SQLiteConnect($database){
        return new SQLiteDatabase($database);
}
public static function MySQLiConnect(){
    return new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
}
}
?>
