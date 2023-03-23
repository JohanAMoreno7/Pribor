<div class="right_col">
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de productos</h2>
			<?php if (isset($_SESSION["Administrador"]) == 1) { ?>
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modalProducto" class="btn btn-primary pull-right">Nuevo producto</a>
			</div>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">

			<center>
				<div class="btn-group">
					<button data-toggle="dropdown" class="btn btn-danger dropdown-toggle btn-sm" type="button" aria-expanded="false"> Pdf <span class="caret"></span>
					</button>
					<ul role="menu" class="dropdown-menu">
						<li><a href="<?php echo URL ?>producto/ActivoPDF" target="_blank">Productos activos</a>
						</li>
						<li><a href="<?php echo URL ?>producto/InactivoPDF" target="_blank">Productos inactivos</a>
						</li>
						<li class="divider"></li>
						<li><a name="" href="<?php echo URL ?>producto/todosPDF" target="_blank">Todos los productos</a>
						</li>
					</ul>
				</div>

				<div class="btn-group">
					<button data-toggle="dropdown" class="btn dropdown-toggle btn-sm excel"type="button" aria-expanded="false"> Excel <span class="caret"></span>
					</button>
					<ul role="menu" class="dropdown-menu">
						<li><a href="<?php echo URL ?>producto/ActivoExcel">Productos activos</a>
						</li>
						<li><a href="<?php echo URL ?>producto/InactivoExcel">Productos inactivos</a>
						</li>
						<li class="divider"></li>
						<li><a href="<?php echo URL ?>producto/todosExcel">Todos los productos</a>
						</li>
					</ul>
				</div>

			</center>
			<br />
			<div class="row table-responsive">
				<table id="listas" class="table table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>CODIGO</th>
							<th>PRODUCTO</th>
							<th>MARCA</th>
							<th>PRESENTACIÓN</th>
							<th>CATEGORÍA</th>
							<th>MEDIDA</th>
							<th>U.MEDIDA</th>
							<th>ESPECIE</th>
							<th>STOCK</th>
							<th>PRECIO</th>
							<th>ESTADO</th>
							<?php if (isset($_SESSION["Administrador"])) { ?>
							<th>OPCIONES</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($producto as $p) { ?>
						<tr>
							<td><?php echo $p->codigo ?></td>
							<td><?php echo $p->nombre ?></td>
							<td><?php echo $p->nombreMarca ?></td>
							<td><?php echo $p->nombrePresentacion?></td>
							<td><?php echo $p->nombreCategoria?></td>
							<td><?php echo $p->medida?></td>
							<td><?php echo $p->nombreUmedida?></td>
							<td><?php echo $p->especie?></td>
							<td><?php echo $p->stock?></td>
							<td><?php echo $p->precio?></td>
							<td class="estado"><?php if ($p->estado == 'activo') { ?>
								<span class="label label-success" style=""><?php echo $p->estado; ?></span></td>
								<?php }else{ ?>
								<span class="label" style="color: white; background:#f04e4e; "><?php echo $p->estado; ?></span>
								<?php } ?>

								<?php if (isset($_SESSION["Administrador"])) { ?>
								<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="" onclick="editarProducto(<?=$p->id ?>)"><i class="fa fa-pencil"></i> Editar</a></td>
								<?php } ?>
							</tr>
							<?php } ?>
						</tbody>
						
					</table>
				</div>
			</div>
		</div>
	</div>




	<!-- --------------------------------------- MODAL NUEVO PRODUCTO ------------------------ -->
	<div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header" >
					<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4>
				</div>

				<div class="modal-body">

					<form method="POST" action="<?php echo URL ?>Producto/registrarProducto" onsubmit="return validarProducto()">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Nombre</label><b class="asterisco"> *</b>
								<input type="text" class="form-control input" id="produc" name="nombre">
							</div>
							<div class="form-group col-md-6">
								<label>Codigo</label><b class="asterisco"> *</b>
								<input type="text" class="form-control soloNum input" id="codigo" name="codigo">
							</div>
						</div>

						<div class="form-row">
							
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Medida</label><b class="asterisco"> *</b>
								<input type="text" class="form-control input" id name="medida">
							</div>
							<div class="form-group col-md-3">
								<label>Unidad de medida</label><b class="asterisco"> *</b>
								<select class="form-control input" name="Umedida">
									<option>Seleccione</option>
									<?php foreach($medida as $m){ ?>
									<option value="<?php echo $m->idUmedida ?>"><?php echo $m->nombreUmedida ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Marca</label><b class="asterisco"> *</b>
								<select class="form-control input" name="marca">
									<option value="0" id="marc">Seleccione</option>
									<?php foreach($marca as $m){ ?>
									<option value="<?php echo $m->idMarca ?>"><?php echo $m->nombreMarca ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Categoría</label><b class="asterisco"> *</b>
								<select class="form-control input" name="categoria">
									<option>Seleccione</option>
									<?php foreach($categoria as $c){ ?>
									<option value="<?php echo $c->idCategoria ?>"><?php echo $c->nombreCategoria ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Especie</label><b class="asterisco"> *</b>
								<select class="form-control input" name="especie">
									<option>Seleccione</option>
									<?php foreach($especie as $e){ ?>
									<option value="<?php echo $e->idespecie ?>"><?php echo $e->nombre ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Presentación</label><b class="asterisco"> *</b>
								<select class="form-control input" name="presentacion">
									<option>Seleccione</option>
									<?php foreach($presentacion as $p){ ?>
									<option value="<?php echo $p->idPresentacion ?>"><?php echo $p->nombrePresentacion ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Precio</label><b class="asterisco"> *</b>
								<input type="text" class="form-control input" id="autocomplete-custom-append" name="precio" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">
							</div>
						</div>
						



					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" id="" name="agregar">Agregar</button>
					</div>
				</form>
			</div>

		</div>
	</div>
	<!-- FIN MODAL NUEVO PRODUCTO -->


	<!-- --------------------------MODAL EDITAR PRODUCTO-------------------------------------- -->
	<div class="modal fade" id="modalProductoE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header" >
					<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Modificar producto</h4>
				</div>

				<div class="modal-body">

					<form method="POST" action="<?php echo URL ?>Producto/modificarProducto">
						<input type="hidden" class="form-control" id="idP" name="id">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Nombre</label>
								<input type="text" class="form-control input" id="nombreP" name="nombre">
							</div>
							<div class="form-group col-md-6">
								<label>Codigo</label>
								<input type="text" class="form-control input soloNum" id="codigopp" name="codigopp">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Medida</label>
								<input type="text" class="form-control input" id="medidaP" name="medida">
							</div>
							<div class="form-group col-md-3">
								<label>Unidad de medida</label>
								<select class="form-control input" id="UmedidaP" name="Umedida">
									<?php foreach($medida as $m){ ?>
									<option value="<?php echo $m->idUmedida ?>"><?php echo $m->nombreUmedida ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Marca</label>
								<select class="form-control input" id="marcaP" name="marca">
									<?php foreach($marca as $m){ ?>
									<option value="<?php echo $m->idMarca ?>"><?php echo $m->nombreMarca ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Categoría</label>
								<select class="form-control input" id="categoriaP" name="categoria">
									<?php foreach($categoria as $c){ ?>
									<option value="<?php echo $c->idCategoria ?>"><?php echo $c->nombreCategoria ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Especie</label>
								<select class="form-control input" id="especieP" name="especie">
									<?php foreach($especie as $e){ ?>
									<option value="<?php echo $e->idespecie ?>"><?php echo $e->nombre ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Presentación</label>
								<select class="form-control input" id="presentacionP" name="presentacion">
									<?php foreach($presentacion as $p){ ?>
									<option value="<?php echo $p->idPresentacion ?>"><?php echo $p->nombrePresentacion ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Precio</label>
								<input type="text" class="form-control input" id="precioP" name="precio" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label>Estado</label>
								<select class="form-control input" id="estadoP" name="estado">
									<option value="activo">Activo</option>
									<option value="inactivo">Inactivo</option>
								</select>
							</div>
						</div>




					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" id="" name="agregar">Guardar</button>
					</div>
				</form>
			</div>

		</div>
	</div>
	<!------------------------------------ FIN MODAL EDITAR PRODUCTO -->

	<?php 
	if (isset($_SESSION['messProducto'])) {
		echo $_SESSION['messProducto'];
		unset($_SESSION['messProducto']);
	}

	if (isset($_SESSION['validaCodigo'])) {
		echo $_SESSION['validaCodigo'];
		unset($_SESSION['validaCodigo']);
	}

	if (isset($_SESSION['messProductoE'])) {
		echo $_SESSION['messProductoE'];
		unset($_SESSION['messProductoE']);
	}

	?> 