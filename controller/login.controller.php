<?php 
//Llamamos al modelo de los USERS
require_once 'model/users.php';

class LoginController{

	private $model;

	public function Index(){
		//require_once 'view/header.php';
		require_once 'view/login/login.php';
		//require_once 'view/footer.php';
		
	}

	public function IniciarSesion(){

		if (isset($_POST["email"])) {
			# Y si existe CONTRASEÑA
			if (isset($_POST["password"])) {
				# Validar que se encuentre el usuario y la contraseña - TAREA

				$this->model = new User();

				$data = $this->model->Devuelve_Datos_Sesion_Usuario($_POST["email"], $_POST["password"]);
				//Se recoge el dato enviado (ARR) y se transplanta la DATA.

				if ($data["nRetorno"] == 1) {
					# Cogemos los datos del array ARR que hemos enviado y lo insertamos en $_SESSION
					$_SESSION['user'] = $data['Nombres']." ".$data['ApellidoPaterno']." ".$data['ApellidoMaterno'];
					$_SESSION['Nombres'] = $data["Nombres"];
					$_SESSION['ApellidoPaterno'] = $data["ApellidoPaterno"];
					$_SESSION['ApellidoMaterno'] = $data["ApellidoMaterno"];
					$_SESSION['sexo_id'] = $data["sexo_id"];
					$_SESSION['estado_id'] = $data["estado_id"];
					$_SESSION['FechaNacimiento'] = $data["FechaNacimiento"];
					$_SESSION['Celular'] = $data["Celular"];
					$_SESSION['dni'] = $data["dni"];
					$_SESSION['user_id'] = $data["user_id"];
					$_SESSION['emailid'] = $data["email"];
					$_SESSION['users_tipos_id'] = $data["tipo_usuario"];

					//Mostramos las vistas que siguen
					require_once 'view/inicio/inicio2.php';
					require_once 'view/footer.php';

				} else {
					# Al no encontrase datos, imprimimos el mensaje
					echo $data["cMensajeRetorno"];
				}	

			} else {
				//echo "<div class='alert alert-success'>...</div>";
				echo "Variable de PASSWORD NO ENCONTRADA";
			}
		} else{
			//echo "<div class='alert alert-success'>...</div>";
			echo "Variable de EMAIL NO ENCONTRADA";
			//require_once 'view/header.php';
		}
	}

	public function CerrarSesion(){
		//Destrumos la sesión que hemos creado
		session_destroy();
		header("Location:../index.php");
	}

	public function Registrar(){
		require_once 'view/login/registro.php';
		require_once 'view/footer.php';
	}
}


?>