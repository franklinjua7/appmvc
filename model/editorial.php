<?php 

class Editorial{

	private $pdo;
	public $nombre_editorial;
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
			$stm = $this->pdo->prepare("SELECT * FROM editoriales WHERE estado_id = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM editoriales WHERE id = ?");
			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Eliminar($id){
		try {
			$sql = "UPDATE editoriales SET estado_id = ? WHERE id = ?";

			$this->pdo->prepare($sql)->execute(array(2, $id));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Actualizar($data){
		try {
			$sql = "UPDATE editoriales SET nombre_editorial = ? WHERE id = ?";

			$this->pdo->prepare($sql)->execute(array($data->nombre_editorial, $data->id));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Editorial $data){
		try {
			$sql = "INSERT INTO editoriales (nombre_editorial,estado_id) VALUES (?,?)";

			$this->pdo->prepare($sql)->execute(array($data->nombre_editorial,1));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


}

 ?>