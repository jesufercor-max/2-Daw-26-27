<?php session_start();
?>

<!-- Ejercicio 1
Crear una página principal con un botón 'Añadir color' para generar un color aleatorio que además se
establecerá como color de fondo de la página, cada vez que se pulsa irá generando un color nuevo (actualizando
el fondo), que se irán almacenando en un array de sesión. Habrá un segundo botón 'Mostrar paleta creada' que
dirige a una segunda página que mostrará una paleta con los colores generados. Esta paleta no es más que una
tabla con un máximo de 5 celdas por cada fila, y en cada celda se muestra un color de los generados. Debajo
de la tabla tendremos 2 botones uno para volver a la página principal y seguir añadiendo colores a la paleta y
otro para destruir la sesión y generar una paleta nueva. Además al pulsar en cada celda de la tabla el color de
fondo de la página cambiará al color de la celda pulsada. -->

<?php
    // Creamos el array de colores en la sesión
    if (!isset($_SESSION['colores'])) {
        $_SESSION['colores'] = [];
    }

    // Generamos un color aleatorio si se ha pulsado "Añadir color"
    if (isset($_POST['añadir'])) {
        $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        $_SESSION['colores'][] = $color;
        $_SESSION['fondo'] = $color;
    }

    // Color de fondo actual (blanco por defecto)
    $fondo = isset($_SESSION['fondo']) ? $_SESSION['fondo'] : '#FFFFFF';
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de colores</title>
    <style>
        body {
            background-color: <?= $fondo ?>;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Generador de colores</h1>
    <p>Color actual: <strong><?php $fondo ?></strong></p>
    <p>Colores generados: <?php count($_SESSION['colores']) ?></p>

    <form method="post" action="Ejercicio1.php">
        <button type="submit" name="añadir">Añadir color</button>
    </form>

    <form method="get" action="paleta.php">
        <button type="submit">Mostrar paleta creada</button>
    </form>
</body>
</html>