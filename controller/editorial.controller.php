<?php 

require_once 'model/editorial.php';

class EditorialController{

	private $model;

	public function __CONSTRUCT(){
		$this->model = new Editorial();
	}

	public function Index(){
		$alm = new Editorial();
		$alm = $this->model->Listar();

		require_once 'view/inicio/inicio2.php';
		require_once 'view/editorial/editorial.php';
		require_once 'view/footer.php';
	}

	public function Crud(){
		$alm = new Editorial();

		if (isset($_REQUEST['id'])) {
			# Obtenemos los datos a traves del ID
			$alm = $this->model->Obtener($_REQUEST['id']);
		}

		require_once 'view/inicio/inicio2.php';
		require_once 'view/editorial/editar-editorial.php';
		require_once 'view/footer.php';
	}

	public function Guardar(){
		$alm = new Editorial();

		$alm->id = $_REQUEST['id'];
		$alm->nombre_editorial = $_REQUEST['nombre_editorial'];

		$alm->id > 0 
			? $this->model->Actualizar($alm)
			: $this->model->Registrar($alm);

		header('Location: /?c=Editorial&a=Index');
	}

	public function Eliminar(){
		//$alm = new Editorial();

		$this->model->Eliminar($_REQUEST['id']);

		header('Location: /?c=Editorial&a=Index');
	}
}

 ?>