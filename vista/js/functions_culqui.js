
var detalle= "";
var montoPagar="";
var idPago_alumno="";

  $('#btn-culqi').on('click', function(e) {
    idPago_alumno = $('#idPago').val();
    detalle = $('#detalle').val();
    montoPagar = $('#montoPagar').val()*100;
    
    

    //configurar los valores
    Culqi.publicKey = 'sk_test_jCASaWOjVIo8epqz';
    Culqi.settings({
        title: 'Culqi Store',
        currency: 'PEN',
        description: detalle,
        amount: montoPagar
    });
    Culqi.open();
    e.preventDefault();
});

//Pagos pendientes
function mostrarModal(idAlumnoxPago){
    $("#idPago").val(idAlumnoxPago);
   
    $.ajax({
        url	    : 'ajax/pagosPendientes.ajax.php',
        type    : 'POST',
        data    : {idAlumnoxPago:idAlumnoxPago},
        dataType:   "json",
        success: function(data){
            $("#detalle").val(data.detalle);
            $("#montoPagar").val(data.montoCobrar)
        
        }
    }); 
}

function culqi() {
    if (Culqi.token) { // ¡Objeto Token creado exitosamente!
        var token = Culqi.token.id;
        var email = Culqi.token.email;
        
        //alert('Se ha creado un token:' + token);
       $.ajax({
           url: "extensiones/procesarPago.php",
           type:'POST',
           data: {
               detalle:detalle,
               montoPagar:montoPagar,
               token:token,
               email:email
           },
       }).done(function (resp){
            
            $.ajax({
                url	    : 'ajax/pagosPendientes.ajax.php',
                type    : 'POST',
                data    : {idPago_alumno:idPago_alumno},
                success: function(data){
                    if(data=="ok"){
                        swal.fire({
                            icon:"success",
                            title : "Pago realizado",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        })
                            window.location = "pagosPendientes";
                        
                        
                    }else{
                        swal.fire({
                            icon:"error",
                            title : "Eror al registrar el pago",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        })
                    }
                
                }
            }); 
       })

        //En esta linea de codigo debemos enviar el "Culqi.token.id"
        //hacia tu servidor con Ajax
    } else { // ¡Hubo algún problema!
        // Mostramos JSON de objeto error en consola
        console.log(Culqi.error);
        alert(Culqi.error.user_message);
    }
  };