<?php 

#Vamos a requerir ciertos modelos
require_once 'model/autor.php';
require_once 'model/sexo.php';
require_once 'model/estado.php';

class AutorController{

	//Declaramos variables a utilizar
	private $model;
	private $model_sexo;
	private $model_estado;

	public function __CONSTRUCT(){
		$this->model = new Autor();
		$this->model_sexo = new Sexo();
		$this->model_estado = new Estado();
	}

	public function Index(){
		
		require_once 'view/inicio/inicio2.php';
		require_once 'view/autor/autor.php';
		require_once 'view/footer.php';

	}

	public function Crud(){
		$alm = new Autor();
		$sexos = new Sexo();
		$estados = new Estado();

		if (isset($_REQUEST['id'])) {
			# Obtenemos los datos a traves del ID
			$alm = $this->model->Obtener($_REQUEST['id']);
		}

		$sexos = $this->model_sexo->Listar();

		$estados = $this->model_estado->Listar();

		require_once 'view/inicio/inicio2.php';
		require_once 'view/autor/autor-editar.php';
		require_once 'view/footer.php';
	}

	public function Guardar(){
		$alm = new Autor();

		$alm->id = $_REQUEST['id'];
        $alm->Nombres = $_REQUEST['Nombres']; 
        $alm->ApellidoPaterno = $_REQUEST['ApellidoPaterno'];
        $alm->ApellidoMaterno = $_REQUEST['ApellidoMaterno'];
        $alm->sexo_id = $_REQUEST['sexo_id'];
        $alm->estado_id = $_REQUEST['estado_id'];
        $alm->FechaNacimiento = $_REQUEST['FechaNacimiento'];
        $alm->PaisNacimiento = $_REQUEST['PaisNacimiento'];
        $alm->Celular = $_REQUEST['Celular'];
        $alm->Email = $_REQUEST['Email'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        header('Location: /?c=Autor&a=Index');
	}

	public function Eliminar(){

		$this->model->Eliminar($_REQUEST['id']);

		header('Location: /?c=Autor&Index');
	}
}

?>