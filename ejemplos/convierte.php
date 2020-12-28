<?php
//autoload de composer
require '../vendor/autoload.php';

use Simplex\ConversorMoneda;
use Simplex\TipocambioProvider\CurrconvProvider;
use Simplex\Dinero;
use Simplex\Moneda;

$currconvprovider = new CurrconvProvider();

$conversor = new ConversorMoneda($currconvprovider);

$monedadesde = new Moneda('USD');
$monedahasta = new Moneda('ARS');
$dinero = new Dinero(1, $monedadesde);

$resultado = $conversor->convertir($dinero, $monedadesde, $monedahasta);
echo "<h2>Intenta convertir $10USD a pesos</h2></br>";
echo "$".$dinero->getMonto().$dinero->getMoneda()->getCodigo()." son $". $resultado->getMonto().$resultado->getMoneda()->getCodigo();

