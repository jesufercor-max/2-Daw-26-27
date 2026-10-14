


    
  
<?php
// Funciones auxiliares. Se declaran antes del HTML para reutilizarlas.
function limpio($valor) { return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8'); }
function trozoDeNumero($numero, $inicio, $fin) {
    // Solución numérica, sin substr(): divide para quitar las cifras de la derecha
    // y usa módulo para conservar únicamente el fragmento deseado.
    $numero = abs((int)$numero);
    $longitud = strlen((string)$numero);
    if ($inicio < 0 || $fin < $inicio || $fin >= $longitud) return null;
    $quitarDerecha = $longitud - 1 - $fin;
    $cantidad = $fin - $inicio + 1;
    return intdiv($numero, 10 ** $quitarDerecha) % (10 ** $cantidad);
}
function esPrimo($numero) {
    if ($numero < 2) return false;
    for ($divisor = 2; $divisor * $divisor <= $numero; $divisor++) {
        if ($numero % $divisor === 0) return false;
    }
    return true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Examen DWES resuelto</title>
<style>body{font-family:Arial,sans-serif;max-width:920px;margin:25px auto;line-height:1.5;padding:0 15px}section{border-bottom:2px solid #ddd;padding:15px 0}input,select,button{margin:4px;padding:5px}table{border-collapse:collapse}td,th{border:1px solid #aaa;padding:7px;text-align:center}.boleto td{width:32px;height:32px}.verde{background:#8bd69b}.negro{background:#222;color:white}.rojo{background:#ff9999}.gris{background:#ddd}pre{font-size:18px;line-height:1.1} .resultado{background:#f4f4f4;padding:12px}</style></head>
<body><h1>Examen DWES: 5 ejercicios resueltos</h1><p>Cada formulario utiliza el parámetro «ej» para que no interfiera con los demás.</p>
<section>
<!--
EJERCICIO 1. DEPÓSITO CILÍNDRICO
Diseñar un desarrollo web simple con PHP para calcular cuánto tarda en llenarse
un depósito cilíndrico de aceite. El usuario introduce el diámetro y la altura
del cilindro (metros) y el caudal disponible (litros por minuto). Mostrar el
tiempo total de llenado en horas y minutos.
Fórmula: volumen (litros) = PI * (diámetro / 2)^2 * altura * 1000.
Comprobar que los tres valores sean mayores que cero.
-->
<h2>Ejercicio 1. Depósito cilíndrico</h2>
<form method="get"><input type="hidden" name="ej" value="1"><label>Diámetro (m) <input type="number" step="any" name="diametro" min="0.0001" required></label><label>Altura (m) <input type="number" step="any" name="altura" min="0.0001" required></label><label>Caudal (L/min) <input type="number" step="any" name="caudal" min="0.0001" required></label><button>Calcular</button></form>
<?php
if (($_GET['ej'] ?? '') === '1') {
    $diametro = filter_var($_GET['diametro'] ?? null, FILTER_VALIDATE_FLOAT);
    $altura = filter_var($_GET['altura'] ?? null, FILTER_VALIDATE_FLOAT);
    $caudal = filter_var($_GET['caudal'] ?? null, FILTER_VALIDATE_FLOAT);
    if ($diametro === false || $altura === false || $caudal === false || $diametro <= 0 || $altura <= 0 || $caudal <= 0) {
        echo '<p>Introduce valores numéricos mayores que cero.</p>';
    } else {
        $litros = M_PI * ($diametro / 2) ** 2 * $altura * 1000;
        $minutosTotales = (int)ceil($litros / $caudal); // redondeamos hacia arriba al minuto completo
        $horas = intdiv($minutosTotales, 60);
        $minutos = $minutosTotales % 60;
        echo '<p class="resultado">Volumen: '.number_format($litros, 2, ',', '.').' litros.<br>Tiempo aproximado: '.$horas.' horas y '.$minutos.' minutos.</p>';
    }
}
?></section>
<section>
<!--
EJERCICIO 2. TROZODENUMERO
Crear una función trozoDeNumero($numero, $inicio, $fin) que tome las posiciones
inicial y final dentro de un número y devuelva el trozo correspondiente.
En este simulacro las posiciones empiezan en 0 por la izquierda, ambas inclusive.
Ejemplo: 987654321, inicio 2, fin 5 -> 7654.
Crear un formulario y resolverlo sin utilizar substr().
-->
<h2>Ejercicio 2. trozoDeNumero</h2>
<form method="get"><input type="hidden" name="ej" value="2"><label>Número entero positivo <input type="number" min="0" name="numero" required></label><label>Inicio <input type="number" min="0" name="inicio" required></label><label>Fin <input type="number" min="0" name="fin" required></label><button>Extraer</button></form>
<?php
if (($_GET['ej'] ?? '') === '2') {
    $numero = filter_var($_GET['numero'] ?? null, FILTER_VALIDATE_INT);
    $inicio = filter_var($_GET['inicio'] ?? null, FILTER_VALIDATE_INT);
    $fin = filter_var($_GET['fin'] ?? null, FILTER_VALIDATE_INT);
    if ($numero === false || $inicio === false || $fin === false || $numero < 0) echo '<p>Introduce enteros válidos.</p>';
    else {
        $trozo = trozoDeNumero($numero, $inicio, $fin);
        echo $trozo === null ? '<p>Las posiciones no son válidas.</p>' : '<p class="resultado">Trozo: '.limpio($trozo).'</p>';
    }
}
?></section>
<section>
<!--
EJERCICIO 3. JUEGO DE LA PRIMITIVA
El usuario selecciona 6 números entre el 1 y el 49. Generar una combinación
aleatoria de 6 números distintos utilizando estructuras repetitivas.
Mostrar una tabla con los 49 números, coloreando:
- Verde: número elegido que también es ganador.
- Negro: número elegido que no ha salido.
- Rojo: número ganador que el usuario no ha elegido.
- Gris: los demás números.
Contar los aciertos. Si se seleccionan más de 6 números, mostrar un mensaje
indicando que ha hecho trampas, sin mostrar el resultado de la apuesta.
-->
<h2>Ejercicio 3. La Primitiva</h2>
<form method="post"><input type="hidden" name="ej" value="3"><p>Selecciona exactamente 6 números:</p>
<table class="boleto">
<?php for ($fila=0;$fila<7;$fila++) { echo '<tr>'; for ($col=1;$col<=7;$col++) { $n=$fila*7+$col; echo '<td><label><input type="checkbox" name="elegidos[]" value="'.$n.'">'.$n.'</label></td>'; } echo '</tr>'; } ?>
</table><button>Jugar</button></form>
<?php
if (($_POST['ej'] ?? '') === '3') {
    $elegidos = array_values(array_unique(array_map('intval', (array)($_POST['elegidos'] ?? []))));
    $elegidos = array_values(array_filter($elegidos, fn($n) => $n >= 1 && $n <= 49));
    if (count($elegidos) > 6) echo '<p>¡Has hecho trampas! Has seleccionado más de 6 números.</p>';
    elseif (count($elegidos) < 6) echo '<p>Debes seleccionar exactamente 6 números.</p>';
    else {
        $ganadores = [];
        while (count($ganadores) < 6) {
            $n = rand(1,49);
            if (!in_array($n,$ganadores,true)) $ganadores[] = $n;
        }
        sort($ganadores);
        $aciertos = count(array_intersect($elegidos,$ganadores));
        echo '<p class="resultado">Ganadores: '.implode(', ', $ganadores).'. Aciertos: '.$aciertos.'.</p>';
        echo '<table class="boleto">';
        for ($fila=0;$fila<7;$fila++) {
            echo '<tr>';
            for ($col=1;$col<=7;$col++) {
                $n=$fila*7+$col;
                $elegido=in_array($n,$elegidos,true);
                $ganador=in_array($n,$ganadores,true);
                $clase=$elegido && $ganador ? 'verde' : ($elegido ? 'negro' : ($ganador ? 'rojo' : 'gris'));
                echo '<td class="'.$clase.'">'.$n.'</td>';
            }
            echo '</tr>';
        }
        echo '</table><p>Verde: acierto; negro: elegido sin acierto; rojo: ganador no elegido; gris: resto.</p>';
    }
}
?></section>
<section>
<!--
EJERCICIO 4. NÚMEROS PRIMOS
Pedir un entero positivo mediante un formulario HTML. Crear una función
esPrimo($numero) que devuelva true o false. Mostrar si el número es primo,
listar todos los primos desde 2 hasta ese número, contar cuántos hay y
calcular la suma de esos primos. Usar bucles y el operador módulo (%).
Ejemplo para 20: 2,3,5,7,11,13,17,19; cantidad 8; suma 77.
-->
<h2>Ejercicio 4. Números primos</h2>
<form method="get"><input type="hidden" name="ej" value="4"><label>Número <input type="number" min="1" max="100000" name="limite" required></label><button>Comprobar</button></form>
<?php
if (($_GET['ej'] ?? '') === '4') {
    $limite = filter_var($_GET['limite'] ?? null, FILTER_VALIDATE_INT);
    if ($limite === false || $limite < 1 || $limite > 100000) echo '<p>Introduce un entero entre 1 y 100000.</p>';
    else {
        $primos=[];
        for ($i=2;$i<=$limite;$i++) if (esPrimo($i)) $primos[]=$i;
        echo '<p class="resultado">'.$limite.(esPrimo($limite) ? ' es primo.' : ' no es primo.').'<br>Primos: '.implode(', ',$primos).'<br>Cantidad: '.count($primos).'<br>Suma: '.array_sum($primos).'</p>';
    }
}
?></section>
<section>
<!--
EJERCICIO 5. PIRÁMIDES CON ASTERISCOS
Pedir la altura de la figura y el tipo de pirámide:
1) rellena; 2) hueca; 3) invertida rellena; 4) invertida hueca.
Dibujar la figura con bucles for anidados, usando condicionales para decidir
si imprimir un asterisco o un espacio. Usar <pre> para respetar espacios.
Comprobar que la altura sea mayor que cero.
-->
<h2>Ejercicio 5. Pirámides de asteriscos</h2>
<form method="get"><input type="hidden" name="ej" value="5"><label>Altura <input type="number" min="1" max="30" name="alto" required></label><label>Tipo <select name="tipo"><option value="rellena">Rellena</option><option value="hueca">Hueca</option><option value="invertida">Invertida rellena</option><option value="invertida_hueca">Invertida hueca</option></select></label><button>Dibujar</button></form>
<?php
if (($_GET['ej'] ?? '') === '5') {
    $alto=filter_var($_GET['alto'] ?? null,FILTER_VALIDATE_INT);
    $tipo=$_GET['tipo'] ?? '';
    if ($alto===false || $alto<1 || $alto>30 || !in_array($tipo,['rellena','hueca','invertida','invertida_hueca'],true)) echo '<p>Introduce una altura entre 1 y 30 y un tipo válido.</p>';
    else {
        $invertida=str_starts_with($tipo,'invertida');
        $hueca=str_contains($tipo,'hueca');
        echo '<pre>';
        for ($fila=1;$fila<=$alto;$fila++) {
            $nivel=$invertida ? $alto-$fila+1 : $fila;
            for ($espacio=0;$espacio<$alto-$nivel;$espacio++) echo ' ';
            for ($columna=1;$columna<=2*$nivel-1;$columna++) {
                $borde=$columna===1 || $columna===2*$nivel-1 || $nivel===$alto;
                echo (!$hueca || $borde) ? '*' : ' ';
            }
            echo "\n";
        }
        echo '</pre>';
    }
}
?></section>
</body></html>

