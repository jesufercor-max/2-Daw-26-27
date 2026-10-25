<?php
session_start();

$duracionCookie = time() + 60 * 60 * 24 * 90;

if (!isset($_SESSION['votos'])) {
    $_SESSION['votos'] = ['si' => 0, 'no' => 0];

    if (isset($_COOKIE['encuesta'])) {
        $partes = explode('-', $_COOKIE['encuesta']);
        
        if (count($partes) == 2 && ctype_digit($partes[0]) && ctype_digit($partes[1])) {
            $_SESSION['votos']['si'] = (int) $partes[0];
            $_SESSION['votos']['no'] = (int) $partes[1];
        }
    }
}


if (isset($_POST['voto'])) {
    if ($_POST['voto'] == 'si') {
        $_SESSION['votos']['si']++;
    } elseif ($_POST['voto'] == 'no') {
        $_SESSION['votos']['no']++;
    }

    setcookie('encuesta', $_SESSION['votos']['si'] . '-' . $_SESSION['votos']['no'], $duracionCookie);

    
    header('Location: Ejercicio2.php');
    exit;
}

$votosSi = $_SESSION['votos']['si'];
$votosNo = $_SESSION['votos']['no'];
$total = $votosSi + $votosNo;

if ($total > 0) {
    $porcentajeSi = round($votosSi * 100 / $total);
    $porcentajeNo = round($votosNo * 100 / $total);
} else {
    $porcentajeSi = 0;
    $porcentajeNo = 0;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Encuesta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        .encuesta {
            width: 500px;
            margin: 60px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
        }
        button {
            padding: 10px 30px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
        }
        .resultado {
            text-align: left;
            margin-top: 20px;
        }
        .fondo-barra {
            background-color: #ddd;
            border-radius: 5px;
            height: 30px;
            margin-bottom: 15px;
        }
        .barra {
            height: 30px;
            border-radius: 5px;
            color: white;
            line-height: 30px;
            text-align: right;
            padding-right: 8px;
            box-sizing: border-box;
        }
        .barra-si { background-color: #4CAF50; }
        .barra-no { background-color: #E53935; }
    </style>
</head>
<body>
    <div class="encuesta">
        <h1>Encuesta</h1>
        <h2>¿Crees que actualmente hay corrupción en el gobierno?</h2>

        <form method="post" action="Ejercicio2.php">
            <button type="submit" name="voto" value="si">Sí</button>
            <button type="submit" name="voto" value="no">No</button>
        </form>

        <div class="resultado">
            <h3>Resultados (<?= $total ?> votos)</h3>

            <p>Sí: <?= $votosSi ?> votos (<?= $porcentajeSi ?>%)</p>
            <div class="fondo-barra">
                <?php if ($porcentajeSi > 0): ?>
                    <div class="barra barra-si" style="width: <?= $porcentajeSi ?>%">
                        <?= $votosSi ?>
                    </div>
                <?php endif; ?>
            </div>

            <p>No: <?= $votosNo ?> votos (<?= $porcentajeNo ?>%)</p>
            <div class="fondo-barra">
                <?php if ($porcentajeNo > 0): ?>
                    <div class="barra barra-no" style="width: <?= $porcentajeNo ?>%">
                        <?= $votosNo ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>