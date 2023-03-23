
<!-- footer content -->
<footer>
	<div class="pull-right">
		Pribor
	</div>
	<div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>


<script>
	var uri = "<?php echo URL; ?>"
</script>

<!-- jQuery -->

<script src="<?=  URL ?>/vendors/calendario/js/jquery.min.js"></script>
<script src="<?=  URL ?>/vendors/calendario/js/moment.min.js"></script>
<script src="<?=  URL ?>/vendors/calendario/js/fullcalendar.min.js"></script>
<script src="<?= URL ?>/vendors/calendario/locale/es.js"></script>

<!-- Bootstrap -->
<script src="<?=  URL ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=  URL ?>/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?=  URL ?>/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?=  URL ?>/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?=  URL ?>/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?=  URL ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?=  URL ?>/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?=  URL ?>/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?=  URL ?>/vendors/Flot/jquery.flot.js"></script>
<script src="<?=  URL ?>/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?=  URL ?>/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?=  URL ?>/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?=  URL ?>/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?=  URL ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?=  URL ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?=  URL ?>/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?=  URL ?>/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?=  URL ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?=  URL ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?=  URL ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?=  URL ?>/vendors/moment/min/moment.min.js"></script>
<script src="<?=  URL ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?=  URL ?>/build/js/custom.min.js"></script>
<!-- datatables -->
<script src="<?=  URL ?>js/datatables.min.js"></script>




<script type="text/javascript">

var NuevoEvent;
    
    $('#Agregarr').click(function(){
         
    RecolectarDatosGUI();
    EnviarInformacion('agregar',NuevoEvento);
        
       

    });

    

    function EnviarInformacion(accion,objEvento){
        $.ajax({

            type: 'POST',
            url: uri+'/Agenda/ListarEventos'+accion,
            data:objEvento,
            success:function(msg){
                if (msg) {
            $('#Calendario').fullCalendar('refetchEvents');
            $('#ModalEventos').modal('toggle');

                }
            },

          error:function(){
            alert("Hay un eror...");
          }

        });
    }




</script>


<script type="text/javascript">
    $(document).ready(function(){
         $('#Calendario').fullCalendar({

            header:{
            left:'today,prev,next',
            center:'title',
            right:'month, agendaWeek,agendaDay'
         },



         dayClick:function(start){
          //alertify.alert('Nuevo registro',"Valor seleccionado  "+date.format());
          // $('#txtFechaA').val(date.format());
         
          // $('#txtFechaT').val(date.format());
          // $('#ModalEventosS').modal();

          <?php
                $FechaActual = date('Y-m-d'); ?>
                SystemHoy = <?php echo $FechaActual;
               ?> 

                $FechaActual =  $('#txtFechaA').val(moment(start).format('YYYY-MM-DD'));

                var hoy = new Date();
        var fechaFormulario = new Date($FechaActual.val());
        // Comparamos solo las fechas => no las horas!!
        hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas
        fechaFormulario.setHours(0,0,0,0);
        fechaFormulario.setDate(fechaFormulario.getDate() + 1);
        if (hoy <= fechaFormulario) {
          console.log($("#clase").val())
            $('#txtFechaA').val(moment(start).format('YYYY-MM-DD'));
              $('#txtFechaE').val(moment(start).format('YYYY-MM-DD'));
                  $('#ModalEventosS').modal();
        }else {
          alertify.error("La cita no puede ser registrada dias antes a la fecha actual")
        }


         },

         events: uri+'/Agenda/ListarEventos',
         



         
         eventClick:function(calEvent ,jsEvent,view){

              $('#tituloEvento').html(calEvent.title);
               $('#txtDescripcion').val(calEvent.descripcion);
               $('#txtID').val(calEvent.id);
               $('#txtTitulo').val(calEvent.title);
               $('#colorr').val(calEvent.color);
               $('#idcliente').val(calEvent.idcliente);
               $('#yeah').val(calEvent.idservicio);



               FechaHora= calEvent.start._i.split(" ");
               $('#txtFecha').val(FechaHora[0]);
               $('#txtHora').val(FechaHora[1]);
               $('#txtInicio').val(calEvent.horastart);
               $('#txtFin').val(calEvent.horaend);

               $('#ModalEventos').modal();

         }


         });


    });


</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#listas').DataTable({
			"language":espanol
		});
		  
	});

	var espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ ",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar: ",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#listas2').DataTable({
      "language":espanol
    });
      
  });

  var espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ ",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar: ",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
</script>
<!-- funciones js -->
<script src="<?=  URL ?>public/js/misFunciones.js"></script>
<script src="<?=  URL ?>public/js/login.js"></script>
<script src="<?=  URL ?>public/js/compra.js"></script>
<script src="<?=  URL ?>public/js/venta.js"></script>
<script src="<?=  URL ?>public/js/ventaServicio.js"></script>
<!-- ClockPicker script -->
<script type="text/javascript" src="<?=  URL ?>vendors/clockpicker/dist/bootstrap-clockpicker.min.js"></script>

<script type="text/javascript">
$('.clockpicker').clockpicker();
</script>




</body>
</html>

