<?php 
namespace Mini\Controller;
use Mini\Model\Documento;


class DocumentoController
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
		$documento = new Documento();
		$documento = $documento->listarDocumento();

		include APP.'view/_templates/header.php';
		include APP.'view/Documento/index.php';
		include APP.'view/_templates/footer.php';
	}


	public function registrarDocumento()
	{
		if (isset($_POST['enviar'])) {
			$documento = new Documento();
			$documento->registraDocumento($_POST['nombre']);
		}
		header('location: ' . URL . 'documento/index');
	}

	public function editarDocumento()
	{
		$id = $_POST['id'];
		if (isset($id)) {
			$documento = new Documento();
			$documento = $documento->mostrarDocumento($id);

			echo json_encode($documento);
		}
	}

	public function modificarDocumento()
	{
		if (isset($_POST['enviar'])) {
			$documento = new Documento();
			$documento->modificaDocumento($_POST['nombre'],$_POST['id']);
		}
		header('location: ' . URL . 'documento/index');
	}

}

?>