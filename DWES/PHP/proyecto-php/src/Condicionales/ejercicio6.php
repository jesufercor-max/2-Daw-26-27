<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Complicado Condicionales</title>
    <style>
        body {
            text-align: center;
            font-family: Arial;
        }

        .cuadricula {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-template-rows: repeat(3, 100px);
            gap: 5px;
            justify-content: center;
            margin: 20px;
        }

        .casilla {
            width: 100px;
            height: 100px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            background-color: blue;
        }

        .casilla img {
            width: 300px;
            height: 300px;
            position: absolute;
            display: none;
        }

        .casilla span {
            color: white;
            font-size: 30px;
            position: absolute;
            top: 30px;
            left: 40px;
        }

        .casilla.mostrar img {
            display: block;
        }

        .casilla.mostrar span {
            display: none;
        }

        input, button {
            padding: 10px;
            margin: 5px;
        }
    </style>
</head>
<body>
    
<!-- EJERCICIO 6
Realiza el ejercicio 1 correspondiente al juego de adivinar una imagen, pero usando estructuras
repetitivas para simplificar el código. -->

<?php

// Nombre de la imagen
$imagen = "imagen.jpeg";

// Respuesta correcta
$respuestaCorrecta = "vaper";

// Variables para controlar el resultado
$acertado = false;
$error = false;

// Comprobar la respuesta
if (isset($_POST["comprobar"])) {

    $respuesta = strtolower(trim($_POST["respuesta"]));

    if ($respuesta == $respuestaCorrecta) {
        $acertado = true;
    } else {
        $error = true;
    }
}

// Volver a intentarlo
if (isset($_POST["volver"])) {
    $error = false;
}

?>

<h1>¡Adivina la imagen!</h1>

<?php

// Si ha acertado, mostramos la imagen completa
if ($acertado == true) {

    echo "<h2>¡Felicidades! Has acertado.</h2>";

    echo "<img src='$imagen' width='300'>";

    echo "<br><br>";

    echo "<form method='post'>";
    echo "<button type='submit' name='volver'>Jugar de nuevo</button>";
    echo "</form>";

} else {

    // Si no ha acertado, mostramos el juego

    echo "<p>Pulsa los cuadrados para descubrir partes de la imagen.</p>";

    echo "<div class='cuadricula'>";

    // Bucle para crear las 9 casillas
    for ($i = 0; $i < 9; $i++) {

        echo "<div class='casilla' onclick='mostrar(this)'>";

        echo "<img src='$imagen' style='left: " . (-($i % 3) * 100) . "px; top: " . (-floor($i / 3) * 100) . "px;' alt='Parte de la imagen'>";

        echo "<span>?</span>";

        echo "</div>";

    }

    echo "</div>";

    // Formulario para introducir la respuesta
    echo "<form method='post'>";

    echo "<label>¿Qué aparece en la imagen?</label>";

    echo "<br><br>";

    echo "<input type='text' name='respuesta' placeholder='Escribe tu respuesta' required>";

    echo "<button type='submit' name='comprobar'>Comprobar</button>";

    echo "</form>";

    // Si ha fallado, mostramos el mensaje y el botón volver
    if ($error == true) {

        echo "<h2>¡Has fallado! Inténtalo de nuevo.</h2>";

        echo "<form method='post'>";
        echo "<button type='submit' name='volver'>Volver</button>";
        echo "</form>";

    }

}

?>

<script>

    function mostrar(casilla) {

        casilla.classList.add("mostrar");

        setTimeout(function() {
            casilla.classList.remove("mostrar");
        }, 500);

    }

</script>


</body>
</html>