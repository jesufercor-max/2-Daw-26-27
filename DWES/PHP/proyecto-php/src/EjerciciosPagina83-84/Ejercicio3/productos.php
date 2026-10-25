<?php
require 'Ejercicio3.php';

if (isset($_POST['añadir'])) {
    $nombre = $_POST['añadir'];

    
    if (isset($_SESSION['productos'][$nombre])) {
        if (isset($_SESSION['cesta'][$nombre])) {
            $_SESSION['cesta'][$nombre]++;
        } else {
            $_SESSION['cesta'][$nombre] = 1;
        }
        guardarCesta();
    }

    header('Location: productos.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        .cabecera {
            background-color: #333;
            color: white;
            padding: 15px;
        }
        .cabecera a {
            color: #ffd54f;
            font-weight: bold;
        }
        table {
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            border: 1px solid #999;
            padding: 12px 25px;
        }
        th {
            background-color: #555;
            color: white;
        }
        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        button {
            padding: 8px 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="cabecera">
        <h1>Mi tienda</h1>
        <p>
            Productos en la cesta: <strong><?= contarProductos() ?></strong> |
            <a href="cesta.php">Ver cesta</a>
        </p>
    </div>

    <table>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Cesta</th>
        </tr>
        <?php foreach ($_SESSION['productos'] as $nombre => $datos): ?>
            <tr>
                <td><?= htmlspecialchars($nombre) ?></td>
                <td><?= number_format($datos['precio'], 2, ',', '.') ?> €</td>
                <td>
                    <a href="detalle.php?producto=<?= urlencode($nombre) ?>">
                        <img src="img/<?= htmlspecialchars($nombre) ?>.jpg"
                             alt="<?= htmlspecialchars($nombre) ?>">
                    </a>
                </td>
                <td>
                    <form method="post" action="productos.php">
                        <button type="submit" name="añadir" value="<?= htmlspecialchars($nombre) ?>">
                            Añadir a la cesta
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>