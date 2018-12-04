<?php 

class Libro{

	private $pdo;
	private $pdo_aux;

	public $nombre_libro;
	public $editorial_id;
	public $estado_id;
	public $genero_id;
	public $numero_paginas;
	public $anio_edicion;
	public $FechaPublicacion;
	public $codigo_isbn;
	public $resumen;
	public $bimagenReferencia;
	public $RutaImagenReferencia;
	public $id;

	public function __CONSTRUCT(){
		try {
			$this->pdo = Database::StartUp();
			$this->pdo_aux = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar(){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM libros");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {

			$stm = $this->pdo->prepare("SELECT * FROM libros WHERE id = ?");
			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$sql = "UPDATE libros SET estado_id = ? WHERE id = ?";

			$this->pdo->prepare($sql)->execute(array(2, $id));
			
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data){
		try {
			$sql = "UPDATE libros SET 
				nombre_libro = ?,
				editorial_id = ?,
				estado_id = ?,
				genero_id = ?,
				numero_paginas = ?,
				anio_edicion = ?,
				FechaPublicacion = ?,
				codigo_isbn = ?,
				resumen = ?,
				bimagenReferencia = ?,
				RutaImagenReferencia = ?
			WHERE id = ?";

			$this->pdo->prepare($sql)->execute(array(
				$data->nombre_libro,
				$data->editorial_id,
				$data->estado_id,
				$data->genero_id,
				$data->numero_paginas,
				$data->anio_edicion,
				$data->FechaPublicacion,
				$data->codigo_isbn,
				$data->resumen,
				$data->bimagenReferencia,
				$data->RutaImagenReferencia,
				$data->id
			));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Libro $data){
		try {
			$codigo_insertado = 0;

			$sql = "INSERT INTO libros(nombre_libro,editorial_id,estado_id,genero_id,numero_paginas,
			anio_edicion,FechaPublicacion,codigo_isbn,resumen,bimagenReferencia,RutaImagenReferencia)
			VALUES (?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)->execute(array(
				$data->nombre_libro,
				$data->editorial_id,
				$data->estado_id,
				$data->genero_id,
				$data->numero_paginas,
				$data->anio_edicion,
				$data->FechaPublicacion,
				$data->codigo_isbn,
				$data->resumen,
				$data->bimagenReferencia,
				$data->RutaImagenReferencia
			));

			$codigo_insertado = $this->pdo->lastInsertId();
			return $codigo_insertado;

		} catch (Exception $e) {
			die($e->getMessage());
			return 0;
		}
	}

	public function Actualizar_RutaImagenReferencia($ruta_imagen, $codigo_libro){
		try {
			$sql = "UPDATE libros SET RutaImagenReferencia = ? WHERE id = ?";

			$this->pdo->prepare($sql)->execute(array($ruta_imagen, $codigo_libro));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function DevuelveNumeroTotalLibros(){
		try {
			$stm = $this->pdo_aux->prepare("SELECT * FROM libros");
			$stm->execute();

			$total = count($stm->fetchAll(PDO::FETCH_OBJ));
			return $total;
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

		$query .= "SELECT libros.id, libros.nombre_libro, libros.numero_paginas, libros.anio_edicion, libros.FechaPublicacion, libros.codigo_isbn, libros.bimagenReferencia, libros.RutaImagenReferencia, estados.nombre_estado
			FROM libros
			INNER JOIN estados on estados.id = libros.estado_id";

		if (!empty($_POST["searchPhrase"])) {
			# Entonces
			$query .= 'WHERE (libros.id LIKE "%'.$_POST["searchPhrase"].'%")';
			$query .= 'WHERE (libros.nombre_libro LIKE "%'.$_POST["searchPhrase"].'%")';
			$query .= 'WHERE (libros.numero_paginas LIKE "%'.$_POST["searchPhrase"].'%")';
			$query .= 'WHERE (libros.anio_edicion LIKE "%'.$_POST["searchPhrase"].'%")';
			$query .= 'WHERE (libros.codigo_isbn LIKE "%'.$_POST["searchPhrase"].'%")';
		}

		$order_by = '';

		if (isset($_POST["sort"]) && is_array($_POST["sort"])) {
			# Entonces
			foreach ( $_POST["sort"] as $key => $value) {
				# Entonces
				$order_by .= "$key $value,";
			}
		} else {
			$query .= " ORDER BY libros.id DESC";;
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

		$total_records = $this->DevuelveNumeroTotalLibros();

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

	public function VerLibro($id){
		try {

			$stm = $this->pdo->prepare("SELECT libros.*, editoriales.nombre_editorial, estados.nombre_estado, generos.nombre_genero
FROM libros 
INNER JOIN editoriales ON libros.editorial_id = editoriales.id 
INNER JOIN estados ON libros.estado_id = estados.id
INNER JOIN generos ON libros.genero_id = generos.id
WHERE libros.id = ?");
			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}

 ?>