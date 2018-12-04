<?php 

class Proveedor{

	private $pdo;
	public $id;
	public $razon_social;
	public $ruc;
	public $estado;


	public function __CONSTRUCT(){
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar(){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM proveedor WHERE estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM proveedor WHERE id = ?");
			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data){
		try {
			$sql="UPDATE proveedor SET 
				razon_social= ?, 
				ruc = ?
                WHERE id = ?";
			$this->pdo->prepare($sql)->
			execute(
				array(
					$data->razon_social, 
                        $data->ruc,
                        $data->id
				)
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Proveedor $data){
		try {
			$sql = "INSERT INTO proveedor(razon_social, ruc) 
		        VALUES (?, ?)";

		    $this->pdo->prepare($sql)->execute(
		    	array(
		    		$data->razon_social, 
                    $data->ruc
		    	));
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}
	public function Eliminar($id){
		try {
			$sql = "UPDATE proveedor SET razon_social = ? WHERE id = ?";

			$this->pdo->prepare($sql)->execute(array(2,$id));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}

 ?>