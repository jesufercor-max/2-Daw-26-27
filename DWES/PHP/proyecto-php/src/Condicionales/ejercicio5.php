<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Complicado Condicionales</title>
</head>
<body>
<!-- EJERCICIO 5
Diseñar una página que esté compuesta por una tabla de 10 filas por 10 columnas, y en cada celda
habrá una imagen de un ojo cerrado. Cada vez que el usuario pulse un ojo, ser recargará la página con
todos los ojos cerrados salvo el que se ha pulsado que corresponderá a un ojo abierto. -->


<h1>Tabla de ojos</h1>

<?php

// Comprobar si se ha pulsado un ojo
if (isset($_GET['fila']) && isset($_GET['columna'])) {
    $filaAbierta = $_GET['fila'];
    $columnaAbierta = $_GET['columna'];
} else {
    $filaAbierta = 0;
    $columnaAbierta = 0;
}

// Crear la tabla
echo "<table border='1'>";

// Generar las 10 filas
for ($fila = 1; $fila <= 10; $fila++) {

    echo "<tr>";

    // Generar las 10 columnas
    for ($columna = 1; $columna <= 10; $columna++) {

        echo "<td>";

        // Comprobar si es el ojo pulsado
        if ($fila == $filaAbierta && $columna == $columnaAbierta) {

            // Mostrar el ojo abierto
            echo "<a href='ejercicio5.php'>";
            echo "<img src='ojo_abierto.png' width='40' height='40'>";
            echo "</a>";

        } else {

            // Mostrar el ojo cerrado
            echo "<a href='ejercicio5.php?fila=$fila&columna=$columna'>";
            echo "<img src='ojo_cerrado.png' width='40' height='40'>";
            echo "</a>";

        }

        echo "</td>";
    }

    echo "</tr>";
}

echo "</table>";

?>

</body>
</html>