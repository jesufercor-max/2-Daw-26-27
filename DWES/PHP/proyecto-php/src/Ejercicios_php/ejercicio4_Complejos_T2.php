<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Complejos de PHP</title>
</head>
<body>


<!-- EJERCICIO No 4
Diseñar un desarrollo web simple con php que pida al usuario el precio de un producto en tres establecimientos
distintos denominados “Tienda 1”, “Tienda 2” y “Tienda 3”. Una vez se introduzca esta información se debe
calcular y mostrar el precio medio del producto en las tres tiendas. Mostrar en la página resultado, una tabla
con un título, el precio en cada una de las tiendas, la media de los tres precios y la diferencia del precio de cada
tienda con la media. Combina celdas para que quede visualmente agradable. -->

<?php

if (isset($_GET["precio1"]) && isset($_GET["precio2"]) && isset($_GET["precio3"])) {

    $precio1 = $_GET["precio1"];
    $precio2 = $_GET["precio2"];
    $precio3 = $_GET["precio3"];

    // Calculamos la media
    $media = ($precio1 + $precio2 + $precio3) / 3;

    // Calculamos las diferencias respecto a la media
    $diferencia1 = $precio1 - $media;
    $diferencia2 = $precio2 - $media;
    $diferencia3 = $precio3 - $media;
?>

    <h1>Resultado de los precios</h1>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th colspan="3">Comparativa de precios del producto</th>
        </tr>

        <tr>
            <th>Establecimiento</th>
            <th>Precio (€)</th>
            <th>Diferencia con la media (€)</th>
        </tr>

        <tr>
            <td>Tienda 1</td>
            <td><?php echo number_format($precio1, 2, ',', '.'); ?> €</td>
            <td><?php echo number_format($diferencia1, 2, ',', '.'); ?> €</td>
        </tr>

        <tr>
            <td>Tienda 2</td>
            <td><?php echo number_format($precio2, 2, ',', '.'); ?> €</td>
            <td><?php echo number_format($diferencia2, 2, ',', '.'); ?> €</td>
        </tr>

        <tr>
            <td>Tienda 3</td>
            <td><?php echo number_format($precio3, 2, ',', '.'); ?> €</td>
            <td><?php echo number_format($diferencia3, 2, ',', '.'); ?> €</td>
        </tr>

        <tr>
            <th colspan="2">Precio medio</th>
            <th><?php echo number_format($media, 2, ',', '.'); ?> €</th>
        </tr>

    </table>

    <br>

    <a href="ejercicio4_Complejos_T2.php">Volver al formulario</a>

<?php
} else {
?>

    <h1>Comparador de precios</h1>

    <p>Introduce el precio del producto en cada establecimiento.</p>

    <form method="GET" action="">

        <label>Precio de la Tienda 1 (€):</label>
        <input type="number" name="precio1" step="0.01" min="0" required>

        <br><br>

        <label>Precio de la Tienda 2 (€):</label>
        <input type="number" name="precio2" step="0.01" min="0" required>

        <br><br>

        <label>Precio de la Tienda 3 (€):</label>
        <input type="number" name="precio3" step="0.01" min="0" required>

        <br><br>

        <input type="submit" value="Calcular precios">

    </form>

<?php
}
?>

</body>
</html>