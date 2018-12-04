<?php 

class baja{

	private $pdo;
	private $pdo_aux;

	public function __CONSTRUCT(){
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function BusquedaBootGrid(){

		$query = '';
		$records_per_page = 10;
		$start_from = 0;
		$current_page_number = -1;

		//OBservamos si existe la cantidad de lineas a mostrarse
		if (isset($_POST["rowCount"])) {
			# Entonces vemos la cantidad de lineas
			$records_per_page = $_POST["rowCount"];
		} else {
			$records_per_page = 10;
		}

		if (isset($_POST["current"])) {
			# Entonces
			$current_page_number = $_POST["current"];
		} else {
			$current_page_number = 1;
		}

		$start_from = ($current_page_number - 1) * $records_per_page;

		$query .= "SELECT id, id_usuario,nombre_usuario, correo_electronico
			FROM bajas
			WHERE estado = 1";

		if (!empty($_POST["searchPhrase"])) {
			# Metodo de busqueda dentro del BOOTGRID
			$query .= 'WHERE (bajas.id LIKE "%'.$_POST["searchPhrase"].'%")';
			$query .= 'WHERE (bajas.nombre_usuario LIKE "%'.$_POST["searchPhrase"].'%")';
			$query .= 'WHERE (bajas.correo_electronico LIKE "%'.$_POST["searchPhrase"].'%")';
		}

		$order_by = '';

		if (isset($_POST["sort"]) && is_array($_POST["sort"])) {
			# Entonces
			foreach ( $_POST["sort"] as $key => $value) {
				# Entonces
				$order_by .= "$key $value,";
			}
		} else {
			$query .= " ORDER BY bajas.id DESC";;
		}

		if ($order_by != '') {
			# Entonces 
			$query .= ' ORDER BY '. substr($order_by, 0, -2);
		}

		if ($records_per_page != -1) {
			# Entonces
			$query .= " LIMIT ". $start_from.",".$records_per_page.";";
		}
			// echo $query;
		try {
			$stm = $this->pdo->prepare($query);
			$stm->execute();

			$results = $stm->fetchAll(PDO::FETCH_ASSOC);

		// echo "<br>";
		// var_dump($results);
		} catch (Exception $e) {
			die($e->getMessage());
		}

		//$total_records = $this->DevuelveNumeroTotalBajas();
		$total_records = 1;

		$output = array(
			'current' => intval($current_page_number),
			'rowCount' => intval($records_per_page),
			'total' => intval($total_records),
			'rows' => $results
		);

		$total_records= null;
		$query = null;
		$records_per_page = null;
		$order_by = null;
		$start_from = null;

		// echo "Estas aquí";
		// var_dump($output);
		// echo "<br>";
		return json_encode($output);

	}

	public function DevuelveNumeroTotalBajas(){
		try {
			$stm = $this->pdo_aux->prepare("SELECT * FROM bajas");
			$stm->execute();

			$total = count($stm->fetchAll(PDO::FETCH_OBJ));
			return $total;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Solicitud($id){
		try {
			$sql = "UPDATE bajas SET estado = 3 WHERE id = ?";

			$this->pdo->prepare($sql)->execute(array($id));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}


 ?>