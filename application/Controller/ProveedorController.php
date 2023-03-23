<?php 
namespace Mini\Controller;
use Mini\Model\proveedor;


class ProveedorController{

	public function __construct()
	{
		session_start();
		if (!isset($_SESSION["Administrador"]) && !isset($_SESSION["Vendedor"])) {
			header('location: ' . URL . 'login/index');
		}
	}

	public function index(){
		$proveedor = new Proveedor();
		$proveedores = $proveedor->ListarProveedores();
		

		include APP.'view/_templates/header.php';
		include APP.'view/proveedor/index.php';
		include APP.'view/_templates/footer.php';
	}

	public function guardar(){
		if (isset($_POST["submit"])) {
            // Instance new Model (cliente)
			$proveedor = new Proveedor();
            // do guardar() in model/model.php
			

			if ($proveedor->validarNit($_POST['nit'])>0) {
				session_start();
				$_SESSION['validaNit'] = "<script type='text/javascript'>alertify.error('El proveedor ya existe')</script>";
			}else
			{
				$proveedor->guardar($_POST["tipopersona"], $_POST["nombre"], $_POST["nit"],  $_POST["direccion"],   $_POST["telefono"],   $_POST["responsable"],   $_POST["estado"]);
			}
			

			

		}
        // dónde ir después de que el cliente ha sido agregado
		header('location: ' . URL . 'proveedor/index');
	}	


	public function editarProveedor(){
		$idProveedor = $_POST["idproveedor"];
		if (isset($idProveedor)) {
            // Instance new Model (Cliente)
			$proveedor = new Proveedor();
            // do getcliente() in model/model.php
			$proveedor = $proveedor->mostrarProveedor($idProveedor);

            // cargar vistas dentro de las vistas podemos hacer eco $ cliente fácilmente
			echo json_encode($proveedor);
		} else {
            // redirect user to songs index page (as we don't have a id)
			echo "Error, no ingreso el id";
		}
	}

	public function actualizarProveedor(){

		if (isset($_POST["enviarproveedor"])) {
            // Instance new Model (Song)
			$proveedor = new Proveedor();
            // do updateSong() from model/model.php
			$proveedor->actualizarProveedor($_POST["tipopersonaE"],$_POST["nombreE"], $_POST["nitE"],$_POST["direccionE"],  $_POST["telefonoE"],$_POST["responsableE"],$_POST["estado"], $_POST['idProveedor']);
		}

        // where to go after song has been added
		header('location: ' . URL . 'proveedor/index');

	}

	public function nuevo(){
		$proveedor = new Proveedor();
		

		include APP.'view/_templates/header.php';
		include APP.'view/proveedor/nuevo.php';
		include APP.'view/_templates/footer.php';
	}

	public function ActivoPDF()
	{
		$proveedor = new Proveedor();
		$proveedoresActivos = $proveedor->proveedoresActivos();
		include APP.'view/proveedor/proveedorPDFa.php';
	}

	public function InactivoPDF()
	{
		$proveedor = new Proveedor();
		$proveedoresInactivos = $proveedor->proveedoresInactivos();
		include APP.'view/proveedor/proveedorPDFi.php';
	}

	public function proveedorPDF()
	{
		$proveedor = new Proveedor();
		$proveedores = $proveedor->ListarProveedores();
		include APP.'view/proveedor/proveedorPDF.php';
	}

	public function ActivoExcel()
	{
		$proveedor = new Proveedor();
		$proveedoresActivos = $proveedor->proveedoresActivos();
		include APP.'view/reportes/proveedorExcela.php';
	}

	public function InactivoExcel()
	{
		$proveedor = new Proveedor();
		$proveedoresInactivos = $proveedor->proveedoresInactivos();
		include APP.'view/reportes/proveedorExcela.php';
	}

	public function todosE()
	{
		$proveedor = new Proveedor();
		$proveedores = $proveedor->ListarProveedores();
		include APP.'view/reportes/proveedoresE.php';
	}
}



?>