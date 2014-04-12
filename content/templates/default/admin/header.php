<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="http://<?php echo DOMAIN;?>/content/templates/default/css/style.css" />
        <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/style_ie.css" /> -->
        <script type="text/javascript" src="http://<?php echo DOMAIN;?>/content/templates/default/js/jquery.js"></script>
         <script type="text/javascript" src="http://<?php echo DOMAIN;?>/content/templates/default/js/ckeditor/ckeditor.js"></script>
</head>

<body>

<div class="wrapper">

	<header class="header">
             <a href="?logout=<?php echo $_SESSION['users']['login']?>">Выход</a>
            <a href="admin.php">Главная</a>
            <a href="?page=article">Управление статьями</a>
            <a href="?page=users">Управление пользователями</a>
           <a href="?page=files">Управление файлами</a>
           <a href="?page=modules">Управление модулями сайта</a>
           <a href="?page=templates">Управление шаблонами сайта</a>
           <a href="?page=settings">Настройки CMS системы</a>  
        
        
        
        </header><!-- #header-->

