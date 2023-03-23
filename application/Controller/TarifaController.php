<?php 
namespace Mini\Controller;
use Mini\Model\Tarifa;


class TarifaController
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
		$tarifa = new Tarifa();
		$tarifa = $tarifa = $tarifa->listarTarifas();

		include APP.'view/_templates/header.php';
		include APP.'view/tarifa/index.php';
		include APP.'view/_templates/footer.php';
	}

	public function registrarTarifa()
	{
		if (isset($_POST["enviartarifa"])) {
			$fecha = date("Y-m-d");
			$tarifa = new Tarifa();
			$tarifa->registraTarifa($_POST['precio'],$fecha);
		}
		header('location: ' . URL . 'tarifa/index');
	}

	public function mostrarTarifa()
	{
		$idtarifa = $_POST['id'];
		if (isset($idtarifa)) {
			$tarifa = new Tarifa();
			$tarifa = $tarifa->mostrarTarifa($idtarifa);

			echo json_encode($tarifa);
		}
	}

	public function modificarTarifa()
	{
		if (isset($_POST['enviar'])) {
			$tarifa = new Tarifa();
			$tarifa->modificaTarifa($_POST['valor'], $_POST['idtarifa']);
		}
		header('location: ' . URL . 'tarifa/index');
	}
}

?>