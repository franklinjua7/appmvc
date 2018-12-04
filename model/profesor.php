<?php
class Profesor
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener_x_UserID($user_id)
	{	
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM profesores WHERE user_id = ?");
			          
			$stm->execute(array($user_id));
			
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}

	public function Listar()
	{
		try
		{
	
			$stm = $this->pdo->prepare("SELECT * FROM profesores");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM profesores WHERE id = ?");
			          
			$stm->execute(array($id));
			
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}