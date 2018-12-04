<?php 

class Genero{

	private $pdo;
	public $id;
	public $nombre_genero;

	public function __CONSTRUCT(){
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar(){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM generos WHERE estado_id = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function Obtener($id){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM generos WHERE id = ?");
			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$sql = "UPDATE generos SET estado_id = ? WHERE id = ?";

			$this->pdo->prepare($sql)->execute(array(2,$id));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function Actualizar($data){
		try {
			$sql = "UPDATE generos SET nombre_genero = ? WHERE id = ?";

			$this->pdo->prepare($sql)->execute(array($data->nombre_genero, $data->id));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Genero $data){
		try {
			$sql = "INSERT INTO generos (nombre_genero, estado_id) VALUES (?,?)"; 

			$this->pdo->prepare($sql)->execute(array($data->nombre_genero, 1));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Duplicidad($nombre_genero){
		try {
			$stm = $this->pdo->prepare("SELECT id FROM generos WHERE nombre_genero = ?");
			
			$stm->execute(array($nombre_genero));

			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}


 ?>