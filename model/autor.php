<?php 

class Autor{

	private $pdo;
	public $Nombres; 
    public $ApellidoPaterno;
	public $ApellidoMaterno;
	public $sexo_id;
	public $estado_id;
	public $FechaNacimiento;
	public $PaisNacimiento;
	public $Celular;
	public $Email;
	public $id; 

	public function __CONSTRUCT(){
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}

	public function Listar(){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM autores");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM autores WHERE id = ?");
			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$sql = "UPDATE autores SET estado_id = ? WHERE id = ?";

			$this->pdo->prepare($sql)->execute(array(2,$id));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data){
		try {
			$sql="UPDATE autores SET 
				Nombres          = ?, 
					ApellidoPaterno        = ?,
                    ApellidoMaterno        = ?,
                    sexo_id        = ?,
					estado_id = ?,
					FechaNacimiento = ?,
					PaisNacimiento = ?,
					Celular = ?,
					Email = ?
				WHERE id = ?";
			$this->pdo->prepare($sql)->
			execute(
				array(
					$data->Nombres, 
                        $data->ApellidoPaterno,
                        $data->ApellidoMaterno,
                        $data->sexo_id,
                        $data->estado_id,
                        $data->FechaNacimiento,
                        $data->PaisNacimiento,
                        $data->Celular,
                        $data->Email,
                        $data->id
				)
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}

	public function Registrar(Autor $data){
		try {
			$sql = "INSERT INTO autores(Nombres, ApellidoPaterno,ApellidoMaterno,sexo_id,estado_id,FechaNacimiento,PaisNacimiento,Celular,Email) 
		        VALUES (?, ? , ? , ? , ? , ? , ? , ? , ?)";

		    $this->pdo->prepare($sql)->execute(
		    	array(
		    		$data->Nombres, 
                        $data->ApellidoPaterno,
                        $data->ApellidoMaterno,
                        $data->sexo_id,
                        $data->estado_id,
                        $data->FechaNacimiento,
                        $data->PaisNacimiento,
                        $data->Celular,
                        $data->Email
		    	));
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}
}

?>