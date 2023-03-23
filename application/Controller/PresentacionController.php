<?php 
namespace Mini\Controller;
use Mini\Model\Presentacion;


class PresentacionController
{
	public function __construct()
	{
		session_start();
		if (!isset($_SESSION["Administrador"]) && !isset($_SESSION["Vendedor"])) {
			header('location: ' . URL . 'login/index');
		}
	}
	
	public function index()
	{
		$presentacion = new Presentacion();
		$Presentaciones = $presentacion->listarPresentacion();

		include APP.'view/_templates/header.php';
		include APP.'view/presentacion/index.php';
		include APP.'view/_templates/footer.php';
	}


	public function registrarPresentacion()
	{
		if (isset($_POST['enviar'])) {
			$presentacion = new Presentacion();
			$presentacion->registraPresentacion($_POST['presentacion']);
		}

		header('location:'.URL.'presentacion/index');
	}

	public function mostrarPresentacion()
	{
		$idP = $_POST['id'];

		if (isset($idP)) {
			$presentacion = new Presentacion();
			$presentacion = $presentacion->traerPresentacion($idP);

			echo json_encode($presentacion);
		}
		
	}


	public function modificarPresentacion()
	{
		if (isset($_POST['enviar'])) {
			$presentacion = new Presentacion();
			$presentacion->modificaPresentacion($_POST['presentacion'], $_POST['idpresentacion']);
		}
		header('location:'.URL.'presentacion/index');
	}
}


?>