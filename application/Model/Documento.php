<?php 
namespace Mini\Model;
use Mini\Core\Model;

class Documento extends Model
{
	public function registraDocumento($nombre)
	{
		$sql="CALL registraDocumento(:nombre)";
		$query=$this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre);
		$query->execute($parameters);
	}

	public function listarDocumento()
	{
		$sql="SELECT * FROM tipodocumento";
		$query=$this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function mostrarDocumento($id){
		$sql = "SELECT id,nombre FROM tipodocumento WHERE id=:id";
		$query = $this->db->prepare($sql);
		$parameters = array(':id' => $id);

		$query->execute($parameters);
		return $query->fetch();
	}

	public function modificaDocumento($nombre,$id)
	{
		$sql="UPDATE tipodocumento SET nombre=:nombre WHERE id=:id";
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