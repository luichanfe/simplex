<?php

namespace Simplex;

/*
 * Clase inmutable. Representa una moneda
 */
final class Moneda {
	
	/**
	 * El identificador del tipo de moneda
	 *  
	 * @var string
	 */
	private $codigo;

	/*
    * @param string $codigo
	 */
	public function __construct(string $codigo) {
		$this->codigo = $codigo;
	}

	/*
 	 * @return string
	 */
	public function getCodigo(): string {
		return $this->codigo;
	}

	public function __toString(): string
	{
		return $this->codigo;
	}
	
}