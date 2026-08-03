<?php

$env = parse_ini_file(__DIR__ . '/../.env');

define('CLIENT_ID', $env['CLIENT_ID'] ?? '');
define('CURRENCY', $env['CURRENCY'] ?? 'USD');
define("KEY_TOKEN", $env['KEY_TOKEN'] ?? '');
define("MONEDA", $env['MONEDA'] ?? '$');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>