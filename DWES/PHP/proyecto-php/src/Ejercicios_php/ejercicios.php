<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios PHP</title>
</head>

<body>
<!-- Ejercicio 1: Escribe un programa que muestre tu nombre por pantalla. Utiliza código PHP. -->
<h2> Ejercicio 1</h1>
    <?php
    $nombre = "Jesus Fernández";
    echo "Buenas tardes ", $nombre;
    ?>

    <!-- Ejercicio 2: Modifica el programa anterior para que muestre tu dirección y tu número de teléfono. Cada dato se
debe mostrar en una línea diferente. Mezcla de alguna forma las salidas por pantalla, utilizando tanto
HTML como PHP. -->
<h2> Ejercicio 2</h1>
    <?php
    $direccion = "Calle Federico";
    $telefono = "12323434324";
    echo "Mi dirección es: ", $direccion, "<br>";
    echo "Mi numero es: <b>", $telefono, "</b>";
    ?>

    <!-- Ejercicio 3: Escribe un programa que muestre por pantalla 10 palabras en inglés junto a su correspondiente
traducción al castellano. Las palabras deben estar distribuidas en dos columnas. Utiliza la etiqueta
<table> de HTML. -->
<h2> Ejercicio 3 </h1>
<table border=1rm>
    <thead>
        <tr>
            <th>Español</th>
            <th>Inglés</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $palabrasEspanol = ['Pajaro', 'Botella', 'Vaso'];
            $palabrasIngles = ['Bird', 'Bottle', 'Glass'];
            for ($i = 0; $i < count($palabrasEspanol); $i++) {
                echo "<tr>";
                echo "<td>" . $palabrasEspanol[$i] . "</td>";
                echo "<td>" . $palabrasIngles[$i] . "</td>";
                echo "</tr>";
            }

        ?>
    <tbody>
</table>

    <!-- Ejercicio 4: Escribe un programa que muestre tu horario de clase mediante una tabla. Aunque se puede hacer
íntegramente en HTML (igual que los ejercicios anteriores), ve intercalando código HTML y PHP para
familiarizarte con éste último. -->
<h2> Ejercicio 4 </h1>
<table border=1rm>
    <thead>
        <tr>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $horarioLunes = ['Ingles', 'DWEC', 'DWEC', 'DWES', 'DWES' ,'Optativa'];
            $horarioMartes = ['Ingles', 'DWES', 'DWES', 'DWEC', 'DIW' ,'Empresa'];
            $horarioMiercoles = ['Ingles', 'DWEC', 'DWEC', 'DWES', 'DWES' ,'Optativa'];
            $horarioJueves = ['Ingles', 'DWEC', 'DWEC', 'DWES', 'DWES' ,'Optativa'];
            $horarioViernes = ['Ingles', 'DWEC', 'DWEC', 'DWES', 'DWES' ,'Optativa'];
            $palabrasIngles = ['Bird', 'Bottle', 'Glass'];
            $todosLosHorarios = [$horarioLunes, $horarioMartes, $horarioMiercoles, $horarioJueves, $horarioViernes];
            
            for ($i=0 ; $i < count($todosLosHorarios[0]); $i++) {
                
                echo "<tr>";
                for ($j=0; $j<count($todosLosHorarios); $j++) {
                    echo "<td> ", $todosLosHorarios[$j][$i] , "</td>";
                }
                echo "</tr>";
            }
        ?>
    <tbody>
</table>

    <!-- Ejercicio 5: Escribe un programa que utilice las variables $x y $y. Asignales los valores 144 y 999 respectivamente.
A continuación, muestra por pantalla el valor de cada variable, la suma, la resta, la división y la
multiplicación. -->
<h2> Ejercicio 5 </h1>
<?php
    $variableX = 144;
    $variableY = 999;
    $suma = $variableX + $variableY;
    $resta = $variableX - $variableY;
    $multiplicacio = $variableX * $variableY;
    $division = $variableX / $variableY;

    echo "resultado de la suma de ", $variableX , " y " , $variableY ," es: " ,$suma , "<br>";
    echo "resultado: " , $resta , "<br>";
    echo "resultado: " , $multiplicacio , "<br>";
    echo "resultado: " , $division , "<br>";
?>

    <!-- Ejercicio 6 : Crea la variable $nombre y asígnale tu nombre completo. Muestra su valor por pantalla de tal forma
que el resultado sea el mismo que el del ejercicio 1. -->


    <!-- Ejercicio 7: Crea las variables $nombre, $direccion y $telefono y asígnales los valores adecuados. Muestra
los valores por pantalla de tal forma que el resultado sea el mismo que el del ejercicio 2. -->

    <!-- Ejercicio 8: Realiza un conversor de euros a pesetas. La cantidad en euros que se quiere convertir deberá estar
almacenada en una variable. -->


    <!-- Ejercicio 9: Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir deberá estar
almacenada en una variable. -->


    <!-- Ejercicio 10: Escribe un programa que pinte por pantalla una pirámide rellena a base de asteriscos. La base de la 
pirámide debe estar formada por 9 asteriscos. -->


    <!-- Ejercicio 11: Igual que el programa anterior, pero esta vez la pirámide estará hueca (se debe ver únicamente el
contorno hecho con asteriscos). -->


    <!-- Ejercicio 12 : Igual que el programa anterior, pero esta vez la pirámide debe aparecer invertida, con el vértice hacia
abajo. -->

</body>

</html>