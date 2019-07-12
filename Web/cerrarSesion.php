<?php
session_start();

if(!isset($_SESSION["logged"])) header('Location: index.php');
	
session_destroy();
header('Location: index.php');
setcookie('nombre','',-450000);
setcookie('contrasena','',-450000);
setcookie('ultima_visita','',-450000);
?>