

<div class="right_col" role="main">

	<div class="container">
    <div class="panel-heading">
       
      </div>

	<div class="col"></div>
<div class="col-7"><div id="Calendario"></div></div>
<div class="col"></div>
				
		</div>
	</div>	 



<div class="modal fade" id="ModalEventosS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="txtFechaT"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form  class="form-horizontal" method="POST" action="<?php echo URL; ?>Agenda/guardarEventos" autocomplete="off">

   
    <input type="hidden" id="txtFechaA" name="txtFecha" class="form-control" readonly="" />
    
    <input type="hidden" id="txtFechaE" name="end" class="form-control" readonly="" />
    <label >Hora Inicio</label>
    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
    <input type="text" class="form-control input" name="txtInicio" placeholder="Hora inicio">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>
    <label >Hora Finalización</label>
    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
    <input type="text" class="form-control input" name="txtFin" placeholder="Hora final">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>
    <label>Cliente</label>
              <select class="form-control input" name="idcliente">
                <option>Seleccione</option>
                <?php foreach($clientes as $d) { ?>
                <option value="<?php echo $d->id ?>"><?php echo $d->nombre ?></option>
                <?php } ?>
              </select>
    <label >Título</label>
    <input type="text" id="" name="txtTitulo" class="form-control input" />
    <label>Servicio</label>
              <select class="form-control input" id="idservicio" name="idservicio">
                <option>Seleccione</option>
                <?php foreach($servicios as $s) { ?>
                <option value="<?php echo $s->id ?>"><?php echo $s->descripcion ?></option>
                <?php } ?>
              </select>
    <label >Descripción</label>
    <textarea id="" name="txtDescripcion" rows="3" class="form-control input"></textarea>

   
          <label for="color">Color</label>
         
            <select name="color" class="form-control input" id="color">
              <option value="">Seleccione</option>
              <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
              <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
              <option style="color:#008000;" value="#008000">&#9724; Verde</option>             
              <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
              <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranjado</option>
              <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
              <option style="color:#000;" value="#000">&#9724; Negro</option>
              
            </select>
         


      <div class="modal-footer">

       
    
     
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         <button type="submit" class="btn btn-primary"  name="enviarA">Agregar</button>
        
      </div>
        
      </div>



      </form>
      
    </div>
  </div>
</div>

<!-- Modal (Agregar) -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <center><h3 style="color: white;" class="modal-title" id="tituloEvento"></h3></center>
        
      </div>
      <div class="modal-body">
       <form  class="form-horizontal" method="POST" action="<?php echo URL; ?>Agenda/borraEvento" autocomplete="off">


    <label >Hora Inicio</label>
    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
    <input type="text" class="form-control" id="txtInicio" name="txtInicio" placeholder="Hora inicio">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
    </div>

    
    <label >Hora Finalización</label>
    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
    <input type="text" class="form-control" id="txtFin" name="txtFin" placeholder="Hora final">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>
    <label>Cliente</label>
              <select class="form-control" id="idcliente" name="idcliente">
                <?php foreach($clientes as $d) { ?>
                <option value="<?php echo $d->id ?>"><?php echo $d->nombre ?></option>
                <?php } ?>
              </select>
    <label >Título</label>
    <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" />
    <label>Servicio</label>
              <select class="form-control" id="yeah" name="idservicio">
                <?php foreach($servicios as $s) { ?>
                <option value="<?php echo $s->id ?>"><?php echo $s->descripcion ?></option>
                <?php } ?>
              </select>
    <label >Descripción</label>
    <textarea id="txtDescripcion" name="txtDescripcion" rows="3" class="form-control"></textarea>
    
    <label for="color">Color</label>
         
            <select name="color" class="form-control" id="colorr" id="colorr">
              <option value="">Seleccione</option>
              <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
              <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
              <option style="color:#008000;" value="#008000">&#9724; Verde</option>             
              <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
              <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranjado</option>
              <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
              <option style="color:#000;" value="#000">&#9724; Negro</option>
              
            </select>

            <br>

            <input type="hidden" id="txtID" name="id" value="" />


      <div class="modal-footer">

        
     
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        <button type="submit" class="btn btn-primary" name="deletee">Borrar</button>

 
      
      
        
      </div>
        
      </div>
      </form>
      
    </div>
  </div>
</div>







	