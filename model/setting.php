<?php 

class Setting {

	private $pdo;

	public function __construct() {
		try{
			$this->pdo = Database::StartUp();     

		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar() {
		try {
	
			$stm = $this->pdo->prepare("SELECT * FROM settings");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);

		} catch(Exception $e){
			
			die($e->getMessage());
		}
	}
}
