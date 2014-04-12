<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="http://<?php echo DOMAIN;?>/content/templates/chemir/css/style.css" />
        <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/style_ie.css" /> -->
        <script type="text/javascript" src="http://<?php echo DOMAIN;?>/content/templates/default/js/jquery.js"></script>
         <script type="text/javascript" src="http://<?php echo DOMAIN;?>/content/templates/default/js/ckeditor/ckeditor.js"></script>
</head>

<body>

<div id="wrapper">
 <div id='logo' style="float: left;"> <a href="index.html"><img src="http://<?php echo DOMAIN;?>/content/templates/chemir/img/realter_2.png" alt="Риэлтер" width="260" height="100"/></a>   </div>
	<header class="header">
           
      
        <div id="nav">
            <p ><a href="?logout=<?php echo $_SESSION['users']['login']?>">Выход</a></p>
            <p ><a href="admin.php">Главная</a></p>
            <p ><a href="?page=users">Управление пользователями</a></p>
            <p ><a href="?page=files">Управление файлами</a></p>
            <p ><a href="?page=modules">Управление модулями сайта</a></p>
            <p ><a href="?page=templates">Управление шаблонами сайта</a></p>
            <p style="float: none;"><a href="?page=settings">Настройки CMS системы</a> </p> 
       
        </div>    
      
        </header><!-- #header-->

