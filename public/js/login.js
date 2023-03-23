$(document).ready(function(){
	$('#cajaRecuperar').hide(); //OCULTAR LA CAJA DE RECUPERAR CONTRASEÑA

	$('#recuperar').click(function(){ //DESAPARECER CAJA DE INGRESO Y APARCER LA DE RECUPERAR CONTRASEÑA
		$('#iniciar').slideToggle();
		$('#cajaRecuperar').slideToggle();
	});

	$('#iniciarSesion').click(function(){ //DESAPARECER CAJA RECUPERAR CONTRASEÑA Y APARECER INGRESO
		$('#iniciar').slideToggle();
		$('#cajaRecuperar').slideToggle();
	});


});