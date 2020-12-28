<?php
//autoload de composer
require '../vendor/autoload.php';

use Simplex\ConversorMoneda;
use Simplex\TipocambioProvider\CurrconvProvider;
use Simplex\Dinero;
use Simplex\Moneda;

$currconvprovider = new CurrconvProvider();

$conversor = new ConversorMoneda($currconvprovider);

$dolares = new Moneda('USD');
$pesoargentino = new Moneda('ARS');
$euro = new Moneda('EUR');

$montodolares = new Dinero(5, $dolares);
$montopesoarg = new Dinero(4, $pesoargentino);

// A euros
$e_montodolares = $conversor->convertir($montodolares, $dolares, $euro);
$e_montopesoarg = $conversor->convertir($montopesoarg, $pesoargentino, $euro);

$total = $e_montodolares->mas([$e_montopesoarg]);

echo "<h2>Intenta sumar $5USD + $4ARS y los convierte a euros</h2></br>";
echo "Total: $".$total->getMonto().$total->getMoneda()->getCodigo();

