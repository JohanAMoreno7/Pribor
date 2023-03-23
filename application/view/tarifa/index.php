<div class="right_col">
	
	<div class="x_panel">
		<div class="x_title">
			<h2>Tarifas</h2>
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modaltarifa" class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nueva tarifa</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />
			<div class="row">
				<table id="listas" class="table table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>VALOR</th>
							<th>FECHA</th>
							<th>OPCIONES</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($tarifa as $t){ ?>
						<tr>
							<td><?php echo $t->valor ?></td>
							<td><?php echo $t->fecha ?></td>
							<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="" onclick="editarTarifa(<?=$t->idTarifa ?>)"><i class="fa fa-pencil"></i> Editar</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>




<!-- MODAL NUEVO TARIFA -->
<div class="modal fade" id="modaltarifa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>Tarifa/registrarTarifa" onsubmit="return validarTarifa()">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Precio</label>
							<input type="text" class="form-control soloNum" id="precio" name="precio" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="" name="enviartarifa">Agregar</button>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- FIN MODAL NUEVO TARIFA -->



<!-- MODAL EDITAR TARIFA -->
<div class="modal fade" id="modaltarifaE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Modificar tarifa</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>Tarifa/modificarTarifa">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Valor</label>
							<input type="text" class="form-control" id="valor" name="valor" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">
							<input type="hidden" name="idtarifa" id="idtarifa">
							<input type="hidden" class="form-control" id="fechaE">
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
<!-- FIN MODAL EDITAR TARIFA -->

<?php 
if (isset($_SESSION['messTarifa'])) {
	echo $_SESSION['messTarifa'];
	unset($_SESSION['messTarifa']);
}

if (isset($_SESSION['messTarifaE'])) {
	echo $_SESSION['messTarifaE'];
	unset($_SESSION['messTarifaE']);
}
?>