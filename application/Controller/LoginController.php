<?php 
namespace Mini\Controller;
use Mini\Model\Login;


class LoginController{

  public function index(){

    session_start();
    include APP.'view/_templates/headerL.php';
    include APP.'view/login/index.php';
    include APP.'view/_templates/footerL.php';

  }

  public function recuperarContrasena()
  {
    session_start();
    //include APP.'view/_templates/headerL.php';
    include APP.'view/login/recuperar2.php';
    include APP.'view/_templates/footerL.php';
  }

  public function cerrar()
  {
    if (isset($_POST['cerrar'])) {
      session_start();
      session_destroy(); 
      header ('location: '. URL . 'login/index');
    }
    
  }

  public function validar(){

    if (isset($_POST['submit'])) {
      $Login = new Login();
      $Login = $Login->validar($_POST['mail'],$_POST['pasadmin']);

    }
    
  }
  public function SendMessage(){ 
    session_start();
    $user = new Login();
    $u = $user->Correo($_POST['email']);
    //var_dump($u);
    //echo $u->pasadmin;
                   
      if($u==true){
        $Asunto = 'Restablecimiento de contraseña';
        $link = "";
        $Asunto = utf8_decode($Asunto);
        $cuerpo = '
        <!DOCTYPE html>
        <html>
        <head>
        <title></title>
        </head>
        <body>
        <center>
        <div>
        <div style="margin-top:-2em; height:45px;  background-color:#006b7c;color: #fff;"><h1>Restablecimiento</h1></div>
        <div style="text-transform: uppercase; text-align: center;text-align: center;background-color: #fff;">              
        <div><p style="margin-top: 2em;">'.utf8_decode("Contraseña actual de la cuenta").'</p>
          '.$u->pasadmin.'

          <p style="margin-top: 2em;">'.utf8_decode("Recuerde cambiar su contraseña").'</p>
        </div>
        </div>
        </div>
        </center>
        </body>
        </html>';
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";                          
        $headers .= "From: ".$_POST['email']."\r\n";
        if(mail($_POST['email'],$Asunto,$cuerpo,$headers)){
             $_SESSION['codigoCorreo'] = $_POST['codigo'];      
                   header('location:'.URL.'login/index');

          }else{
            echo "<script>alert.error('No es posible mandar el correo por favor vuelva a intentarlo');</script>";
        } 
               
    } elseif ($u==false){
      header('location:'.URL.'login/index');
      $_SESSION['errorCorreo'] = "<script>alertify.error('Digite un correo valido');</script>";

    }       
    }    

}