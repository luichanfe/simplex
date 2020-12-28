<?php declare(strict_types=1);

namespace Simplex\Tests;

require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Simplex\Moneda;

/**
 * Unit test para Moneda
 */
final class MonedaTest extends TestCase {
	
	public function testInstanciaMoneda(): void
	{
		$this->assertInstanceOf(
	      Moneda::class,
	      new Moneda('USD')
	  	);	
	}

}