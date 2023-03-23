<div class="right_col" role="main">

	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de especies</h2>
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modalE" class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nueva especie</a>
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
						<?php foreach($especies as $e){ ?>
						<tr>
							<td><?php echo $e->nombre ?></td>
							<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="" onclick="editarEspecie(<?=$e->idespecie  ?>)"><i class="fa fa-pencil"></i> Editar</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>	 

<div class="modal fade" id="modalE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i>Agregar especie</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form id="formA" class="form-horizontal" method="POST" action="<?php echo URL; ?>Especie/guardarEspecie" autocomplete="off" onsubmit="return validarEspecie()">

					<label >Nombre</label><b class="asterisco"> *</b>
					<input type="text" name="nombre" id="especie" class="form-control" placeholder="Nombre especie"  onkeypress="return soloLetrasS(event)"  />


				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary"  name="enviarEs">Agregar</button>
				</div>
			</div>
		</form>
	</div>
</div>



<div class="modal fade" id="editarEs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" ><i class='glyphicon pen-square'></i> Modificar especie</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form class="form-horizontal" method="POST" action="<?php echo URL; ?>Especie/actualizarEspecie" autocomplete="off" onsubmit="return validarEspecieE()">

					<label >Nombre</label>
					<input type="text" id="nombreE"  name="nombreE" class="form-control" placeholder="Nombre especie" onkeypress="return soloLetras(event)">
					<input type="hidden" id="idEs" name="idEspecie" value="" />
					<br>

				</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="enviarE" name="enviarespecie">Guardar cambios</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>