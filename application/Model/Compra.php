<?php 
namespace Mini\Model;
use Mini\Core\Model;


class Compra extends Model
{


  public function traerproveedor($idproveedor){
    $sql = "CALL traerproveedor(:idproveedor)";
    $query = $this->db->prepare($sql);
    $parameters = array(':idproveedor' => $idproveedor);
    $query->execute($parameters);
    return $query->fetch();
  }


  public function traerproducto($id){
    $sql = "CALL traerproducto(:id)";
    $query = $this->db->prepare($sql);
    $parameters = array(':id' => $id);
    $query->execute($parameters);
    return $query->fetch();
  }

  public function traerproductocod($id){
    $sql = "CALL traerproductocod(:id)";
    $query = $this->db->prepare($sql);
    $parameters = array(':id' => $id);
    $query->execute($parameters);
    return $query->fetch();
  }

  public function registrarCompra($idproveedor,$fecha,$totalCom,$comprador,$iva)
  {
    $sql="CALL registrarCompra(:idproveedor,:fecha,:totalCom,:comprador,:iva)";
    $query = $this->db->prepare($sql);
    $parameters=array(':fecha'=>$fecha,':totalCom'=>$totalCom, ':idproveedor'=>$idproveedor, ':comprador'=>$comprador, ':iva'=>$iva);
    $query->execute($parameters);
  }

  public function detalleCompra($cantidadlote,$preciolote,$lote,$fechalote,$idcompra,$idproducto)
  {
    $sql="CALL detalleCompra(:cantidadlote,:preciolote,:lote,:fechalote, :idcompra , :idproducto )";
    $query = $this->db->prepare($sql);
    $parameters=array(':cantidadlote'=>$cantidadlote,':preciolote'=>$preciolote, ':lote'=>$lote, ':fechalote'=>$fechalote, ':idcompra'=>$idcompra, ':idproducto'=>$idproducto);
    $query->execute($parameters);
  }

  public function consultarCompra (){
    $sql = "CALL consultarCompra";
    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetch();

  }

  public function consultarStock ($idproducto){

    $sql = "CALL consultarStock(:idproducto)";
    $query = $this->db->prepare($sql);
    $parameters = array(':idproducto' => $idproducto);
    $query->execute($parameters);
    return $query->fetch();

  }



  public function actualizarExistencias($idproducto,$cantidad)
  {
    $sql = "UPDATE producto SET stock = :cantidad WHERE id = :idp";
    $query = $this->db->prepare($sql);
    $parameters = array(':cantidad' => $cantidad, ':idp' => $idproducto);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

    $query->execute($parameters);


  }

  public function listarCompra()
  {
    $sql="CALL listarCompra";
    $query=$this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function listarCompraproveedor($id)
  {
    $sql = "SELECT c.idcompra,pro.nombre FROM compra c JOIN proveedor pro ON c.idproveedor=pro.idproveedor WHERE c.idcompra = :id";
    $query = $this->db->prepare($sql);
    $parameters=array(':id'=>$id);
    $query->execute($parameters);
    return $query->fetchAll();
  }

  public function listarCompranit($id)
  {
    $sql = "SELECT c.idcompra,pro.nit FROM compra c JOIN proveedor pro ON c.idproveedor=pro.idproveedor  WHERE c.idcompra = :id";
    $query = $this->db->prepare($sql);
    $parameters=array(':id'=>$id);
    $query->execute($parameters);
    return $query->fetchAll();
  }

  public function listarComprafecha($id)
  {
    $sql = "SELECT c.idcompra,c.fecha FROM compra c WHERE c.idcompra = :id";
    $query = $this->db->prepare($sql);
    $parameters=array(':id'=>$id);
    $query->execute($parameters);
    return $query->fetchAll();
  }

  public function listarCompratotal($id)
  {
    $sql = "SELECT c.idcompra,c.preciocompra FROM compra c WHERE c.idcompra = :id";
    $query = $this->db->prepare($sql);
    $parameters=array(':id'=>$id);
    $query->execute($parameters);
    return $query->fetchAll();
  }

  public function listarCompraproductos($id)
  {
    $sql = "SELECT c.idcompra,p.nombre,p.precio,de.cantidadlote FROM compra c JOIN proveedor pro ON c.idproveedor=pro.idproveedor JOIN detallecompra de ON
    de.idcompra=c.idcompra JOIN producto p ON de.idproducto=p.id WHERE c.idcompra = :id";
    $query = $this->db->prepare($sql);
    $parameters=array(':id'=>$id);
    $query->execute($parameters);
    return $query->fetchAll();
  }

  public function listarComprador($id)
  {
    $sql = "SELECT c.idcompra,c.comprador FROM compra c WHERE c.idcompra = :id";
    $query = $this->db->prepare($sql);
    $parameters=array(':id'=>$id);
    $query->execute($parameters);
    return $query->fetchAll();
  }

  public function listarCompraiva($id)
  {
    $sql = "SELECT c.idcompra,c.iva FROM compra c WHERE c.idcompra = :id";
    $query = $this->db->prepare($sql);
    $parameters=array(':id'=>$id);
    $query->execute($parameters);
    return $query->fetchAll();
  }

  public function listarComprasubtotal($id)
  {
    $sql = "SELECT c.idcompra,de.cantidadlote,de.preciolote,de.preciolote*de.cantidadlote as sub FROM compra c JOIN detallecompra de ON de.idcompra=c.idcompra WHERE c.idcompra = :id";
    $query = $this->db->prepare($sql);
    $parameters=array(':id'=>$id);
    $query->execute($parameters);
    return $query->fetchAll();
  }

  public function contarCompras()
  {
    $sql="CALL contarCompras";
    $query=$this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }








}