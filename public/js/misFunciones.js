
$(document).ready(function(){


 // CUANDO LE DA ENTER TRAE LOS PRODUCTOS CON EL ID QUE ESTA CAPTURANDO
 // EN EL MODULO DE COMPRA
 $('#codigoc').keypress(function(){  

 	var id = document.getElementById('codigoc').value;
 	var x = event.which;
 	if (x == 13) {
 		$.ajax({
 			type:"POST",
 			data:{'id':id},
 			dataType:'json',
 			url: uri + "/compra/traerproductoCod",
 		}).done(function(respuesta){
 			if (respuesta==0) {
 				alertify.error("No existe un producto con ese codigo");	
 			}

 			$("#idp").val(respuesta.id)
 			$("#nombrep").val(respuesta.nombre);
 			$("#preciosug").val(respuesta.precio);

 			document.getElementById('cantidad').focus();

 		}).fail(function(r){
 			alert(r);
 		});
 	}
 });


	 // CUANDO LE DA ENTER TRAE LOS PRODUCTOS CON EL ID QUE ESTA CAPTURANDO
 // EN EL MODULO DE VENTA
 $('#codigov').keypress(function(){  

 	var id = document.getElementById('codigov').value;
 	var x = event.which;
 	if (x == 13) {
 		$.ajax({
 			type:"POST",
 			data:{'id':id},
 			dataType:'json',
 			url: uri + "/venta/traerproductoCodv",
 		}).done(function(respuesta){
 			if (respuesta==0) {
 				alertify.error("No existe un producto con ese codigo");	
 			}

 			$("#idpv").val(respuesta.id)
 			$("#nombrepv").val(respuesta.nombre);
 			$("#precioV").val(respuesta.precio);
 			$("#stock").val(respuesta.stock);
 			
 			document.getElementById('cantidadv').focus();
 		}).fail(function(r){
 			alert(r);
 		});
 	}
 });

 /*VALIDA QUE SOLO SEAN NUMEROS Y POSITIVOS*/
 $('.soloNum').on('input', function () { 
 	this.value = this.value.replace(/[^0-9]/g,'');
 });


 $('#enviarNuevoS').click(function(){
 	nombre=$('#nombreS').val();
 	registrarServicio(nombre);
 });

});


/*VALIDACION DE QUE NO SE ENVIEN CAMPOS VACIOS*/
/*$('#enviar').click(function(){
	if(validarFormVacio('formA') > 0){
		alertify.alert("Debes llenar todos los campos obligatorios!");
		return false;
	}
});*/
/*VALIDACION DE QUE NO SE ENVIEN CAMPOS VACIOS*/

/*function validarFormVacio(formulario){
	datos=$('#' + formulario).serialize();
	d=datos.split('&');
	vacios=0;
	for(i=0;i< d.length;i++){
		controles=d[i].split("=");
		if(controles[1]=="A" || controles[1]==""){
			vacios++;
		}
	}
	return vacios;
}*/

//FUNCION QUE SOLO ACEPTE LETRAS
function soloLetras(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	especiales = "8-37-39-46";

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
			tecla_especial = true;
			break;
		}
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial){
		return false;
	}
}



/*---------------------------------FUNCIONES DE PROCESO CLIENTE-----------------------------------*/
function editarCliente(id){ 
	$.ajax({
		type:"POST",
		data:{'id':id},
		dataType:'json',
		url: uri + "/cliente/editarCliente",
	}).done(function(respuesta){
		
		$("#documentoE").val(respuesta.documento);
		$("#nombreE").val(respuesta.nombre);
		$("#apellidoE").val(respuesta.apellido);
		$("#telefonoE").val(respuesta.telefono);
		$("#idE").val(respuesta.id);
		$("#tipodocumento").val(respuesta.tipodocumento);
		$("#estadoE").val(respuesta.estado);


		$("#modalEditar").modal();

	});
}


function eliminarr(id) {
	$.ajax({
		type:"POST",
		data:{'id':id},
		dataType:'json',
		url: uri + "/cliente/borrarCliente",
	}).done(function(respuesta){
		alertify.alert("Dato eliminado");
	});
}

