<?php declare(strict_types=1);

namespace Simplex\Tests;

require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Simplex\Test\TipoCambioProviderTest;
use Simplex\ConversorMoneda;
use Simplex\Moneda;
use Simplex\Dinero;

/*
 * Test para ConversorMoneda
 */
final class ConversorMonedaTest extends TestCase {

    private function createConversorMoneda() : ConversorMoneda
    {
		$testprovider = new TipoCambioProviderTest();

      return new ConversorMoneda($testprovider);
    }

	/**
	* @dataProvider providerConvertirDinero
	*
	* @param Dinero  $dinero           Dineros.
	* @param string $resultadoEsperado El resultado esperado.
	*/
	public function testConvertirDinero(Dinero $dinero, Moneda $monedaDestino, Dinero $resultadoEsperado) : void
	{
		$conversor = $this->createConversorMoneda();

		$resultado = $conversor->convertir($dinero, $dinero->getMoneda(), $monedaDestino);

	   $this->assertEquals($resultadoEsperado, $resultado);
	}

	public function providerConvertirDinero() : array
	{
		$dolares = new Moneda('USD');
		$libra = new Moneda('GBP');
		$pesoargentino = new Moneda('ARS');
		$euro = new Moneda('EUR');		
		return [
		   [new Dinero(1, $dolares), $libra, new Dinero(0.74, $libra)],
		   [new Dinero(1, $dolares), $pesoargentino, new Dinero(80, $pesoargentino)],
		   [new Dinero(1, $dolares), $euro, new Dinero(0.82, $euro)],
		   [new Dinero(1, $pesoargentino), $euro, new Dinero(0.0098, $euro)],
		   [new Dinero(1, $pesoargentino), $libra, new Dinero(0.0088, $libra)],
		   [new Dinero(1, $libra), $euro, new Dinero(1.10, $euro)],
		];
	}		
}