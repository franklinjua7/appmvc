<?php 

require_once 'model/genero.php';

class GeneroController{

	private $model;

	public function __CONSTRUCT(){
		$this->model = new Genero();
	}

	public function Index(){
		
		$alm = new Genero();
		$alm = $this->model->Listar();

		require_once 'view/inicio/inicio2.php';
		require_once 'view/genero/genero.php';
		require_once 'view/footer.php';
	}

	public function Crud(){
		$alm = new Genero();

		if (isset($_REQUEST['id'])) {
			# Obtenemos los datos a traves del ID
			$alm = $this->model->Obtener($_REQUEST['id']);
		}

		require_once 'view/inicio/inicio2.php';
		require_once 'view/genero/editar-genero.php';
		require_once 'view/footer.php';
	}

	public function Guardar(){
		//Verificamos la duplicidad del Dato
		$var = $this->model->Duplicidad($_REQUEST['nombre_genero']);

		if ($var->id > 0) {
			//Código por el cual me regrese un mensaje en la vista
		} else {
			$alm = new Genero();

			$alm->id = $_REQUEST['id'];
			$alm->nombre_genero = $_REQUEST['nombre_genero'];

			$alm->id > 0 
				? $this->model->Actualizar($alm)
				: $this->model->Registrar($alm);
		};		

		header('Location: /?c=Genero&a=Index');
	}


	public function Eliminar(){
		//$alm = new Genero();

		$this->model->Eliminar($_REQUEST['id']);

		header('Location: /?c=Genero&a=Index');
	}
}


?>