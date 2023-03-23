<?php 
namespace Mini\Controller;
use Mini\Model\Umedida;

class UmedidaController
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
		$medida = new Umedida();
		$medida = $medida->listarUmedida();

		include APP.'view/_templates/header.php';
		include APP.'view/Umedida/index.php';
		include APP.'view/_templates/footer.php';
	}

	public function registrarUmedida()
	{
		if (isset($_POST['enviar'])) {
			$medida = new Umedida();
			$medida->registraUmedida($_POST['medida']);
		}
		header('location:'.URL.'Umedida/index');
	}

	public function mostrarUmedida()
	{
		$idMedida = $_POST['id'];
		if (isset($idMedida)) {
			$medida = new Umedida();
			$medida = $medida->mostrarUmedida($idMedida);

			echo json_encode($medida);
		} else {
			
			echo "Error, no ingreso el id";
		}
	}

	public function modificarMedida()
	{
		if (isset($_POST['enviar'])) {
			$medida = new Umedida();
			$medida = $medida->modificaMedida($_POST['medida'], $_POST['idmedida']);
		}
		header('location:'.URL.'Umedida/index');
	}
}


?>