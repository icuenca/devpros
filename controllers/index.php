<?php
//Carga la funciones comunes top y footer
require('common.php');

class Index extends Common
{
	//Funcion mainpage que genera la pagina por default en caso de no existir el controlador
	public function main()
	{
		//Accedemos al metodo del controlador que nos trae la consulta
		$monedas = $this->monedas();;
		$cryptos = $this->Model->cryptos();
		$cryp = array();
		foreach($cryptos->Data as $r)
	    {
	    	array_push($cryp, $r->Name);
	    }

		//Metodo que renderiza la vista
		$this->view('index/main', compact('monedas','cryp'));
	}

	public function buscaCryptos()
	{
		$cryptos = '';
		$monedas = '';
		$resultado = "<table class='table'><tr><th>Moneda</th><th>Crypto</th><th>Valor</th></tr>";
		$cantidad = $_POST['cantidad'];
		$monedasArray = $this->monedas();;
		foreach($_POST['monedas'] as $mon)
			$monedas .= $mon . ",";

		
		foreach($_POST['cryptos'] as $cryp)
			$cryptos .= $cryp . ",";
		$tipocambio = $this->Model->tipocambio($monedas, $cryptos);

		$vals = array();
		foreach($tipocambio as $t)
	    {
	    	
	    		foreach($_POST['monedas'] as $mon)
					$resultado .= "<tr><td>$mon</td><td>". key($t) . '</td><td>' . floatval($cantidad) / floatval($t->$mon) . "</td></tr>";

	    	

	    }
	    $resultado .= "</table>";

	    echo $resultado;
	}

	public function monedas()
	{
		return array('MXN','USD','EUR','GBP');
	}

}