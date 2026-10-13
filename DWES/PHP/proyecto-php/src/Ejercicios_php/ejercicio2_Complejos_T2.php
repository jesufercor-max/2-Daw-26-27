<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Complejos de PHP</title>
</head>
<body>

<!-- EJERCICIO No 2
Diseñar una web para jugar a la lotería primitiva. En un formulario se pedirá introducir la combinación de 6
números entre 1 y 49 y el número de serie entre 1 y 999. Mostrar la combinación generada y la introducida por
el usuario en dos filas de una tabla. -->

<form method="get">
    <label>Introduce tus 6 números (separados por comas, del 1 al 49):</label><br>
    <input type="text" name="combinacion_usuario" placeholder="Ej: 4, 15, 23, 38, 42" required><br><br>
    
    <label>Introduce el número de serie (de 1 a 999):</label><br>
    <input type="number" name="serie_usuario" min="1" max="999" required><br><br>
    
    <button type="submit">Jugar y Comprobar</button>
</form>

<br>

<?php
if (isset($_GET['combinacion_usuario']) && isset($_GET['serie_usuario'])) {
    
    // Procesar datos del usuario
    $usuario_numeros = explode(',', $_GET['combinacion_usuario']);
    $usuario_numeros = array_map('intval', $usuario_numeros); 
    $usuario_serie = intval($_GET['serie_usuario']);

    // Generar combinación ganadora aleatoria (Forma simple)
    $ganadora_numeros = array_rand(range(1, 49), 5);
    $ganadora_serie = rand(1, 999);

    // Tabla de resultados de dos filas
    echo "<table border='1'>";
    echo "<tr><th>Combinación</th><th>Números</th><th>Serie</th></tr>";
    echo "<tr><td>Tu apuesta</td><td>" . implode(', ', $usuario_numeros) . "</td><td>$usuario_serie</td></tr>";
    echo "<tr><td>Ganadora</td><td>" . implode(', ', $ganadora_numeros) . "</td><td>$ganadora_serie</td></tr>";
    echo "</table>";

    echo "<br>";

    // Función para comprobar el premio
    function comprobarResultados($userNum, $winNum, $userSerie, $winSerie) {
        // Cuenta cuántos números coinciden en ambos arrays
        $aciertos = count(array_intersect($userNum, $winNum));
        
        if ($aciertos === 6 && $userSerie === $winSerie) {
            return "¡Enhorabuena, ganaste la lotería y la serie especial!";
        } elseif ($aciertos === 6) {
            return "¡Espectacular! Has acertado los 6 números, pero no la serie.";
        } else {
            return "Has acertado $aciertos números. ¡Suerte para la próxima crack!";
        }
    }

    // Mostrar el veredicto
    echo "<h3>" . comprobarResultados($usuario_numeros, $ganadora_numeros, $usuario_serie, $ganadora_serie) . "</h3>";
}
?>

</body>
</html>