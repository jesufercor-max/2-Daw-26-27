<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Complicado Condicionales</title>
     <style>
        table {
            border-collapse: collapse;
            margin-top: 15px;
        }

        td, th {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        .verde {
            background-color: green;
            color: white;
        }

        .negro {
            background-color: black;
            color: white;
        }

        .rojo {
            background-color: red;
            color: white;
        }

        .gris {
            background-color: lightgray;
            color: black;
        }

        .boleto td {
            padding: 5px;
        }
    </style>
</head>
<body>
<!-- EJERCICIO 7
Realiza el ejercicio 2 correspondiente al juego de la primitiva, pero usando estructuras repetitivas para
simplificar el código. Pero en esta ocasión lo vamos a realizar de una forma más vistosa gracias a que
podemos utilizar las estructuras repetitivas. Para mostrar el resultado de la apuesta vamos a mostrar
una tabla con todos los números de la primitiva, y los números elegidos por el usuario que hayan sido
aciertos serán de color verde, los elegidos por el usuario que no han sido aciertos serán de color negro,
los números de la combinación aleatoria que no han sido elegidos por el usuario serán de color rojo y
por último el resto de números serán de color gris. También contaremos los números seleccionados
por el usuario y si son más de 6, en vez de mostrar el premio obtenido se mostrará un mensaje
indicando que ha hecho trampas. -->

<h2>Lotería Primitiva</h2>

<form method="get">

    <p>Selecciona tus números del 1 al 49:</p>

    <table class="boleto">
        <?php
        $n = 1;

        while ($n <= 49) {

            if ($n % 7 == 1) {
                echo "<tr>";
            }

            echo "<td>";
            echo "<label>";
            echo "<input type='checkbox' name='numeros[]' value='$n'>";
            echo "$n";
            echo "</label>";
            echo "</td>";

            if ($n % 7 == 0) {
                echo "</tr>";
            }

            $n++;
        }
        ?>
    </table>

    <br>

    <label>Introduce el número de serie (del 1 al 999):</label>
    <br>

    <input type="number" name="serie_usuario" min="1" max="999" required>

    <br><br>

    <button type="submit" name="jugar">Jugar</button>

</form>

<?php

if (isset($_GET['jugar'])) {

    // Recoger los números seleccionados por el usuario
    $numeros_usuario = isset($_GET['numeros']) ? $_GET['numeros'] : array();

    // Contar los números seleccionados
    $cantidad = count($numeros_usuario);

    // Recoger el número de serie
    $serie_usuario = (int) $_GET['serie_usuario'];

    // Comprobar si el usuario ha seleccionado más de 6 números
    if ($cantidad > 6) {

        echo "<h2>Has hecho trampas: has seleccionado más de 6 números.</h2>";

    } else {

        // Convertir los números seleccionados a enteros
        $numeros_usuario = array_map('intval', $numeros_usuario);

        // Generar los 6 números ganadores sin repetir
        $ganadores = array();

        while (count($ganadores) < 6) {

            $numero = rand(1, 49);

            if (!in_array($numero, $ganadores)) {
                $ganadores[] = $numero;
            }
        }

        // Ordenar los números ganadores
        sort($ganadores);

        // Generar el número de serie ganador
        $serie_ganadora = rand(1, 999);

        // Contar los aciertos
        $aciertos = 0;

        foreach ($numeros_usuario as $numero) {

            if (in_array($numero, $ganadores)) {
                $aciertos++;
            }
        }

        // Comprobar si ha acertado la serie
        $acierto_serie = ($serie_usuario == $serie_ganadora);

        // Calcular el premio
        $premio = 0;

        if ($aciertos == 4) {
            $premio = 0;
        } elseif ($aciertos == 5) {
            $premio = 30;
        } elseif ($aciertos == 6) {
            $premio = 100;
        }

        // Añadir el premio de la serie
        if ($acierto_serie) {
            $premio = $premio + 500;
        }

        // Mostrar la combinación ganadora
        echo "<h2>Combinación ganadora</h2>";

        echo "<table>";
        echo "<tr>";

        foreach ($ganadores as $numero) {
            echo "<td>$numero</td>";
        }

        echo "</tr>";
        echo "</table>";

        echo "<p>Número de serie ganador: $serie_ganadora</p>";

        // Mostrar la tabla con todos los números del 1 al 49
        echo "<h2>Resultado de tu apuesta</h2>";

        echo "<table>";

        $n = 1;

        while ($n <= 49) {

            if ($n % 7 == 1) {
                echo "<tr>";
            }

            // Comprobar si el número ha sido seleccionado
            $elegido = in_array($n, $numeros_usuario);

            // Comprobar si el número pertenece a la combinación ganadora
            $es_ganador = in_array($n, $ganadores);

            // Asignar el color correspondiente
            if ($elegido && $es_ganador) {

                // Número elegido y acertado
                $clase = "verde";

            } elseif ($elegido && !$es_ganador) {

                // Número elegido que no es un acierto
                $clase = "negro";

            } elseif (!$elegido && $es_ganador) {

                // Número ganador que el usuario no eligió
                $clase = "rojo";

            } else {

                // Número que no se eligió ni salió ganador
                $clase = "gris";
            }

            echo "<td class='$clase'>$n</td>";

            if ($n % 7 == 0) {
                echo "</tr>";
            }

            $n++;
        }

        echo "</table>";

        // Mostrar la leyenda de colores
        echo "<h3>Leyenda de colores</h3>";

        echo "<p><span class='verde'>&nbsp;&nbsp;&nbsp;&nbsp;</span> Verde: número elegido y acertado.</p>";
        echo "<p><span class='negro'>&nbsp;&nbsp;&nbsp;&nbsp;</span> Negro: número elegido que no ha sido acertado.</p>";
        echo "<p><span class='rojo'>&nbsp;&nbsp;&nbsp;&nbsp;</span> Rojo: número ganador que no has elegido.</p>";
        echo "<p><span class='gris'>&nbsp;&nbsp;&nbsp;&nbsp;</span> Gris: número que no has elegido ni ha salido ganador.</p>";

        // Mostrar los resultados
        echo "<h2>Resultados</h2>";

        echo "<p>Números seleccionados: $cantidad</p>";
        echo "<p>Número de aciertos: $aciertos</p>";

        if ($acierto_serie) {
            echo "<p>¡Has acertado el número de serie! Ganas 500 euros adicionales.</p>";
        } else {
            echo "<p>No has acertado el número de serie.</p>";
        }

        // Mostrar el premio correspondiente
        if ($aciertos < 4) {

            echo "<p>No has ganado ningún premio por los números.</p>";

        } elseif ($aciertos == 4) {

            echo "<p>Has acertado 4 números. Te corresponde la devolución de la apuesta.</p>";

        } elseif ($aciertos == 5) {

            echo "<p>Has acertado 5 números. Has ganado 30 euros.</p>";

        } elseif ($aciertos == 6) {

            echo "<p>¡Has acertado los 6 números! Has ganado 100 euros.</p>";
        }

        echo "<h3>Premio total: $premio euros</h3>";
    }
}
?>
</body>
</html>