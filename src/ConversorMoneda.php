<?php

namespace Simplex;

use Simplex\iTipocambioProvider;

/*
 * Clase para convertir un monto usando un provider
 */
final class ConversorMoneda {

	/*
	 * @var iTipocambioProvider
	 */
	private $provider;
	
	public function __construct(iTipocambioProvider $tipocambioprovider) {
		
		$this->provider = $tipocambioprovider;
	
	}

	/*
	 * @param Dinero $dinero
	 * @param Moneda $monedadesde
	 * @param Moneda $monedahasta
	 *
	 * @return Dinero
	 */
	public function convertir(Dinero $dinero, Moneda $monedaDesde, Moneda $monedaHasta): Dinero {
		
		$cambio = $this->provider->getCambio($monedaDesde->getCodigo(), $monedaHasta->getCodigo());
		
		$monto = floatval($dinero->getMonto() * $cambio);

		return new Dinero($monto, $monedaHasta);

	}
}