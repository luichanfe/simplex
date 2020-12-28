<?php declare(strict_types=1);

namespace Simplex\Tests;

require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Simplex\Moneda;
use Simplex\Dinero;

/*
 * Clase inmutable.
 *
 * Posee un monto y un tipo de cambio del monto
 */
final class DineroTest extends TestCase {

	/**
	* @dataProvider providerAssertDineroEquals
	*
	* @param string $montoEsperado        El float esperado.
	* @param string $codigoMonedaEsperado El codigo de moneda esperado.
	* @param Money  $actual           	  El Dinero con el cual comparar.
	*/
	public function testAssertDineroEquals(float $montoEsperado, string $codigoMonedaEsperado, Dinero $actual) : void
	{
		$this->assertSame($codigoMonedaEsperado, $actual->getMoneda()->getCodigo());
		$this->assertSame($montoEsperado, (float) $actual->getMonto());
	}

	public function providerAssertDineroEquals() : array
	{
		$dolares = new Moneda('USD');
		$libra = new Moneda('GBP');
		$pesoargentino = new Moneda('ARS');

		return [
		   [5, 'USD', new Dinero(5, $dolares)],
		   [5, 'GBP', new Dinero(5, $libra)],
		   [5, 'ARS', new Dinero(5, $pesoargentino)],
		];
	}
	
}