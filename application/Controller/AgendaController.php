<?php


namespace Mini\Controller;
use Mini\Model\cliente;
use Mini\Model\agenda;
use Mini\Model\servicio;


class AgendaController
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

        $cliente = new Cliente();
        $clientes = $cliente->listarClientes();


        $servicio = new Servicio();
        $servicios=$servicio->listarServicios();

    	
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/agenda/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function ListarEventos(){
  

    

        $agenda= new Agenda();
        $agendas = $agenda->ListarEventos();

        echo json_encode($agendas);
        


    }




    
    public function guardarEventos(){

        
        var_dump($_POST);
		if (isset($_POST["enviarA"])) {
            // Instance new Model (cliente)
			$agenda = new Agenda();
            // do guardar() in model/model.php
			$agenda->guardarEventos($_POST["txtTitulo"], $_POST["txtDescripcion"], $_POST["txtFecha"] , $_POST["end"],  $_POST["txtInicio"], $_POST["txtFin"], $_POST["color"], $_POST["idcliente"], $_POST["idservicio"]);
		}
        // dónde ir después de que el cliente ha sido agregado
		header('location: ' . URL . 'agenda/index');
        
	}


    public function borraEvento(){
        

         if (isset($_POST["deletee"])) {
             $id = $_POST['id'];
            $agenda = new Agenda();
            $agenda->borraEvento($id);

    }
    header('location: ' . URL . 'agenda/index');

       
   
    
}

}



