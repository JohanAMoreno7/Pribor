<div class="container">
        <center><img src="<?php echo URL; ?>/img/r3.png" width="200px" style="margin: 2em auto;" height="200px"></center>
        <div class="flat-form" >
            <ul class="tabs">
                <li>
                    <a href="#login" class="active">INICIAR SESIÓN</a>
                </li>
                
                <li>
                    <a href="#reset">RECUPERAR CUENTA</a>
                </li>
            </ul>
            <div id="login" class="form-action show">
                <center><h2>INICIO DE SESIÓN</h2>
                <p>
                 
                </p>
                <form method="POST" action="<?php echo URL; ?>Login/validar" autocomplete="off" onsubmit="return validarlogin()">
                    <ul>
                        <li>
                            <input type="text" name="mail" id="mail" placeholder="Correo electrónico" />
                        </li>
                        <li>
                            <input type="password" name="pasadmin" id="pasadmin" placeholder="Contraseña" />
                        </li>
                        <li>
                            
                        </li>
                    </ul>
                    <div class="footer"><button type="submit" class="btn btn-warning"  name="submit">Agregar</button></div>


                </form>
            </div>
        
            
            <div id="reset" class="form-action hide">          
                <form method="POST" action="<?php echo URL ?>Login/SendMessage">
                    <center><h3>RECUPERAR CONTRASEÑA</h3></center>
                    <br>
                    <ul>
                        <li>
                            <input type="text" name="email" placeholder="Correo electrónico" />                            
                        </li>
                        <li>
                            <input type="submit" name="SubmitRestorePassword" value="ENVIAR CORREO" class="button" />
                        </li>
                    </ul>
                </form>
            </div>
            
        </div>
    </div>

    <?php 
if (isset($_SESSION['rr'])) {
  echo $_SESSION['rr'];
  unset($_SESSION['rr']);
}

if (isset($_SESSION['errorCorreo'])) {
  echo $_SESSION['errorCorreo'];
  unset($_SESSION['errorCorreo']);
}



?>

