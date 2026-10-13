<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Complejos de PHP</title>
</head>
<body>

<!-- EJERCICIO No 5
Diseñar un desarrollo web simple con PHP que dé respuesta a la necesidad que se plantea a continuación:
Un operario de una fábrica recibe cada cierto tiempo un depósito cilíndrico de dimensiones variables, que debe
llenar de aceite a través de una toma con cierto caudal disponible. Se desea crear una aplicación web que le
indique cuánto tiempo transcurrirá hasta el llenado del depósito. Para calcular dicho tiempo el usuario
introducirá los siguientes datos: diámetro y altura del cilindro y caudal de aceite (litros por minuto). Una vez
introducidos se mostrará el tiempo total en horas y minutos que se tardará en llenar el cilindro. -->

<form method="get">
    Introduce el diametro del cilindro:
    <input type="number" name="diametro"><br>
    Introduce el altura del cilindro:
    <input type="number" name="altura"><br>
    Introduce el caudal del cilindro (L/m):
    <input type="number" name="caudal"><br>
    <button type="submit">Calcular tiempo de llenado</button>
</form>

<?php
    $pi=3.14;

    function calcularVolumenCilindro2($altura, $diametro, $pi){
        $volumen = ($pi*($diametro*$diametro)*$altura)/4;
        return $volumen;
    }

    function calcularTiempoDeLlenado ($volumen, $caudal, $tiempoLlenado){
        $tiempoLlenado = $volumen/$caudal;
        return $tiempoLlenado;
    }

    if (isset($_GET['diametro']) && isset($_GET['altura']) && isset($_GET['caudal'])){
        $diametro = $_GET['diametro'];
        $altura = $_GET['altura'];
        $caudal = $_GET['caudal'];

        $volumen = calcularVolumenCilindro2($altura, $diametro, $pi);
        $tiempoLlenado = calcularTiempoDeLlenado($volumen, $caudal, 0);
    
        $horas = 0;
        $minutos = intval($tiempoLlenado); // Por si tarda menos de 60, 
        if ($tiempoLlenado >= 60){
            $horas = intval($tiempoLlenado / 60);
            $minutos = intval($tiempoLlenado) % 60;
        }

        echo "Taradará " , $horas , " horas y " , $minutos , " minutos.";
    }
?>

</body>
</html>