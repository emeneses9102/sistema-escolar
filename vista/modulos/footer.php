<!-- Essential javascripts for application to work-->
<?php 
    $mostrarDatos_pag = new ControladorInstitucion();
    $respuesta=$mostrarDatos_pag->ctrMostrarDatos_Pag();
?>
<script src="vista/js/jquery-3.3.1.min.js"></script>
    <script src="vista/js/popper.min.js"></script>
    <script src="vista/js/bootstrap.min.js"></script>
    <script src="vista/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="vista/js/plugins/pace.min.js"></script>
    <script src="vista/js/plugins/bootstrap-notify.min.js"></script>
    <script src="vista/js/plugins/chart.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <!-- Data table plugin-->
   
<!-- INTEGRACION CULQI-->
  <script src="https://www.paypal.com/sdk/js?client-id=<?php echo ($respuesta == "vacio")? "":$respuesta["url_paypal"]?>"></script>
<!--<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>-->

    <!--<script>

<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <script>
        paypal.Buttons({
            style: {
                layout: 'horizontal'
            },
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '500'
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                console.log(details);
                console.log("hola");
                // Show a success message to the buyer
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }

        //prueba rama devsdsfdvdfv
}).render('#paypal-button-container');
</script>-->

    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://checkout.culqi.com/js/v3"></script>


</script>
</body>
<script src="vista/js/function_paypal.js"></script>
    <script src="vista/js/functions_apoderado.js"></script>
    <script src="vista/js/functions_culqui.js"></script>
    <script src="vista/js/script.js"></script>
    <script src="vista/js/functions_usuarios.js"></script>
    <script src="vista/js/functions_alumnos.js"></script>
    <script src="vista/js/functions_profesores.js"></script>
    <script src="vista/js/functions_administrativos.js"></script>
    <script src="vista/js/functions_directivos.js"></script>
    <script src="vista/js/functions_mGradosySecciones.js"></script>
    <script src="vista/js/functions_administrarCursos.js"></script>
    <script src="vista/js/functions_mClases.js"></script>
    <script src="vista/js/functions_cobros.js"></script>
    <script src="vista/js/functions_matricula.js"></script>
    <script src="vista/js/functions_listaDeuda.js"></script>
    <script src="vista/js/functions_deudores.js"></script>
    <script src="vista/js/functions_reportes.js"></script>
    <script src="vista/js/functions_reportes2.js"></script>
    <script src="vista/js/functions_competencias.js"></script>
    <script src="vista/js/functions_configuracion.js"></script>
    <script src="vista/js/functions_listaCursos.js"></script>
    <script src="vista/js/functions_periodos.js"></script>
    <script src="vista/js/functions_cursosProfesor.js"></script>
    <script>
            document.addEventListener("DOMContentLoaded", function(){
                // Invocamos cada 5 segundos ;)
                const milisegundos = 5 *1000;
                setInterval(function(){
                    // No esperamos la respuesta de la petición porque no nos importa
                    fetch("vista/plantilla.php");
                },milisegundos);
            });
            CKEDITOR.replace( 'editor' );
        </script>
  </body>
</html>