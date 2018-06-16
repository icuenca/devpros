<?php
//esta libreria genera y carga el controlador que se manda llamar desde un autoloader, el archivo php y la clase del controlador deben llamarse igual, para el modelo el archivo debe llamarse igual que el controlador pero la clase se le agrega el nombre del archivo mas la palabra Model 

//Carga las constantes
require 'libraries/define.php';

//Carga el archivo que contiene el registro del autoloader
require 'libraries/autoloader.php';

//Manda llamar la funcion del autoloader
spl_autoload_register('get_classes');


$controller_file	=	strtolower($_GET['c']);
$model 				=	$controller_file.'Model';
$method 			= 	METODO_INICIAL; //metodo por default

//Si se seteo la variable que contiene el controlador
if(isset($_GET['c']) && $_GET['c'] != ''){

	//Instancia el controlador e inyecta la dependencia del modelo
	$controller 		= 	new $controller_file(new $model);

	//Si el metodo esta seteado lo asigna a la variable method
	if(isset($_GET['f']))
		$method = $_GET['f'];
}
else{
	
	//Instancia el controlador por default e inyecta la dependencia del modelo
	$controller 		= 	new Index(new IndexModel);
}
