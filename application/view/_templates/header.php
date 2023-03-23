<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Pribor</title>
  
  <!-- alertify -->
  <link rel="icon" href="<?= URL ?>img/r3.png" type="image/ico" />
  <script src="<?=  URL ?>vendors/alertify/alertify.js"></script>
  <!-- Bootstrap -->
  <link href="<?=  URL ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?=  URL ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?=  URL ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?=  URL ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?=  URL ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?=  URL ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="<?=  URL ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?=  URL ?>/build/css/custom.min.css" rel="stylesheet">
  <!-- alertify -->
  <link rel="stylesheet"  href="<?=  URL ?>vendors/alertify/css/themes/default.css">
  <link rel="stylesheet"  href="<?=  URL ?>vendors/alertify/css/alertify.css">
  <link rel="stylesheet"  href="<?=  URL ?>/vendors/calendario/css/fullcalendar.min.css">
  <!-- mi Css -->
  <link rel="stylesheet" type="text/css" href="<?=  URL ?>vendors/miCss/misEstilos.css">

   <link rel="stylesheet" type="text/css" href="<?=  URL ?>vendors/clockpicker/dist/bootstrap-clockpicker.min.css">
   
</head>




<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?= URL ?>home/index" class="site_title"><i class="fa fa-paw"></i> <span>  Pribor</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <br>
              
              <img src="<?= URL ?>img/rr.png"  class="img-thumbnail profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido a Mascotas Apolo</span>
              
            </div>
          </div>
          <!-- /menu profile quick info -->
          <br />
          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="<?= URL ?>home/index"><i class="fa fa-home"></i> Inicio </a>

                </li>

                <?php if (isset($_SESSION["Administrador"]) == 1) { ?>
                <li><a><i class="fa fa-cart-plus "></i> Compras <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo URL; ?>proveedor/index">Proveedor</a></li>
                    <li><a href="<?php echo URL; ?>Compra/listado">Compra</a></li>
                  </ul>
                </li>
                <?php } ?>
                <?php if (isset($_SESSION["Administrador"]) == 1) { ?>
                <li><a><i class="fa fa-desktop"></i> Existencias <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    
                      <li><a>Configuración<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                    <li><a href="<?php echo URL ?>marca/index">Marca</a></li>
                    <li><a href="<?php echo URL ?>categoria/index">Categoría</a></li>
                    <li><a href="<?php echo URL ?>presentacion/index">Presentación</a></li>
                    <li><a href="<?php echo URL ?>Umedida/index">Unidad de medida</a></li>
                    <li><a href="<?php echo URL ?>especie/index">Especie</a></li>
                    
                    </ul>
                    </li>
                    <li><a href="<?php echo URL ?>producto/index">Producto</a></li>
                  </ul>
                </li>
                <?php } ?>
                <?php if (isset($_SESSION["Vendedor"]) == 2) { ?>
                <li><a href="<?php echo URL ?>producto/index"><i class="fa fa-area-chart"></i>Producto</a></li>
                <?php } ?>
                <li><a><i class="fa fa-table"></i> Ventas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo URL; ?>cliente/index">Cliente</a>
                        <li><a>Servicio<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="<?php echo URL; ?>tarifa/index">Tarifa</a>
                            </li>
                            
                            <li><a href="<?php echo URL; ?>raza/index">Raza</a>
                            </li>
                            <li><a href="<?php echo URL; ?>servicio/detalle">Detalle</a>
                            <li><a href="<?php echo URL; ?>servicio/index">Servicios</a>
                            </li>
                            </li>
                          </ul>
                        </li>
                        <li><a href="<?php echo URL; ?>venta/index2">Venta</a>
                        </li>
                    </ul>
                  </li> 
                <li><a href="<?php echo URL; ?>agenda/index"><i class="fa fa-calendar-plus-o"></i> Agenda</a>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">

            <a data-toggle="tooltip" data-placement="top" title="Cerrar sesión" href="<?php echo URL; ?>login/index">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Mapa de navegación" href="<?php echo URL; ?>home/mapa">
              <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Ayuda en linea" href="<?php echo URL; ?>home/ayuda">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </a>

          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 <i class="fa fa-user fa-fw"></i><?php if (isset($_SESSION["admin"])) {
                   echo $_SESSION["admin"];
                 }elseif (isset($_SESSION["vende"])) {
                   echo $_SESSION["vende"];
                 } ?>
                 <span class=" fa fa-angle-down"></span>
               </a>
               <ul class="dropdown-menu dropdown-usermenu pull-right">
                <?php if (isset($_SESSION["Administrador"]) == 1) { ?>
                <li><a href="<?php echo URL; ?>usuarios/index"> Control de usuarios</a></li>
                <?php } ?>
                <form method="POST" action="<?php echo URL; ?>login/cerrar">
                  <button type="submit" name="cerrar"><li><a><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a></li></button>
                </form>
              </ul>            </li>

              <!-- li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">1</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        
                        <span>
                          <span>Ey PABLO</span>
                          <span class="time">3 seg ago</span>
                        </span>
                        <span class="message">
                          Papi se le acabo las galletas
                        </span>
                      </a>
                    </li>
                    
                    
                  </ul>
                </li> -->


            </ul>
          </nav>
        </div>
      </div>
      <!-- /+-++++++++--p navigation -->

      <?php 

      ?>