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


$(document).on('click', '.input-remove-row', function(){ 
    var tr = $(this).closest('tr');
    tr.fadeOut(200, function(){
      tr.remove();
      let id = tr.find(".input-idp");
      let dato = datos.findIndex(e => e.idp == $(id).html());
      datos.splice(dato, 1);
      calc_total();

      console.log(datos);
  });
});

var form_data = {};
var datos = [];
var idproveedor;
var fecha;

$(function(){
    $('.preview-add-button').click(function(){

        preciosug = parseInt(document.getElementById('preciosug').value,10);
        proveedorComp = $("#proveedorc").val();
        productoComp = $("#nombrep").val();
        cantidadComp = $("#cantidad").val();
        precioComp = $("#precio").val();
        loteComp = $("#lote").val();
        fechaComp = $("#fechal").val();

        if( proveedorComp == null || proveedorComp.length == 0 || /^\s+$/.test(proveedorComp) ) {
            alertify.error("El campo proveedor no puede estar vacío");
            return false;
        }else if(proveedorComp.length < 3){
            alertify.error("El campo proveedor no puede tener menos de 3 caracteres");
            return false;
        }if( productoComp == null || productoComp.length == 0 || /^\s+$/.test(productoComp) ) {
            alertify.error("El campo producto no puede estar vacío");
            return false;
        }if( cantidadComp == null || cantidadComp.length == 0 || /^\s+$/.test(cantidadComp) ) {
            alertify.error("El campo cantidad no puede estar vacío");
            return false;
        }if (preciosug>=parseInt(document.getElementById("precio").value,10)) {

        }else {
            alertify.error("El precio de compra no puede ser mayor al sugerido");
            return  false;
        }if( precioComp == null || precioComp.length == 0 || /^\s+$/.test(precioComp) ) {
            alertify.error("El campo precio no puede estar vacío");
            return false;
        }else if(precioComp.length < 3){
            alertify.error("El campo precio no puede tener menos de 3 caracteres");
            return false;
        }

        if( loteComp == null || loteComp.length == 0 || /^\s+$/.test(loteComp) ) {
            alertify.error("El campo lote no puede estar vacío");
            return false;
        }else if(loteComp.length < 5){
            alertify.error("El campo lote no puede tener menos de 5 caracteres");
            return false;
        }

        if( fechaComp == null || fechaComp.length == 0 || /^\s+$/.test(fechaComp) ) {
            alertify.error("El campo fecha no puede estar vacío");
            return false;
        } else
        {

            form_data["idp"] = $('.payment-form input[name="idp"]').val();
            form_data["nombrep"] = $('.payment-form input[name="nombrep"]').val();
            form_data["cantidad"] = $('.payment-form input[name="cantidad"]').val();
            form_data["precio"] = $('.payment-form input[name="precio"]').val();
            form_data["lote"] = $('.payment-form input[name="lote"]').val();
            form_data["fechal"] = $('.payment-form input[name="fechal"]').val();
            form_data["subtotal"] = $('.payment-form input[name="precio"]').val()*$('.payment-form input[name="cantidad"]').val();
            form_data["remove-row"] = '<span class="glyphicon glyphicon-remove"></span>';

            datos.push({idp: form_data["idp"], nombre: form_data["nombrep"], cantidad: form_data["cantidad"], precio: form_data["precio"], lote: form_data["lote"], fechalote: form_data["fechal"]});
            var subtotal = $('#subtotal').val(form_data["subtotal"]);
            var row = $('<tr></tr>');
            $.each(form_data, function( type, value ) {
                $('<td id="" class="input-'+type+'"></td>').html(value).appendTo(row);
            });
            $('.preview-table > tbody:last').append(row);
            calc_total();


            //VACIA LOS CAMPOS Y ENFOCA EL INPUT 
            $("#codigoc").val("");
            $("#cantidad").val("");
            $("#precio").val("");
            $("#lote").val("");
            $("#fechal").val("");
            $("#nombrep").val("");
            document.getElementById('codigoc').focus();

        }





        // subtotal();
    });  
});

$('#comprar').click(function() {
    totalCom = $('#totalCom').html();
    idproveedor = $('#idc').val();
    usuario = $('#usc').val();
    fecha = $("#fec").val();
    iva = $('#iva').html();
    $.ajax({
        url: uri + "/compra/agregar",
        type: 'POST',
        data: {
            compra: datos,
            totalCom: totalCom,
            idproveedor: idproveedor,
            fecha: fecha,
            comprador:usuario,
            iva:iva
        }
    }).done(function(resultado) {
        alert(resultado);
        location.reload();
    }).fail(function(resultado) {
        alert(resultado);
    });
})

// $(".limpiar").click(function(event) {
//  $('.borra').val("");
// });

