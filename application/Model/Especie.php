<?php 
namespace Mini\Model;
use Mini\Core\Model;

class Especie extends Model{

  public function guardarEspecie($nombre)
  {
    $sql = "CALL guardarEspecie(:nombre)";
    $query = $this->db->prepare($sql);
    $parameters = array(':nombre' => $nombre);

    $query->execute($parameters);
}



public function listarEspecies()
{
    $sql = "CALL listarEspecies";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}


public function mostrarEspecie($idEspecie){
    $sql = "CALL mostrarEspecie(:idEspecie)";
    $query = $this->db->prepare($sql);
    $parameters = array(':idEspecie' => $idEspecie);

    $query->execute($parameters);
    return $query->fetch();
}

public function actualizarEspecie($nombre,$idEspecie)
{
    $sql = "CALL actualizarEspecie(:nombre,:idEspecie)";
    $query = $this->db->prepare($sql);
    $parameters = array(':nombre' => $nombre, ':idEspecie' => $idEspecie);
    $query->execute($parameters);
}






}

?>