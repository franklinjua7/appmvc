<?php 

require_once 'model/funciones.php';

class UsuarioController{

	public function BajarUsuario(){

		require_once 'view/inicio/inicio2.php';
		require_once 'view/usuario/bajarusuario.php';
		require_once 'view/footer.php';

	}

	public function EnviarBajarUsuario(){

		$Asunto = $_REQUEST['txtTipoSolicitud'];
    	$para = $_REQUEST['txtEmail'];
    	$mensaje = $_REQUEST['txtMsg'];

    	enviar_correo_electronico($Asunto,$para,$mensaje);
	}
}


 ?>