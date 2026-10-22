<?php session_start();
?>

<h1>Ejercicio 2 </h1>
<form method="get">
    Introduce un número (negativo para terminar): 
    <input type="number" name="numeros" required>
    <input type="submit" value="Enviar">
</form>

<!-- Reseteo de los datos -->
<form method="get" action="Ejercicio2.php">
    <input type="hidden" name="reset" value="1">
    <input type="submit" value="Reiniciar / Resetear Sesión" style="background-color: #ff4d4d; color: white; border: none; padding: 5px 10px; cursor: pointer;">
</form>

<?php

    // Reseteo de los datos
    if (isset($_GET["reset"])) {
        session_destroy();
        echo '<script>window.location.href="Ejercicio2.php";</script>';
        exit;
    }

    if (!isset($_SESSION["suma"])){
        $_SESSION["suma"] = 0;
        $_SESSION["contador"] = 0;
        $_SESSION["lista_pares"] = [];
    }

    $mostrar_resultado= false;

    if (isset($_GET["numeros"]) && $_GET["numeros"] !== "" ){
        $numeros = (int)$_GET["numeros"];

        if ($numeros>0) {
            $_SESSION["contador"]++;

        if ($numeros%2!==0){
            $_SESSION["suma"]+=$numeros;

        } elseif ($numeros>0 && $numeros%2==0) {
            $_SESSION["lista_pares"] []= $numeros;
            $mayor = max($_SESSION["lista_pares"]);

        } elseif ($_SESSION["contador"]>0) {
            $media_impares = $_SESSION["suma"] / $_SESSION["contador"];
            echo "La media de los números impares es: " , "<b>" , $media_impares , "</b>"; 

            if (!empty($_SESSION["lista_pares"])) {
                $mayor = max($_SESSION["lista_pares"]);
                echo "El mayor de los pares es: " , "<b>" , $mayor , "</b>" ;
                
            } else {
                echo "<br> No se introdujeron números pares.";
            }

        } else {
        // Redirección con JS para limpiar la URL y evitar que el F5 duplique datos
        echo '<script>window.location.href="Ejercicio2.php";</script>';
        exit;
        }

        $mostrar_resultado = true;

    }

?>