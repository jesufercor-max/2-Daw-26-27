<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <style>
        #boton{
            background-color: #99ff80;
            padding: 10px 20px;        /* Corregido: 'box' no existe, usamos padding para dar tamaño al botón */
          
            border-radius: 4px;        /* Opcional: redondea un poco las esquinas */
            cursor: pointer;           /* Opcional: cambia el cursor al pasar por encima */
        }
    </style>
</head>
<body>
<form method="get">
    Introduce el primer número
    <input type="number" name="numero1" required><br>
    Introduce el segundo Número
    <input type="number" name="numero2" required><br>
    Elige una opción:
    <button type="submit" id="boton" name="accion" value="suma">Sumar</button>
    <button type="submit" id="boton" name="accion" value="resta">Restar</button>
    <button type="submit" id="boton" name="accion" value="multiplicacion">Multiplicar</button>
    <button type="submit" id="boton" name="accion" value="division">Dividir</button>
</form> <!-- Se cerró la etiqueta form que faltaba -->

<?php
    // CORRECCIÓN 1: Se agruparon todos los isset dentro de un único paréntesis principal del if
    if (isset($_GET['numero1']) && isset($_GET['numero2']) && isset($_GET['accion'])) {
        
        $numero1 = intval($_GET['numero1']);
        $numero2 = intval($_GET['numero2']);
        $accion = $_GET['accion'];

        function sumar($num1, $num2) {
            $resultado = $num1 + $num2;
            echo "<br>La suma de " . $num1 . " y " . $num2 . " es: <b>" . $resultado . "</b>";
        }

        function restar($num1, $num2) {
            $resultado = $num1 - $num2;
            echo "<br>La resta de " . $num1 . " y " . $num2 . " es: <b>" . $resultado . "</b>";
        }

        function multiplicar($num1, $num2) {
            $resultado = $num1 * $num2;
            echo "<br>La multiplicación de " . $num1 . " y " . $num2 . " es: <b>" . $resultado . "</b>";
        }

        function dividir($num1, $num2) {
            if ($num2 == 0) {
                echo "<br><b>Error:</b> No se puede dividir entre cero.";
            } else {
                $resultado = $num1 / $num2;
                // CORRECCIÓN 2: Se completó la línea del echo que se había quedado cortada e incompleta
                echo "<br>La división de " . $num1 . " y " . $num2 . " es: <b>" . $resultado . "</b>";
            }
        }

        switch ($accion) {
            case 'suma':
                sumar($numero1, $numero2); // Nota: Quitamos el 'return' porque las funciones usan 'echo' directamente
                break;
            case 'resta':
                restar($numero1, $numero2);
                break;
            // CORRECCIÓN 3: Cambiados los valores para que coincidan exactamente con los 'value' de tus botones HTML
            case 'multiplicacion': 
                multiplicar($numero1, $numero2);
                break;
            case 'division':
                dividir($numero1, $numero2);
                break;
        }
    }
?>

</body>
</html>