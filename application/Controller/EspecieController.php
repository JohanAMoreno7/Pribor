<?php 
namespace Mini\Controller;
use Mini\Model\especie;


class EspecieController{

	public function __construct()
	{
		session_start();
		if (!isset($_SESSION["Administrador"]) && !isset($_SESSION["Vendedor"])) {
			header('location: ' . URL . 'login/index');
		}
	}
	
	public function index(){

		$especie = new Especie();
		$especies = $especie->listarEspecies();
		
		include APP.'view/_templates/header.php';
		include APP.'view/especie/index.php';
		include APP.'view/_templates/footer.php';

	}
	

	public function guardarEspecie(){
        // si tenemos datos de POST para crear una nueva entrada de especie
		if (isset($_POST["enviarEs"])) {
            // Instance new Model (especie)
			$especie = new Especie();
            // do guardar() in model/model.php
			$especie->guardarEspecie($_POST["nombre"]);

			

		}
        // dónde ir después de que el especie ha sido agregado
		header('location: ' . URL . 'especie/index');
	}


public function editarEspecie(){
        $idEspecie = $_POST["idespecie"];
        if (isset($idEspecie)) {
         
			$especie = new Especie();
            
			$especie = $especie->mostrarEspecie($idEspecie);

           
			echo json_encode($especie);
		} else {
            // redirect user to songs index page (as we don't have a id)
			echo "Error, no ingreso el id";
		}
	}

	public function actualizarEspecie(){

           if (isset($_POST["enviarespecie"])) {
            // Instance new Model (Song)
			$especie = new Especie();
            // do updateSong() from model/model.php
			$especie->actualizarEspecie($_POST["nombreE"], $_POST["idEspecie"]);
		}

        // where to go after song has been added
		header('location: ' . URL . 'especie/index');



	}

}
 ?>
