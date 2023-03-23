function calc_total(){
    var subtotal = 0;
    $('.input-subtotal').each(function(){
        subtotal += parseFloat($(this).text());
    });

    $(".preview-subtotal").text(subtotal);
    var iva = 19;
    var operacion = (subtotal*iva)/100;
    var total = operacion+subtotal;
    $(".preview-operacion").text(operacion);
    $(".preview-total").text(total);    
    
}


$(document).on('click', '.input-remove-rows', function(){ 
    var tr = $(this).closest('tr');
    tr.fadeOut(200, function(){
      tr.remove();
      let id = tr.find(".input-idpv");
      let dato = con.findIndex(e => e.idpv == $(id).html());
      con.splice(dato, 1);
      calc_total();

      console.log(con);
  });
});


var vector = {};
var con = [];
var idcliente;
var fecha;



$(function(){
    $('.agrega-producto').click(function(){

        stock = $("#stock").val();
        cliente = $("#clienteV").val();
        producto = $("#nombrepv").val();
        cantidad = parseInt(document.getElementById("cantidadv").value,10);
        if( cliente == null || cliente.length == 0 || /^\s+$/.test(cliente) ) {
            alertify.error("El campo cliente no puede estar vacío");
            return false;
        }else if(producto == null || producto.length == 0 || /^\s+$/.test(producto)){
            alertify.error("El campo producto no puede estar vacio");
            return false;
        }else if (cantidad == null || cantidad.length == 0 || /^\s+$/.test(cantidad)) {
         alertify.error("El campo cantidad no puede estar vacio");
         return false;
     }else if(stock>=cantidad) {
        vector["idpv"] = $('.todos input[name="idpv"]').val();
        vector["nombrepv"] = $('.todos input[name="nombrepv"]').val();
        vector["cantidadv"] = $('.todos input[name="cantidadv"]').val();
        vector["precioV"] = $('.todos input[name="precioV"]').val();
        vector["subtotal"] = $('.todos input[name="precioV"]').val()*$('.todos input[name="cantidadv"]').val();
        vector["remove-rows"] = '<span class="glyphicon glyphicon-remove"></span>';

        con.push({idpv: vector["idpv"], nombre: vector["nombrepv"], cantidad: vector["cantidadv"], precio: vector["precioV"]});
        var subtotal = $('#subtotal').val(vector["subtotal"]);
        var row = $('<tr></tr>');
        $.each(vector, function( type, value ) {
            $('<td id="" class="input-'+type+'"></td>').html(value).appendTo(row);
        });
        $('.tabla-detalle > tbody:last').append(row);
        calc_total();
        


                    //VACIA LOS CAMPOS Y ENFOCA EL INPUT 
                    $("#codigov").val("");
                    $("#nombrepv").val("");
                    $("#cantidadv").val("");
                    document.getElementById('codigov').focus();
                } else {
                    alertify.error("No hay stock");
                    return false;
                }


        // subtotal();
    });  
});

$('#vender').click(function() {
    var us = $('#us').val();
    totalVen = $('#totalVen').html();
    idcliente = $('#idV').val();
    fecha = $("#fecb").val();
    iva = $('#iva').html();

    $.ajax({
        url: uri + "/venta/agrega",
        type: 'POST',
        data: {
            venta: con,
            totalVen: totalVen,
            idcliente: idcliente,
            fecha: fecha,
            usuario:us,
            iva:iva
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


