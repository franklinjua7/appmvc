<?php 

require_once 'model/usuario.php';

class UsuarioController{

	private $model;

	public function __CONSTRUCT(){
		try {
			$this->model = new Perfil();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Index(){

		require_once 'view/inicio2.php';
		require_once 'view/perfil/perfil.php';
		require_once 'view/footer.php';

	}
}


 ?>