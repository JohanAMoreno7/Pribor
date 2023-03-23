<?php 
namespace Mini\Model;
use Mini\Core\Model;


class Producto extends Model
{
	public function registraProducto($nombre,$marca,$presentacion,$categoria,$medida,$umedida,$especie,$precio,$codigo)
	{
		$sql="CALL registraProducto(:nombre,:marca,:presentacion,:categoria,:medida,:umedida,:especie,:precio,:codigo)";
		$query = $this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre,':marca'=>$marca,':presentacion'=>$presentacion,':categoria'=>$categoria,':medida'=>$medida,'umedida'=>$umedida,':especie'=>$especie,':precio'=>$precio, ':codigo'=>$codigo);
		
		session_start();
		if ($query->execute($parameters)) {
			$_SESSION['messProducto'] = "<script type='text/javascript'>alertify.success('Registro agregado')</script>";
		}else
		{
			$_SESSION['messProducto'] = "<script type='text/javascript'>alertify.error('Error al registrar')</script>";
		}
	}

	public function listarProducto()
	{
		$sql="CALL listarProducto";
		$query=$this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function productoActivo()
	{
		$sql="CALL productosActivo";
		$query=$this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}

	public function productoInactivo()
	{
		$sql="CALL productosInactivo";
		$query=$this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}

	public function mostrarProducto($id)
	{
		$sql=" CALL mostrarProducto(:id)";
		$query=$this->db->prepare($sql);
		$parameters=array(':id'=>$id);
		$query->execute($parameters);

		return $query->fetch();
	}

	public function mostrarProductocodi($id)
	{
		$sql=" CALL mostrarProductoc(:id)";
		$query=$this->db->prepare($sql);
		$parameters=array(':id'=>$id);
		$query->execute($parameters);

		return $query->fetch();
	}

	public function modificaProducto($nombre,$marca,$presentacion,$categoria,$medida,$umedida,$estado,$especie,$id,$precio,$codigo)
	{
		$sql = "CALL modificaProducto(:nombre,:marca,:presentacion,:categoria,:medida,:umedida,:estado,:especie,:id,:precio,:codigo)";
		$query = $this->db->prepare($sql);
		$parameters = array(':nombre'=>$nombre, ':marca'=>$marca, ':presentacion'=>$presentacion, ':categoria'=>$categoria, ':medida'=>$medida, ':umedida'=>$umedida, ':estado'=>$estado,':especie'=>$especie, ':id'=>$id,':precio'=>$precio, ':codigo'=>$codigo);
		
		session_start();

		if ($query->execute($parameters)) {
			$_SESSION['messProductoE'] = "<script type='text/javascript'>alertify.success('Registro modificado')</script>";
		}else
		{
			$_SESSION['messProductoE'] = "<script type='text/javascript'>alertify.error('Error al modificar')</script>";
		}
	}

	public function contarproductos()
	{
		$sql="CALL contarproductos";
		$query=$this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function validarCodigo($codigo)
	{
		$sql="CALL validarCodigo(:codigo)";
		$query=$this->db->prepare($sql);
		$parameters=array(':codigo'=>$codigo);
		$query->execute($parameters);

		return $query->fetch();
	}
}


?>