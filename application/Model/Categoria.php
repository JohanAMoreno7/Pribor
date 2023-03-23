<?php 
namespace Mini\Model;
use Mini\Core\Model;


class Categoria extends Model
{
	public function registrarCategoria($nombre)
	{
		$sql="CALL registrarCategoria(:nombre)";
		$query=$this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre);
		
		session_start();	
		if ($query->execute($parameters)) {
			$_SESSION['categoriaMen'] = "<script type='text/javascript'>alertify.success('Registro exitoso')</script>";
		}else
		{
			$_SESSION['categoriaMen'] = "<script type='text/javascript'>alertify.error('Error al registrar')</script>";
		}
	}

	public function listarCategorias()
	{
		$sql="CALL listarCategorias";
		$query=$this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}


	public function mostrarCategorias($idCategoria)
	{
		$sql="CALL mostrarCategorias(:idCategoria)";
		$query=$this->db->prepare($sql);
		$parameters=array(':idCategoria'=>$idCategoria);
		$query->execute($parameters);

		return $query->fetch();
	}


	public function modificarCategoria($nombre,$id)
	{
		$sql="CALL modificarCategoria(:nombre,:id)";
		$query=$this->db->prepare($sql);
		$parameters=array(':nombre'=>$nombre, ':id'=>$id);
		
		session_start();	
		if ($query->execute($parameters)) {
			$_SESSION['categoriaEMen'] = "<script type='text/javascript'>alertify.success('Registro modificado con exitoso')</script>";
		}else
		{
			$_SESSION['categoriaEMen'] = "<script type='text/javascript'>alertify.error('Error al modificar')</script>";
		}
	}
}


?>