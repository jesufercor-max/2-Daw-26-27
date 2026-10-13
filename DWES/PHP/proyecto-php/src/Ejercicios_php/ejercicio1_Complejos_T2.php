<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Complejos de PHP</title>
</head>
<body>

<!-- EJERCICIO No 1
Diseñar un formulario web que pida la altura y el diámetro de un cilindro. Una vez el usuario introduzca los
datos y pulse el botón calcular, deberá calcularse el volumen del cilindro y mostrarse el resultado en el
navegador. Mostrar la imagen de un cilindro junto al resultado y un título "Calculo del volúmen de un cilindro",
intenta dar un aspecto agradable a la página de resultado.-->

<form method="get">
    Introduce la altura del cilindro: 
    <input type="number" , name="altura"><br>
    introduce el diametro del cilindro:
    <input type="number" name="diametro" > <br>
    <button type="submit">Calcular volumen</button>

<?php
    $pi=3.14;

    function calcularVolumenCilindro($altura, $diametro, $pi){
        return ($pi*($diametro*$diametro)*$altura)/4;
    }

    if (isset($_GET['altura']) && isset($_GET['diametro'])){
        $altura = $_GET['altura'];
        $diametro = $_GET['diametro'];
        echo "<br>";
        echo '<div style="display: flex; align-items: center; gap: 15px; margin-top: 15px;">';
        echo '<img src="imagenCilindro.jpeg" width="80" alt="Cilindro">';
        echo "El volumen del cilindro es: " , "<b>" , calcularVolumenCilindro($altura, $diametro, $pi) , "</b>";
        
    }
"<br>";
?>

</form>

</body>
</html>