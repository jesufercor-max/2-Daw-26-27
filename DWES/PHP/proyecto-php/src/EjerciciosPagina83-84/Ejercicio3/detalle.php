<?php
require 'Ejercicio3.php';

if (!isset($_GET['producto']) || !isset($_SESSION['productos'][$_GET['producto']])) {
    header('Location: productos.php');
    exit;
}

$nombre = $_GET['producto'];
$producto = $_SESSION['productos'][$nombre];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($nombre) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        .ficha {
            width: 500px;
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
        }
        img {
            width: 400px;
            max-width: 100%;
        }
        a.boton {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            text-decoration: none;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="ficha">
        <h1><?= htmlspecialchars($nombre) ?></h1>
        <img src="img/<?= htmlspecialchars($nombre) ?>.jpg" alt="<?= htmlspecialchars($nombre) ?>">
        <p><strong>Precio:</strong> <?= number_format($producto['precio'], 2, ',', '.') ?> €</p>
        <p><strong>Detalle:</strong> <?= htmlspecialchars($producto['detalle']) ?></p>
        <a class="boton" href="productos.php">Volver a la tienda</a>
    </div>
</body>
</html>