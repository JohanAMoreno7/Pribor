<div class="right_col" role="main">

	<div class="x_panel">
		<div class="x_title">
			<h2>Servicios</h2>
			
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modaldetalle" class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nuevo registro</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />
			<div class="row table-responsive">
				<table id="listas" class="table table-hover table-condensed table-bordered">
					<thead class="tableH">
						<tr>
							<th>ID</th>
							<th>RAZA</th>
							<th>TARIFA</th>
						</tr>
					</thead>
					
					<?php foreach($detalle as $d) { ?>
					<tbody>

						<tr>
							<td><?php echo $d->id ?></td>
							<td><?php echo $d->nombre ?></td>
							<td><?php echo $d->valor ?></td>
						</tr>

					</tbody>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

</div>	



<!-- MODAL NUEVO SERVICIO -->
<div class="modal fade" id="modaldetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar detalle</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form id="" class="form-horizontal" method="POST" action="<?php echo URL ?>Servicio/guardarDetalle"  autocomplete="off" onsubmit="return validarServicio()">

					<label>Raza</label><b class="asterisco"> *</b>
					<select class="form-control" name="idraza">
                <option>Seleccione</option>
                <?php foreach($raza as $d) { ?>
                <option value="<?php echo $d->id ?>"><?php echo $d->nombre ?></option>
                <?php } ?>
              </select>

              <label>Tarifa</label><b class="asterisco"> *</b>
					<select class="form-control" name="idtarifa">
                <option>Seleccione</option>
                <?php foreach($tarifa as $d) { ?>
                <option value="<?php echo $d->idTarifa ?>"><?php echo $d->valor ?></option>
                <?php } ?>
              </select>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="enviarNuevoS" name="enviar">Agregar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- FIN MODAL NUEVO SERVICIO --> 



