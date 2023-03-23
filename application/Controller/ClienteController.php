<?php 
namespace Mini\Controller;
use Mini\Model\cliente;
use Mini\Model\Documento;


class ClienteController{

	public function __construct()
	{
		session_start();
		if (!isset($_SESSION["Administrador"]) && !isset($_SESSION["Vendedor"])) {
			header('location: ' . URL . 'login/index');
		}
	}

	public function index(){
		$cliente = new Cliente();
		$clientes = $cliente->listarClientes();

		$documento = new Documento();
		$documento = $documento->listarDocumento();
		

		include APP.'view/_templates/header.php';
		include APP.'view/cliente/index.php';
		include APP.'view/_templates/footer.php';
	}

	public function guardarCliente(){
        // si tenemos datos de POST para crear una nueva entrada de cliente
		if (isset($_POST["enviar"])) {
            // Instance new Model (cliente)
			$cliente = new Cliente();

			if ($cliente->validarDocumento($_POST['documento'])>0) {
				session_start();
				$_SESSION['validaDocumento'] = "<script type='text/javascript'>alertify.error('El cliente ya existe')</script>";
			}else
			{
				$cliente->guardaCliente($_POST['tipodocumento'],$_POST['documento'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono']);
			}
			
		}
        // dónde ir después de que el cliente ha sido agregado
		header('location: ' . URL . 'cliente/index');
	}


	public function borrarCliente(){
		$id = $_POST["id"];
        // si tenemos una identificación de un cliente que debería ser eliminada
		if (isset($id)) {
            // Instancia new Model (cliente)
			$cliente = new Cliente();
            // do borrarCliente() in model/model.php
			$eliminar = $cliente->borrarCliente($id);

			echo json_encode($eliminar);
		}else {
			echo "Error, no ingreso el id";
		}
		
	}


	public function editarCliente(){
		$idCliente = $_POST["id"];
        // si tenemos una identificación de un cliente que debe ser editada
		if (isset($idCliente)) {
            // Instancia new Model (Cliente)
			$cliente = new Cliente();
            // mostrarCLiente() en model/model.php
			$cliente = $cliente->mostrarCliente($idCliente);

			echo json_encode($cliente);
		} else {
            // redirect user to songs index page (as we don't have a id)
			echo "Error, no ingreso el id";
		}
	}

	public function actualizarCliente()
	{
        // if we have POST data to create a new song entry
		if (isset($_POST["enviarcliente"])) {
            // Instance new Model (Song)
			$cliente = new Cliente();
            // do updateSong() from model/model.php
			$cliente->actualizarCliente($_POST["tipodocumento"],$_POST["nombre"], $_POST["apellido"],  $_POST["telefono"], $_POST['idCliente'], $_POST["estado"],$_POST['documento']);
		}

        // where to go after song has been added
		header('location: ' . URL . 'cliente/index');
	}


	public function buscaCliente()
	{
		$cliente= $_GET['cliente'];

		if (isset($cliente)) {
			$cliente = new Cliente();
			$cliente = $cliente->buscarCliente($cliente);

			echo json_encode($cliente);
		}else {
            // redirect user to songs index page (as we don't have a id)
			echo "Error, no ingreso el nombre";
		}
	}

	public function reporte()
	{
		
		$cliente = new Cliente();
		$clientesActivos = $cliente->clienteActivo();
		include APP.'view/cliente/clientePDFa.php';
	}

	public function inactivosPDF()
	{
		$cliente = new Cliente();
		$clientesInactivos = $cliente->clienteInactivo();
		include APP.'view/cliente/clientePDFi.php';
	}

	public function todosPDF()
	{
		$cliente = new Cliente();
		$clientes = $cliente->listarClientes();
		include APP.'view/cliente/todosPDF.php';		
	}

	public function activoExcel()
	{
		$cliente = new Cliente();
		$clientesActivos = $cliente->clienteActivo();
		include APP.'view/reportes/clienteExcela.php';		
	}

	public function inactivoExcel()
	{
		$cliente = new Cliente();
		$clientesInactivos = $cliente->clienteInactivo();
		include APP.'view/reportes/clienteExceli.php';		
	}

	public function todosExcel()
	{
		$cliente = new Cliente();
		$clientes = $cliente->listarClientes();
		include APP.'view/reportes/todosE.php';		
	}

}


?>