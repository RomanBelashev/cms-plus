<?php
// Подключаем файл глобальных ошибок
require_once 'engine/system/errors/global.php';
$errors = "";
// Создаём объект класса install
$install = new install();
//Перехват POST данных
if($_POST['third']) { 
    $adminemail =trim(strip_tags($_POST['adminemail']));
    $adminlogin =trim(strip_tags($_POST['adminlogin']));
 $adminpassword =trim(strip_tags($_POST['adminpassword']));
 $adminpassword = md5($adminpassword);
 
 if($adminemail == "") die(Errors::installError('emailError'));
     elseif ($adminlogin === "" || $adminpassword === "") 
     {die(Errors::installError('none'));}
     try {
         $users = array($adminlogin, $adminemail, $adminpassword);
         
         // Установка
         if(!$install->start($adminemail, $users))
          throw new Exception(Errors::installError('errorFiles'));
                 else 
                  die('Успешная установка');
     }  catch (Exception $e){
         return $e->getMessage();
     }
}
if($_POST['second']){
    $dbname = trim(strip_tags($_POST['dbname']));
    $dbuser = trim(strip_tags($_POST['dbuser']));
    $dbpassword = trim(strip_tags($_POST['dbpassword']));
    $dbhost = trim(strip_tags($_POST['dbserver']));
    if($dbname === "" || $dbuser === "" || $dbhost === "")
        die (Errors::installError('none'));
    else {
        //Создаём файл конфигурации
        $install->createFile($dbname, $dbuser, $dbpassword, $dbhost);
               
    }
}
if($_POST['system']){
    $system = $_POST['yes'];
    if($system != "ok"){
        $errors = 1;
    }
}
?>
<!DOCTYPE html>
<html>
    
    <head>
        
        <title>Установка CMS ver 1.0</title>
        <link rel="stylesheet" type="text/css" href="http://<?php echo DOMAIN;?>/engine/install/img/install.css" />
        <script type="text/javascript" src="http://<?php echo DOMAIN;?>/content/js/jquery.js"></script>
        <script type="text/javascript" src="http://<?php echo DOMAIN;?>/engine/install/form.js"></script>   
    </head>
    <body>
        <div id="content">
            <div id="header">
                <h2>Система управления сайтами</h2>
                
            
            
            
        </div>
        <?php 
        if($errors == 1) {
        include_once 'errors.php';
        exit;
        }
        ?>
    