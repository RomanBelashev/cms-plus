<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/article.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/realtable.php';
//Подключаем шапку
include_once DIR_CONTENT.'templates/chemir/header.php';
//активируем регистрационный модуль
Module::activate('Register');
//Регистрация
    if($_GET) {
        if($_GET['logout'] == $_SESSION['users']['login']){
            $logout = Simple::ClearData($_GET['logout'], 's');
            if(Session::logout($logout)){
                echo "<meta http-equiv='refresh' content='0; url=index.php' />";
                echo "Вы успешно вышли";
                exit();
            }  else {
                die("Выйти не удалось");
            }
        }
        $files = array(
            'register' => 'register',
            'profile' => 'profile',
            'article' => 'article',
            'delete_article' => 'delete_article',
            'edit_table' => 'edit_table',
            'users' => 'users',
            'delete_users' => 'delete_users',
            'modules' => 'modules',
            'templates' => 'templates',
            'realtable' => 'realtable'
        );
        
        foreach ($_GET as $menu => $index) {
               
                if($menu != $files[$menu]) {
                    return print "Нет такой страницы";
                }
                if($menu){
                    include_once DIR_CONTENT.'templates/chemir/users/'.$menu.'.php';
                }
                if($menu == 'register'){
                    include_once DIR_CONTENT.'templates/chemir/'.$menu.'.php';
                }
                if($menu == 'delete_article' || $menu == 'templates'){ 
                    include_once DIR_CONTENT.'templates/chemir/admin/'.$menu.'.php';
                }
                if($menu == 'modules'){ 
                    include_once DIR_CONTENT.'templates/chemir/admin/'.$menu.'.php';
                }
                  if($menu == 'edit_table'){ 
                    include_once DIR_CONTENT.'templates/chemir/users/'.$menu.'.php';
                }
                
                if($menu == 'users' || $menu == "delete_users"){ 
                    include_once DIR_CONTENT.'templates/chemir/admin/'.$menu.'.php';
                }
                if($menu == 'realtable'){ 
                    include_once DIR_CONTENT.'templates/chemir/users/'.$menu.'.php';
                }
        }
    }  else { 
        include_once DIR_CONTENT.'templates/chemir/users/home.php';
   }
//подвал
        include_once DIR_CONTENT.'templates/chemir/footer.php';




