<?php 
namespace Mini\Model;
use Mini\Core\Model;

class Login extends Model{
	

	public function validar($email,$pass){
		session_start();
		$sql = "SELECT * FROM login WHERE email='$email'";
		$query = $this->db->prepare($sql);
		$query->execute();
		$row = $query->fetch(\PDO::FETCH_ASSOC); 
		if($row["email"] == $email && $row["pasadmin"] == $pass){
			/*$_SESSION["Usuario"] = $row["id"];
			$_SESSION['id']=$row['id'];
			$_SESSION['user']=$row['user'];
			$_SESSION['rol']=$row['rol'];*/

			if ($row["rol"] == 1) {
				$_SESSION["Administrador"] = $row["rol"];
				$_SESSION["admin"] = $row["user"];
				$_SESSION['MSJ'] = '<script>alertify.success("BIENVENIDO ADMINISTRADOR")</script> ';
				header ('location: '. URL . 'home/index');
			}else if ($row["rol"] == 2) {
				$_SESSION["Vendedor"] = $row["id"];
				$_SESSION["vende"] = $row["user"];
				$_SESSION['MSJV'] = '<script>alertify.success("BIENVENIDO Vendedor")</script> ';
				header ('location: '. URL . 'home/index');
			}
		}
		else{
			
			$_SESSION['rr'] = '<script>alertify.error("Usuario o contraseña incorrectos")</script> ';

			header ('location: '. URL . 'login/index');
		}

	}
	public function Correo($correo){
		$sql = "CALL Correo(:correo)";
		$query = $this->db->prepare($sql);
		$parameters = array(':correo' => $correo);
		$query->execute($parameters);
		return $query->fetch();

	}
}
?>