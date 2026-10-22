<?php session_start();
?>

<h1>Ejercicio 3 </h1>
<form method="get" action="Ejercicio3.php">
    <input type="number" name="numeros" required>
    <input type="submit" value="Enviar">
</form>

<!-- Reseteo de los datos -->
<form method="get" action="Ejercicio3.php">
    <input type="hidden" name="reset" value="1">
    <input type="submit" value="Reiniciar / Resetear Sesión" style="background-color: #ff4d4d; color: white; border: none; padding: 5px 10px; cursor: pointer;">
</form>

<?php

    // Reseteo de los datos
    if (isset($_GET["reset"])) {
        session_destroy();
        echo '<script>window.location.href="Ejercicio3.php";</script>';
        exit;
    }
    if (!isset($_SESSION["suma"])){
        $_SESSION["suma"]=0;
        $_SESSION["contador"]=0;
    }

    $mostrar_resultado=false;

    if (isset($_GET["numeros"]) && $_GET["numeros"] !== ""){
        $numero = (int)$_GET["numeros"];

        $_SESSION["contador"]++;
        $_SESSION["suma"] += $numero;
            
        if ($_SESSION["suma"]>10000){
            $media = $_SESSION["suma"] / $_SESSION["contador"];
            echo "total: " , $_SESSION["suma"] ,"</br>" , "media: " , $media, "</br>" , "numeros introducidos: " , $_SESSION["contador"];
        } else {
        // Redirección con JS para limpiar la URL y evitar que el F5 duplique datos
        echo '<script>window.location.href="Ejercicio3.php";</script>';
        exit;
        }

        $mostrar_resultado = true;
       
    }

?>
