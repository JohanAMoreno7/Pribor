<?php 
namespace Mini\Controller;
use Mini\Model\venta;
use Mini\Model\Cliente;
use Mini\Model\Documento;
use Mini\Model\Producto;
use Mini\Model\Servicio;

class VentaController{

	public function __construct()
	{
		session_start();
		if (!isset($_SESSION["Administrador"]) && !isset($_SESSION["Vendedor"])) {
			header('location: ' . URL . 'login/index');
		}
	}

	public function index(){
		$cliente=new Cliente();
		$clientes= $cliente->clienteActivo();
		$venta = new Venta();

		$documento = new Documento();
		$documento = $documento->listarDocumento();

		//OBJETO DEL MODELO PRODUCTO
		$producto = new Producto();
		$producto = $producto->productoActivo();

		$venta = new Venta();
		$ventas = $venta->mostrarVentas();


		include APP.'view/_templates/header.php';
		include APP.'view/venta/index.php';
		include APP.'view/_templates/footer.php';
	}

	public function index2(){

		$venta = new Venta();
		$ventas = $venta->mostrarVentas();

		$ventaservicio = $venta->mostrarVentasservicio();

		include APP.'view/_templates/header.php';
		include APP.'view/venta/index2.php';
		include APP.'view/_templates/footer.php';
	}

	public function servicio(){
		$cliente=new Cliente();
		$clientes= $cliente->clienteActivo();
		$venta = new Venta();

		$documento = new Documento();
		$documento = $documento->listarDocumento();

		$servicios=new Servicio();
		$servicios= $servicios->listarServiciosActivos();

		include APP.'view/_templates/header.php';
		include APP.'view/venta/servicio.php';
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
		header('location: ' . URL . 'venta/index');
	}

	public function traerCliente()
	{
		if (isset($_POST['idcliente'])) {
			$cliente = new Cliente();
			$cliente = $cliente->mostrarCliente($_POST['idcliente']);
			echo json_encode($cliente);
		}
		
	}


	public function traerProducto()
	{
		$id = $_POST['idproducto'];

		if (isset($id)) {
		    //OBJETO DEL MODELO PRODUCTO
			$producto = new Producto();
			$producto = $producto->mostrarProducto($id);
			echo json_encode($producto);	
		}
	}

	public function traerproductoCodv()
	{
		$id = $_POST['id'];

		if (isset($id)) {
		    //OBJETO DEL MODELO PRODUCTO
			$producto = new Producto();
			$producto = $producto->mostrarProductocodi($id);
			echo json_encode($producto);	
		}
	}


	public function agrega()
	{

		$venta = new Venta();
		$ventas = $_POST["venta"];
		$idcliente = $_POST["idcliente"];
		$fecha = $_POST["fecha"];
		$totalVen = $_POST["totalVen"];
		$vendedor = $_POST['usuario'];
		$iva = $_POST['iva'];
		$venta->registrarVenta($idcliente,$fecha,$totalVen,$vendedor,$iva);
		$maxid = $venta->consultarVenta();


		// $maxid->id
		if(isset($ventas)){
			foreach ($ventas as  $value) {
				$venta->detalleVenta($value["cantidad"],$maxid->id,$value["idpv"]);
				$stock = $venta->consultarStock($value["idpv"]);
				$stock2 = intval($stock->stock);
				$venta->actualizarExistencias($value["idpv"],$stock2-$value["cantidad"]);
			}
		}

	}

	public function agregaservicio()
	{
		$venta = new Venta();
		$servicio = $_POST["servicio"];
		$idcliente = $_POST["idcliente"];
		$fecha = $_POST["fecha"];
		$totalVen = $_POST["totalVen"];
		$vendedor = $_POST["vendedor"];
		$venta->registrarVentaservicio($idcliente,$fecha,$totalVen,$vendedor);
		$maxid = $venta->consultarVentaservicio();

		// $maxid->id
		if(isset($servicio)){
			foreach ($servicio as  $value) {
				$venta->detalleVentaservicio($value["idS"],$value["precio"],$maxid->id);
			}
		}
	}


	public function traerDetalleS(){
		$id = $_POST['id'];
		if (isset($id)) {
			$servicio = new Servicio();
			$servicios = $servicio->traeDetalle($id);
			
			echo json_encode($servicios);
		}else {
			echo "Error, no ingreso el id";
		}
	}



	public function reporte(){
		$id = $_GET['id'];
		if (isset($id)) {

			$venta = new Venta();
			$productos = $venta->reporteVentas($id);
			$fecha = $venta->reporteVentasfecha($id);
			$cliente = $venta->reporteVentascliente($id);
			$idventa = $venta->reporteVentasid($id);
			$total = $venta->reporteVentastotal($id);
			$vendedor = $venta->reporteVentasvendedor($id);
			$iva = $venta->reporteVentasiva($id);
			$subtotal = $venta->reporteVentassubtotal($id);

			include APP.'view/venta/reporte.php';
		}else {
			echo "Error, no ingreso el id";
		}
	}


	public function reporteservicio(){
		$id = $_GET['id'];
		if (isset($id)) {

			$venta = new Venta();
			$servicios = $venta->reporteVentaservicio($id);
			$fecha = $venta->reporteVentasfechaservicio($id);
			$cliente = $venta->reporteVentasclienteservicio($id);
			$idventa = $venta->reporteVentasidservicio($id);
			$total = $venta->reporteVentastotalservicio($id);
			$vendedors = $venta->reporteVentasvendedorservicio($id);
			$subtotal = $venta->reporteVentassubtotalservicio($id);

			include APP.'view/venta/reporteservicio.php';
		}else {
			echo "Error, no ingreso el id";
		}
	}

}

?>