<?php 

require_once 'model/baja.php';

class BajaController{

	private $model;

	public function __CONSTRUCT(){
		$this->model = new Baja();
	}

	public function Index(){

		require_once 'view/inicio/inicio2.php';
		require_once 'view/baja/baja.php';
		require_once 'view/footer.php';
	}

	public function BusquedaBootGrid(){
		echo $this->model->BusquedaBootGrid();
	}

	public function Solicitud(){
		$id = $_REQUEST['id'];
		$this->model->Solicitud($id);

		header('Location: /?c=Baja&Index');
	}

	
}

 ?>