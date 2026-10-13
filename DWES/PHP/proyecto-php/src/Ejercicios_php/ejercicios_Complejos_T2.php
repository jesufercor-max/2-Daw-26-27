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

<form metthod="get">
    Introduce la altura del cilindro: 
    <input type="number" , name="altura">
    introduce el diametro del cilindro:
    <input type="number" name="diametro">
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
        
        echo "El volumen del cilindro es: " , calcularVolumenCilindro($altura, $diametro, $pi);
    }


?>
<img src="imagenCilindro.jpeg" widh:20px high:10px>
</form>


<!-- EJERCICIO No 2
Diseñar una web para jugar a la lotería primitiva. En un formulario se pedirá introducir la combinación de 6
números entre 1 y 49 y el número de serie entre 1 y 999. Mostrar la combinación generada y la introducida por
el usuario en dos filas de una tabla. -->





<!-- EJERCICIO No 3
Mostrar en una página varios parámetros para configurar el aspecto de otra página: color de fondo, tipo de letra,
alineación del texto, imagen del banner (entre 3 posibles), y demás reglas de estilo que se te ocurran. Una vez
enviada la información se mostrará una página con el contenido que desees acorde a los estilos elegidos. -->





<!-- EJERCICIO No 4
Diseñar un desarrollo web simple con php que pida al usuario el precio de un producto en tres establecimientos
distintos denominados “Tienda 1”, “Tienda 2” y “Tienda 3”. Una vez se introduzca esta información se debe
calcular y mostrar el precio medio del producto en las tres tiendas. Mostrar en la página resultado, una tabla
con un título, el precio en cada una de las tiendas, la media de los tres precios y la diferencia del precio de cada
tienda con la media. Combina celdas para que quede visualmente agradable. -->





<!-- EJERCICIO No 5
Diseñar un desarrollo web simple con PHP que dé respuesta a la necesidad que se plantea a continuación:
Un operario de una fábrica recibe cada cierto tiempo un depósito cilíndrico de dimensiones variables, que debe
llenar de aceite a través de una toma con cierto caudal disponible. Se desea crear una aplicación web que le
indique cuánto tiempo transcurrirá hasta el llenado del depósito. Para calcular dicho tiempo el usuario
introducirá los siguientes datos: diámetro y altura del cilindro y caudal de aceite (litros por minuto). Una vez
introducidos se mostrará el tiempo total en horas y minutos que se tardará en llenar el cilindro. -->

</body>
</html>