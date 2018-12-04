<?php 

class LibroAutor{

	private $pdo;
	public $libro_id;
	public $autor_id;

	public function __CONSTRUCT(){
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar(){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM libro_autores");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($libro_id){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM libro_autores WHERE libro_id = ?");
			$stm->execute(array($libro_id));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(LibroAutor $data){
		try {
			$codigo_insertado = 0;

			$sql = "INSERT INTO libro_autores(libro_id, autor_id)
			VALUES (?,?)";

			$this->pdo->prepare($sql)->execute(array(
				$data->libro_id,
				$data->autor_id
			));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


}

?>