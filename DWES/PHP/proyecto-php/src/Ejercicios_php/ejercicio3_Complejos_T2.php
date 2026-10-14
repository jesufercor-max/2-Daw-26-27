
<!-- EJERCICIO No 3
Mostrar en una página varios parámetros para configurar el aspecto de otra página: color de fondo, tipo de letra,
alineación del texto, imagen del banner (entre 3 posibles), y demás reglas de estilo que se te ocurran. Una vez
enviada la información se mostrará una página con el contenido que desees acorde a los estilos elegidos. -->
 
<?php
if (isset($_GET["fondo"])) {

    $fondo = $_GET["fondo"];
    $fuente = $_GET["fuente"];
    $alineacion = $_GET["alineacion"];
    $banner = $_GET["banner"];
    $tamano = $_GET["tamano"];
    $color = $_GET["color"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi página personalizada</title>

    <style>
        body {
            background-color: <?php echo $fondo; ?>;
            font-family: <?php echo $fuente; ?>;
            text-align: <?php echo $alineacion; ?>;
            font-size: <?php echo $tamano; ?>;
            color: <?php echo $color; ?>;
        }

        img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <img src="<?php echo $banner; ?>" alt="Banner">

    <h1>Bienvenido a mi página web</h1>

    <p>Esta es mi página personalizada.</p>

    <h2>Sobre nosotros</h2>

    <p>Esta página se ha creado con los estilos que has elegido.</p>

    <h2>Nuestros servicios</h2>

    <p>Puedes modificar el aspecto de esta página mediante el formulario.</p>

    <br>

    <a href="ejercicio3_Complejos_T2.php">Volver al formulario</a>

</body>
</html>

<?php
} else {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personaliza tu página</title>
</head>

<body>

    <h1>Personaliza tu página web</h1>

    <form method="GET" action="ejercicio3_Complejos_T2.php">

        <label>Color de fondo:</label>

        <select name="fondo">
            <option value="white">Blanco</option>
            <option value="lightblue">Azul claro</option>
            <option value="lightgreen">Verde claro</option>
            <option value="yellow">Amarillo</option>
        </select>

        <br><br>

        <label>Tipo de letra:</label>

        <select name="fuente">
            <option value="Arial">Arial</option>
            <option value="Verdana">Verdana</option>
            <option value="Georgia">Georgia</option>
            <option value="Courier New">Courier New</option>
        </select>

        <br><br>

        <label>Alineación:</label>

        <select name="alineacion">
            <option value="left">Izquierda</option>
            <option value="center">Centro</option>
            <option value="right">Derecha</option>
            <option value="justify">Justificado</option>
        </select>

        <br><br>

        <label>Banner:</label>

        <select name="banner">
            <option value="banner1.jpeg">Banner 1</option>
            <option value="banner2.jpeg">Banner 2</option>
            <option value="banner3.jpeg">Banner 3</option>
        </select>

        <br><br>

        <label>Tamaño de letra:</label>

        <select name="tamano">
            <option value="14px">Pequeño</option>
            <option value="18px">Mediano</option>
            <option value="24px">Grande</option>
        </select>

        <br><br>

        <label>Color del texto:</label>

        <select name="color">
            <option value="black">Negro</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
            <option value="red">Rojo</option>
        </select>

        <br><br>

        <input type="submit" value="Crear página">

    </form>

</body>
</html>

<?php
}
?>
