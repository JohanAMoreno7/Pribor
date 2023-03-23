<?php 
namespace Mini\Model;
use Mini\Core\Model;

class Raza extends Model
{
	public function registraRaza($nombre)
	{
		$sql="CALL registraRaza(:nombre)";
		$query=$this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre);
		$query->execute($parameters);
	}

	public function listarRaza()
	{
		$sql="CALL listarRaza";
		$query=$this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function mostrarRaza($id){
		$sql = "CALL mostrarRaza(:id)";
		$query = $this->db->prepare($sql);
		$parameters = array(':id' => $id);

		$query->execute($parameters);
		return $query->fetch();
	}

	public function modificarRaza($nombre,$id)
	{
		$sql="CALL modificarRaza(:nombre,:id)";
		$query=$this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre, ':id'=>$id);
		
		session_start();	
		if ($query->execute($parameters)) {
			$_SESSION['razaMen'] = "<script type='text/javascript'>alertify.success('Registro modificado con exitoso')</script>";
		}else
		{
			$_SESSION['razaEMen'] = "<script type='text/javascript'>alertify.error('Error al modificar')</script>";
		}
	}
	
}


?>