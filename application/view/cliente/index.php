<div class="right_col" role="main">

	<div class="x_panel">
		<div class="x_title">
			<h2>Gestión de clientes</h2>
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modalN" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true" id="nuevoCliente"></i>&nbsp;Nuevo cliente</a>
			</div>
			<div class="clearfix">	
				
			</div>

		</div>
		<div class="x_content">
			<center>
				<div class="btn-group">
					<button data-toggle="dropdown" class="btn btn-danger dropdown-toggle btn-sm" type="button" aria-expanded="false"> Pdf <span class="caret"></span>
					</button>
					<ul role="menu" class="dropdown-menu">
						<li><a href="<?php echo URL ?>cliente/reporte" target="_blank">Clientes activos</a>
						</li>
						<li><a href="<?php echo URL ?>cliente/inactivosPDF" target="_blank">Clientes inactivos</a>
						</li>
						<li class="divider"></li>
						<li><a href="<?php echo URL ?>cliente/todosPDF" target="_blank">Todos los clientes</a>
						</li>
					</ul>
				</div>
				
				<div class="btn-group">
					<button data-toggle="dropdown" class="btn dropdown-toggle btn-sm excel" type="button" aria-expanded="false"> Excel <span class="caret"></span>
					</button>
					<ul role="menu" class="dropdown-menu">
						<li><a href="<?php echo URL ?>cliente/activoExcel">Clientes activos</a>
						</li>
						<li><a href="<?php echo URL ?>cliente/inactivoExcel">Clientes inactivos</a>
						</li>
						<li class="divider"></li>
						<li><a href="<?php echo URL ?>cliente/todosExcel">Todos los clientes</a>
						</li>
					</ul>
				</div>

			</center>

		<br />
		<div class="row table-responsive">
			<table id="listas" class="table table-hover table-condensed table-bordered">
				<thead class="tableH">
					<tr>

						<th>NOMBRE</th>
						<th>APELLIDO</th>
						<th>DOCUMENTO</th>
						<th>TIPO DOCUMENTO</th>
						<th>TELÉFONO</th>
						<th>ESTADO</th>
						<th>MODIFICAR</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($clientes as $cliente) {


						?>
						<tr>
							<td><?php if(isset($cliente->nombre)) echo htmlspecialchars($cliente->nombre, ENT_QUOTES, 'UTF-8'); ?></td>
							<td><?php if(isset($cliente->apellido)) echo htmlspecialchars($cliente->apellido, ENT_QUOTES, 'UTF-8'); ?></td>
							<td><?php if(isset($cliente->documento)) echo htmlspecialchars($cliente->documento, ENT_QUOTES, 'UTF-8'); ?></td>
							<td><?php if(isset($cliente->tipoD)) echo htmlspecialchars($cliente->tipoD, ENT_QUOTES, 'UTF-8'); ?></td>
							<td><?php if(isset($cliente->telefono)) echo htmlspecialchars($cliente->telefono, ENT_QUOTES, 'UTF-8'); ?></td>

							<td class="estado"><?php if ($cliente->estado == "activo") { ?>

								<span class="label label-success" style=""><?php echo $cliente->estado; ?></span></td>
								<?php }else{ ?>
								<span class="label" style="color: white; background:#f04e4e; "><?php echo $cliente->estado; ?></span>
								<?php } ?>
								<td style="text-align: center"><a href="#" class="btn btn-primary btn-xs" id="editar" onclick="editarCliente(<?= $cliente->id ?>)"><i class="fa fa-pencil"></i> Editar </a></td>






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





	<!-- MODAL NUEVO CLIENTE -->
	<div class="modal fade" id="modalN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">

				<div class="modal-header" >
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo cliente</h4>
				</div>

				<div class="modal-body" style="color: black">
					<form id="formA" class="form-horizontal" method="POST" action="<?php echo URL; ?>Cliente/guardarCliente" autocomplete="off" onsubmit="return validarCliente()">

						<label>Tipo documento</label><b class="asterisco"> *</b>
						<select class="form-control input" name="tipodocumento">
							<?php foreach($documento as $d) { ?>
							<option value="<?php echo $d->id ?>"><?php echo $d->nombre ?></option>
							<?php } ?>
						</select>
						<label>Documento</label><b class="asterisco"> *</b>
						<input type="text" name="documento" id="documento" class="form-control input-sm soloNum input" maxlength="13" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">
						<label>Nombre</label><b class="asterisco"> *</b>
						<input type="text" name="nombre" id="nombre" class="form-control input-sm soloLetra input" maxlength="20" onkeypress="return soloLetras(event)">
						<label>Apellido</label><b class="asterisco"> *</b>
						<input type="text" name="apellido" id="apellido" class="form-control input-sm soloLetra input" maxlength="20" onkeypress="return soloLetras(event)">
						<label>Teléfono</label><b class="asterisco"> *</b>
						<input type="text" name="telefono" id="telefono" class="form-control input-sm soloNum input" maxlength="10" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" id="enviar" name="enviar">Agregar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- FIN MODAL NUEVO CLIENTE -->


	<!-- MODAL EDITAR CLIENTE -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon pen-square'></i> Modificar cliente</h4>
				</div>

				<div class="modal-body" style="color: black">
					<form class="form-horizontal" method="POST" action="<?php echo URL; ?>Cliente/actualizarCliente" autocomplete="off" onsubmit="return validarClienteE()">

						<label>Tipo documento</label>
						<select class="form-control input" name="tipodocumento" id="tipodocumento">
							<?php foreach($documento as $d) { ?>
							<option value="<?php echo $d->id ?>"><?php echo $d->nombre ?></option>
							<?php } ?>
						</select>
						<label>Documento</label>
						<input type="text" name="documento" id="documentoE" class="form-control input-sm soloNum input" maxlength="13" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">
						<label>Nombre</label>
						<input type="text" name="nombre" id="nombreE" class="form-control input-sm input" maxlength="20" onkeypress="return soloLetras(event)">
						<label>Apellido</label>
						<input type="text" name="apellido" id="apellidoE" class="form-control input-sm input" maxlength="20" onkeypress="return soloLetras(event)">
						<label>Teléfono</label>
						<input type="text" name="telefono" id="telefonoE" class="form-control input-sm soloNum input" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">
						<label>Estado</label>
						<select name="estado" id="estadoE" class="form-control input-sm input">
							<option value="activo">Activo</option>
							<option value="inactivo">Inactivo</option>
						</select>
						<input type="hidden" id="idE" name="idCliente" value="" />
						<br>

					</div>


					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" id="enviarE" name="enviarcliente">Guardar cambios</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<!-- FIN MODAL NUEVO CLIENTE -->

<?php 
if (isset($_SESSION['messCliente'])) {
	echo $_SESSION['messCliente'];
	unset($_SESSION['messCliente']);
}

if (isset($_SESSION['messClienteE'])) {
	echo $_SESSION['messClienteE'];
	unset($_SESSION['messClienteE']);
}

if (isset($_SESSION['validaDocumento'])) {
	echo $_SESSION['validaDocumento'];
	unset($_SESSION['validaDocumento']);
}
?> 

