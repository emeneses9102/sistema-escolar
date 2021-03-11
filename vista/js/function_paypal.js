/*var detallePaypal= "";

var montito=document.getElementById("inputprueba").value;
var montoPagarPaypal="14";

montoPagarPaypal=montito+"";
console.log("hola"+montoPagarPaypal);
var idPago_alumnoPaypal="";
*/
var detalle= "";
var montito="";
var idpagoalumno1="";

var montito1="";

$('#pruebapaypal').on('click', function(e) {
    var detallePaypal= "";
    idpagoalumno1=$('#inputprueba1').val();

    
    
     montito=$('#inputprueba').val()/3.69;
     console.log(montito+'hola');
     
     montito1=montito.toFixed(2);
     console.log("hola"+montito+"-"+montito1);
    

     

    //var montoPagarPaypal="0";

    //OPERACION:
   // montoPagarPaypal=montito*3.69+'';
   
   montoPagarPaypal=montito1+'';
   idpagoalumno2=idpagoalumno1+'';
    

    
    
    //var idPago_alumnoPaypal="";
    
});
        paypal.Buttons({
          env:'production',//production para que funcione en pago real
            style: {
                layout: 'horizontal'
            },
        // Set up the transaction
        // Add your client ID and secret
    
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value:montoPagarPaypal+''
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
                    data    : {idPago_alumno:idpagoalumno2},
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
               /* swal.fire({
                    icon:"success",
                    title : 'Transaction completed by ' + details.payer.name.given_name + '!',
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })*/
                //alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }

        //prueba rama devsdsfdvdfv
}).render('#paypal-button-container');