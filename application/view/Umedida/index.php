<div class="right_col">
	
	<div class="x_panel">
		<div class="x_title">
			<h2>Unidades de medida</h2>
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modalMedida" class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nuevo registro</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />
			<div class="row">
				<table id="listas" class="table table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>NOMBRE</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($medida as $m){ ?>
						<tr>
							<td><?php echo $m->nombreUmedida ?></td>
							<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="" onclick="editarMedida(<?=$m->idUmedida ?>)"><i class="fa fa-pencil"></i> Editar</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>




<!-- MODAL NUEVO U MEDIDA -->
<div class="modal fade" id="modalMedida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>Umedida/registrarUmedida" onsubmit="return validarUmedida()">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nombre</label><b class="asterisco"> *</b>
							<input type="text" class="form-control" id="medida" name="medida" onkeypress="return soloLetras(event)">
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="enviarU" name="enviar">Agregar</button>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- FIN MODAL NUEVO U MEDIDA -->



<!-- MODAL EDITAR U.MEDIDA -->
<div class="modal fade" id="modalUmedida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Modificar registro</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>Umedida/modificarMedida" onsubmit="return validarUmedida()">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nombre</label><b class="asterisco"> *</b>
							<input type="text" class="form-control" id="nombreMedida" name="medida" onkeypress="return soloLetras(event)">
							<input type="hidden" name="idmedida" id="idmedida">
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="" name="enviar">Agregar</button>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- FIN MODAL EDITAR U.MEDIDA -->