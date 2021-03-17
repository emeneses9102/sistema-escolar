
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
var montito2="";
var montito="";
var idalumno1="";
var montito1="";
var dolar=3.69;

//Pagos pendientes
function mostrarModal(idAlumnoxPago){
    $("#idPago").val(idAlumnoxPago);
   
    $.ajax({
        url	    : 'ajax/pagosPendientes.ajax.php',
        type    : 'POST',
        data    : {idAlumnoxPago:idAlumnoxPago},
        dataType:   "json",
        success: function(data){
            montito2=data.montoCobrar;
            montito=montito2/dolar;
            idalumno1=data.idAlumno_cobros;
            console.log(montito+'hola');
            montito1=montito.toFixed(2);
            console.log("hola"+montito+"-"+montito1);
            $("#detalle").val(data.detalle);
            $("#montoPagar").val(data.montoCobrar);
            $("#idImagen").val(data.idAlumno_cobros);
        /*
        $("#inputprueba2").val(idprueba);*/
        
        }
    }); /*
        var idprueba="";
        var detalleprueba="";
        var  montoPagarprueba="";
    
        idprueba = $('#idPago').val();
        detalleprueba = $('#detalle').val();
        montoPagarprueba= $('#montoPagar').val();

        */

        //console.log(''+$("#inputprueba1").val());
    
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
            var tipoPago_alumno = "Culqui";
            var montoPago_alumno= montoPagar*0.01;

            $.ajax({
                url	    : 'ajax/pagosPendientes.ajax.php',
                type    : 'POST',
                data    : {idPago_alumno:idPago_alumno,
                            tipoPago_alumno:tipoPago_alumno,
                            montoPago_alumno:montoPago_alumno},
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

  /////////////////////
paypal.Buttons({
    env:'sandbox',//production para que funcione en pago real
      style: {
          layout: 'horizontal'
      },
  // Set up the transaction
  // Add your client ID and secret
  createOrder: function(data, actions) {
      return actions.order.create({
          purchase_units: [{
              amount: {
                  value:montito1+''
              }
          }]
      });
  },
  // Finalize the transaction
  onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
          // Show a success message to the buyer
          $.ajax({
              url	    : 'ajax/pagosPendientes.ajax.php',
              type    : 'POST',
              data    : {idPago_alumno:idalumno1,tipoPago_alumno:'Paypal',montoPago_alumno:montito2},
              success: function(data){
                  if(data=="ok"){
                    
                      swal.fire({
                          icon:"success",
                          title : 'Pago realizado ' + details.payer.name.given_name + '!',
                          //title : "Pago realizado",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                      })
                          window.location = "pagosPendientes";
                      
                      
                  }else{
                    
                      swal.fire({
                          icon:"error",
                          title : "Eror al realizar el pago",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                      })
                  }
              }
          }); 
      });
  }
  //prueba rama devsdsfdvdfv
}).render('#paypal-button-container');


