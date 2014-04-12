<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/article.php';

include_once 'header.php';

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
echo $menu = $_GET['page'];
switch ($menu) {
    case 'settings':
        include_once 'settings.php';
        break;
    case 'article':
         include_once 'article.php';
         break;
    case 'delete_article':
        include_once 'delete_article.php';
        break;
    case 'edit_article': 
        include_once 'edit_article.php';
        break;
     case 'files': 
        include_once 'files.php';
        break;
    case 'users': 
        include_once 'users.php';
        break;
     case 'delete_users': 
        include_once 'delete_users.php';
        break;
    case 'modules': 
        include_once 'modules.php';
        break;
    case 'templates': 
        include_once 'templates.php';
        break;
    default : include_once 'home.php';
        break;
}

include_once 'home.php';

include_once DIR_CONTENT.'templates/default/footer.php';

