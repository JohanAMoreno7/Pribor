<?php 
namespace Mini\Controller;
use Mini\Model\usuarios;


class UsuariosController{

	public function index(){
		$usuario = new Usuarios();
		$usuarios = $usuario->ListarUsuarios();

		session_start();
		

		include APP.'view/_templates/header.php';
		include APP.'view/usuarios/index.php';
		include APP.'view/_templates/footer.php';
	}

	public function registraUsuario()
	{

		if (isset($_POST["enviaru"])) {
			$usuario = new Usuarios();

			$usuario->registraUsuario($_POST['user'],$_POST['email'],$_POST['pasadmin']);

		}
		header('location: ' . URL . 'usuarios/index');
	}

	public function editarUsuario()
	{
		$id = $_POST['id'];
		if (isset($id)) {
            
			$usuario = new Usuarios();
            
			$usuario = $usuario->mostrarUsuario($id);

			echo json_encode($usuario);
		} else {
            // redirect user to songs index page (as we don't have a id)
			echo "Error, no ingreso el id";
		}


	}


		public function modificarUsuario()
	   {
		if (isset($_POST['enviaruuu'])) {
			$usuario = new Usuarios();
            $usuario = $usuario->modificarUsuario($_POST['emailq'],$_POST['nombre'],$_POST['idU']);
		}
		header('location: ' . URL . 'usuarios/index');
	}
}
 ?>