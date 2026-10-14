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
    <!-- Ejercicio 1
Vamos a diseñar un juego para adivinar imágenes mostrando solo alguna parte de ellas. Dividir una
imagen en un mosaico de 3x3, y mostrar una cuadrícula en la página principal con todos los cuadrados
del mosaico dados la vuelta. Debajo de la cuadrícula habrá una caja de texto para que el usuario intente
adivinar el nombre de lo que aparece en la imagen, junto a un botón comprobar.
Cada vez que el usuario pulse en un cuadrado de la cuadrícula se mostrará el contenido solo de esa
cuadrícula durante 2 segundos y posteriormente se volverá a ocultar.
Cuando el usuario escriba algo y pulse el botón comprobar ocurrirá lo siguiente:
-Si ha acertado se mostrará la imagen completa y un mensaje de felicitación por acertar.
-Si no ha acertado se mostrará un mensaje indicando que ha fallado y un botón de volver para seguir
intentándolo. -->

<?php

// Nombre de la imagen
$imagen = "imagen.jpeg";

// Respuesta correcta
$respuestaCorrecta = "vaper";

// Variable para saber si ha acertado
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

// Si pulsa volver, mostrar de nuevo el juego
if (isset($_POST["volver"])) {
    $error = false;
}

?>

<h1>¡Adivina la imagen!</h1>

<?php if ($acertado) { ?>

    <h2>¡Felicidades! Has acertado </h2>

    <img src="<?php echo $imagen; ?>" width="300">

    <br><br>

    <form method="post">
        <button type="submit" name="volver">Jugar de nuevo</button>
    </form>

<?php } else { ?>

    <p>Pulsa los cuadrados para descubrir partes de la imagen.</p>

    <div class="cuadricula">

        <?php
        for ($i = 0; $i < 9; $i++) {
        ?>

            <div class="casilla" onclick="mostrar(this)">

                <img
                    src="<?php echo $imagen; ?>"
                    style="
                        left: <?php echo -($i % 3) * 100; ?>px;
                        top: <?php echo -floor($i / 3) * 100; ?>px;
                    "
                    alt="Parte de la imagen"
                >

                <span>?</span>

            </div>

        <?php
        }
        ?>

    </div>

    <form method="post">

        <label>¿Qué aparece en la imagen?</label>

        <br><br>

        <input
            type="text"
            name="respuesta"
            placeholder="Escribe tu respuesta"
            required
        >

        <button type="submit" name="comprobar">Comprobar</button>

    </form>

    <?php if ($error) { ?>

        <h2>¡Has fallado! Inténtalo de nuevo.</h2>

        <form method="post">
            <button type="submit" name="volver">Volver</button>
        </form>

    <?php } ?>

<?php } ?>

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
