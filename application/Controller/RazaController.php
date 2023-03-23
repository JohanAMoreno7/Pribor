<?php 
namespace Mini\Controller;
use Mini\Model\Raza;


class RazaController
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
		$raza = new Raza();
		$raza = $raza->listarRaza();

		include APP.'view/_templates/header.php';
		include APP.'view/raza/index.php';
		include APP.'view/_templates/footer.php';
	}


	public function registrarRaza()
	{
		if (isset($_POST['enviar'])) {
			$raza = new Raza();
			$raza->registraRaza($_POST['nombre']);
		}
		header('location: ' . URL . 'raza/index');
	}

	public function editarRaza()
	{
		$id = $_POST['id'];
		if (isset($id)) {
			$raza = new Raza();
			$raza = $raza->mostrarRaza($id);

			echo json_encode($raza);
		}
	}

	public function modificarRaza()
	{
		if (isset($_POST['enviar'])) {
			$raza = new Raza();
			$raza->modificarRaza($_POST['nombre'],$_POST['id']);
		}
		header('location: ' . URL . 'raza/index');
	}

}

?>