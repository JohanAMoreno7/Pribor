<?php 
namespace Mini\Model;
use Mini\Core\Model;


class Marca extends Model
{
	public function insertarMarca($nombre)
	{
		$sql="CALL registrarMarca(:nombre)";
		$query=$this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre);
		
		session_start();	
		if ($query->execute($parameters)) {
			$_SESSION['marcaMen'] = "<script type='text/javascript'>alertify.success('Registro exitoso')</script>";
		}else
		{
			$_SESSION['marcaMen'] = "<script type='text/javascript'>alertify.error('Error al registrar')</script>";
		}
	}


	public function listarMarcas()
	{
		$sql="CALL listarMarcas";
		$query=$this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();

	}

	public function mostrarMarca($id)
	{
		$sql = "CALL mostrarMarca(:id)";
		$query = $this->db->prepare($sql);
		$parameters = array(':id' => $id);
		$query->execute($parameters);
		return $query->fetch();
	}

	public function modificarMarca($nombre,$id)
	{
		$sql="CALL modificarMarca(:nombre,:id)";
		$query=$this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre, ':id'=>$id);
		
		session_start();	
		if ($query->execute($parameters)) {
			$_SESSION['marcaEMen'] = "<script type='text/javascript'>alertify.success('Registro modificado con exitoso')</script>";
		}else
		{
			$_SESSION['marcaEMen'] = "<script type='text/javascript'>alertify.error('Error al modificar')</script>";
		}
	}
}


?>