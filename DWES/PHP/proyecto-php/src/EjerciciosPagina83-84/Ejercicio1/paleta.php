<?php
session_start();

if (!isset($_SESSION['colores'])) {
    $_SESSION['colores'] = [];
}

// Si se ha pulsado una celda, cambiamos el fondo (validando que sea un color hexadecimal)
if (isset($_GET['color']) && preg_match('/^#[0-9A-Fa-f]{6}$/', $_GET['color'])) {
    $_SESSION['fondo'] = $_GET['color'];
}

$fondo = isset($_SESSION['fondo']) ? $_SESSION['fondo'] : '#FFFFFF';
$colores = $_SESSION['colores'];
$maxPorFila = 5;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Paleta de colores</title>
    <style>
        body {
            background-color: <?= $fondo ?>;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
        }
        td {
            border: 2px solid #333;
            padding: 0;
        }
        td a {
            display: block;
            width: 100px;
            height: 100px;
            line-height: 100px;
            color: white;
            text-shadow: 1px 1px 2px black;
            text-decoration: none;
            font-size: 13px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
        }
        form {
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Paleta de colores</h1>

    <?php if (count($colores) == 0): ?>
        <p>Todavía no has generado ningún color.</p>
    <?php else: ?>
        <table>
            <tr>
            <?php
            foreach ($colores as $i => $color) {
               
                if ($i > 0 && $i % $maxPorFila == 0) {
                    echo "</tr><tr>";
                }
                echo "<td style='background-color: $color'>";
                echo "<a href='paleta.php?color=" . urlencode($color) . "'>$color</a>";
                echo "</td>";
            }

           
            $resto = count($colores) % $maxPorFila;
            if ($resto != 0) {
                for ($j = $resto; $j < $maxPorFila; $j++) {
                    echo "<td></td>";
                }
            }
            ?>
            </tr>
        </table>
    <?php endif; ?>

    <form method="get" action="Ejercicio1.php">
        <button type="submit">Volver a la página principal</button>
    </form>

    <form method="post" action="destruir.php">
        <button type="submit">Destruir sesión y crear paleta nueva</button>
    </form>
</body>
</html>