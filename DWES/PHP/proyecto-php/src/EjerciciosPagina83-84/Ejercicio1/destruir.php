<?php
session_start();

// Vaciamos las variables de sesión y destruimos la sesión
$_SESSION = [];
session_destroy();

// Volvemos a la página principal con todo reiniciado
header('Location: Ejercicio1.php');
exit;