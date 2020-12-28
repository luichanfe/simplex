<?php

namespace Simplex;

/**
 * Interface para los proveedores de tipos de cambio
 */
interface iTipocambioProvider {

	/**
	* @param string $desde moneda de origen
	* @param string $hasta moneda destino
	*
	* @return float el monto en moneda destino
	*/
	public function getCambio(string $desde, string $hasta): float;

}