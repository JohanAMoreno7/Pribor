	<div class="right_col" role="main">

		<div class="x_panel">
			<div class="x_title">
				<h2>Servicios</h2>
				
				<div class="row">
					<a href="#" data-href="" data-toggle="modal" data-target="#modalN" class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nuevo servicio</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<div class="row table-responsive">
					<table id="listas" class="table table-hover table-condensed table-bordered">
						<thead class="tableH">
							<tr>
								<th>NOMBRE SERVICIO</th>
								<th>RAZA</th>
								<th>TARIFA</th>
								<th>ESTADO</th>
								<th>MODIFICAR</th>
							</tr>
						</thead>
						
						<?php foreach($servicios as $servicio) { ?>
						<tbody>

							<tr>
								<td><?= $servicio->descripcion ?></td>
								<td><?= $servicio->nombre ?></td>
								<td><?= $servicio->valor ?></td>
								<td class="estado"><?php if ($servicio->estado == 'activo') { ?>
									<span class="label label-success" style=""><?php echo $servicio->estado; ?></span>
								</td>
								<?php }else{ ?>
								<span class="label" style="color: white; background:#f04e4e;"><?php echo $servicio->estado; ?></span>
								<?php } ?>
								<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="editar"  onclick="editarServicios(<?= $servicio->id ?>)"><i class="fa fa-pencil"></i> Editar</a></td>

							</tr>
							<?php } ?>
						</tbody>

					</table>

					<?php 

					if(isset($_SESSION["mensaje"]) && $_SESSION["mensaje"] != null){
						echo $_SESSION["mensaje"];
						$_SESSION["mensaje"] = null;
					}

					?>

				</div>
			</div>
		</div>

	</div>	 







	<!-- MODAL NUEVO SERVICIO -->
	<div class="modal fade" id="modalN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo servicio</h4>
				</div>

				<div class="modal-body" style="color: black">
					<form id="" class="form-horizontal" method="POST" action="<?php echo URL ?>Servicio/guardarServicio"  autocomplete="off" onsubmit="return validarServicio()">

						<label>Nombre servicio</label><b class="asterisco"> *</b>
						<input type="text" name="nombre" id="nombreS" class="form-control input-sm" onkeypress="return soloLetras(event)">

						<label>Raza</label><b class="asterisco"> *</b>
						
						<div class="input-group">
							<input type="text" class="form-control" id="detallera" disabled>
							<span class="input-group-btn">
								<button type="button" class="btn btn-primary" data-href="" data-toggle="modal" data-target="#detalleraza"> +</button>
							</span>
						</div>
						<input type="hidden" id="detallerazaa" name="iddetalle">


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


	<!-- MODAL EDITAR SERVICIO -->
	<div class="modal fade" id="servicioE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">

				<div class="modal-header" style="background-color:#3F68A8">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon pen-square'></i> Modificar servicio</h4>
				</div>

				<div class="modal-body" style="color: black">
					<form class="form-horizontal" method="POST" action="<?php echo URL; ?>Servicio/actualizarServicio" autocomplete="off" onsubmit="return validarServicioE()">

						<label>Estado</label>
						<select name="estadoE" id="estadoE" class="form-control input-sm">
							<option value="activo">Activo</option>
							<option value="inactivo">Inactivo</option>
						</select>
						<input type="hidden" id="idE" name="idServicio"  />
						<br>

					</div>


					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" id="enviarE" name="enviarservicio">Guardar cambios</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<!-- FIN MODAL EDITAR SERVICIO -->

<div class="modal fade" id="detalleraza" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content ">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Lista de Proveedores</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form id="formA" class="form-horizontal" method="POST" action="" autocomplete="off">
					<div class="form-group">
						<br>
						<div class="row table-responsive">
							<table id="listas2" class="table table-hover table-condensed table-bordered">
								<thead class="tableH">
									<tr>
										<th>ID</th>
										<th>RAZA</th>
										<th>TARIFA</th>
										<th>OPCIONES</th>
									</tr>
								</thead>
								
								<?php foreach($detalle as $d) { ?>
								<tbody>

									<tr>
										<td><?php echo $d->id ?></td>
										<td><?php echo $d->nombre ?></td>
										<td><?php echo $d->valor ?></td>
										<td style="text-align: center"><a href="#" class="btn btn-primary btn-xs" data-dismiss="modal"  onclick="agregarDetalle(<?= $d->id ?>)"><i class="fa fa-pencil"></i> Agregar </a></td>
									</tr>
									<?php } ?>
								</tbody>

							</table>

						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php 
if (isset($_SESSION['menser'])) {
	echo $_SESSION['menser'];
	unset($_SESSION['menser']);
}

if (isset($_SESSION['servicioEdit'])) {
	echo $_SESSION['servicioEdit'];
	unset($_SESSION['servicioEdit']);
}
?> 