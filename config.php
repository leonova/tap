<?php
session_start();
$root = "//".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

define('BASE_URL', $root); 

print_r($_SESSION);
?>