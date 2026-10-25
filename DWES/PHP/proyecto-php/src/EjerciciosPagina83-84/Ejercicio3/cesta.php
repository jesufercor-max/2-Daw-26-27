<?php
require 'Ejercicio3.php';


if (isset($_POST['eliminar'])) {
    $nombre = $_POST['eliminar'];

    if (isset($_SESSION['cesta'][$nombre])) {
        $_SESSION['cesta'][$nombre]--;

     
        if ($_SESSION['cesta'][$nombre] <= 0) {
            unset($_SESSION['cesta'][$nombre]);
        }
        guardarCesta();
    }

    header('Location: cesta.php');
    exit;
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cesta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
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
        .total {
            font-size: 20px;
            font-weight: bold;
        }
        button {
            padding: 8px 16px;
            cursor: pointer;
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
    <h1>Mi cesta</h1>
    <p>Productos en la cesta: <strong><?= contarProductos() ?></strong></p>

    <?php if (count($_SESSION['cesta']) == 0): ?>
        <p>La cesta está vacía.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Producto</th>
                <th>Precio unidad</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Quitar</th>
            </tr>
            <?php foreach ($_SESSION['cesta'] as $nombre => $cantidad):
                $precio = $_SESSION['productos'][$nombre]['precio'];
                $subtotal = $precio * $cantidad;
                $total += $subtotal;
            ?>
                <tr>
                    <td><?= htmlspecialchars($nombre) ?></td>
                    <td><?= number_format($precio, 2, ',', '.') ?> €</td>
                    <td><?= $cantidad ?></td>
                    <td><?= number_format($subtotal, 2, ',', '.') ?> €</td>
                    <td>
                        <form method="post" action="cesta.php">
                            <button type="submit" name="eliminar" value="<?= htmlspecialchars($nombre) ?>">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" class="total">TOTAL</td>
                <td colspan="2" class="total"><?= number_format($total, 2, ',', '.') ?> €</td>
            </tr>
        </table>
    <?php endif; ?>

    <a class="boton" href="productos.php">Cerrar cesta y volver a la tienda</a>
</body>
</html>