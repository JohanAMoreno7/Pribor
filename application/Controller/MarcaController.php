<?php 
namespace Mini\Controller;
use Mini\Model\marca;


class MarcaController
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
		//INSTANCIA UN NUEVO OBJETO MARCA
		$marca = new Marca();
		//LLAMA METODO PARA LISTAR LAS MARCAS
		$marcas = $marca->listarMarcas();


		include APP.'view/_templates/header.php';
		include APP.'view/marca/index.php';
		include APP.'view/_templates/footer.php';
	}


	public function registrarMarca()
	{
		if (isset($_POST['enviarMarca'])) {
			$marca = new Marca();
			$marca->insertarMarca($_POST['marca']);

		}
		header('location: ' . URL . 'marca/index');
	}

	public function mostrarMarca()
	{
		$idMarca = $_POST["id"];
		
		if (isset($idMarca)) {
			
			$marca = new Marca();
			
			$marca = $marca->mostrarMarca($idMarca);

			echo json_encode($marca);
		} else {
			
			echo "Error, no ingreso el id";
		}
	}


	public function modificarMarca()
	{
		if (isset($_POST['enviarMarca'])) {
			
			$marca = new Marca();
			$marca->modificarMarca($_POST['marca'],$_POST['idmarca']);
		}
		header('location: ' . URL . 'marca/index');
	}
}

?>