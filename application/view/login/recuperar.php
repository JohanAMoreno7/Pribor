 <style type="text/css">
   body{
    background: none;
   }
 </style>
 <div class="login_wrapper">
  <div class="animate form login_form">
    <section class="login_content" style="background:radial-gradient(center center, circle, black, #1162ac); padding: 0.5%;">
      <form>
        <h4>Recuperar contraseña</h4>
        <div>
          <input type="text" class="form-control" placeholder="Username" required="" />
        </div>
        <div>
          <input type="password" class="form-control" placeholder="Password" required="" />
        </div>
        <div>
          <a class="btn btn-default submit" href="index.html">Log in</a>
          <a class="reset_pass" href="#">Lost your password?</a>
        </div>

        <div class="clearfix"></div>

        <div class="separator">
          <p class="change_link">New to site?
            <a href="#signup" class="to_register"> Create Account </a>
          </p>

          <div class="clearfix"></div>
          <br />

          <div>
            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
          </div>
        </div>
      </form>
    </section>
  </div>
</div>
<?php if (isset($_SESSION['codigoCorreo'])) {
  echo $_SESSION['codigoCorreo'];  
} ?>


