<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
$user_mod = array();
$dir = $_SERVER['DOCUMENT_ROOT'].'/modules/usermodule';
$mod = scandir($dir);
unset($mod[0]);
unset($mod[1]);

$user_mod = $mod;