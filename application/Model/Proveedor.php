<?php 
namespace Mini\Model;
use Mini\Core\Model;

class Proveedor extends Model{
  private $idproveedor;
  private $nit;
  private $direccion;
  private $telefono;
  private $tipopersona;
  private $nombre;
  private $responsable;




  public function guardar($tipopersona,$nombre, $nit , $direccion , $telefono ,$responsable, $estado){

    session_start();
    $sql = "INSERT INTO proveedor (tipopersona, nombre, nit, direccion, telefono , responsable, estado) VALUES (:tipopersona, :nombre, :nit, :direccion, :telefono, :responsable , :estado)";
    $query = $this->db->prepare($sql);
    $parameters = array(':tipopersona' => $tipopersona, ':nombre' => $nombre, ':nit' => $nit, ':direccion' => $direccion, ':telefono' => $telefono, ':responsable' => $responsable, ':estado' => $estado);
    if ($query->execute($parameters)) {
      $_SESSION['proveedorMen'] = "<script type='text/javascript'>alertify.success('Registro agregado')</script>";
    }else
    {
      $_SESSION['proveedorMen'] = "<script type='text/javascript'>alertify.error('Error en el registro')</script>";
    }

  }

  public function ListarProveedores(){


   $sql = "SELECT idproveedor, nit, tipopersona, nombre, direccion, telefono , responsable , estado FROM proveedor";
   $query = $this->db->prepare($sql);
   $query->execute();

   return $query->fetchAll();



 }

 public function validarNit($nit)
 {
  $sql="CALL validarNit(:nit)";
  $query=$this->db->prepare($sql);
  $parameters=array(':nit'=>$nit);
  $query->execute($parameters);

  return $query->fetch();
}

public function proveedoresActivos(){


 $sql = "SELECT idproveedor, nit, tipopersona, nombre, direccion, telefono , responsable , estado FROM proveedor WHERE estado='activo'";
 $query = $this->db->prepare($sql);
 $query->execute();

 return $query->fetchAll();

}

public function proveedoresInactivos(){
 $sql = "SELECT idproveedor, nit, tipopersona, nombre, direccion, telefono , responsable , estado FROM proveedor WHERE estado='inactivo'";
 $query = $this->db->prepare($sql);
 $query->execute();

 return $query->fetchAll();

}

public function mostrarProveedor($idProveedor){

  $sql = "SELECT idproveedor, tipopersona, nombre, nit, direccion , telefono , responsable , estado FROM proveedor WHERE idproveedor = :idProveedor LIMIT 1";
  $query = $this->db->prepare($sql);
  $parameters = array(':idProveedor' => $idProveedor);



  $query->execute($parameters);


  return $query->fetch();



}




public function actualizarProveedor($tipopersona, $nombre, $nit, $direccion, $telefono , $responsable , $estado , $idProveedor)
{
  session_start();

  $sql = "UPDATE proveedor SET tipopersona = :tipopersona, nombre = :nombre, nit = :nit, direccion = :direccion, telefono = :telefono, responsable  = :responsable, estado = :estado  WHERE idproveedor = :idProveedor";
  $query = $this->db->prepare($sql);
  $parameters = array(':tipopersona' => $tipopersona, ':nombre' => $nombre, ':nit' => $nit, ':direccion' => $direccion, ':telefono' => $telefono, ':responsable' => $responsable,':estado' => $estado, ':idProveedor' => $idProveedor);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

  if ($query->execute($parameters)) {
    $_SESSION['proveedorEMen'] = "<script type='text/javascript'>alertify.success('Registro actualizado')</script>";
  }else
  {
    $_SESSION['proveedorEMen'] = "<script type='text/javascript'>alertify.error('Error al modificar')</script>";
  }
}













}


?>