<?php

namespace Simplex\TipocambioProvider;

use Simplex\ApiTipocambioProvider;

/**
 * Esta clase implementa el provider de www.currencyconverterapi.com
 */
final class CurrconvProvider extends ApiTipocambioProvider {
	
	/*
	 * Hereda desde ApiTipocambioProvider
	 */
	public function getCambio(string $desde, string $hasta): float {

		$result = $this->callApi($this->providers_config->currconv->url."/convert?q=".$desde."_".$hasta."&compact=ultra&apiKey=".$this->providers_config->currconv->API_KEY);

		try {
			return floatval($result[$desde."_".$hasta]);
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}

	}

}