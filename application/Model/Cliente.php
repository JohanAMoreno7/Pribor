<?php 
namespace Mini\Model;
use Mini\Core\Model;

class Cliente extends Model{
	private $id;
    private $documento;
    private $nombre;
    private $apellido;
    private $telefono;
    private $estado;


    public function guardaCliente($tipoD,$documento,$nombre, $apellido, $telefono)
    {
        session_start();
        $sql="CALL registrarCliente(:documento,:nombre,:apellido,:telefono,:tipoD)";
        $query = $this->db->prepare($sql);
        $parameters=array(':documento'=>$documento,':nombre'=>$nombre, ':apellido'=>$apellido, ':telefono'=>$telefono,':tipoD'=>$tipoD);

        if ($query->execute($parameters)) {
            $_SESSION['messCliente'] = "<script type='text/javascript'>alertify.success('Registro agregado')</script>";
        }else
        {
            $_SESSION['messCliente'] = "<script type='text/javascript'>alertify.error('Error al registrar')</script>";
        }
        
    }


/*    public function borrarCliente($id){
        $sql = "DELETE FROM cliente WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
    }
    */

    public function listarClientes()
    {
        $sql = "CALL listarClientes";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function clienteActivo()
    {
        $sql = "CALL clienteActivo";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function clienteInactivo()
    {
        $sql = "CALL clienteInactivo";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function mostrarCliente($idCliente){
        $sql = "CALL mostrarCliente(:idCliente)";
        $query = $this->db->prepare($sql);
        $parameters = array(':idCliente' => $idCliente);
        $query->execute($parameters);
        return $query->fetch();
    }


    public function actualizarCliente($tipoDocumento,$nombre, $apellido, $telefono, $idCliente,$estado,$documento)
    {
        session_start();
        $sql = "CALL actualizarCliente(:documento,:nombre,:apellido,:telefono,:estado,:tipoDocumento,:idCliente)";
        $query = $this->db->prepare($sql);
        $parameters = array(':documento' => $documento,':nombre' => $nombre, ':apellido' => $apellido, ':telefono' => $telefono, ':estado' => $estado,':tipoDocumento'=>$tipoDocumento, ':idCliente' => $idCliente);

        
        if ($query->execute($parameters)) {
            $_SESSION['messClienteE'] = "<script type='text/javascript'>alertify.success('Registro modificado')</script>";
        }else
        {
            $_SESSION['messClienteE'] = "<script type='text/javascript'>alertify.error('Error al modificar')</script>";
        }
    }


    public function validarDocumento($documento)
    {
        $sql="CALL validarDocumento(:documento)";
        $query=$this->db->prepare($sql);
        $parameters=array(':documento'=>$documento);
        $query->execute($parameters);

        return $query->fetch();
    }


    public function buscarCliente($cliente)
    {
        $sql="SELECT documento,nombre,apellido,telefono FROM cliente WHERE nombre=:cliente";
        $query=$this->db->prepare($sql);
        $parameters=array(':cliente'=>$cliente);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function contarClientes()
    {
        $sql="CALL contarClientes";
        $query=$this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

}

?>