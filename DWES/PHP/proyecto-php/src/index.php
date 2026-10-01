<?php

$servidor = "db";
$usuario = "usuario";
$password = "clave";
$basedatos = "instituto";

$conexion = new mysqli(
    $servidor,
    $usuario,
    $password,
    $basedatos
);

if ($conexion->connect_error) {
    die("Error de conexión:". $conexion->connect_error);
}

echo "<h1>Conexión realizada correctamente</h1>";

?>

