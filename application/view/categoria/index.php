<div class="right_col">
	
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de categorías</h2>
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modalCategoria" class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nueva categoría</a>
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
						<?php foreach($categoria as $categorias){ ?>
						<tr>
							<td><?php echo $categorias->nombreCategoria ?></td>
							<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="" onclick="editarCategoria(<?=$categorias->idCategoria ?>)"><i class="fa fa-pencil"></i> Editar</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>




<!-- MODAL NUEVO CATEGORIA -->
<div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar nuevo</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>Categoria/insertarCategoria" onsubmit="return validarCategoria()">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nombre</label><b class="asterisco"> *</b>
							<input type="text" class="form-control" id="categoria" name="categoria" onkeypress="return soloLetras(event)">
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="" name="enviarCategoria">Agregar</button>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- FIN MODAL NUEVO CATEGORIA -->



<!-- MODAL NUEVO CATEGORIA -->
<div class="modal fade" id="modalCategoriaE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Modificar categoría</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>Categoria/modificarCategoria" onsubmit="return validarCategoriaE()">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nombre</label><b class="asterisco"> *</b>

							<input type="text" class="form-control" id="nombreCategoriaE" name="nombreCategoriaE" onkeypress="return soloLetras(event)">
							<input type="hidden" name="idCategoria" id="idCategoria">
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="" name="enviarCategoria">Agregar</button>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- FIN MODAL NUEVO CATEGORIA -->

<?php 
if (isset($_SESSION['categoriaMen'])) {
	echo $_SESSION['categoriaMen'];
	unset($_SESSION['categoriaMen']);
}

if (isset($_SESSION['categoriaEMen'])) {
	echo $_SESSION['categoriaEMen'];
	unset($_SESSION['categoriaEMen']);
}
?> 