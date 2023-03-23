<div class="right_col">
	
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de marcas</h2>
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modalMarca" class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nueva marca</a>
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
						<?php foreach($marcas as $m){ ?>
						<tr>
							<td><?php echo $m->nombreMarca ?></td>
							<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="" onclick="editarMarca(<?=$m->idMarca ?>)"><i class="fa fa-pencil"></i> Editar</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>




<!-- MODAL NUEVO MARCA -->
<div class="modal fade" id="modalMarca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>Marca/registrarMarca" onsubmit="return validarMarca()">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nombre</label><b class="asterisco"> *</b>
							<input type="text" class="form-control" id="marca" name="marca" onkeypress="return soloLetras(event)">
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="" name="enviarMarca">Agregar</button>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- FIN MODAL NUEVO CLIENTE -->



<!-- MODAL NUEVO MARCA -->
<div class="modal fade" id="modalMarcaE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Modificar marca</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>Marca/modificarMarca" onsubmit="return validarMarcaE()">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nombre</label><b class="asterisco"> *</b>
							<input type="text" class="form-control" id="nombreMarcaE" name="marca" onkeypress="return soloLetras(event)">
							<input type="hidden" name="idmarca" id="idmarca">
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="" name="enviarMarca">Agregar</button>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- FIN MODAL NUEVO CLIENTE -->

<?php 
if (isset($_SESSION['marcaMen'])) {
	echo $_SESSION['marcaMen'];
	unset($_SESSION['marcaMen']);
}

if (isset($_SESSION['marcaEMen'])) {
	echo $_SESSION['marcaEMen'];
	unset($_SESSION['marcaEMen']);
}
?> 