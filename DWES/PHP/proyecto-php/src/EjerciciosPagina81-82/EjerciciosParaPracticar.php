<!-- Ejercicio 1
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por teclado. A
priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha terminado de introducir
los datos cuando meta un número negativo. Utiliza sesiones.-->
<?php session_start(); // Inicio de sesión
    if(isset($_GET['numero'])) {
        $num = $_GET['numero'];

        if ($num>0) {
            $_SESSION['numeros'] [] = $num;
        } else {
            $total = count($_SESSION['numeros']);
            if ($total > 0) {
            $media = array_sum($_SESSION['numeros']) / $total;
            echo "<h3>La media es: " . round($media, 2) . "</h3>";
        } else {
            echo "<h3>No introdujiste ningún número positivo.</h3>";
        }
        
        $_SESSION['numeros'] = []; // Vaciar la sesión para empezar de nuevo
        
        }
    }

?>
<h2> Ejercicio 1</h1>
<form method="get">
    <label>Introduce un número (negativo para terminar):</label>
    <input type="number" step="any" name="numero" required autofocus>
    <input type="submit" value="Enviar">
</form>
<!-- Ejercicio 2
Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y nos diga
cuantos números se han introducido, la media de los impares y el mayor de los pares. El número negativo sólo
se utiliza para indicar el final de la introducción de datos pero no se incluye en el cómputo. Utiliza sesiones. -->



<!-- Ejercicio 3
Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras su suma no
supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado, el contador de los
números introducidos y la media. Utiliza sesiones. -->




<!-- Ejercicio 4
Establece un control de acceso mediante nombre de usuario y contraseña para el ejercicio 1 de esta relación.
Realiza una nueva versión del ejercicio1, de modo que si lo cargamos sin la sesión iniciada nos redirija a la
página de login, y en caso contrario muestre el ejercicio normalmente, también debemos incluir un botón
“cerrar sesión” para cerrar la sesión del usuario y volver a la página de login.
Al cargar la página de login, si la sesión está iniciada redirige automáticamente a la página del ejercicio1 y si
no, mostrará el formulario de identificación con usuario y contraseña. -->



<!-- Ejercicio 5
Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. Un catálogo de cuatro
o cinco productos será suficiente. De cada producto se debe conocer al menos la descripción y el precio. Todos
los productos deben tener una imagen que los identifique. Al lado de cada producto del catálogo deberá
aparecer un botón Comprar que permita añadirlo al carrito. Si el usuario hace clic en el botón Comprar de un
producto que ya estaba en el carrito, se deberá incrementar el número de unidades de dicho producto. Para cada
producto que aparece en el carrito, habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un
producto concreto del carrito de la compra. A continuación se muestra una captura de pantalla de una posible
solución. -->



<!-- Ejercicio 6
Amplía el programa anterior de tal forma que se pueda ver el detalle de un producto. Para ello, cada uno de los
productos del catálogo deberá tener un botón Detalle que, al ser accionado, debe llevar al usuario a la vista de
detalle que contendrá una descripción exhaustiva del producto en cuestión. Se podrán añadir productos al
carrito tanto desde la vista de listado como desde la vista de detalle.
Ejercicio 7
Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color) de una
página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color. -->



<!-- Ejercicio 8
Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario. El programa pedirá que el
usuario teclee la traducción al español de cada una de las palabras y comprobará si son correctas. Al final, el
programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas. La aplicación debe tener una
opción para introducir los pares de palabras (inglés - español) que se deben guardar en cookies; de esta forma,
si de vez en cuando se dan de alta nuevas palabras, la aplicación puede llegar a contar con un número
considerable de entradas en el mini-diccionario. -->



<!-- Ejercicio 9
Amplía el ejercicio 6 de tal forma que los productos que se pueden elegir para comprar, se almacenen en
cookies (solo los productos, no almacenar el contenido de la cesta). La aplicación debe ofrecer, por tanto, las
opciones de alta, baja y modificación de productos.
Cuando no hay productos almacenados en la cookie, se toman los productos por defecto usados en el ejercicio
6, asignándolos en código y además se almacenan en la cookie, para que estén disponibles para las futuras
cargas de la página. Por tanto cada vez que se cargue la página principal, se cargará una array en la sesión con
todos los productos de la tienda recuperados de la cookie, y cada vez que se actualicen los productos en dicho
array (alta, baja o modificación) también debe actualizarse la cookie para que dichos cambios estén disponibles
en la siguiente carga de la página.
También debemos añadir un botón para inicializar los productos por defectos (los del ejercicio 6) deshaciendo
todos los cambios realizados en los productos. Añadir un botón Administrar productos en la página principal,
que lleve a una segunda página, donde se realizarán todas las operaciones de mantenimiento de los productos. -->