function validarCliente(){
	var documento = document.getElementById('documento').value;
	var txtNombre = document.getElementById('nombre').value;
	var apellido = document.getElementById('apellido').value;
	var telefono = document.getElementById('telefono').value;

	if(documento == null || documento.length == 0 || /^\s+$/.test(documento)){
		alertify.error("El campo documento no puede estar vacío");
		return false;
	}else if( txtNombre == null || txtNombre.length == 0 || /^\s+$/.test(txtNombre) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}else if(txtNombre.length < 3){
		alertify.error("El campo nombre no puede tener menos de 3 caracteres");
		return false;
	}else if(apellido == null || apellido.length == 0 || /^\s+$/.test(apellido)) {
		alertify.error("El campo apellido no puede estar vacío");
		return false;
	}else if(telefono == null || telefono.length == 0 || /^\s+$/.test(telefono)){
		alertify.error("El campo teléfono no puede estar vacío");
		return false;
	} 

}

function validarClienteE(){
	var documento = document.getElementById('documentoE').value;
	var NombreE = document.getElementById('nombreE').value;
	var apellidoE = document.getElementById('apellidoE').value;
	var telefonoE = document.getElementById('telefonoE').value;

	if( NombreE == null || NombreE.length == 0 || /^\s+$/.test(NombreE) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}else if(apellidoE == null || apellidoE.length == 0 || /^\s+$/.test(apellidoE)) {
		alertify.error("El campo apellido no puede estar vacío");
		return false;
	}else if(telefonoE == null || telefonoE.length == 0 || /^\s+$/.test(telefonoE))
	{
		alertify.error("El campo teléfono no puede estar vacío");
		return false;
	}else if(documento == null || documento.length == 0 || /^\s+$/.test(documento)){
		alertify.error("El campo documento no puede estar vacío");
		return false;
	}else if(telefonoE.length < 3)
	{
		alertify.error("El campo teléfono nno puede tener menos de 3 caracteres");
		return false;
	}
}



function cargarDatos(){
	var cliente=$("#cliente").val();

	$.ajax({
		url: '<?=URL?>cliente/buscaCliente/'+cliente,
		type: 'GET',
		dataType:'json'
	}).done(function(data){
		console.log(data);

		$("#telefonoVen").val(data.telefono);
		$("#documentoVen").val(data.documento);
		
	}).fail(function(r){
		alert("Error");

	});
}


/*-------------------------------FUNCIONES DE PROCESO SERVICIO----------------------------------*/

/*function registrarServicio(nombre)
{
	cadena="nombre=" + nombre;

	$.ajax({
		type:"POST",
		data:cadena,
		url: uri + "/servicio/guardarServicio",
	}).done(function(respuesta){
		alertify.success("Registro correctamente el servicio");
	}).fail(function(){
		alertify.error("Error al registrar");
	});
}*/

function editarServicios(id){
	$.ajax({
		type:"POST",
		data:{'id':id},
		dataType:'json',
		url: uri + "/servicio/editarServicio",
	}).done(function(respuesta){

		$("#descripcionE").val(respuesta.descripcion);
		$("#idE").val(respuesta.id);
		$("#estadoE").val(respuesta.estado);

		$("#servicioE").modal();

	});
}


