<div class="right_col" role="main">

	<div class="container">	
			<div class="row">
			<br>
			<br>
			<br>
			<br>

			 <div class="col-sm-5">
            <h4>Gestión de servicios</h4>
            <div class="panel panel-default">
                <div class="panel-body form-horizontal estan">
                    <div class="form-group">
                    	<form class="form-horizontal" style="color:#333" >
                        <label for="concept" class="col-sm-3 control-label">Cliente</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control input-sm input" name="cliente" id="clienteS" autofocus disabled>
                        </div>
                         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoClienteS">
							<span class="glyphicon glyphicon-search"></span>
						</button>
                        <input type="hidden" id="idS" name="idcliente" value="" />


                    </div>

                    <?php 

						$fecha1 = date("Y-m-d");
						
						?>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Usuario</label>
                        <div class="col-sm-9">
                           

                            <input type="text" class="form-control input" id="usuarioss" value="<?php if (isset($_SESSION['admin'])) {
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
                        <label for="amount" class="col-sm-3 control-label">Servicio</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control input-sm input" id="nombreS" name="nombreS"   autofocus disabled>
								<input id="idSS" name="idS" type='hidden'>
                        </div>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoS">
									<span class="glyphicon glyphicon-search"></span>
								</button>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Raza</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control input-sm input soloNum" id="razaS" name="razaS" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Precio</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control input-sm input soloNum" id="precioS" name="precioS" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 text-right">

                        	<button id="vendevvv" type="button" class="btn btn-default agrega-servicio" >
										<span class="glyphicon glyphicon-plus"></span> Agregar
									</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>            
        </div>

        <div class="col-sm-7">
            <h4>Tabla:</h4>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table carriel">
                            <thead>
                                <tr>
                                    <th>ID</th>
									<th>SERVICIO</th>
									<th>RAZA</th>
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
                <div class="col-xs-6">

                	<h4>Subtotal: <strong><span class="preview-subtotals"  id="spTotal"></span></strong></h4>

                     <!-- <div id="subTotal" class="input-group-addon">Sub Total:</div>
						<span class="input-group-addon preview-subtotal" id="spTotal"></span> -->
                </div>
                <div class="col-xs-6">
                	<h4>Total: <strong><span class="preview-totals"  id="totalVens" name="totalVens"></span></strong></h4>

                    <!-- <div id="iva" class="input-group-addon">Total:</div>
                    	<span class="input-group-addon preview-total" id="totalCom" name="totalCom"></span> -->
                    </div>
            </div>
            <br>

            <br>

            <div class="row text-right">
            </div>

           


            <div class="row">
                <div class="col-xs-12">
                    <hr style="border:1px dashed #dddddd;">

<button type="button"  class="btn btn-sm btn-primary guardar-carrito btn-block"  id="venders">Guardar</button>



               
                </div>                
            </div>
        </div>
    </div>

</div>




	

			<!-- TABLA DETALLE -->
			




		<!-- MODAL AGREGAR CLIENTE -->
		<div class="modal fade" id="nuevoClienteS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
													<td style="text-align: center"><a href="#" class="btn btn-primary btn-xs" data-dismiss="modal"  onclick="TclienteServicio(<?= $cliente->id ?>)"><i class="fa fa-pencil"></i> Agregar </a></td>
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


		<!-- MODAL AGREGAR SERVICIO -->
		<div class="modal fade" id="nuevoS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
									<table id="listas2" class="table table-hover table-condensed table-bordered">
										<thead class="tableH">
											<tr>

												<th>SERVICIO</th>
												<th>RAZA</th>
												<th>TARIFA</th>
												<th>SELECCIONE</th>
											</tr>
										</thead>




										<tbody>
											<?php foreach ($servicios as $s) {
												?>
												<tr>
													<td><?php echo $s->descripcion ?></td>
													<td><?php echo $s->nombre ?></td>
													<td><?php echo $s->valor ?></td>
													<td style="text-align: center"><a href="#" class="btn btn-primary btn-xs" data-dismiss="modal"  onclick="TServicio(<?= $s->id ?>)"><i class="fa fa-pencil"></i> Agregar </a></td>
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
		<!-- FIN MODAL NUEVO SERVICIO -->