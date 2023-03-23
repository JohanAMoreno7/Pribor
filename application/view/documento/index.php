<div class="right_col">
	
	<div class="x_panel">
		<div class="x_title">
			<h2>Tipo de documento</h2>
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modalDocu" class="btn btn-primary pull-right">Nuevo documento</a>
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
							<th>OPCIONES</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($documento as $t){ ?>
					<tr>
						<td><?php echo $t->nombre ?></td>
						<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="" onclick="editarDocumento(<?=$t->id ?>)"><i class="fa fa-pencil"></i> Editar</a></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>




<!-- MODAL NUEVO DOCUMENTO -->
<div class="modal fade" id="modalDocu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>documento/registrarDocumento">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nombre</label>
							<input type="text" class="form-control" id="" name="nombre">
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
<!-- FIN MODAL NUEVO DOCUMENTO -->



<!-- MODAL EDITAR DOCUMENTO -->
<div class="modal fade" id="modaldocumentoE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Modificar documento</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>documento/modificarDocumento">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nombre</label>
							<input type="text" class="form-control" id="nombreD" name="nombre">
							<input type="hidden" name="id" id="idD">
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="" name="enviar">Modificar</button>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- FIN MODAL EDITAR DOCUMENTO -->