<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Complicado Condicionales</title>
</head>
<body>
<!-- EJERCICIO 4
Diseñar una página web que muestre una tabla con 3 columnas, la primera corresponde al número de
bloque, la segunda al piso y en la tercera hay un botón llamar. En total hay 10 bloques y cada bloque
tiene 7 pisos. Cuando se pulse llamar en un piso de un bloque, mostrará en otra página el mensaje del
tipo “Usted ha llamado al piso 3 del bloque 6”. Utiliza estructuras repetitivas para generar la tabla. -->

<h1>Bloques y pisos</h1>

<?php

// Comprobar si se ha pulsado el botón llamar
if (isset($_GET['llamar'])) {

    // Obtener el bloque y el piso seleccionados
    $bloque = $_GET['bloque'];
    $piso = $_GET['piso'];

    // Mostrar el mensaje
    echo "<h2>Usted ha llamado al piso $piso del bloque $bloque</h2>";

    echo "<br>";
    echo "<a href='ejercicio4.php'>Volver</a>";

} else {

    // Generar la tabla
    echo "<table border='1'>";

    // Encabezados
    echo "<tr>";
    echo "<th>Bloque</th>";
    echo "<th>Piso</th>";
    echo "<th>Llamar</th>";
    echo "</tr>";

    // Recorrer los 10 bloques
    for ($bloque = 1; $bloque <= 10; $bloque++) {

        // Recorrer los 7 pisos de cada bloque
        for ($piso = 1; $piso <= 7; $piso++) {

            echo "<tr>";

            // Mostrar el bloque
            echo "<td>$bloque</td>";

            // Mostrar el piso
            echo "<td>$piso</td>";

            // Botón llamar
            echo "<td>";
            echo "<form method='get'>";
            echo "<input type='hidden' name='bloque' value='$bloque'>";
            echo "<input type='hidden' name='piso' value='$piso'>";
            echo "<button type='submit' name='llamar'>Llamar</button>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";
        }
    }

    echo "</table>";

}

?>
</body>
</html>