<?php 
namespace Mini\Model;
use Mini\Core\Model;

class Usuarios extends Model{
  

  public function ListarUsuarios(){


   $sql = "SELECT id , user, email FROM login  ";
   $query = $this->db->prepare($sql);
   $query->execute();
   return $query->fetchAll();



 }

 public function ListarIva(){


   $sql = "SELECT id , iva FROM iva  ";
   $query = $this->db->prepare($sql);
   $query->execute();

   return $query->fetchAll();



 }


 public function registraUsuario($user,$email,$pasadmin)
 {
  
  $sql="INSERT INTO login (user,email,pasadmin,rol) VALUES(:user, :email , :pasadmin , 2)";
  $query=$this->db->prepare($sql);
  $parameters=array(':user'=>$user, ':email'=>$email , ':pasadmin'=>$pasadmin );
  
  
  session_start();
  if ($query->execute($parameters)) {
    $_SESSION['Usermelo'] = "<script type='text/javascript'>alertify.success('Registro agregado')</script>";
  }else
  {
    $_SESSION['Usermelo'] = "<script type='text/javascript'>alertify.error('Error en el registro')</script>";
  }

}

public function mostrarUsuario($id){

  $sql = "SELECT id, user, email, pasadmin, rol FROM login WHERE id = :id LIMIT 1";
  $query = $this->db->prepare($sql);
  $parameters = array(':id' => $id);



  $query->execute($parameters);


  return $query->fetch();



}

public function buscarIva($id){

  $sql = "SELECT id ,iva FROM iva WHERE id = :id LIMIT 1";
  $query = $this->db->prepare($sql);
  $parameters = array(':id' => $id);



  $query->execute($parameters);


  return $query->fetch();



}

public function modificarUsuario($emailq,$nombre,$id)
{
  session_start();

  $sql = "UPDATE login SET  email = :email, user = :user  WHERE id = :id";
  $query = $this->db->prepare($sql);
  $parameters = array(':email' => $emailq, ':user' => $nombre, ':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

  if ($query->execute($parameters)) {
    $_SESSION['userRes'] = "<script type='text/javascript'>alertify.success('Registro actualizado')</script>";
  }else
  {
    $_SESSION['userRes'] = "<script type='text/javascript'>alertify.error('Error al modificar')</script>";






  }
}

public function modificaIva($ivass,$id)
{

  session_start();

  $sql = "UPDATE iva SET  iva = :ivass  WHERE id = :id";
  $query = $this->db->prepare($sql);
  $parameters = array(':ivass' => $ivass,  ':id' => $id);

                                   
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

  if ($query->execute($parameters)) {
    $_SESSION['ivas'] = "<script type='text/javascript'>alertify.success('Registro actualizado')</script>";
  }else
  {
    $_SESSION['ivas'] = "<script type='text/javascript'>alertify.error('Error al modificar')</script>";






  }
}



}






?>