<div class="right_col" role="main">

	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de ventas productos</h2>
			<div class="row">
				<a href="<?php echo URL ?>venta/index" data-href="" data-toggle="modal"  class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nueva venta producto</a>

				<a href="<?php echo URL ?>venta/servicio" data-href="" data-toggle="modal"  class="btn btn-primary pull-right"><i class="fa fa-check" aria-hidden="true" ></i>&nbsp;Nueva venta servicio</a>
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
							<th>CLIENTE</th>
							<th>PRECIO VENTA</th>
							<th>FECHA DE VENTA</th>
							<th>FACTURA</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($ventas as $li){ ?>
						<tr>
							<td><?php echo $li->idventa ?></td>
							<td><?php echo $li->nombre ?></td>
							<td><?php echo $li->precioventa ?></td>
							<td><?php echo $li->fecha ?></td>
							<td><a href="<?php echo URL ?>venta/reporte?id=<?php echo $li->idventa ?>" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-pencil"></i> Factura </a></td>
							<?php } ?> 
						</tbody>
					</table>
				</div>
			</div>
		</div>


		<div class="x_panel">
			<div class="x_title">
				<h2>Lista de ventas servicios</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<div class="row">
					<table id="listas2" class="table table-hover table-condensed table-bordered">
						<thead>
							<tr>
								<th>N°</th>
								<th>CLIENTE</th>
								<th>PRECIO VENTA</th>
								<th>FECHA DE VENTA</th>
								<th>FACTURA</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($ventaservicio as $li){ ?>
							<tr>
								<td><?php echo $li->idventa ?></td>
								<td><?php echo $li->nombre ?></td>
								<td><?php echo $li->precioventa ?></td>
								<td><?php echo $li->fecha ?></td>
								<td><a href="<?php echo URL ?>venta/reporteservicio?id=<?php echo $li->idventa ?>" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-pencil"></i> Factura </a></td>
								<?php } ?> 
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>