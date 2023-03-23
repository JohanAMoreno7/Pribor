<?php 
namespace Mini\Model;
use Mini\Core\Model;


class Presentacion extends Model
{
	public function registraPresentacion($nombre)
	{
		$sql="CALL registraPresentacion(:nombre)";
		$query=$this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre);
		
		session_start();	
		if ($query->execute($parameters)) {
			$_SESSION['presentacioMen'] = "<script type='text/javascript'>alertify.success('Registro exitoso')</script>";
		}else
		{
			$_SESSION['presentacioMen'] = "<script type='text/javascript'>alertify.error('Error al registrar')</script>";
		}
	}

	public function listarPresentacion()
	{
		$sql="CALL listarPresentacion";
		$query=$this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function traerPresentacion($id)
	{
		$sql="CALL traerPresentacion(:id)";
		$query = $this->db->prepare($sql);
		$parameters = array(':id' => $id);
		$query->execute($parameters);
		return $query->fetch();
	}

	public function modificaPresentacion($nombre,$id)
	{
		$sql="CALL modificaPresentacion(:nombre,:id)";
		$query=$this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre,':id'=>$id);
		
		session_start();	
		if ($query->execute($parameters)) {
			$_SESSION['presentacionEMen'] = "<script type='text/javascript'>alertify.success('Registro modificado con exito')</script>";
		}else
		{
			$_SESSION['presentacionEMen'] = "<script type='text/javascript'>alertify.error('Error al modificar')</script>";
		}
	}
}


?>