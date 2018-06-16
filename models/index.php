<?php
//require("models/connection.php"); // funciones mySQL 
require("models/connection_mysqli.php"); // funciones mySQLi

class IndexModel extends Connection
{
	public function cryptos()
	{
		$service_url = 'https://min-api.cryptocompare.com/data/all/coinlist';
	

		$curl = curl_init($service_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);
		curl_close($curl);
	    $result = json_decode($curl_response);
	    return $result;
	}
	public function tipocambio($monedas, $cryptos)
	{
		$service_url = 'https://min-api.cryptocompare.com/data/pricemulti?fsyms='. $cryptos .'&tsyms=' . $monedas;
	
		

		$curl = curl_init($service_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		
		$curl_response = curl_exec($curl);
		curl_close($curl);
	    $result = json_decode($curl_response);
	    //print_r($result);
	       
		return $result;
	}
}