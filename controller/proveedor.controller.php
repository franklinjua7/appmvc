<?php 

require_once 'model/proveedor.php';

class ProveedorController{

	private $model;

	public function __CONSTRUCT(){
		$this->model = new Proveedor();
	}

	Public function Index(){
		require_once 'view/inicio/inicio2.php';
		require_once 'view/proveedor/proveedor.php';
		require_once 'view/footer.php';
	}

	public function Crud(){
		$alm = new Proveedor();
		
		if (isset($_REQUEST['id'])) {
			# Obtenemos los datos a traves del ID
			$alm = $this->model->Obtener($_REQUEST['id']);
		}

		require_once 'view/inicio/inicio2.php';
		require_once 'view/proveedor/editar-proveedor.php';
		require_once 'view/footer.php';
	}

	public function Guardar(){
		$alm = new Proveedor();

		$alm->id = $_REQUEST['id'];
        $alm->razon_social = $_REQUEST['razon_social']; 
        $alm->ruc = $_REQUEST['ruc'];
        
        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        header('Location: /?c=Proveedor&a=Index');
	}

	public function Eliminar($id){

		$this->model->Eliminar($_REQUEST['id']);

		header('Location: /?c=Proveedor&a=Index');
	}
}

 ?>