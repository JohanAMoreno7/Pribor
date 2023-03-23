<div class="right_col" role="main">

	<div class="container">	
		<div class="row">
			<br>
			<br>
			<br>
			<br>

			<div class="col-sm-5">
				<h4>Gestión de ventas</h4>
				<div class="panel panel-default">
					<div class="panel-body form-horizontal todos">
						<div class="form-group">
							<label for="concept" class="col-sm-3 control-label">Cliente</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm input" name="cliente" id="clienteV" autofocus disabled>
							</div>
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoCliente">
								<span class="glyphicon glyphicon-search"></span>
							</button>
							<input type="hidden" id="idV" name="idcliente" value="" />


						</div>

						<?php 

						$fecha1 = date("Y-m-d");
						
						?>
						<div class="form-group">
							<label for="description" class="col-sm-3 control-label">Usuario</label>
							<div class="col-sm-9">


								<input type="text" class="form-control input" id="us" value="<?php if (isset($_SESSION['admin'])) {
									echo $_SESSION['admin'];
								}else if (isset($_SESSION['vende'])) {
									echo $_SESSION['vende'];
								} ?>" autofocus disabled>
							</div>
						</div> 
						<div class="form-group">
							<label for="amount" class="col-sm-3 control-label">Fecha</label>
							<div class="col-sm-9">
								<input type="text" class="form-control input" id="fecb" name="fecb" value="<?php echo $fecha1 ?>" autofocus disabled>
							</div>
						</div>
						<br>
						<div class="form-group">
							<label for="status" class="col-sm-3 control-label">Codigo</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm input soloNum" id="codigov" name="codigov"   autofocus>
							</div>

							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPV">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div> 
						<div class="form-group">
							<label for="status" class="col-sm-3 control-label">Producto</label>
							<div class="col-sm-9">
								<input type="text" class="form-control input-sm input" id="nombrepv" name="nombrepv"   autofocus disabled>
								<input id="idpv" name="idpv" type='hidden'>
							</div>
						</div> 


						<div class="form-group">
							<label for="date" class="col-sm-3 control-label">Cantidad</label>
							<div class="col-sm-9">
								<input type="number" class="form-control input-sm input soloNum" id="cantidadv" name="cantidadv" onKeyPress="return soloNumeross(event)" onKeyUp="pierdeFoco(this)">
							</div>
						</div>

						<input type="hidden" name="stock" id="stock">

						<input type="hidden" id="precioV" name="precioV">




						<div class="form-group">
							<div class="col-sm-12 text-right">

								<button id="vendevvv" type="button" class="btn btn-default agrega-producto" >
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
							<table class="table tabla-detalle">
								<thead>
									<tr>
										<th>ID</th>
										<th>PRODUCTO</th>
										<th>CANTIDAD</th>
										<th>PRECIO</th>
										<th>SUBTOTAL</th>
										<th>ELIMINAR</th>
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

                     	<h4>Total: <strong><span class="preview-total"  id="totalVen" name="totalVen"></span></strong></h4>

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

                		<button type="button" id="vender" class="btn btn-sm btn-primary guardar-carrito btn-block">Guardar</button>


                	</div>                
                </div>
            </div>
        </div>

    </div>
</div>













<!-- MODAL AGREGAR CLIENTE -->
<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Lista de clientes</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form id="formA" class="form-horizontal" method="POST" action="" autocomplete="off">
					<div class="form-group">
						<div class="row table-responsive">
							<table id="listas" class="table table-hover table-condensed table-bordered">
								<thead class="tableH">
									<tr>

										<th>NOMBRE</th>
										<th>APELLIDO</th>
										<th>DOCUMENTO</th>
										<th>TIPO DOCUMENTO</th>
										<th>TELEFONO</th>
										<th>SELECCIONE</th>
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
											<td style="text-align: center"><a href="#" class="btn btn-primary btn-xs" data-dismiss="modal"  onclick="Tcliente(<?= $cliente->id ?>)"><i class="fa fa-pencil"></i> Agregar </a></td>
										</tr>
										<?php } ?>	
									</tbody>

								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- FIN MODAL NUEVO CLIENTE -->

<!-- MODAL NUEVO CLIENTE -->
<div class="modal fade" id="modalV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo cliente</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form id="formA" class="form-horizontal" method="POST" action="<?php echo URL; ?>Venta/guardarCliente" autocomplete="off" onsubmit="return validarCliente()">

					<label>Tipo documento</label><b class="asterisco"> *</b>
					<select class="form-control" name="tipodocumento">
						<?php foreach($documento as $d) { ?>
						<option value="<?php echo $d->id ?>"><?php echo $d->nombre ?></option>
						<?php } ?>
					</select>
					<label>Documento</label><b class="asterisco"> *</b>
					<input type="text" name="documento" id="documento" class="form-control input-sm soloNum" maxlength="13">
					<label>Nombre</label><b class="asterisco"> *</b>
					<input type="text" name="nombre" id="nombre" class="form-control input-sm soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
					<label>Apellido</label><b class="asterisco"> *</b>
					<input type="text" name="apellido" id="apellido" class="form-control input-sm soloLetra" maxlength="20" onkeypress="return soloLetras(event)">
					<label>Teléfono</label><b class="asterisco"> *</b>
					<input type="text" name="telefono" id="telefono" class="form-control input-sm soloNum" maxlength="10">

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


<!-- MODAL AÑADIR PRODUCTOS -->
<div class="modal fade" id="modalPV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Lista de Productos</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form id="formA" class="form-horizontal" method="POST" action="" autocomplete="off">
					<div class="form-group">
						<div class="row table-responsive">
							<table id="listas2" class="table table-hover table-condensed table-bordered">
								<thead class="tableH">
									<tr>
										<th>CODIGO</th>
										<th>PRODUCTO</th>
										<th>MARCA</th>
										<th>PRESENTACION</th>
										<th>MEDIDA</th>
										<th>U.MEDIDA</th>
										<th>ESPECIE</th>
										<th>STOCK</th>
										<th>PRECIO</th>
										<th>SELECCIONA</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach($producto as $p) { ?>
									<tr>
										<td><?php echo $p->codigo ?></td>
										<td id="productoNombreV<?= $p->id ?>"><?php echo $p->nombre ?></td>
										<td id="marcaProductoV<?= $p->id ?>"><?php echo $p->nombreMarca ?></td>
										<td id="presentacionMarcaV<?= $p->id ?>"><?php echo $p->nombrePresentacion?></td>
										<td id="productoMedidaV<?= $p->id ?>"><?php echo $p->medida?></td>
										<td id="unidadProductoV<?= $p->id ?>"><?php echo $p->nombreUmedida?></td>
										<td id="unidadProductoV<?= $p->id ?>"><?php echo $p->especie?></td>
										<td><?php echo $p->stock ?></td>
										<td id="precioV<?= $p->id ?>"><?php echo $p->precio?></td>
										<center><td><a type="button" class="btn btn-primary btn-xs" data-dismiss="modal" onclick=" return agregarProductoV(<?= $p->id ?>)"><i class="fa fa-pencil"></i>Agregar</a></td></center>

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
<!-- MODAL FIN AÑADIR PRODUCTOS -->



<?php 
if (isset($_SESSION['messCliente'])) {
	echo $_SESSION['messCliente'];
	unset($_SESSION['messCliente']);
}


if (isset($_SESSION['validaDocumento'])) {
	echo $_SESSION['validaDocumento'];
	unset($_SESSION['validaDocumento']);
}
?> 