<!-- page content -->

<div class="right_col" role="main">
 <br />
 

 <div class="row">

  <div class="row top_tiles">
    <a href="<?php echo URL ?>producto/index"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="glyphicon glyphicon-scissors"></i></div>
        <div class="count"><?php foreach ($cantProductos as $key) echo $key->conteo; ?>
        </div>
        <h3>Productos</h3>
        <p>(Productos en inventario)</p>
      </div>
    </div></a>
    <a href="<?php echo URL; ?>venta/index2">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="glyphicon glyphicon-ok"></i></div>
          <div class="count"><?php foreach($ventass as $v) echo $v->conteo; ?></div>
          <h3>Ventas</h3>
          <p>(Ventas realizadas con exito!)</p>
        </div>
      </div>
    </a>

    <a href="<?php echo URL; ?>cliente/index"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
        <div class="count"><?php foreach($clientes as $c) echo $c->conteo; ?></div>
        <h3>Clientes</h3>
        <p>(Clientes registrados)</p>
      </div>
    </div></a>  
    <?php if (isset($_SESSION["Administrador"]) == 1) {  ?>
    <a href="<?php echo URL; ?>compra/listado"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-check-square-o"></i></div>
        <div class="count"><?php foreach ($compra as $com) echo $com->contar; ?>
        </div>
        <h3>Compras</h3>
        <p>(Compras realizadas con exito!)</p>
      </div>
    </div></a>
    <?php }else{ ?> 
    <a href="<?php echo URL; ?>agenda/index"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-check-square-o"></i></div>
        <div class="count"><?php foreach ($agenda as $com) echo $com->con; ?>
        </div>
        <h3>Citas</h3>
        <p>(Citas registradas!)</p>
      </div>
    </div></a>
    <?php } ?>

  </div>
  
</div>


<div class="col-md-8 col-sm-8 col-xs-12">


  <br>
  <br>
  <br>
  <div class="row ml-3">
    <center>
      <!-- <img src="../public/images/r3.png" height="40%" width="40%"> -->
      <!-- <h2>Pribor</h2> -->
    </center>
  </div>
  <div class="row">

    <h1></h1>


    <!-- Start to do list -->
    
    <!-- End to do list -->
    
    <!-- start of weather widget -->

    <!-- end of weather widget -->
  </div>
</div>
</div>
<!-- /page content -->
<?php 
if (isset($_SESSION['MSJ'])) {
  echo $_SESSION['MSJ'];
  unset($_SESSION['MSJ']);
}

if (isset($_SESSION['MSJV'])) {
  echo $_SESSION['MSJV'];
  unset($_SESSION['MSJV']);
}

?>