<?php 
namespace Mini\Model;
use Mini\Core\Model;


class Tarifa extends Model
{
	public function registraTarifa($precio,$fecha)
	{
		$sql="CALL registraTarifa(:precio,:fecha)";
		$query=$this->db->prepare($sql);
		$parameters=array(':precio'=>$precio, ':fecha'=>$fecha);
		
		if ($query->execute($parameters)) {
			$_SESSION['messTarifa'] = "<script type='text/javascript'>alertify.success('Registro agregado')</script>";
		}else
		{
			$_SESSION['messTarifa'] = "<script type='text/javascript'>alertify.error('Error al registrar')</script>";
		}
	}

	public function listarTarifas()
	{
		$sql="CALL listarTarifas";
		$query=$this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function mostrarTarifa($id)
	{
		$sql = "CALL mostrarTarifa(:id)";
		$query = $this->db->prepare($sql);
		$parameters = array(':id' => $id);
		$query->execute($parameters);
		return $query->fetch();
	}

	public function modificaTarifa($precio,$id)
	{
		$sql="UPDATE tarifa SET valor=:precio WHERE idTarifa=:id";
		$query=$this->db->prepare($sql);
		$parameters=array(':precio'=>$precio, ':id'=>$id);
		
		if ($query->execute($parameters)) {
			$_SESSION['messTarifaE'] = "<script type='text/javascript'>alertify.success('Registro modificado')</script>";
		}else
		{
			$_SESSION['messTarifaE'] = "<script type='text/javascript'>alertify.error('Error al modificar')</script>";
		}
	}
}



?>