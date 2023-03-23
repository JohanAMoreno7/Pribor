<div class="right_col">
	
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de presentaciones</h2>
			
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modalPresentacion" class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nueva Presentación</a>
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
						<?php foreach($Presentaciones as $p){ ?>
						<tr>
							<td><?php echo $p->nombrePresentacion ?></td>
							<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="" onclick="editarPresentacion(<?=$p->idPresentacion ?>)"><i class="fa fa-pencil"></i> Editar</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>




<!-- MODAL NUEVO PRESENTACION -->
<div class="modal fade" id="modalPresentacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>Presentacion/registrarPresentacion" onsubmit="return validarPresentacion()">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nombre</label><b class="asterisco"> *</b>
							<input type="text" class="form-control" id="presentacion" name="presentacion" onkeypress="return soloLetras(event)">
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
<!-- FIN MODAL NUEVO PRESENTACION -->



<!-- MODAL EDITAR PRESENTACION -->
<div class="modal fade" id="modalPresentacionE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Modificar presentación</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>Presentacion/modificarPresentacion" onsubmit="return validarPresentacionE()">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nombre</label><b class="asterisco"> *</b>
							<input type="text" class="form-control" id="nombrePresentacioE" name="presentacion" onkeypress="return soloLetras(event)">
							<input type="hidden" name="idpresentacion" id="idpresentacion">
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
<!-- FIN MODAL EDITAR PRESENTACION -->

<?php 
if (isset($_SESSION['presentacionMen'])) {
	echo $_SESSION['presentacionMen'];
	unset($_SESSION['presentacionMen']);
}

if (isset($_SESSION['presentacionEMen'])) {
	echo $_SESSION['presentacionEMen'];
	unset($_SESSION['presentacionEMen']);
}
?> 