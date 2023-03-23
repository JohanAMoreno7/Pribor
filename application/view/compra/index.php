	<div class="right_col" role="main">

		<div class="container">	
			<div class="row">
				<br>
				<br>
				<br>
				<br>

				<div class="col-sm-5">
					<h4>Gestión de compras</h4>
					<div class="panel panel-default">
						<div class="panel-body form-horizontal payment-form">
							<div class="form-group">
								<label for="concept" class="col-sm-3 control-label">Proveedor</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input" id="proveedorc" name="proveedorc" readonly>
								</div>
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalN">
									<span class="glyphicon glyphicon-search"></span>
								</button>
								<input type="hidden" id="idc" name="idproveedor" value="" />


							</div>

							<?php 

							$fecha1 = date("Y-m-d");

							?>
							<div class="form-group">
								<label for="description" class="col-sm-3 control-label">Usuario</label>
								<div class="col-sm-9">


									<input type="text" class="form-control input" id="usc" value="<?php if (isset($_SESSION['admin'])) {
										echo $_SESSION['admin'];
									}else if (isset($_SESSION['vende'])) {
										echo $_SESSION['vende'];
									} ?>" autofocus disabled>
								</div>
							</div> 
							<div class="form-group">
								<label for="amount" class="col-sm-3 control-label">Fecha</label>
								<div class="col-sm-9">
									<input type="text" class="form-control input" id="fec" name="fec" value="<?php echo $fecha1 ?>" autofocus disabled>
								</div>
							</div>
							<br>
							<div class="form-group">
								<label for="status" class="col-sm-3 control-label">Codigo</label>
								<div class="col-sm-7">
									<input type="text" class="form-control soloNum input" id="codigoc" name="codigoc" >
									
								</div>
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalP">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</div> 
							<div class="form-group">
								<label for="status" class="col-sm-3 control-label">Producto</label>
								<div class="col-sm-9">
									<input type="text" class="form-control input" id="nombrep" name="nombrep"   autofocus disabled>
									<input id="idp" name="idp" type='hidden'>
								</div>


								
							</div> 


							<input type="hidden" name="preciosug" id="preciosug">

							<div class="form-group">
								<label for="date" class="col-sm-3 control-label">Cantidad</label>
								<div class="col-sm-9">
									<input type="text" class="form-control soloNum input" id="cantidad" name="cantidad" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">
								</div>
							</div>

							<div class="form-group">
								<label for="date" class="col-sm-3 control-label">Precio</label>
								<div class="col-sm-9">
									<input type="text" class="form-control soloNum input" id="precio" name="precio" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">
								</div>
							</div>

							<div class="form-group">
								<label for="date" class="col-sm-3 control-label">Lote</label>
								<div class="col-sm-9">
									<input type="text" class="form-control input" id="lote" name="lote">
								</div>
							</div>

							<div class="form-group">
								<label for="date" class="col-sm-3 control-label">Fecha Lote</label>
								<div class="col-sm-9">
									<input type="date" class="form-control input-sm input" id="fechal" name="fechal">
								</div>
							</div>




							<input id="subtotal" name="subtotal" type="hidden">


							<div class="form-group">
								<div class="col-sm-12 text-right">

									<button type="button" class="btn btn-default preview-add-button" id="ip" >
										<span class="glyphicon glyphicon-plus"></span> Agregar producto
									</button>
								</div>
							</div>
						</div>
					</div>            
				</div>
				<div class="col-sm-7">
					<h4>Tabla:</h4>
					<div class="row">
						<div class="col-xs-12">
							<div class="table-responsive">
								<table class="table preview-table">
									<thead>
										<tr>
											<th>ID</th>
											<th>PRODUCTO</th>
											<th>CANTIDAD</th>
											<th>PRECIO</th>
											<th>LOTE</th>
											<th>FECHA LOTE</th>
											<th>IMPORTE</th>
											<th>OPCIÓN</th>
										</tr>
									</thead>
									<tbody id="tablaProductosAgg"></tbody> <!-- preview content goes here-->
								</table>
							</div>                            
						</div>
					</div>
					<div class="row text-right">
						<div class="col-xs-4">

							<h4>Subtotal: <strong><span class="preview-subtotal"  id="spTotal"></span></strong></h4>

                     <!-- <div id="subTotal" class="input-group-addon">Sub Total:</div>
                     	<span class="input-group-addon preview-subtotal" id="spTotal"></span> -->
                     </div>
                 	<div class="col-xs-4">

                 		<h4>Iva: <strong><span class="preview-operacion"   id="iva" name="iva"></span></strong></h4>

                     <!-- <div id="iva" class="input-group-addon">Iva:</div>
                     	<span class="input-group-addon preview-operacion" id="iva" name="iva"></span> -->
                     </div>
                     <div class="col-xs-4">
                     	<h4>Total: <strong><span class="preview-total"  id="totalCom" name="totalCom"></span></strong></h4>

                    <!-- <div id="iva" class="input-group-addon">Total:</div>
                    	<span class="input-group-addon preview-total" id="totalCom" name="totalCom"></span> -->
                    </div>
                 </div>
                 <br>

                 <div class="row text-right">
                 </div>
                 <br>

                 <div class="row text-right">
                </div>




                <div class="row">
                	<div class="col-xs-12">
                		<hr style="border:1px dashed #dddddd;">

                		<button type="button" id="comprar" class="btn btn-sm btn-primary guardar-carrito btn-block">Guardar</button>


                	</div>                
                </div>
            </div>
        </div>

    </div>
