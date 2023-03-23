<?php 
Namespace Mini\Controller;
use Mini\Model\Producto;
use Mini\Model\Marca;
use Mini\Model\Presentacion;
use Mini\Model\Umedida;
use Mini\Model\Especie;
use Mini\Model\Categoria;


class ProductoController
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
		$producto = $producto->listarProducto();

		

		include APP.'view/_templates/header.php';
		include APP.'view/producto/index.php';
		include APP.'view/_templates/footer.php';
	}

	public function registrarProducto()
	{
		if (isset($_POST['agregar'])) {
			$producto = new Producto();

			if ($producto->validarCodigo($_POST['codigo'])>0) {
				session_start();
				$_SESSION['validaCodigo'] = "<script type='text/javascript'>alertify.error('Ya existe un producto con ese codigo')</script>";
			} else {
				$producto->registraProducto($_POST['nombre'], $_POST['marca'], $_POST['presentacion'],$_POST['categoria'],$_POST['medida'], $_POST['Umedida'],$_POST['especie'],$_POST['precio'],$_POST['codigo']);
			}
			

		}
		header('location: ' . URL . 'producto/index');
	}


	public function mostrarProducto()
	{
		$id = $_POST['id'];
		if ($id) {
			$producto = new Producto();
			$producto = $producto->mostrarProducto($id);

			echo json_encode($producto);
		}
	}

	public function modificarProducto()
	{
		if (isset($_POST['agregar'])) {
			$producto = new Producto();
			$producto->modificaProducto($_POST['nombre'], $_POST['marca'], $_POST['presentacion'],$_POST['categoria'],$_POST['medida'], $_POST['Umedida'],$_POST['estado'],$_POST['especie'],$_POST['id'],$_POST['precio'],$_POST['codigopp']);


		}
		header('location: ' . URL . 'producto/index');
	}

	public function ActivoPDF()
	{
		$producto = new Producto();
		$productosActivos = $producto->productoActivo();
		include APP.'view/producto/productoPDFa.php';
	}

	public function InactivoPDF()
	{
		$producto = new Producto();
		$productosInactivos = $producto->productoInactivo();
		include APP.'view/producto/productoPDFi.php';
	}

	public function todosPDF()
	{
		$producto = new Producto();
		$productoss = $producto->listarProducto();
		include APP.'view/producto/todosPDF.php';
	}

	public function ActivoExcel()
	{
		$producto = new Producto();
		$productosActivos = $producto->productoActivo();
		include APP.'view/reportes/productoExcela.php';
	}

	public function InactivoExcel()
	{
		$producto = new Producto();
		$productosInactivos = $producto->productoInactivo();
		include APP.'view/reportes/productoExceli.php';
	}

	public function todosExcel()
	{
		$producto = new Producto();
		$productos = $producto->listarProducto();
		include APP.'view/reportes/todosExcel.php';
	}
}


?>