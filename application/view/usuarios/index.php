
<div class="right_col" role="main">

	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de usuario</h2>
			<div class="row">
				<a href="#" data-href="" data-toggle="modal" data-target="#modalN" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true" id="nuevoCliente"></i>&nbsp;Nuevo registro</a>
			</div>
			<div class="clearfix"></div>

		</div>
		<div class="x_content">
			<br />
			<div class="row table-responsive">
				<table id="listas" class="table table-hover table-condensed table-bordered">
					<thead>
						<tr>

							<th>USUARIO</th>
							<th>CORREO</th>
							<th>EDITAR</th>


						</tr>
					</thead>


					<tbody>


						<tr>
							<?php foreach ($usuarios as $usuario) { ?>
							<td><?php if(isset($usuario->user)) echo htmlspecialchars($usuario->user, ENT_QUOTES, 'UTF-8'); ?></td>

							<td><?php if(isset($usuario->email)) echo htmlspecialchars($usuario->email, ENT_QUOTES, 'UTF-8'); ?></td>

				<td style="text-align: center"><a class="btn btn-primary btn-xs" href="#" id="" onclick="editt(<?=$usuario->id  ?>)"><i class="fa fa-pencil"></i> Editar</a></td>

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


<div class="modal fade" id="modalN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="color: white "><i class='glyphicon glyphicon-edit'></i> Agregar usuario</h4>
			</div>

			<div class="modal-body" style="color: black">
				<form id="formA" name="f1" class="form-horizontal" method="POST" action="<?php echo URL ?>Usuarios/registraUsuario" autocomplete="off">

					<label>Usuario</label><b style="color: red"> *</b>
					<input type="text" id="realname" name="user" class="form-control input" >

					<label >Correo</label><b style="color: red"> *</b>
					<input type="text" id="apele" name="email" class="form-control input" required placeholder="Correo"  >

					<label for="inputPassword4">Contraseña</label><b style="color: red"> *</b>
					<input type="password" name="pasadmin" id="rpass1" class="form-control input"  required placeholder="Contraseña">

					<label for="inputPassword4">Repetir contraseña</label><b style="color: red"> *</b>
					<input type="password" id="rpass" name="rpass" class="form-control input"  required placeholder="Repetir contraseña">



				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" onclick="return comprobarClave()" id="enviar" name="enviaru">Agregar</button>
					<script type="text/javascript">
						function comprobarClave($valor){ 
							clave1 = document.f1.pasadmin.value; 
							clave2 = document.f1.rpass.value; 

							if (clave1 != clave2) {
								var rpass1 = document.getElementById("rpass1");
								var rpass = document.getElementById("rpass");
								rpass1.style.border = "1px solid red";
								rpass.style.border = "1px solid red";

								alertify.error("Las contraseñas no coinciden");

								return false;


							}else{

								return true;
							}

						} 
					</script>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="modalT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header" >
				<h4 class="modal-title" id="" style="color: white "><i class='glyphicon glyphicon-edit'></i> Modificar usuario</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="<?php echo URL ?>usuarios/modificarUsuario" autocomplete="off">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Email</label>
							<input type="text" class="form-control" id="emailq" name="emailq" >

							<label>Nombre</label>
							<input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return soloLetras(event)">
							<input type="hidden" name="idU" id="idU">
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="" name="enviaruuu">Modificar</button>
				</div>
			</form>
		</div>

	</div>
</div>



<?php 
if (isset($_SESSION['Usermelo'])) {
	echo $_SESSION['Usermelo'];
	unset($_SESSION['Usermelo']);
}

if (isset($_SESSION['userRes'])) {
	echo $_SESSION['userRes'];
	unset($_SESSION['userRes']);
}

?> 

