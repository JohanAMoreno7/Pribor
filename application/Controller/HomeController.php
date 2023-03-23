<?php
namespace Mini\Controller;
use Mini\Model\Producto;
use Mini\Model\Cliente;
use Mini\Model\Compra;
use Mini\Model\Venta;
use Mini\Model\Agenda;

class HomeController
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

        $venta = new Venta();
        $ventass = $venta->countventa();

        $producto = new Producto();
        $cantProductos = $producto->contarproductos();

        $cliente = new Cliente();
        $clientes = $cliente->contarClientes();

        $compra = new Compra();
        $compra = $compra->contarCompras();

        $agenda = new Agenda();
        $agenda = $agenda->countagenda();



        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function exampleOne()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_one.php';
        require APP . 'view/_templates/footer.php';
    }

    public function exampleTwo()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_two.php';
        require APP . 'view/_templates/footer.php';
    }

    public function mapa()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/mapa.php';
        require APP . 'view/_templates/footer.php';
    }

    public function ayuda()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/ayuda.php';
        require APP . 'view/_templates/footer.php';
    }

    public function ayudaPDF()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/ayuda.pdf';
        require APP . 'view/_templates/footer.php';
    }


    
}
