<?php 

require_once 'profesor.php';
require_once 'alumno.php';

Class User{

	private $pdo;
	private $profesor;
	private $password;
	private $emailid;
	private $users_tipos_id;

	public function __construct(){
		//var_dump($this->pdo = Database::StartUp());
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Devuelve_Datos_Sesion_Usuario($email, $password){

		try {
			
			$stm = $this->pdo->prepare("SELECT * FROM users WHERE emailid = ? and password = ?");
			$stm->execute(array($email, $password));

			$tipo_usuario=0;
			$id_usuario=0;

			$arr=array('nRetorno'=> -1, 'cMensajeRetorno'=>'',
						'Nombres'=> '',
						'ApellidoPaterno'=> '',
						'ApellidoMaterno'=> '',
						'sexo_id'=> 0,
						'estado_id' => 0,
						'FechaNacimiento' => '',
						'Celular' => '',
						'dni' => '',
						'user_id' => 0,
						'email'=> '',
						'tipo_usuario'=>'');

			$registros = $stm->fetch(PDO::FETCH_ASSOC);

			if ($registros) {
				# Cogemos los datos del SQL
				$tipo_usuario = $registros['users_tipos_id'];
				$id_usuario = $registros['id'];

				switch ($tipo_usuario) {
					case 1: //Profesor
						# Instanciamos un nuevo PROFESOR
						$profesor = new Profesor();

						$data = $profesor->Obtener_x_UserID($id_usuario);

						//Asignamos los datos obtenidos al ARRAY existente
						$arr["Nombres"] = $data->Nombres;
						$arr["ApellidoPaterno"] = $data->ApellidoPaterno;
						$arr["ApellidoMaterno"] = $data->ApellidoMaterno;
						$arr["sexo_id"] = $data->sexo_id;
						$arr["estado_id"] = $data->estado_id;
						$arr["FechaNacimiento"] = $data->FechaNacimiento;
						$arr["Celular"] = $data->Celular;
						$arr["dni"] = $data->dni;
						$arr["user_id"] = $data->user_id;
						$arr["email"] = $email;
						$arr["tipo_usuario"] = $tipo_usuario;
						
						//Limpiamos los datos para reutilizar los luego.
						$profesor = null;
						$data = null;

						break;

					case 2: //Alumnos
						#Instanciamos a un nuevo ALUMNO
						//$alumno = new Alumno();

						//$data = 
						break;

					case 3: //Administrador
						#Instanciamos al ADMINISTRADOR
						$arr["Nombres"] = "Franklin";
						$arr["ApellidoPaterno"] = "Juárez";
						$arr["ApellidoMaterno"] = "Román";
						$arr["sexo_id"] = 1;
						$arr["estado_id"] = 1;
						$arr["FechaNacimiento"] = "07-07-1993";
						$arr["Celular"] = "990 394 638";
						$arr["dni"] = "48010354";
						$arr["user_id"] = 1;
						$arr["email"] = $email;
						$arr["tipo_usuario"] = $tipo_usuario;
					
					default:
						# code...
						break;
				}

				$arr["nRetorno"] = 1;
			} else {

				//Datos incorrectos
				$arr["nRetorno"] = -1;
				$arr["cMensajeRetorno"] = "Datos Incorrectos";
			}

			//Regresamos el ARRAY creado con los datos a utilizar
			return $arr;

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}

?>