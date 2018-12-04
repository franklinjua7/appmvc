<?php 

class Perfil{

	private $pdo;

	public function __CONSTRUCT(){
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar($id){
		$smt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
		$stm->execute(array($id));
	}
}

 ?>