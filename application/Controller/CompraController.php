<?php 
namespace Mini\Controller;
use Mini\Model\Compra;
use Mini\Model\proveedor;
use Mini\Model\Producto;
use Mini\Model\Marca;
use Mini\Model\Presentacion;
use Mini\Model\Umedida;
use Mini\Model\Especie;
use Mini\Model\Categoria;




class CompraController{

	public function __construct()
	{
		session_start();
		if (!isset($_SESSION["Administrador"]) && !isset($_SESSION["Vendedor"])) {
			header('location: ' . URL . 'login/index');
		}
	}


	public function index()
	{
		//NUEVO OBJETO DEL MODELO MARCA
		$marca = new Marca();
		$marca = $marca->listarMarcas();

		//NUEVO OBJETO DEL MODELO PRESENTACION
		$presentacion = new Presentacion();
		$presentacion = $presentacion->listarPresentacion();

		//NUEVO OBJETO DEL MODELO UNIDAD MEDIDA
		$medida = new Umedida();
		$medida = $medida->listarUmedida();

		//NUEVO OBJETO DEL MODELO ESPECIE
		$especie = new Especie();
		$especie = $especie->listarEspecies();

		//NUEVO OBJETO DEL MODELO CATEGORIA
		$categoria = new Categoria();
		$categoria = $categoria->listarCategorias();

		//OBJETO DEL MODELO PRODUCTO
		$producto = new Producto();
		$producto = $producto->productoActivo();

		$proveedor = new Proveedor();
		$proveedores = $proveedor->proveedoresActivos();	

		$compra = new Compra();
		$compra = $compra->listarCompra();	

		

		include APP.'view/_templates/header.php';
		include APP.'view/Compra/index.php';
		include APP.'view/_templates/footer.php';
	}

	public function listado()
	{
		$compra = new Compra();
		$compra = $compra->listarCompra();	

		

		include APP.'view/_templates/header.php';
		include APP.'view/Compra/index2.php';
		include APP.'view/_templates/footer.php';
	}


	public function traerproveedor(){

		$idproveedor = $_POST['idproveedor'];

		if (isset($idproveedor)) {
			$compra = new Compra();
			$compra = $compra->traerproveedor($idproveedor);
			echo json_encode($compra);

		}
	}

	public function traerproducto(){

		$id = $_POST['id'];

		if (isset($id)) {
			$compra = new Compra();
			$compra = $compra->traerproducto($id);
			echo json_encode($compra);

		}
	}

	public function traerproductoCod(){

		$id = $_POST['id'];

		if (isset($id)) {
			$compra = new Compra();
			$compra = $compra->traerproductocod($id);
			echo json_encode($compra);

		}
	}

	public function consultarId(){
		var_dump($_POST);
 //    $productos = $_POST['idProductos'];
	// if (isset($_POST['idProductos'])) {
	// 	 foreach ($productos as $key => $value) {
	// 	 	if ($value!="") {
	// 	 		echo $key."<br>";
	// 	 	}
	// 	}
	// }
	}

	public function guardarCompra()
	{
		if (isset($_POST['precio'])) {
			echo $_POST['precio'];

		}
	}

	public function registrarProducto()
	{
		if (isset($_POST['agregar'])) {
			$producto = new Producto();
			$producto->registraProducto($_POST['nombre'], $_POST['marca'], $_POST['presentacion'],$_POST['categoria'],$_POST['medida'], $_POST['Umedida'],$_POST['especie'],$_POST['precio']);
		}
		header('location: ' . URL . 'compra/index');
	}

	public function agregar()
	{

		$comprar = new Compra();
		$compras = $_POST["compra"];
		$idproveedor = $_POST["idproveedor"];
		$fecha = $_POST["fecha"];
		$totalCom = $_POST["totalCom"];
		$comprador = $_POST["comprador"];
		$iva = $_POST['iva'];
		$comprar->registrarCompra($idproveedor,$fecha,$totalCom,$comprador,$iva);
		$maxid = $comprar->consultarCompra();

		// $maxid->id
		if(isset($compras)){
			foreach ($compras as  $value) {
				$comprar->detalleCompra($value["cantidad"],$value["precio"],$value["lote"],$value["fechalote"],$maxid->id,$value["idp"]);
				
				
				$stock = $comprar->consultarStock($value["idp"]);
				$stock2 = intval($stock->stock);
				$comprar->actualizarExistencias($value["idp"],$stock2+$value["cantidad"]);
			}
		}

	}

	
	public function reportecompra(){
		$id = $_GET['id'];
		if (isset($id)) {

			$compra = new Compra();
			$proveedor = $compra->listarCompraproveedor($id);
			$nit = $compra->listarCompranit($id);
			$fecha = $compra->listarComprafecha($id);
			$total = $compra->listarCompratotal($id);
			$productos = $compra->listarCompraproductos($id);
			$comprador = $compra->listarComprador($id);
			$iva = $compra->listarCompraiva($id);
			$subtotal = $compra->listarComprasubtotal($id);
			
			include APP.'view/compra/facturacompra.php';
		}else {
			echo "Error, no ingreso el id";
		}
	}


}