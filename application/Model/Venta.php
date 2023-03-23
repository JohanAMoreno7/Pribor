<?php 
namespace Mini\Model;
use Mini\Core\Model;


class Venta extends Model{

  public function registrarVenta($idcliente,$fecha,$total,$vendedor,$iva)
  {

    $sql="INSERT INTO venta (fecha,precioventa,idcliente,vendedor,iva) VALUES(:fecha,:total,:idcliente,:vendedor,:iva)";
    $query = $this->db->prepare($sql);
    $parameters=array(':fecha'=>$fecha,':total'=>$total, ':idcliente'=>$idcliente, ':vendedor'=>$vendedor, ':iva'=>$iva);
    $query->execute($parameters);

  }

  public function registrarVentaservicio($idcliente,$fecha,$total,$vendedor)
  {

    $sql="INSERT INTO ventaservicio (fecha,precioventa,idcliente,vendedor) VALUES(:fecha,:total,:idcliente,:vendedor)";
    $query = $this->db->prepare($sql);
    $parameters=array(':fecha'=>$fecha,':total'=>$total, ':idcliente'=>$idcliente, ':vendedor'=>$vendedor);
    $query->execute($parameters);

  }

  public function mostrarVentas()
  {
   $sql = "SELECT v.idventa,v.fecha,v.precioventa,v.idcliente,c.nombre from venta v JOIN cliente c ON v.idcliente=c.id  ";
   $query = $this->db->prepare($sql);
   $query->execute();
   return $query->fetchAll();
 }

 public function mostrarVentasservicio()
 {
  $sql = "SELECT v.idventa,v.fecha,v.precioventa,v.idcliente,c.nombre from ventaservicio v JOIN cliente c ON v.idcliente=c.id  ";
  $query = $this->db->prepare($sql);
  $query->execute();
  return $query->fetchAll();
}

public function consultarVenta ()
{
  $sql = "SELECT max(idventa) as id from venta";
  $query = $this->db->prepare($sql);
  $query->execute();
  return $query->fetch();

}

public function consultarVentaservicio ()
{
  $sql = "SELECT max(idventa) as id from ventaservicio";
  $query = $this->db->prepare($sql);
  $query->execute();
  return $query->fetch();

}

public function detalleVenta($cantidad,$idventa,$idproducto)
{
  $sql="INSERT INTO detalleventa (cantidad,idventa,idproducto) VALUES(:cantidad,:idventa, :idproducto)";
  $query = $this->db->prepare($sql);
  $parameters=array(':cantidad'=>$cantidad,':idventa'=>$idventa, ':idproducto'=>$idproducto);
  $query->execute($parameters);
}

public function consultarStock ($idproducto)
{

  $sql = "SELECT stock from producto where id = :idproducto";
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
  $query->execute($parameters);
}


public function detalleVentaservicio($servicio,$precio,$idventa)
{
  $sql="INSERT INTO detalleservicio(idservicio,precio,idventa) VALUES(:servicio,:precio, :idventa)";
  $query = $this->db->prepare($sql);
  $parameters=array(':servicio'=>$servicio,':precio'=>$precio, ':idventa'=>$idventa);
  $query->execute($parameters);
}

public function reporteVentasfecha($id)
{
  $sql = "SELECT v.idventa,v.fecha from venta v WHERE v.idventa = :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentastotal($id)
{
  $sql = "SELECT v.idventa,v.precioventa from venta v WHERE v.idventa = :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentascliente($id)
{
  $sql = "SELECT v.idventa,c.nombre,c.apellido from venta v JOIN cliente c ON v.idcliente=c.id WHERE v.idventa = :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentasid($id)
{
  $sql = "SELECT v.idventa,c.nombre,c.apellido from venta v JOIN cliente c ON v.idcliente=c.id WHERE v.idventa = :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentas($id)
{
  $sql = "SELECT v.idventa,p.nombre,p.precio,de.cantidad FROM venta v JOIN detalleventa de ON v.idventa=de.idventa JOIN producto p ON p.id=de.idproducto WHERE v.idventa= :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentasvendedor($id)
{
  $sql = "SELECT v.idventa,v.vendedor FROM venta v  WHERE v.idventa= :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentasiva($id)
{
  $sql = "SELECT v.idventa,v.iva FROM venta v  WHERE v.idventa= :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentassubtotal($id)
{
  $sql = "SELECT v.idventa,p.nombre,p.precio,de.cantidad,p.precio*de.cantidad as subtotal FROM venta v JOIN detalleventa de ON v.idventa=de.idventa JOIN producto p ON p.id=de.idproducto WHERE v.idventa= :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function countventa(){

  $sql = "SELECT count(idventa) as conteo from venta";
  $query = $this->db->prepare($sql);
  $query->execute();
  return $query->fetchAll();

}


//CONSULTAS DE VENTA DE SERVICIOS

public function reporteVentaservicio($id)
{
  $sql = "SELECT v.idventa,s.descripcion,t.valor FROM ventaservicio v JOIN detalleservicio d ON d.idventa=v.idventa JOIN servicio s ON d.idservicio=s.id JOIN razatarifa r ON s.iddetalleraza=r.id JOIN tarifa t ON t.idTarifa=r.idtarifa WHERE v.idventa = :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentasfechaservicio($id)
{
  $sql = "SELECT v.idventa,v.fecha from ventaservicio v WHERE v.idventa = :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentasclienteservicio($id)
{
  $sql = "SELECT v.idventa,c.nombre,c.apellido from ventaservicio v JOIN cliente c ON v.idcliente=c.id WHERE v.idventa = :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentasidservicio($id)
{
  $sql = "SELECT v.idventa,c.nombre,c.apellido from ventaservicio v JOIN cliente c ON v.idcliente=c.id WHERE v.idventa = :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentastotalservicio($id)
{
  $sql = "SELECT v.idventa,v.precioventa from ventaservicio v WHERE v.idventa = :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

public function reporteVentasvendedorservicio($id)
{
  $sql = "SELECT v.idventa,v.vendedor ven FROM ventaservicio v  WHERE v.idventa= :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

// public function reporteVentasivaservicio($id)
// {
//   $sql = "SELECT v.idventa,v.iva FROM ventaservicio v  WHERE v.idventa= :id";
//   $query = $this->db->prepare($sql);
//   $parameters=array(':id'=>$id);
//   $query->execute($parameters);
//   return $query->fetchAll();
// }

public function reporteVentassubtotalservicio($id)
{
  $sql = "SELECT v.idventa,s.descripcion,t.valor FROM ventaservicio v JOIN detalleservicio d ON d.idventa=v.idventa JOIN servicio s ON d.idservicio=s.id JOIN razatarifa r ON s.iddetalleraza=r.id JOIN tarifa t ON t.idTarifa=r.idtarifa WHERE v.idventa = :id";
  $query = $this->db->prepare($sql);
  $parameters=array(':id'=>$id);
  $query->execute($parameters);
  return $query->fetchAll();
}

}
?>