</div>









<div class="modal fade" id="modalN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Lista de Proveedores</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form id="formA" class="form-horizontal" method="POST" action="" autocomplete="off">
					<div class="form-group">
						<br>
						<div class="row table-responsive">
							<table id="listas" class="table table-hover table-condensed table-bordered">
								<thead class="tableH">
									<tr>

										<th>NIT</th>
										<th>TIPO DE PERSONA</th>
										<th>NOMBRE</th>
										<th>DIRECCIÓN</th>
										<th>TELEFONO</th>
										<th>RESPONSABLE</th>
										<th>SELECCIONE</th>
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
											<td style="text-align: center"><a href="#" class="btn btn-primary btn-xs" data-dismiss="modal"  onclick="Tproveedor(<?= $proveedor->idproveedor ?>)"><i class="fa fa-pencil"></i> Agregar </a></td>





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


	<!-- FIN MODAL NUEVO CLIENTE -->

	<div class="modal fade" id="modalP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header" >
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Lista de Productoss</h4>
				</div>

				<div class="modal-body" style="color: black">
					<form id="formA" class="form-horizontal" method="POST" action="" autocomplete="off">
						<div class="form-group">
							<br>
							<div class="row table-responsive">
								<table id="listas2" class="table table-hover table-condensed table-bordered">
									<thead class="tableH">
										<tr>

											<th>PRODUCTO</th>
											<th>MARCA</th>
											<th>PRESENTACION</th>
											<th>MEDIDA</th>
											<th>U.MEDIDA</th>
											<th>SELECCIONA</th>

										</tr>
									</thead>
									<tbody>
										<?php foreach($producto as $p) { ?>
										<tr>

											<td id="productoNombre<?= $p->id ?>"><?php echo $p->nombre ?></td>
											<td id="marcaProducto<?= $p->id ?>"><?php echo $p->nombreMarca ?></td>
											<td id="presentacionMarca<?= $p->id ?>"><?php echo $p->nombrePresentacion?></td>
											<td id="productoMedida<?= $p->id ?>"><?php echo $p->medida?></td>
											<td id="unidadProducto<?= $p->id ?>"><?php echo $p->nombreUmedida?></td>

											<td><button type="button" class="btn btn-primary" data-dismiss="modal" onclick=" return Tproducto(<?= $p->id ?>)">Agregar</button></td>

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


	<!-- --------------------------------------- MODAL NUEVO PRODUCTO ------------------------ -->
	<div class="modal fade" id="modalProductoC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header" >
					<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4>
				</div>

				<div class="modal-body">

					<form method="POST" action="<?php echo URL ?>compra/registrarProducto" onsubmit="return validarProducto()">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Nombre</label><b class="asterisco"> *</b>
								<input type="text" class="form-control" id="produc" name="nombre" onkeypress="return soloLetras(event)">
							</div>
						</div>
						<div class="form-group col-md-6">
							<label>Marca</label><b class="asterisco"> *</b>
							<select class="form-control" name="marca">
								<option value="0" id="marc">Seleccione</option>
								<?php foreach($marca as $m){ ?>
								<option value="<?php echo $m->idMarca ?>"><?php echo $m->nombreMarca ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-row">
							
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Medida</label><b class="asterisco"> *</b>
								<input type="text" class="form-control" id name="medida">
							</div>
							<div class="form-group col-md-6">
								<label>Unidad de medida</label><b class="asterisco"> *</b>
								<select class="form-control" name="Umedida">
									<option>Seleccione</option>
									<?php foreach($medida as $m){ ?>
									<option value="<?php echo $m->idUmedida ?>"><?php echo $m->nombreUmedida ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Categoría</label><b class="asterisco"> *</b>
								<select class="form-control" name="categoria">
									<option>Seleccione</option>
									<?php foreach($categoria as $c){ ?>
									<option value="<?php echo $c->idCategoria ?>"><?php echo $c->nombreCategoria ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Especie</label><b class="asterisco"> *</b>
								<select class="form-control" name="especie">
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
								<select class="form-control" name="presentacion">
									<option>Seleccione</option>
									<?php foreach($presentacion as $p){ ?>
									<option value="<?php echo $p->idPresentacion ?>"><?php echo $p->nombrePresentacion ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Precio</label><b class="asterisco"> *</b>
								<input type="text" class="form-control soloNum" id="autocomplete-custom-append" name="precio">
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

	<?php 
	if (isset($_SESSION['messProducto'])) {
		echo $_SESSION['messProducto'];
		unset($_SESSION['messProducto']);
	}

	if (isset($_SESSION['messProductoE'])) {
		echo $_SESSION['messProductoE'];
		unset($_SESSION['messProductoE']);
	}

	?> 

