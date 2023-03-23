<div class="right_col" role="main">

	<div class="x_panel">
		<div class="x_title">
			<h2>Iva del sistema</h2>
			<div class="clearfix"></div>

		</div>
		<div class="x_content">
			<br />
			<div class="row table-responsive">
				<table id="listas" class="table table-hover table-condensed table-bordered">
					<thead>
						<tr>

							<th>IVA</th>
							<th>EDITAR</th>
						

						</tr>
					</thead>


					<tbody>


						<tr>
							<?php foreach ($usuarioss as $iv) { ?>
							<td><?php if(isset($iv->iva)) echo htmlspecialchars($iv->iva, ENT_QUOTES, 'UTF-8'); ?></td>


				<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="" onclick="editv(<?=$iv->id  ?>)"><i class="fa fa-pencil"></i> Editar</a></td>

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


<div class="modal fade" id="modaliv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Modificar iva</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form id="formA" name="f1" class="form-horizontal" method="POST" action="<?php echo URL ?>usuarios/modificaIva" autocomplete="off">

					<label>IVA</label>
					<input type="number" id="ivass" name="ivass" class="form-control input" >



					<input type="hidden" name="idi" id="idi">

					



				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="enviares" name="enviares">Guardar</button>
					
				</div>
			</div>
		</form>
	</div>
</div>



<?php 
if (isset($_SESSION['ivas'])) {
	echo $_SESSION['ivas'];
	unset($_SESSION['ivas']);
}


?>