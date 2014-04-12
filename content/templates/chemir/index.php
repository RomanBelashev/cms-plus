<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/article.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/realtable.php';
//Подключаем шапку
include_once 'header.php';
//активируем регистрационный модуль
Module::activate('Register');
//Регистрация
try {
    if($_POST['register']){ 
        if(!Register::UserToRegister($_POST)){
            throw new Exception('Произошла ошибка при регистрации');
    } else {
        echo "<meta http-equiv='refresh' content='2; url=index.php' />";
        echo "Успешная регистрация";
        exit();
        
        
      }
    }
    if($_POST['autorised'])
        //авторизуемся
        if(!Register::UserToAutorized($_POST)){
            throw new Exception('Данные не совпадают');
        } else {
             echo "<meta http-equiv='refresh' content='2; url=index.php' />";
        echo "Успешный вход";
        exit();
        }
        //отлавлваем GET-параметры
    if($_GET) {
       $files = array(
            'register' => 'register',
            
            'article' => 'article',
           'realtable' => 'realtable'
        );
        foreach ($_GET as $menu => $index) {
            //Проверка куда идёт обращение
            
                if($menu != $files[$menu]) {
                    return print "Нет такой страницы";
                }
                if($menu){
                    include_once DIR_CONTENT.'templates/chemir/'.$menu.'.php';
                }  if($menu == "article") {
                    include_once DIR_CONTENT.'templates/chemir/users/'.$menu.'.php';
                }
            
        }
    }  else { 
        include_once 'home.php';
    }
    
    //Подключаем подвал
    include_once 'footer.php';
} catch (Exception $ex) {
    die($ex->getMessage());
}

