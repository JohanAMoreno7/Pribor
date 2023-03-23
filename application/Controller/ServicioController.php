<?php 
namespace Mini\Controller;
use Mini\Model\Servicio;
use Mini\Model\Raza;
use Mini\Model\Tarifa;



class ServicioController
{

	public function __construct()
	{
		session_start();
		if (!isset($_SESSION["Administrador"]) && !isset($_SESSION["Vendedor"])) {
			header('location: ' . URL . 'login/index');
		}
	}

	public function index(){
		$servicio = new Servicio();
		$servicios=$servicio->listarServicios();

		$detalle=$servicio->listarDetalle();

		
		include APP.'view/_templates/header.php';
		include APP.'view/servicio/index.php';
		include APP.'view/_templates/footer.php';
	}


	public function detalle(){
		
		$raza = new Raza();
		$raza = $raza->listarRaza();

		$tarifa = new Tarifa;
		$tarifa = $tarifa->listarTarifas();

		$servicio = new Servicio();
		$detalle=$servicio->listarDetalle();
		
		include APP.'view/_templates/header.php';
		include APP.'view/servicio/razatarifa.php';
		include APP.'view/_templates/footer.php';
	}

	public function guardarServicio() {
		

		if (isset($_POST['enviar'])) {
			$servicio = new Servicio();
			$respuesta = $servicio->guardarServicio($_POST['nombre'],$_POST['iddetalle']);
		}
		header('location: ' . URL . 'servicio/index');
		
	}

	public function editarServicio(){
		$idServicio = $_POST['id'];
		if (isset($idServicio)) {
			$servicio = new Servicio();
			$servicio = $servicio->mostrarServicios($idServicio);


			echo json_encode($servicio);
		}else {
            // redirect user to songs index page (as we don't have a id)
			echo "Error, no ingreso el id";
		}
	}

	public function guardarDetalle()
	{
		if (isset($_POST['enviar'])) {
			$servicio = new Servicio();
			$respuesta = $servicio->guardaDetalle($_POST['idraza'],$_POST['idtarifa']);
		}
		header('location: ' . URL . 'servicio/detalle');
	}


	public function actualizarServicio(){
		if (isset($_POST["enviarservicio"])) {
            // Instance new Model 
			$servicio = new Servicio();
            // do updateSong() from model/model.php
			$servicio->actualizarServicio($_POST['estadoE'],$_POST['idServicio']);
		}

        // where to go after song has been added
		header('location: ' . URL . 'servicio/index');
	}

	public function traerDetalle(){
		$id = $_POST['idetalle'];
		if (isset($id)) {
			$servicio = new Servicio();
			$servicio = $servicio->traeDetalle($id);


			echo json_encode($servicio);
		}else {
            // redirect user to songs index page (as we don't have a id)
			echo "Error, no ingreso el id";
		}
	}


}

?>