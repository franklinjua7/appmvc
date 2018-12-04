<?php 

class Sexo{

	private $pdo;
	public $id;
    public $nombre_sexo;

	public function __CONSTRUCT(){

		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar(){

		try {
			$stm = $this->pdo->prepare("SELECT * FROM sexos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}

?>