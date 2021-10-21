
var detalle= "";
var montoPagar="";
var idPago_alumno="";
var llaveCulqui ="";
var llavepublica ="";
var tituloCulqui=""
var comision_paypal=""
var comision_culqi=""
var porcentajePaypal="";
var pagoPaypal="";

$.ajax({
    type: "POST",
    url: "ajax/institucion.ajax.php",
    data: {culqui:"culqui"},
    dataType: "json",
    success: function (datos) {
        comision_paypal =datos.comision_paypal/100
    }
});


  $('#btn-culqi').on('click', function(e) {
    idPago_alumno = $('#idPago').val();
    detalle = $('#detalle').val();
    montoPagar = $('#montoPagar').val()*100;
    
    $.ajax({
        type: "POST",
        url: "ajax/institucion.ajax.php",
        data: {culqui:"culqui"},
        dataType: "json",
        success: function (datos) {
            llaveCulqui = datos.llave_culqui
            llavePublica = datos.llave_publica
            tituloCulqui =datos.titulo_culqui
            
            comision_culqi =datos.comision_culqi*0.01
        }
    });
    
    porcentajeCulqi=montoPagar*comision_culqi
    //configurar los valores
    Culqi.publicKey = llavePublica;
    Culqi.settings({
        title: tituloCulqui,
        currency: 'PEN',
        description: detalle,
        amount: montoPagar+porcentajeCulqi
    });
    Culqi.open();
    e.preventDefault();
});
var montito2="";
var montito="";
var idalumno1="";
var montito1="";
var dolar=3.69;
var estado="";

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
            pagoPaypal = parseFloat(montito2)+(montito2*comision_paypal)
            //console.log("f"+pagoPaypal+"f")
            montito=pagoPaypal/dolar;
            idalumno1=data.idAlumno_cobros;
            //console.log(montito+'hola');
            montito1=montito.toFixed(2);
            //console.log("hola"+montito+"-"+montito1);
            $("#detalle").val(data.detalle);
            $("#montoPagar").val(data.montoCobrar);
            $("#idImagen").val(data.idAlumno_cobros);
            estado = data[10];
            var elemento = document.getElementById("botonculqui");
            var elemento1 = document.getElementById("botonpaypal");
            var elemento2 = document.getElementById("titulodeposito");
            if(estado == "3"){
                elemento.className = " d-none";
                elemento1.className = " d-none";
                elemento2.className = "col-md-12";
            }else{
                elemento.className = "col-md mt-3 d-flex justify-content-center";
                elemento1.className = "col-md mt-4 pt-4 d-flex justify-content-center";
                elemento2.className = "d-none";
            }
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
               montoPagar:montoPagar+porcentajeCulqi,
               token:token,
               email:email,
               llaveCulqui:llaveCulqui,
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
    env:'production',//production para que funcione en pago real sandbox
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


