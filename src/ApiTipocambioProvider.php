<?php

namespace Simplex;

use Simplex\iTipocambioProvider;

/**
 * Clase base para conectarse con una API
 */
abstract class ApiTipocambioProvider implements ITipocambioProvider {
	
	/**
	 * El objeto curl a reusar
	 * @var Curl
	 */
	private $curl;

	/**
	 * @var string
	 */
	protected $providers_config;

	public function __construct() {

		$this->curl = curl_init();
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
		// variables de configuracion de la api
		$this->providers_config = json_decode(file_get_contents(__DIR__ . '/../env.json'))->providers_config;

	}

	/*
	 * @param string $url la url
	 * 
	 * @return object|TRUE|FALSE|NULL 
	 */
	protected function callApi(string $url = '') {

		curl_setopt($this->curl, CURLOPT_URL, 
						$url);

		$output = curl_exec($this->curl);

		return json_decode($output, true);
	}

	/*
	 * en interface TipocambioProvider
	 */
	public function getCambio(string $desde, string $hasta): float {}

}
