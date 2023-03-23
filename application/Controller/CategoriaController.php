<?php 
namespace Mini\Controller;
use Mini\Model\Categoria;

class CategoriaController{

	public function __construct()
	{
		session_start();
		if (!isset($_SESSION["Administrador"]) && !isset($_SESSION["Vendedor"])) {
			header('location: ' . URL . 'login/index');
		}
	}

	public function index()
	{
		$categoria = new Categoria();
		$categoria = $categoria->listarCategorias();	
		
		include APP.'view/_templates/header.php';
		include APP.'view/categoria/index.php';
		include APP.'view/_templates/footer.php';
	}

	public function insertarCategoria()
	{
		if (isset($_POST['enviarCategoria'])) {
			$categoria = new Categoria();

			$categoria->registrarCategoria($_POST['categoria']);

		}
		header('location: ' . URL . 'categoria/index');
	}

	public function mostrarCategoria()
	{
		$idcategoria = $_POST['id'];
		if (isset($idcategoria)) {
            
			$categoria = new Categoria();
            
			$categoria = $categoria->mostrarCategorias($idcategoria);

			echo json_encode($categoria);
		} else {
            // redirect user to songs index page (as we don't have a id)
			echo "Error, no ingreso el id";
		}

	}


	public function modificarCategoria()
	{
		if (isset($_POST['enviarCategoria'])) {
			$categoria = new Categoria();
            $categoria = $categoria->modificarCategoria($_POST['nombreCategoriaE'], $_POST['idCategoria']);
		}
		header('location: ' . URL . 'categoria/index');
	}





}


 ?>