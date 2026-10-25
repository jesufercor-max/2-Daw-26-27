<?php
session_start();

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [
        'Camiseta' => [
            'precio' => 15.50,
            'detalle' => 'Camiseta de algodón 100% con corte clásico. Disponible en varias tallas.'
        ],
        'Gorra' => [
            'precio' => 9.99,
            'detalle' => 'Gorra ajustable con visera curva, ideal para el verano.'
        ],
        'Mochila' => [
            'precio' => 29.90,
            'detalle' => 'Mochila resistente al agua con compartimento para portátil de 15 pulgadas.'
        ],
        'Zapatillas' => [
            'precio' => 49.95,
            'detalle' => 'Zapatillas deportivas ligeras y transpirables con suela antideslizante.'
        ]
    ];
}


if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = [];

   
    if (isset($_COOKIE['cesta'])) {
        $datos = json_decode($_COOKIE['cesta'], true);

        if (is_array($datos)) {
            foreach ($datos as $nombre => $cantidad) {
                
                if (isset($_SESSION['productos'][$nombre]) && is_int($cantidad) && $cantidad > 0) {
                    $_SESSION['cesta'][$nombre] = $cantidad;
                }
            }
        }
    }
}

// 3. Función para guardar la cesta en una cookie (30 días)
function guardarCesta()
{
    setcookie('cesta', json_encode($_SESSION['cesta']), time() + 60 * 60 * 24 * 30);
}

// 4. Función para contar los productos de la cesta
function contarProductos()
{
    return array_sum($_SESSION['cesta']);
}