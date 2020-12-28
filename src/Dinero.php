<?php

namespace Simplex;

use Simplex\Moneda;

/*
 * Clase inmutable.
 *
 * Posee un monto y un tipo de cambio del monto
 */
final class Dinero {

	/**
	 * @var float
	 */	
	private $monto;
	
	/**
	 * @var Moneda
	 */	
	private $moneda;

	/*
	 * @param float $monto
	 * @param Moneda $moneda
	 */
	public function __construct(float $monto, Moneda $moneda) {

		$this->monto = $monto;
		$this->moneda = $moneda;

	}

	public function getMonto(): float {

		return $this->monto;

	}

	public function getMoneda(): Moneda {

		return $this->moneda;

	}

	/*
	 * @param array $dineros
	 *
	 * @return Dinero
	 */
	public function mas($dineros): Dinero {

		$total = $this->getMonto();
		if (is_array($dineros)) {
			foreach ($dineros as $dinero) {
				$total = $total + $dinero->getMonto();
			}
		}

		return new self($total, $this->getMoneda());
	}
}