function validarServicio(){
	var Nombre = document.getElementById('nombreS').value;
	

	if( Nombre == null || Nombre.length == 0 || /^\s+$/.test(Nombre) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}

function validarServicioE(){
	var nombreE = document.getElementById('descripcionE').value;
	
	if( nombreE == null || nombreE.length == 0 || /^\s+$/.test(nombreE) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}

/*-------------------------------FUNCIONES DE TABLA TARIFA----------------------------------*/

function validarTarifa(){
	var Precio = document.getElementById('precio').value;
	

	if( Precio == null || Precio.length == 0 || /^\s+$/.test(Precio) ) {
		alertify.error("El campo precio no puede estar vacío");
		return false;
	}
}

/*-------------------------------FUNCIONES DE TABLA MARCA----------------------------------*/

function editarMarca(id){
	$.ajax({
		type:"POST",
		data:{'id':id},
		dataType:'json',
		url: uri + "/marca/mostrarMarca",
	}).done(function(respuesta){

		$("#nombreMarcaE").val(respuesta.nombreMarca);
		$("#idmarca").val(respuesta.idMarca);
		$("#modalMarcaE").modal();

	}).fail(function(r){
		alert(r);
	});
}

function validarMarca(){
	var marca = document.getElementById('marca').value;
	
	if( marca == null || marca.length == 0 || /^\s+$/.test(marca) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}

function validarMarcaE(){
	var marca = document.getElementById('nombreMarcaE').value;
	
	if( marca == null || marca.length == 0 || /^\s+$/.test(marca) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}

/*-------------------------------FUNCIONES DE TABLA CATEGORIA----------------------------------*/

function editarCategoria(id){
	$.ajax({
		type:"POST",
		data:{'id':id},
		dataType:'json',
		url: uri + "/categoria/mostrarCategoria",
	}).done(function(respuesta){

		$("#nombreCategoriaE").val(respuesta.nombreCategoria);
		$("#idCategoria").val(respuesta.idCategoria);
		$("#modalCategoriaE").modal();

	}).fail(function(r){
		alert(r);
	});
}

function validarCategoria(){
	var categoria = document.getElementById('categoria').value;
	
	if( categoria == null || categoria.length == 0 || /^\s+$/.test(categoria) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}

function validarCategoriaE(){
	var categoria = document.getElementById('nombreCategoriaE').value;
	
	if( categoria == null || categoria.length == 0 || /^\s+$/.test(categoria) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}


/*-------------------------------FUNCIONES DE TABLA PRESENTACION-----------------------------*/

function editarPresentacion(id){
	$.ajax({
		type:"POST",
		data:{'id':id},
		dataType:'json',
		url: uri + "/presentacion/mostrarPresentacion",
	}).done(function(respuesta){

		$("#nombrePresentacioE").val(respuesta.nombrePresentacion);
		$("#idpresentacion").val(respuesta.idPresentacion);
		$("#modalPresentacionE").modal();

	}).fail(function(r){
		alert(r);
	});
}

function validarPresentacion(){
	var presentacion = document.getElementById('presentacion').value;
	
	if( presentacion == null || presentacion.length == 0 || /^\s+$/.test(presentacion) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}

function validarPresentacionE(){
	var presentacion = document.getElementById('nombrePresentacioE').value;
	
	if( presentacion == null || presentacion.length == 0 || /^\s+$/.test(presentacion) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}

/*-------------------------------FUNCIONES DE TABLA U.MEDIDA-----------------------------*/

function editarMedida(id){
	$.ajax({
		type:"POST",
		data:{'id':id},
		dataType:'json',
		url: uri + "/Umedida/mostrarUmedida",
	}).done(function(respuesta){

		$("#nombreMedida").val(respuesta.nombreUmedida);
		$("#idmedida").val(respuesta.idUmedida);
		$("#modalUmedida").modal();

	}).fail(function(r){
		alert(r);
	});
}

function validarUmedida(){
	var medida = document.getElementById('medida').value;
	
	if( medida == null || medida.length == 0 || /^\s+$/.test(medida) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}

function validarUmedidaE(){
	var medida = document.getElementById('medida').value;
	
	if( medida == null || medida.length == 0 || /^\s+$/.test(medida) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}
/*-------------------------------FUNCIONES DE TABLA TARIFA-----------------------------*/

function editarTarifa(id)
{
	$.ajax({
		type:"POST",
		data:{'id':id},
		dataType:'json',
		url: uri + "/Tarifa/mostrarTarifa",
	}).done(function(respuesta){

		$("#valor").val(respuesta.valor);
		$("#fechaE").val(respuesta.fecha);
		$("#idtarifa").val(respuesta.idTarifa);
		$("#modaltarifaE").modal();

	}).fail(function(r){
		alert(r);
	});
}

/*-------------------------------FUNCIONES DE TABLA ESPECIE-----------------------------*/
function editarEspecie(id){ 
	$.ajax({
		type:"POST",
		data:{'idespecie':id},
		dataType:'json',
		url: uri + "/especie/editarEspecie",
	}).done(function(respuesta){

		$("#nombreE").val(respuesta.nombre);
		$("#idEs").val(respuesta.idespecie);


		$("#editarEs").modal();

	});
}


function validarEspecie(){
	var especie = document.getElementById('especie').value;
	
	if( especie == null || especie.length == 0 || /^\s+$/.test(especie) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}

function validarEspecieE(){
	var especie = document.getElementById('nombreE').value;
	
	if( especie == null || especie.length == 0 || /^\s+$/.test(especie) ) {
		alertify.error("El campo nombre no puede estar vacío");
		return false;
	}
}

/*-------------------------------FUNCIONES DE TABLA DOCUMENTO-----------------------------*/

function editarDocumento(id){ 
	$.ajax({
		type:"POST",
		data:{'id':id},
		dataType:'json',
		url: uri + "/documento/editarDocumento",
	}).done(function(respuesta){

		$("#nombreD").val(respuesta.nombre);
		$("#idD").val(respuesta.id);


		$("#modaldocumentoE").modal();

	});
}

/*-------------------------------FUNCIONES DE TABLA PRODUCTO-----------------------------*/
function editarProducto(id){ 
	$.ajax({
		type:"POST",
		data:{'id':id},
		dataType:'json',
		url: uri + "/Producto/mostrarProducto",
	}).done(function(respuesta){

		$("#nombreP").val(respuesta.nombre);
		$("#marcaP").val(respuesta.marca);
		$("#presentacionP").val(respuesta.presentacion);
		$("#medidaP").val(respuesta.medida);
		$("#UmedidaP").val(respuesta.unidadMedida);
		$("#categoriaP").val(respuesta.categoria);
		$("#estadoP").val(respuesta.estado);
		$("#especieP").val(respuesta.especie);
		$("#precioP").val(respuesta.precio);
		$("#codigopp").val(respuesta.codigo);
		$("#idP").val(respuesta.id);

		$("#modalProductoE").modal();
		

	});
}

function validarProducto()
{
	var nombre = document.getElementById('produc').value;

	if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) {
		alertify.error("El campo nombre no puede estar vacio");
		return false;
	}
}


function editarProveedor(id){ 
	$.ajax({
		type:"POST",
		data:{'idproveedor':id},
		dataType:'json',
		url: uri + "/proveedor/editarProveedor",
	}).done(function(respuesta){

		$("#nitE").val(respuesta.nit);
		$("#tipopersonaE").val(respuesta.tipopersona);
		$("#nombreE").val(respuesta.nombre);
		$("#direccionE").val(respuesta.direccion);
		$("#telefonoE").val(respuesta.telefono);
		$("#responsableE").val(respuesta.responsable);
		$("#estadoE").val(respuesta.estado);
		$("#idE").val(respuesta.idproveedor);


		$("#editarE").modal();

	});
}



function validarrr(){

	var direccionn = document.getElementById('direccion').value;
	var tipopersona = document.getElementById('tipopersona').value;
	var nombre = document.getElementById('nombre').value;
	var nitt = document.getElementById('nit').value;
	var telefonooO = document.getElementById('telefono').value;
	var responsableeE = document.getElementById('responsable').value;





	if(nitt == null || nitt.length == 0 || /^\s+$/.test(nitt)){

		alertify.error('El campo nit no puede estar vacío');
		return false;
			}else if(nitt.length  <8 ){//|| nitt.length ){
				alertify.error('El nit debe llevar 9 caracteres');
				return false;
			}else if(nitt.length   >= 13 ){
				alertify.error('El nit no puede tener más de 12 caracteres');
				return false;
			}
			if(tipopersona == null || tipopersona.length == 0 || /^\s+$/.test(tipopersona)){

				alertify.error('No se puede dejar el campo tipo persona vacio');
				return false;
			}
			if(nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)){

				alertify.error('No puedes dejar dejar el campo de nombre vacio');
				return false;
			}
			if(telefonooO == null || telefonooO.length == 0 || /^\s+$/.test(telefonooO)){

				alertify.error('El campo teléfono no puede estar vacío');
				return false;
			}
			if(responsableeE == null || responsableeE.length == 0 || /^\s+$/.test(responsableeE)){

				alertify.error('El campo responsable no puede estar vacío');
				return false;
			}


			if(direccionn == null || direccionn.length == 0 || /^\s+$/.test(direccionn)){

				alertify.error('El campo dirección no puede estar vacío');
				return false;
			}else if (direccionn.length < 4  ){
				alertify.error('El campo dirección no puede tener menos de 4 caracteres')
				return false;
			}


			else if(direccionn.length >25 ){
				alertify.error('El campo de la dirección esta muy largo');
				return false;
			}


		}


		function validarrE(){

			var direccionn = document.getElementById('direccionE').value;
			var tipopersonaE = document.getElementById('tipopersonaE').value;
			var nombreE = document.getElementById('nombreE').value;
			var nitt = document.getElementById('nitE').value;
			var telefonooO = document.getElementById('telefonoE').value;
			var responsableeE = document.getElementById('responsableE').value;
			var estadoo = document.getElementById('estadoE').value;





			if(nitt == null || nitt.length == 0 || /^\s+$/.test(nitt)){

				alertify.error('El campo nit no puede estar vacío');
				return false;
			}else if(nitt.length  <8 ){//|| nitt.length ){
				alertify.error('El nit debe llevar 9 caracteres');
				return false;
			}else if(nitt.length   >= 14 ){
				alertify.error('El nit no puede tener más de 9 caracteres');
				return false;
			}
			if(tipopersonaE == null || tipopersonaE.length == 0 || /^\s+$/.test(tipopersonaE)){

				alertify.error('El campo tipo de persona no se puede vacío');
				return false;
			}
			if(nombreE == null || nombreE.length == 0 || /^\s+$/.test(nombreE)){

				alertify.error('El campo nombre de persona no se puede vacío');
				return false;
			}
			if(telefonooO == null || telefonooO.length == 0 || /^\s+$/.test(telefonooO)){

				alertify.error('El campo teléfono no puede estar vacío');
				return false;
			}
			if(responsableeE == null || responsableeE.length == 0 || /^\s+$/.test(responsableeE)){

				alertify.error('El campo responsable no puede estar vacío');
				return false;
			}


			if(direccionn == null || direccionn.length == 0 || /^\s+$/.test(direccionn)){

				alertify.error('El campo dirección no puede estar vacío');
				return false;
			}else if (direccionn.length < 4  ){
				alertify.error('El campo dirección no puede tener menos de 4 caracteres')
				return false;
			}


			else if(direccionn.length >25 ){
				alertify.error('El campo de la dirección esta muy largo');
				return false;
			}if(estadoo== null || estadoo.length == 0 || /^\s+$/.test(estadoo)){

				alertify.error('El campo estado no puede estar vacío');
				return false;
			}


		}

		function Tproveedor(id){ 
			$.ajax({
				type:"POST",
				data:{'idproveedor':id},
				dataType:'json',
				url: uri + "/compra/traerproveedor",
			}).done(function(respuesta){
				console.log(respuesta.idproveedor);
				$("#idc").val(respuesta.idproveedor)
				$("#proveedorc").val(respuesta.nombre);
				$("#nitc").val(respuesta.nit);
				$("#telefonoc").val(respuesta.telefono);

			});
		}


		function Tproducto(id){ 
			$.ajax({
				type:"POST",
				data:{'id':id},
				dataType:'json',
				url: uri + "/compra/traerproducto",
			}).done(function(respuesta){
				console.log(respuesta.id);
				$("#idp").val(respuesta.id)
				$("#nombrep").val(respuesta.nombre);
				$("#preciosug").val(respuesta.precio);

			});
		}




		function editarUsuario(id){ 
			$.ajax({
				type:"POST",
				data:{'id':id},
				dataType:'json',
				url: uri + "/usuarios/editarUsuario",
			}).done(function(respuesta){


				$("#apeleEe").val(respuesta.email);
				$("#idU").val(respuesta.id);



				$("#modalusers").modal();

			});
		}

		function editarRaza(id){ 
			$.ajax({
				type:"POST",
				data:{'id':id},
				dataType:'json',
				url: uri + "/raza/editarRaza",
			}).done(function(respuesta){

				$("#nombreD").val(respuesta.nombre);
				$("#idD").val(respuesta.id);


				$("#modalrazaE").modal();

			});
		}

		function validarRaza(){

			var txtNombre = document.getElementById('nombre').value;


			if( txtNombre == null || txtNombre.length == 0 || /^\s+$/.test(txtNombre) ) {
				alertify.error("El campo raza no puede estar vacío");
				return false;
			}else if(txtNombre.length < 3){
				alertify.error("El campo raza no puede tener menos de 3 caracteres");
				return false;
			} 

		}


		function validarRazaM(){

			var txtNombre = document.getElementById('nombreD').value;


			if( txtNombre == null || txtNombre.length == 0 || /^\s+$/.test(txtNombre) ) {
				alertify.error("El campo nombre no puede estar vacío");
				return false;
			}else if(txtNombre.length < 3){
				alertify.error("El campo raza no puede tener menos de 3 caracteres");
				return false;
			} 

		}

		function Tcliente(id){ 
			$.ajax({
				type:"POST",
				data:{'idcliente':id},
				dataType:'json',
				url: uri + "/venta/traerCliente",
			}).done(function(respuesta){
				$("#idV").val(respuesta.id)
				$("#clienteV").val(respuesta.nombre+' '+respuesta.apellido);
				$("#documentoVen").val(respuesta.documento);
				$("#telefonoVen").val(respuesta.telefono);
			});
		}

		function TclienteServicio(id){ 
			$.ajax({
				type:"POST",
				data:{'idcliente':id},
				dataType:'json',
				url: uri + "/venta/traerCliente",
			}).done(function(respuesta){
				$("#idS").val(respuesta.id)
				$("#clienteS").val(respuesta.nombre+' '+respuesta.apellido);
				$("#documentoS").val(respuesta.documento);
				$("#telefonoS").val(respuesta.telefono);
			});
		}

		function validarlogin(){
			var emaill = document.getElementById('mail').value;
			var pasadminn = document.getElementById('pasadmin').value;


			if( emaill == null || emaill.length == 0 || /^\s+$/.test(emaill) ) {
				alertify.error("El campo correo electrónico no puede estar vacío");
				return false;
			}if( pasadminn == null || pasadminn.length == 0 || /^\s+$/.test(pasadminn) ) {
				alertify.error("El campo contraseña no puede estar vacío");
				return false;
			}

		}


// FUNCIONES DE COMPRA


function agregarProductoV(id)
{
	$.ajax({
		type:"POST",
		data:{'idproducto':id},
		dataType:'json',
		url: uri + "/venta/traerProducto",
	}).done(function(respuesta){
		$("#idpv").val(respuesta.id)
		$("#nombrepv").val(respuesta.nombre);
		$("#precioV").val(respuesta.precio);
		$("#stock").val(respuesta.stock);
		
	});
}
	//modulos de tabla detallerazatarifa
	function agregarDetalle(id)
	{
		$.ajax({
			type:"POST",
			data:{'idetalle':id},
			dataType:'json',
			url: uri + "/servicio/traerDetalle",
		}).done(function(respuesta){
			$("#detallera").val(respuesta.nombre)
			$("#detallerazaa").val(respuesta.id);

		});
	}


	function TServicio(id)
	{
		$.ajax({
			type:"POST",
			data:{'id':id},
			dataType:'json',
			url: uri + "/venta/traerDetalleS",
		}).done(function(respuesta){
			$("#idSS").val(respuesta.id)
			$("#nombreS").val(respuesta.descripcion)
			$("#razaS").val(respuesta.nombre);
			$("#precioS").val(respuesta.valor);
		});
	}



//FUNCION DE SOLO NUMEROS EN LOS INPUS DE VENTA
function soloNumeross(e) {
	var key = window.Event ? e.which : e.keyCode;
	return ((key >= 48 && key <= 57) ||(key==8))
}

function pierdeFoco(e){
	var valor = e.value.replace(/^0*/, '');
	e.value = valor;
}

function editt(id){ 
			$.ajax({
				type:"POST",
				data:{'id':id},
				dataType:'json',
				url: uri + "/usuarios/editarUsuario",
			}).done(function(respuesta){


				$("#emailq").val(respuesta.email);
				$("#nombre").val(respuesta.user);
				$("#idU").val(respuesta.id);
				$("#modalT").modal();

			});
		}