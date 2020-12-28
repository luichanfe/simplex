<?php declare(strict_types=1);

namespace Simplex\Test;

use Simplex\ApiTipocambioProvider;

/**
 * Esta clase implementa el provider de www.currencyconverterapi.com
 */
final class TipoCambioProviderTest extends ApiTipocambioProvider {
	
	public $valores = [
					'USD_ARS' => 80,
					'ARS_USD' => 0.0125,
					'GBP_ARS' => 113.38,
					'ARS_GBP' => 0.0088,
					'EUR_ARS' => 102.52,
					'ARS_EUR' => 0.0098,
					'USD_EUR' => 0.82,
					'EUR_USD' => 1.22,
					'USD_GBP' => 0.74,
					'GBP_USD' => 1.35,
					'GBP_EUR' => 1.10,
					'EUR_GBP' => 0.91,
				  ];
	/*
	 * Hereda desde ApiTipocambioProvider
	 */
	public function getCambio(string $desde, string $hasta): float {

		try {
			return floatval($this->valores[$desde."_".$hasta]);
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}

	}

}