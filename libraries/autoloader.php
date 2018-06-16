<?php 

function get_classes($controller_file)
{
	//Si el controlador y el archivo existen lo carga el archivos
	if (isset($controller_file) && file_exists( 'controllers/'.$controller_file.'.php')) {
		require 'controllers/'.$controller_file.'.php';
		require 'models/'.$controller_file.'.php';	
	}
	else{//Si no existe ni controlador manda mensaje de error
		echo CONTROLLER_NO_EXISTE;
	}
}