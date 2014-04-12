<?php
/* 
 * Админка
 */
require_once 'engine/system/database/connect.php';
require_once 'engine/system/database/loged.php';



if($_SESSION['users']['login'] == "admin" && Loged::admin() == 3) { 
   
    
    include_once 'content/templates/chemir/admin/index.php';
    exit;
}
 else {
    include_once 'errors/404.html';
    exit;
}