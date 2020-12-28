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
$libra = new Moneda('GBP');
$pesoargentino = new Moneda('ARS');
$euro = new Moneda('EUR');

$montoeuro1 = new Dinero(4, $euro);
$montoeuro2 = new Dinero(5, $euro);
$montopesoarg = new Dinero(10, $pesoargentino);
$montolibra = new Dinero(5, $libra);

$d_montoeuro1 = $conversor->convertir($montoeuro1, $euro, $dolares);
$d_montoeuro2 = $conversor->convertir($montoeuro2, $euro, $dolares);
$d_montopesoarg = $conversor->convertir($montopesoarg, $pesoargentino, $dolares);
$d_montolibra = $conversor->convertir($montolibra, $libra, $dolares);

$total = $d_montoeuro1->mas([$d_montoeuro2, $d_montopesoarg, $d_montolibra]);

echo "<h2>Intenta sumar $4EUR + $5EUR + $10ARS + $5GBP y los convierte a dólares</h2></br>";
echo "Total: $".$total->getMonto().$total->getMoneda()->getCodigo();

