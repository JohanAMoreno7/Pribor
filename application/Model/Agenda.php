<?php 
namespace Mini\Model;
use Mini\Core\Model;

class Agenda extends Model{
	private $id;
	private $title;
	private $descripcion;
	private $fecha;
  private $inicio;
  private $final;

  public function ListarEventos()
  {
    $sql = "CALL MostrarEventos";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }

  public function guardarEventos($title,$descripcion,$fechainicio,$fechafin,$horainicio,$horafin,$color,$idcliente,$idservicio){
   $sql = "CALL insertarEvento(:title, :descripcion, :fechainicio, :fechafin, :inicio, :fin, :color, :idcliente, :idservicio)";
   $query = $this->db->prepare($sql);
   $parameters = array(':title' => $title, ':descripcion' => $descripcion, ':fechainicio' => $fechainicio, ':fechafin' => $fechafin, ':inicio' => 
    $horainicio, ':fin' => $horafin, ':color' => $color, ':idcliente' => $idcliente, ':idservicio' => $idservicio);
   $query->execute($parameters);

 }

 public function borraEvento($id){



  $sql = "CALL borraEvento(:id)";
  $query = $this->db->prepare($sql);
  $parameters = array(':id' => $id);
  $query->execute($parameters);

}

public function countagenda()
{
  $sql="SELECT count(id) as con FROM eventos";
  $query=$this->db->prepare($sql);
  $query->execute();

  return $query->fetchAll();
}


}
?>
