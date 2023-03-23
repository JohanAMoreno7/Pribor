function calc_totals(){
    var subtotal = 0;
    $('.input-subtotal').each(function(){
        subtotal += parseFloat($(this).text());
    });

    $(".preview-subtotals").text(subtotal);
    var iva = 19;
    var operacion = subtotal;
    var total = subtotal;
    // $(".preview-operacion").text(operacion);
    $(".preview-totals").text(total);    
    
}

$(document).on('click', '.input-remove-rowss', function(){ 
    var tr = $(this).closest('tr');
    tr.fadeOut(200, function(){
      tr.remove();
      let id = tr.find(".input-idS");
      let dato = conS.findIndex(e => e.idS == $(id).html());
      conS.splice(dato, 1);
      calc_totals();

      console.log(conS);
  });
});

var servic = {};
var conS = [];
var idcliente;
var fecha;



$(function(){
    $('.agrega-servicio').click(function(){

        cliente = $("#clienteS").val();
        servicio = $("#nombreS").val();
        if( cliente == null || cliente.length == 0 || /^\s+$/.test(cliente) ) {
            alertify.error("El campo cliente no puede estar vacío");
            return false;
        }else if(servicio == null || servicio.length == 0 || /^\s+$/.test(servicio)){
            alertify.error("El campo servicio no puede estar vacio");
            return false;
        }else {
            servic["idS"] = $('.estan input[name="idS"]').val();
            servic["nombreS"] = $('.estan input[name="nombreS"]').val();
            servic["razaS"] = $('.estan input[name="razaS"]').val();
            servic["precioS"] = $('.estan input[name="precioS"]').val();
            servic["subtotal"] = $('.estan input[name="precioS"]').val();
            servic["remove-rowss"] = '<span class="glyphicon glyphicon-remove"></span>';

            conS.push({idS: servic["idS"], nombre: servic["nombreS"], raza: servic["razaS"], precio: servic["precioS"]});
            var subtotal = $('#').val(servic["subtotal"]);
            var row = $('<tr></tr>');
            $.each(servic, function( type, value ) {
                $('<td id="" class="input-'+type+'"></td>').html(value).appendTo(row);
            });
            $('.carriel > tbody:last').append(row);
            calc_totals();
        }


        // subtotal();
    });  
});

$('#venders').click(function() {
    totalVens = $('#totalVens').html();
    idcliente = $('#idS').val();
    fecha = $("#fecb").val();
    vendedor = $("#usuarioss").val();
    $.ajax({
        url: uri + "/venta/agregaservicio",
        type: 'POST',
        data: {
            servicio: conS,
            totalVen: totalVens,
            idcliente: idcliente,
            fecha: fecha,
            vendedor:vendedor
        }
    }).done(function(resultado) {

        location.reload();
    }).fail(function(resultado) {
        alert(resultado);
    });
})

$(".limpiar").click(function(event) {
 $('.borra').val("");
});

$('#vendevvv').click(function() {
   var producto = $('#nombrepv').val();
   var idproducto = $('#idpv').val();
   var cantidad = $("#cantidadv").val();

})


