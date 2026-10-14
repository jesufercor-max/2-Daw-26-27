<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Complicado Condicionales</title>
</head>
<body>
   <!-- Ejercicio 2
Mejora el ejercicio de la lotería primitiva del tema anterior. Ahora los números se seleccionan de un
boleto al estilo “bingo” con filas y columnas, para representar los números seleccionados se usarán
checkbox, y para el número de serie una caja de texto. Cuando se pulse el botón jugar, se mostrará la
combinación ganadora generada aleatoriamente y los aciertos que ha tenido. No se usarán estructuras
repetitivas ni arrays, se mostrará la combinación ganadora en una tabla con una sola fila y un número
en cada columna.
Se mostrará el número de aciertos que ha tenido el usuario y cuánto dinero ha ganado:
-menos de 4 aciertos: nada
-4 aciertos: dinero vuelto
-5 aciertos: 30 euros
-6 aciertos: 100 euros
-número de serie: Si se acierta se sumarán 500 euros independientemente del número de aciertos.
Nota: no hace falta comprobar todos los números, solo los de la combinación ganadora, por lo que no
se controla si el usuario selecciona más de 6 números. -->

<h2>Lotería Primitiva</h2>

<form method="get">

    <p>Selecciona tus números (del 1 al 49):</p>

    <?php
    // Mostrar los números del 1 al 49
    $n = 1;

    while ($n <= 49) {
        echo "<label>";
        echo "<input type='checkbox' name='numeros[]' value='$n'>";
        echo "$n";
        echo "</label> ";

        if ($n % 7 == 0) {
            echo "<br>";
        }

        $n++;
    }
    ?>

    <br>

    <label>Introduce el número de serie (del 1 al 999):</label><br>
    <input type="text" name="serie_usuario" required>

    <br><br>

    <button type="submit" name="jugar">Jugar</button>

</form>

<br>

<?php

if (isset($_GET['jugar'])) {

    // Recoger los números seleccionados
    $usuario1 = isset($_GET['numeros'][0]) ? (int)$_GET['numeros'][0] : 0;
    $usuario2 = isset($_GET['numeros'][1]) ? (int)$_GET['numeros'][1] : 0;
    $usuario3 = isset($_GET['numeros'][2]) ? (int)$_GET['numeros'][2] : 0;
    $usuario4 = isset($_GET['numeros'][3]) ? (int)$_GET['numeros'][3] : 0;
    $usuario5 = isset($_GET['numeros'][4]) ? (int)$_GET['numeros'][4] : 0;
    $usuario6 = isset($_GET['numeros'][5]) ? (int)$_GET['numeros'][5] : 0;

    // Recoger el número de serie del usuario
    $serie_usuario = (int)$_GET['serie_usuario'];

    // Generar los 6 números ganadores sin repetir
    $ganador1 = rand(1, 49);

    do {
        $ganador2 = rand(1, 49);
    } while ($ganador2 == $ganador1);

    do {
        $ganador3 = rand(1, 49);
    } while ($ganador3 == $ganador1 ||
             $ganador3 == $ganador2);

    do {
        $ganador4 = rand(1, 49);
    } while ($ganador4 == $ganador1 ||
             $ganador4 == $ganador2 ||
             $ganador4 == $ganador3);

    do {
        $ganador5 = rand(1, 49);
    } while ($ganador5 == $ganador1 ||
             $ganador5 == $ganador2 ||
             $ganador5 == $ganador3 ||
             $ganador5 == $ganador4);

    do {
        $ganador6 = rand(1, 49);
    } while ($ganador6 == $ganador1 ||
             $ganador6 == $ganador2 ||
             $ganador6 == $ganador3 ||
             $ganador6 == $ganador4 ||
             $ganador6 == $ganador5);

    // Generar el número de serie ganador
    $serie_ganadora = rand(1, 999);

    // Mostrar la combinación ganadora en una tabla
    echo "<h3>Combinación ganadora</h3>";

    echo "<table border='1' cellpadding='10'>";
    echo "<tr>";
    echo "<td>$ganador1</td>";
    echo "<td>$ganador2</td>";
    echo "<td>$ganador3</td>";
    echo "<td>$ganador4</td>";
    echo "<td>$ganador5</td>";
    echo "<td>$ganador6</td>";
    echo "</tr>";
    echo "</table>";

    echo "<p>Número de serie ganador: $serie_ganadora</p>";

    // Comprobar los aciertos sin utilizar arrays ni bucles
    $aciertos = 0;

    if ($usuario1 == $ganador1 ||
        $usuario1 == $ganador2 ||
        $usuario1 == $ganador3 ||
        $usuario1 == $ganador4 ||
        $usuario1 == $ganador5 ||
        $usuario1 == $ganador6) {
        $aciertos++;
    }

    if ($usuario2 == $ganador1 ||
        $usuario2 == $ganador2 ||
        $usuario2 == $ganador3 ||
        $usuario2 == $ganador4 ||
        $usuario2 == $ganador5 ||
        $usuario2 == $ganador6) {
        $aciertos++;
    }

    if ($usuario3 == $ganador1 ||
        $usuario3 == $ganador2 ||
        $usuario3 == $ganador3 ||
        $usuario3 == $ganador4 ||
        $usuario3 == $ganador5 ||
        $usuario3 == $ganador6) {
        $aciertos++;
    }

    if ($usuario4 == $ganador1 ||
        $usuario4 == $ganador2 ||
        $usuario4 == $ganador3 ||
        $usuario4 == $ganador4 ||
        $usuario4 == $ganador5 ||
        $usuario4 == $ganador6) {
        $aciertos++;
    }

    if ($usuario5 == $ganador1 ||
        $usuario5 == $ganador2 ||
        $usuario5 == $ganador3 ||
        $usuario5 == $ganador4 ||
        $usuario5 == $ganador5 ||
        $usuario5 == $ganador6) {
        $aciertos++;
    }

    if ($usuario6 == $ganador1 ||
        $usuario6 == $ganador2 ||
        $usuario6 == $ganador3 ||
        $usuario6 == $ganador4 ||
        $usuario6 == $ganador5 ||
        $usuario6 == $ganador6) {
        $aciertos++;
    }

    // Comprobar el número de serie
    $acierto_serie = ($serie_usuario == $serie_ganadora);

    // Calcular el premio según los aciertos
    $premio = 0;

    if ($aciertos == 4) {
        $premio = 0; // Dinero devuelto
    } elseif ($aciertos == 5) {
        $premio = 30;
    } elseif ($aciertos == 6) {
        $premio = 100;
    }

    // Añadir el premio de la serie
    if ($acierto_serie) {
        $premio = $premio + 500;
    }

    // Mostrar los resultados
    echo "<h3>Resultados</h3>";

    echo "<p>Número de aciertos: $aciertos</p>";

    if ($aciertos < 4) {
        echo "<p>No has ganado ningún premio por los números.</p>";
    } elseif ($aciertos == 4) {
        echo "<p>Has acertado 4 números. Te devolvemos el dinero de la apuesta.</p>";
    } elseif ($aciertos == 5) {
        echo "<p>Has acertado 5 números. ¡Has ganado 30 euros!</p>";
    } elseif ($aciertos == 6) {
        echo "<p>¡Has acertado los 6 números! Has ganado 100 euros.</p>";
    }

    if ($acierto_serie) {
        echo "<p>¡Has acertado el número de serie! Has ganado 500 euros adicionales.</p>";
    } else {
        echo "<p>No has acertado el número de serie.</p>";
    }

    echo "<h3>Premio total: $premio euros</h3>";

}
?>


</body>
</html>