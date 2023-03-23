<div class="right_col" role="main">

	<div class="x_panel">
		<div class="x_title">
			<h2>Gestión de proveedores</h2>
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modalN" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true" id="nuevoCliente"></i>&nbsp;Nuevo registro</a>
			</div>
			<div class="clearfix"></div>

		</div>
		<div class="x_content">

			<center>
				<div class="btn-group">
					<button data-toggle="dropdown" class="btn btn-danger dropdown-toggle btn-sm" type="button" aria-expanded="false"> Pdf <span class="caret"></span>
					</button>
					<ul role="menu" class="dropdown-menu">
						<li><a href="<?php echo URL ?>proveedor/ActivoPDF" target="_blank">Proveedores activos</a>
						</li>
						<li><a href="<?php echo URL ?>proveedor/InactivoPDF" target="_blank">Proveedores inactivos</a>
						</li>
						<li class="divider"></li>
						<li><a href="<?php echo URL ?>proveedor/proveedorPDF" target="_blank">Todos los proveedores</a>
						</li>
					</ul>
				</div>

				<div class="btn-group">
					<button data-toggle="dropdown" class="btn dropdown-toggle btn-sm excel" type="button" aria-expanded="false"> Excel <span class="caret"></span>
					</button>
					<ul role="menu" class="dropdown-menu">
						<li><a href="<?php echo URL ?>proveedor/ActivoExcel">Proveedores activos</a>
						</li>
						<li><a href="<?php echo URL ?>proveedor/InactivoExcel" >Proveedores inactivos</a>
						</li>
						<li class="divider"></li>
						<li><a href="<?php echo URL ?>proveedor/todosE" >Todos los proveedores</a>
						</li>
					</ul>
				</div>

			</center>

			<br />
			<div class="row table-responsive">
				<table id="listas" class="table table-hover table-condensed table-bordered">
					<thead class="tableH">
						<tr>

							<th>NIT</th>
							<th>TIPO DE PERSONA</th>
							<th>NOMBRE</th>
							<th>DIRECCIÓN</th>
							<th>TELÉFONO</th>
							<th>RESPONSABLE</th>
							<th>ESTADO</th>
							<th>MODIFICAR</th>
						</tr>
					</thead>




					<tbody>
						<?php foreach ($proveedores as $proveedor) {


							?>
							<tr>

								<td><?php if(isset($proveedor->nit)) echo htmlspecialchars($proveedor->nit, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php if(isset($proveedor->tipopersona)) echo htmlspecialchars($proveedor->tipopersona, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php if(isset($proveedor->nombre)) echo htmlspecialchars($proveedor->nombre, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php if(isset($proveedor->direccion)) echo htmlspecialchars($proveedor->direccion, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php if(isset($proveedor->telefono)) echo htmlspecialchars($proveedor->telefono, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php if(isset($proveedor->responsable)) echo htmlspecialchars($proveedor->responsable, ENT_QUOTES, 'UTF-8'); ?></td>
								<th><?php if ($proveedor->estado == "Activo") {  ?>
									<span class="label label-success" id="" ><?php echo  $proveedor->estado ?></span>
								</th>
								<?php  } else {  ?>
								<span class="label label-danger"><?php echo  $proveedor->estado ?></span>
								<?php  } ?>
								<td style="text-align: center"><a href="#" class="btn btn-primary btn-xs" id="editar" onclick="editarProveedor(<?= $proveedor->idproveedor ?>)"><i class="fa fa-pencil"></i> Editar </a></td>



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
</div>	 





<!-- MODAL NUEVO CLIENTE -->
<div class="modal fade" id="modalN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar proveedor</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form id="formA" class="form-horizontal" method="POST" action="<?php echo URL; ?>Proveedor/guardar" autocomplete="off" onsubmit="return validarrr()">

					<label >Nit</label><b style="color: red"> *</b>
					<input type="text" id="nit" name="nit" class="form-control input" placeholder="Nit"   />

					<label>Tipo persona</label><b style="color: red"> *</b>
					<select name="tipopersona" id="tipopersona" class="form-control input-sm input" >
						<option value="Juridica">Jurídica</option>
						<option value="Natural">Natural</option>
					</select>
					<label >Nombre</label><b style="color: red"> *</b>
					<input type="text" id="nombre" name="nombre" class="form-control input"   onkeypress="return soloLetrasS(event)" >
					<label >Dirección</label><b style="color: red"> *</b>
					<input type="text" id="direccion" name="direccion" placeholder="Direccion" class="form-control input" >
					<label >Teléfono</label><b style="color: red"> *</b>
					<input  type="number" id="telefono" name="telefono" class="form-control input" maxlength="9" placeholder="Telefono"  class="soloNumM input">
					<label >Responsable</label><b style="color: red"> *</b>
					<input type="text" id="responsable" name="responsable" class="form-control input" placeholder="Responsable"  onkeypress="return soloLetrasS(event)">
					
					<input type="hidden" id="estado" name="estado" class="form-control" value= "Activo" readonly="readonly">



				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="enviar" name="submit">Agregar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- FIN MODAL NUEVO CLIENTE -->


<!-- MODAL EDITAR CLIENTE -->
<div class="modal fade" id="editarE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" ><i class='glyphicon pen-square'></i> Modificar proveedor</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form class="form-horizontal" method="POST" action="<?php echo URL; ?>Proveedor/actualizarProveedor" autocomplete="off" onsubmit="return validarrE()">

					<label >Nit</label><b style="color: red"> *</b>
					<input type="text" id="nitE" name="nitE" class="form-control" placeholder="Nit"  class="soloNumM input" />
					<label>Tipo persona</label><b style="color: red"> *</b>
					<select name="tipopersonaE" id="tipopersonaE" class="form-control input-sm input" >
						<option value="Juridica">Juridica</option>
						<option value="Natural">Natural</option>
					</select>
					<label >Nombre</label><b style="color: red"> *</b>
					<input type="text" id="nombreE" name="nombreE" class="form-control input"   onkeypress="return soloLetrasS(event)" >
					<label for="inputEmail4">Dirección</label><b style="color: red"> *</b>
					<input type="text" id="direccionE" name="direccionE" placeholder="Direccion" class="form-control input"  >
					<label for="inputPassword4">Teléfono</label><b style="color: red"> *</b>
					<input  type="number" id="telefonoE" name="telefonoE" class="form-control input" maxlength="9" placeholder="Telefono"  class="soloNumM" >
					<label for="inputEmail4">Responsable</label><b style="color: red"> *</b>
					<input type="text" id="responsableE" name="responsableE" class="form-control input" placeholder="Responsable"  onkeypress="return soloLetrasS(event)" >
					<label>Estado</label><b style="color: red"> *</b>
					<select name="estado" id="estadoE" class="form-control input-sm input" >
						<option value="Activo">Activo</option>
						<option value="Inactivo">Inactivo</option>
					</select>
					<input type="hidden" id="idE" name="idProveedor" value="" />
					<br>

				</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="enviarE" name="enviarproveedor">Guardar cambios</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>
<!-- FIN MODAL NUEVO CLIENTE -->


<?php 
if (isset($_SESSION['proveedorMen'])) {
	echo $_SESSION['proveedorMen'];
	unset($_SESSION['proveedorMen']);
}

if (isset($_SESSION['proveedorEMen'])) {
	echo $_SESSION['proveedorEMen'];
	unset($_SESSION['proveedorEMen']);
}

if (isset($_SESSION['validaNit'])) {
	echo $_SESSION['validaNit'];
	unset($_SESSION['validaNit']);
}

?> 
