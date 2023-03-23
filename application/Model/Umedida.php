<?php 
namespace Mini\Model;
use Mini\Core\Model;


class Umedida extends Model
{
	public function registraUmedida($nombre)
	{
		$sql="CALL registraUmedida(:nombre)";
		$query = $this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre);
		$query->execute($parameters);
	}


	public function listarUmedida()
	{
		$sql="CALL listarUmedida";
		$query=$this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function mostrarUmedida($id)
	{
		$sql = "CALL mostrarUmedida(:id)";
		$query = $this->db->prepare($sql);
		$parameters = array(':id' => $id);
		$query->execute($parameters);
		return $query->fetch();
	}

	public function modificaMedida($nombre,$id)
	{
		$sql="CALL modificaMedida(:nombre,:id) ";
		$query=$this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre, ':id'=>$id);
		$query->execute($parameters);
	}
}



 ?>