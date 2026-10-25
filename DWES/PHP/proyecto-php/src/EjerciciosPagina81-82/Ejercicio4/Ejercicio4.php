<?php session_start();
?>
   
<h2> Ejercicio 4</h1>
<form method="get">
    <label>Introduce un número (negativo para terminar):</label>
    <input type="number" step="any" name="numero" required autofocus>
    <input type="submit" value="Enviar">
</form>

<!-- Reseteo de los datos -->
<form method="get" action="Ejercicio4.php">
    <input type="hidden" name="reset" value="1">
    <input type="submit" value="Reiniciar / Resetear Sesión" style="background-color: #ff4d4d; color: white; border: none; padding: 5px 10px; cursor: pointer;">
</form>

<?php
    
    // Reseteo de los datos
    if (isset($_GET["reset"])) {
        session_destroy();
        echo '<script>window.location.href="Ejercicio4.php";</script>';
        exit;
    }

    if (!isset($_SESSION['suma'])) {

        //Para que no de el error de Undefined
        $_SESSION['suma'] = 0;
        $_SESSION['contador'] = 0;
    }    
    
    $mostrar_resultado = false;
    
    if (isset($_GET["numero"]) && $_GET["numero"] !== "") {
        $numeros = (int)$_GET["numero"];
        
        if ($numeros>0) {
            $_SESSION["contador"]++;
            $_SESSION["suma"]+=$numeros; 
        
        } elseif ($_SESSION["contador"]>0){
            $media = $_SESSION["suma"] / $_SESSION["contador"];
            echo "La media de los números es: " , "<b>" , $media , "</b>"; 
        } else {
        // Redirección con JS para limpiar la URL y evitar que el F5 duplique datos
        echo '<script>window.location.href="Ejercicio4.php";</script>';
        exit;
        }  
        
        $mostrar_resultado= true;

    }
?>

Establece un control de acceso mediante nombre de usuario y contraseña para el ejercicio 1 de esta relación.
Realiza una nueva versión del ejercicio1, de modo que si lo cargamos sin la sesión iniciada nos redirija a la
página de login, y en caso contrario muestre el ejercicio normalmente, también debemos incluir un botón
“cerrar sesión” para cerrar la sesión del usuario y volver a la página de login.
Al cargar la página de login, si la sesión está iniciada redirige automáticamente a la página del ejercicio1 y si
no, mostrará el formulario de identificación con usuario y contraseña.