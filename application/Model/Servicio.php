<?php 
namespace Mini\Model;
use Mini\Core\Model;

class Servicio extends Model {

	public function guardarServicio($descripcion,$id){
		session_start();
		$sql = "CALL insertarServicio(:des,:id)";
		$query = $this->db->prepare($sql);
		$parameters = array(':des' => $descripcion,':id'=>$id);
		if ($query->execute($parameters)) {
			$_SESSION['menser'] = "<script type='text/javascript'>alertify.success('Se registro el servicio')</script>";
		}else
		{
			$_SESSION['menser'] = "<script type='text/javascript'>alertify.error('No se  registro el servicio')</script>";
		}

	}

	public function listarServicios(){
		$sql="SELECT s.id,s.descripcion,ra.nombre,t.valor as valor,s.estado FROM servicio s JOIN razatarifa r ON s.iddetalleraza=r.id JOIN tarifa t ON r.idtarifa=t.idTarifa JOIN raza ra ON r.idraza=ra.id";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();

	}

	public function listarServiciosActivos(){
		$sql="SELECT s.id,s.descripcion,ra.nombre,t.valor as valor,s.estado FROM servicio s JOIN razatarifa r ON s.iddetalleraza=r.id JOIN tarifa t ON r.idtarifa=t.idTarifa JOIN raza ra ON r.idraza=ra.id WHERE s.estado='activo'";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();

	}

	public function mostrarServicios($idServicio){
		$sql="SELECT id, descripcion,estado FROM servicio WHERE id = :idServicio LIMIT 1";
		$query = $this->db->prepare($sql);
		$parameters = array(':idServicio' => $idServicio);


		$query->execute($parameters);

		return $query->fetch();
	}	

	public function actualizarServicio($estado,$idServicio)
	{
		session_start();
		$sql = "UPDATE servicio SET estado = :estado WHERE id = :idServicio";
		$query = $this->db->prepare($sql);
		$parameters = array(':estado' => $estado, ':idServicio' => $idServicio);

    // useful for debugging: you can see the SQL behind above construction by using:
    // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

		if ($query->execute($parameters)) {
			$_SESSION['servicioEdit'] = "<script type='text/javascript'>alertify.success('Registro modificado con exito')</script>";
		}else
		{
			$_SESSION['servicioEdit'] = "<script type='text/javascript'>alertify.error('No se  registro el servicio')</script>";
		}
	}


	public function listarDetalle(){
		$sql="SELECT r.id, t.valor,ra.nombre FROM razatarifa r join tarifa t  on r.idtarifa=t.idTarifa
		join raza ra on ra.id=r.idraza ";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();

	}

	public function guardaDetalle($raza,$tarifa)
	{
		$sql="INSERT INTO razatarifa (idraza,idtarifa) VALUES(:raza,:tarifa)";
		$query=$this->db->prepare($sql);
		$parameters=array(':raza'=>$raza,':tarifa'=>$tarifa);
		$query->execute($parameters);
	}

	public function traeDetalle($id)
	{
		$sql="SELECT s.id,s.descripcion,ra.nombre,t.valor as valor,s.estado FROM servicio s JOIN razatarifa r ON s.iddetalleraza=r.id JOIN tarifa t ON r.idtarifa=t.idTarifa JOIN raza ra ON r.idraza=ra.id WHERE s.id=:id";
		$query = $this->db->prepare($sql);
		$parameters = array(':id' => $id);
		$query->execute($parameters);

		return $query->fetch();
	}


}


?>