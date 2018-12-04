<?php 
require_once 'model/database.php';
require 'vendor/autoload.php';

//echo $HTTP_SERVER_VARS["REQUEST_METHOD"];
session_start();

//var_dump(!isset($_SESSION["user"]));
//var_dump(empty($_SESSION["user"]));

//Página de registro de nuevo Usuario
/*if (isset($_REQUEST['c'])=='Login' && isset($_REQUEST['a']) == 'Registrar') {
	//Obtenemos el controlador que vamos a cargar
	$controller = strtolower($_REQUEST['c']);
	$accion = $_REQUEST['a'];
	
	//Instanciamos el controlador
	require_once "controller/$controller.controller.php";
	$controller = ucwords($controller).'Controller';
	$controller = new $controller;

	//Llamar la acción
	call_user_func(array($controller, $accion));
}*/



if (isset($_REQUEST['c'])=='Login'  && isset($_REQUEST['a']) == 'IniciarSesion') {
	
	# Obtenemos el controlador que queremos cargar
		$controller = strtolower($_REQUEST['c']);
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

		//Instanciamos el controlador
		require_once "controller/$controller.controller.php";
		$controller = ucwords($controller).'Controller';
		$controller = new $controller;

		//Llama la acción
		call_user_func(array($controller, $accion));

} else {

	if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
		
		# Declaramos el controlador de logeo
		$controller = 'login';

		//Llamamos al controlador y hacemos los procedimientos
		require_once "controller/$controller.controller.php";
		$controller = ucwords($controller).'Controller';
		//echo $controller;
		$controller = new $controller;
		$controller->Index();

	} else {
		$controller = 'inicio';

		//Toda esta lógica hara el papel de FrontController
		if (!isset($_REQUEST['c'])) {
			# Si no existe ningún C, cargamos por DEFAULT el INCIO
			require_once "controller/$controller.controller.php";
			$controller = ucwords($controller).'Controller';
			$controller = new $controller;
			$controller->Index();

		} else {
			# Pero si es que existe otra acción
			//Obtenemos el controlador que queremos CARGAR
			$controller = strtolower($_REQUEST['c']); // $controller = autor;
			$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

			//Instanciamos el controlador
			require_once "controller/$controller.controller.php";
			$controller = ucwords($controller).'Controller';
			$controller = new $controller;

			//Llamamos a la acción
			call_user_func(array($controller, $accion));
		}
		
	}

}



?>