<?php 

class InicioController{

	public function __contructor(){
		#Esto es opcional, pero vale
	}
	
	public function Index(){
		//Llamamos al nuestra vista INCIO
		require_once 'view/inicio/inicio2.php';
		require_once 'view/footer.php';
	}
}


 ?>