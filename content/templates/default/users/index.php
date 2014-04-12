<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/article.php';
//Подключаем шапку
include_once DIR_CONTENT.'templates/default/header.php';
//активируем регистрационный модуль
Module::activate('Register');
//Регистрация
    if($_GET) {
        if($_GET['logout'] == $_SESSION['users']['login']){
            $logout = Simple::ClearData($_GET['logout'], 's');
            if(Session::logout($logout)){
                echo "<meta http-equiv='refresh' content='2; url=index.php' />";
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
            'edit_article' => 'edit_article',
            'users' => 'users',
            'delete_users' => 'delete_users',
            'modules' => 'modules',
             'templates' => 'templates'
        );
        print_r($_GET); 
        foreach ($_GET as $menu => $index) {
               
                if($menu != $files[$menu]) {
                    return print "Нет такой страницы";
                }
                if($menu){
                    include_once DIR_CONTENT.'templates/default/users/'.$menu.'.php';
                }
                if($menu == 'register'){
                    include_once DIR_CONTENT.'templates/default/'.$menu.'.php';
                }
                if($menu == 'delete_article' || $menu == 'templates'){ 
                    include_once DIR_CONTENT.'templates/default/admin/'.$menu.'.php';
                }
                if($menu == 'edit_article' || $menu == 'modules'){ 
                    include_once DIR_CONTENT.'templates/default/admin/'.$menu.'.php';
                }
                 if($menu == 'users' || $menu == "delete_users"){ 
                    include_once DIR_CONTENT.'templates/default/admin/'.$menu.'.php';
                }
        }
    }  else { 
        include_once DIR_CONTENT.'templates/default/users/home.php';
   }
//подвал
        include_once DIR_CONTENT.'templates/default/footer.php';




