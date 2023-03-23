<div class="right_col" role="main">

	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de las compras</h2>
			<div class="row">
				<a href="<?php echo URL ?>compra/index" data-href="" data-toggle="modal"  class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nueva compra</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />
			<div class="row">
				<table id="listas" class="table table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>N°</th>
							<th>PROVEEDOR</th>
							<th>PRECIO COMPRA</th>
							<th>FECHA DE COMPRA</th>
							<th>FACTURA</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($compra as $li){ ?>
						<tr>
							<td><?php echo $li->idcompra ?></td>
							<td><?php echo $li->nombre ?></td>
							<td><?php echo $li->preciocompra ?></td>
							<td><?php echo $li->fecha ?></td>
							<td><a href="<?php echo URL ?>compra/reportecompra?id=<?php echo $li->idcompra ?>"  target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Factura </a></td>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>