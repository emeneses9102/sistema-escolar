var cantidadTotalCobrosEnero;
var cantidadTotalCobrosFebrero;
var cantidadTotalCobrosMarzo;
var cantidadTotalCobrosAbril;
var cantidadTotalCobrosMayo;
var cantidadTotalCobrosJunio;
var cantidadTotalCobrosJulio;
var cantidadTotalCobrosAgosto;
var cantidadTotalCobrosSetiembre;
var cantidadTotalCobrosOctubre;
var cantidadTotalCobroNoviembre;
var cantidadTotalCobrosDiciembre;
var cantidadTotalCobrosFinal;

var cantidadTotalCobrosPagadosEnero;
var cantidadTotalCobrosPagadosFebrero;
var cantidadTotalCobrosPagadosMarzo;
var cantidadTotalCobrosPagadosAbril;
var cantidadTotalCobrosPagadosMayo;
var cantidadTotalCobrosPagadosJunio;
var cantidadTotalCobrosPagadosJulio;
var cantidadTotalCobrosPagadosAgosto;
var cantidadTotalCobrosPagadosSetiembre;
var cantidadTotalCobrosPagadosOctubre;
var cantidadTotalCobrosPagadosNoviembre;
var cantidadTotalCobrosPagadosDiciembre;
var cantidadTotalCobrosPagadosFinal;

function porcentajesPagados (cantidadTotal,cantidadTotalPagados){
    if(cantidadTotal == 0){
            return 0;
    }else{
    var PorcentajeTotalCobrosPagados = (100*cantidadTotalPagados)/cantidadTotal;
    var PorcentajeTotalCobrosPagados1 = PorcentajeTotalCobrosPagados.toFixed(1); 
    return PorcentajeTotalCobrosPagados1;
    }
    }
    function porcentajesNoPagados (cantidadTotal,cantidadTotalPagados){
    if(cantidadTotal == 0){
     return 0;
    }else{
    var cantidadTotalCobrosNoPagados = cantidadTotal - cantidadTotalPagados;
    var PorcentajeTotalCobrosNoPagados = (100*cantidadTotalCobrosNoPagados)/cantidadTotal;
    var PorcentajeTotalCobrosNoPagados1 = PorcentajeTotalCobrosNoPagados.toFixed(1);
    return PorcentajeTotalCobrosNoPagados1;
    }
    }

    function Llenargraficos(idnivel,idgrado,idseccion,iniciofecha,finfecha){

        $.ajax({
            url	    : 'ajax/reportes.ajax.php',
            type    : 'POST',
            data    : {id_nivel:idnivel, id_grado:idgrado, id_seccion:idseccion},
            dataType:   "json",
            async: false,
            success: function(data){
                cantidadTotalCobrosEnero = data[0]+"";
                cantidadTotalCobrosFebrero = data[1]+"";
                $("#muestra1").val(data[1]+"");
                cantidadTotalCobrosMarzo = data[2]+"";
                cantidadTotalCobrosAbril = data[3]+"";
                cantidadTotalCobrosMayo = data[4]+"";
                cantidadTotalCobrosJunio = data[5]+"";
                cantidadTotalCobrosJulio = data[6]+"";
                cantidadTotalCobrosAgosto = data[7]+"";
                cantidadTotalCobrosSetiembre = data[8]+"";
                cantidadTotalCobrosOctubre = data[9]+"";
                cantidadTotalCobroNoviembre = data[10]+"";
                cantidadTotalCobrosDiciembre = data[11]+"";
                console.log(data+"");
            }
        });
    
        $.ajax({
            url	    : 'ajax/reportes.ajax.php',
            type    : 'POST',
            data    : {id_nivel2:idnivel, id_grado2:idgrado, id_seccion2:idseccion},
            dataType:   "json",
            async: false,
            success: function(data){
                cantidadTotalCobrosPagadosEnero = data[0]+"";
                cantidadTotalCobrosPagadosFebrero = data[1]+"";
                $("#muestra2").val(data[1]+"");
                console.log(data[1]+"hajs");
                cantidadTotalCobrosPagadosMarzo = data[2]+"";
                cantidadTotalCobrosPagadosAbril = data[3]+"";
                cantidadTotalCobrosPagadosMayo = data[4]+"";
                cantidadTotalCobrosPagadosJunio = data[5]+"";
                cantidadTotalCobrosPagadosJulio = data[6]+"";
                cantidadTotalCobrosPagadosAgosto = data[7]+"";
                cantidadTotalCobrosPagadosSetiembre = data[8]+"";
                cantidadTotalCobrosPagadosOctubre = data[9]+"";
                cantidadTotalCobrosPagadosNoviembre = data[10]+"";
                cantidadTotalCobrosPagadosDiciembre = data[11]+"";
                console.log(data+"");
            }
        });

        $.ajax({
            url	    : 'ajax/reportes.ajax.php',
            type    : 'POST',
            data    : {id_nivel3:idnivel, id_grado3:idgrado, id_seccion3:idseccion, iniciofecha:iniciofecha, finfecha:finfecha},
            async: false,
            success: function(data){
                cantidadTotalCobrosFinal = data;
                console.log(data+"Julio1");
            }
        });

        $.ajax({
            url	    : 'ajax/reportes.ajax.php',
            type    : 'POST',
            data    : {id_nivel4:idnivel, id_grado4:idgrado, id_seccion4:idseccion, iniciofecha1:iniciofecha, finfecha1:finfecha},
            async: false,
            success: function(data){
                cantidadTotalCobrosPagadosFinal = data;
                console.log(data+"Julio");
            }
        });

        console.log(cantidadTotalCobrosFebrero +"-"+ cantidadTotalCobrosPagadosFebrero);
    
        var data3 = {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [ porcentajesNoPagados(cantidadTotalCobrosEnero,cantidadTotalCobrosPagadosEnero), 
                        porcentajesNoPagados(cantidadTotalCobrosFebrero,cantidadTotalCobrosPagadosFebrero), 
                        porcentajesNoPagados(cantidadTotalCobrosMarzo,cantidadTotalCobrosPagadosMarzo), 
                        porcentajesNoPagados(cantidadTotalCobrosAbril,cantidadTotalCobrosPagadosAbril), 
                        porcentajesNoPagados(cantidadTotalCobrosMayo,cantidadTotalCobrosPagadosMayo),
                        porcentajesNoPagados(cantidadTotalCobrosJunio,cantidadTotalCobrosPagadosJunio),
                        porcentajesNoPagados(cantidadTotalCobrosJulio,cantidadTotalCobrosPagadosJulio),
                        porcentajesNoPagados(cantidadTotalCobrosAgosto,cantidadTotalCobrosPagadosAgosto),
                        porcentajesNoPagados(cantidadTotalCobrosSetiembre,cantidadTotalCobrosPagadosSetiembre),
                        porcentajesNoPagados(cantidadTotalCobrosOctubre,cantidadTotalCobrosPagadosOctubre),
                        porcentajesNoPagados(cantidadTotalCobroNoviembre,cantidadTotalCobrosPagadosNoviembre),
                        porcentajesNoPagados(cantidadTotalCobrosDiciembre,cantidadTotalCobrosPagadosDiciembre)]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [porcentajesPagados(cantidadTotalCobrosEnero,cantidadTotalCobrosPagadosEnero), 
                        porcentajesPagados(cantidadTotalCobrosFebrero,cantidadTotalCobrosPagadosFebrero), 
                        porcentajesPagados(cantidadTotalCobrosMarzo,cantidadTotalCobrosPagadosMarzo), 
                        porcentajesPagados(cantidadTotalCobrosAbril,cantidadTotalCobrosPagadosAbril), 
                        porcentajesPagados(cantidadTotalCobrosMayo,cantidadTotalCobrosPagadosMayo),
                        porcentajesPagados(cantidadTotalCobrosJunio,cantidadTotalCobrosPagadosJunio),
                        porcentajesPagados(cantidadTotalCobrosJulio,cantidadTotalCobrosPagadosJulio),
                        porcentajesPagados(cantidadTotalCobrosAgosto,cantidadTotalCobrosPagadosAgosto),
                        porcentajesPagados(cantidadTotalCobrosSetiembre,cantidadTotalCobrosPagadosSetiembre),
                        porcentajesPagados(cantidadTotalCobrosOctubre,cantidadTotalCobrosPagadosOctubre),
                        porcentajesPagados(cantidadTotalCobroNoviembre,cantidadTotalCobrosPagadosNoviembre),
                        porcentajesPagados(cantidadTotalCobrosDiciembre,cantidadTotalCobrosPagadosDiciembre)]
                }
            ]
        };
    
    
        var ctxb3 = $("#barChartDemo").get(0).getContext("2d");
        
        if(window.grafica){
            window.grafica.clear();
            window.grafica.destroy();
        }
    
        window.grafica = new Chart(ctxb3).Bar(data3);
        
        var ctxl3 = $("#lineChartDemo").get(0).getContext("2d");
    
        if(window.grafica1){
            window.grafica1.clear();
            window.grafica1.destroy();
        }
    
        window.grafica1 = new Chart(ctxl3).Line(data3);
    
        var pdata3 = [
            {
                value: porcentajesPagados(cantidadTotalCobrosFinal,cantidadTotalCobrosPagadosFinal),
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "Pagados"
            },
            {
                value: porcentajesNoPagados(cantidadTotalCobrosFinal,cantidadTotalCobrosPagadosFinal),
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "No Pagados"
            }
        ]
    
        var ctxp3 = $("#pieChartDemo").get(0).getContext("2d");
        
        if(window.grafica2){
            window.grafica2.clear();
            window.grafica2.destroy();
        }
        
        window.grafica2 = new Chart(ctxp3).Pie(pdata3);
    }

$( document ).ready(function() {
        idnivel = 0;
        idgrado = 0;
        idseccion = 0;
        iniciofecha = 0;
        finfecha = 0;
        Llenargraficos(idnivel,idgrado,idseccion,iniciofecha,finfecha);
});


var fila = document.querySelector('.SelectorGrafico1');

var fila2 = document.querySelector('.SelectorGrafico');

var fila1 = document.querySelector('.graficograf');

var medidatotal = fila1.offsetHeight + 20;

document.getElementById("SelectorGrafico").style.height = medidatotal+"px";

function radiosGraficos(elemento) {

    if(elemento.value=="barras") {
        fila2.scrollTop = 0;
        document.getElementById("SelectorGrafico").style.height = medidatotal+"px";
            console.log(fila2.scrollTop+'se hace bien');

    }else if(elemento.value=="lineas"){

        fila2.scrollTop = fila1.offsetHeight+20;
        document.getElementById("SelectorGrafico").style.height = medidatotal+"px";
            console.log( fila2.scrollTop+'se hace bien');

        }else{
            fila2.scrollTop = (fila1.offsetHeight*2)+50;
            document.getElementById("SelectorGrafico").style.height = medidatotal+"px";
            console.log( fila2.scrollTop+'se hace bien');
}

    }

$('input[type="radio"][name=chknivel]').on('change', function(e){

        if (this.checked) {
        
            var idNivel = $(e.currentTarget).val();

            $("#SelecionadoNivel").val(idNivel+"");

            console.log(idNivel+" - yo");

            $("#nivelreporte").removeClass("is-invalid");
            $.ajax({
                url	    : 'ajax/mGradosySecciones.ajax.php',
                type    : 'POST',
                data    : {idNivel : idNivel},
                dataType: 'json',
                success: function(data){
                    $("#gradoReport").empty();
                    $("#seccionReport").empty();

                    for(let item of data){
                        
                        $("#gradoReport").append('<li><label class="treeview-item pt-2 arbol-item " ><input type="radio" name="chkgrado" id="' + item.idGrados + '"  value="' + item.idGrados + '" class="buscador-check mr-2"> ' + item.nombre_grado + '</label> </li>');
                    }
                }
            });

            if(idNivel == ""){
                idnivel2 = 0;
            }else { 
                idnivel2 = idNivel;
            }

            
            idgrado = 0;
            idseccion = 0;
           
            var fechainicio1 = $("#muestrafechainicio").val();

            if(fechainicio1 == ""){
                iniciofecha = 0;
            }else{
                iniciofecha = fechainicio1;
            }
        
            var fechafin1 = $("#muestrafechafin").val();
        
            if(fechafin1 == ""){
                finfecha = 0;
            }else{
                finfecha = fechafin1;
            }

            Llenargraficos(idnivel2,idgrado,idseccion,iniciofecha,finfecha);
        } 
 
});

$('#gradoReport').change(function(){
    selected_value = $("input[name='chkgrado']:checked").val();
    
    var id_Grado = selected_value;
        
    var seleccionadonivel = $("#SelecionadoNivel").val();

    console.log(seleccionadonivel+"- valor de nivel");

    console.log(id_Grado+"- valor de grado");

    if(seleccionadonivel == ""){
        idnivel = 0;
    }else { 
        idnivel = seleccionadonivel;
    }

    if(id_Grado == ""){
        idgrado2 = 0;
    }else { 
        idgrado2 = id_Grado;
    }
    idseccion = 0;
    

    var fechainicio1 = $("#muestrafechainicio").val();

    if(fechainicio1 == ""){
        iniciofecha = 0;
    }else{
        iniciofecha = fechainicio1;
    }

    var fechafin1 = $("#muestrafechafin").val();

    if(fechafin1 == ""){
        finfecha = 0;
    }else{
        finfecha = fechafin1;
    }

         var tipo="mostrar";
         $("#nivelreporte").removeClass("is-invalid");
         $.ajax({
            url	    : 'ajax/mGradosySecciones.ajax.php',
            type    : 'POST',
            data    : {id_Grado : id_Grado,
                        tipo:tipo},
            dataType: 'json',
             success: function(data){
                 $("#seccionReport").empty();
                 for(let item of data){
                     
                     $("#seccionReport").append('<li><label class="treeview-item pt-2 arbol-item " ><input type="radio" name="chkseccion" id="' + item.idSeccion + '"  value="' + item.idSeccion +'" class="buscador-check mr-2"> ' + item.nombre_seccion + '</label> </li>');
                 }
                
             }
         });

         Llenargraficos(idnivel,idgrado2,idseccion,iniciofecha,finfecha);
            
});

$('#seccionReport').change(function(){
    selected_value = $("input[name='chkseccion']:checked").val();

    var idseccion = selected_value;

    var seleccionadonivel = $("#SelecionadoNivel").val();

    var seleccionadogrado = $("#SelecionadoGrado").val();

    console.log(seleccionadonivel+"- valor de nivel");

    console.log(seleccionadogrado+"- valor de grado");

    console.log(idseccion+"- valor de grado");

    if(seleccionadonivel == ""){
        idnivel = 0;
    }else { 
        idnivel = seleccionadonivel;
    }
    
    if(seleccionadogrado == ""){
        idgrado = 0;
    }else { 
        idgrado = seleccionadogrado;
    }
    
    if(idseccion == ""){
        idseccion2 = 0;
    }else { 
        idseccion2 = idseccion;
    }

    var fechainicio1 = $("#muestrafechainicio").val();

    if(fechainicio1 == ""){
        iniciofecha = 0;
    }else{
        iniciofecha = fechainicio1;
    }

    var fechafin1 = $("#muestrafechafin").val();

    if(fechafin1 == ""){
        finfecha = 0;
    }else{
        finfecha = fechafin1;
    }

    Llenargraficos(idnivel,idgrado,idseccion2,iniciofecha,finfecha);

});

$("#iniciofecha").change(function(){

    var idnivel1 = $("#SelecionadoNivel").val();

    if(idnivel1 == ""){
        idnivel = 0;
    }else{
        idnivel = idnivel1;
    }

    var idgrado1 = $("#SelecionadoGrado").val();

    if(idgrado1 == ""){
        idgrado = 0;
    }else{
        idgrado = idgrado1;
    }

    var idseccion1 = $("#SelecionadoSeccion").val();

    if(idseccion1 == ""){
        idseccion = 0;
    }else{
        idseccion = idseccion1;
    }

    var fechainicio = $("#iniciofecha").val();
    
    $("#muestrafechainicio").val(fechainicio);

    var fecha = new Date();
    var mes = fecha.getMonth()+1;

    if(mes<10){
        mes1="0"+mes;
    }else{
        mes1 = ""+mes;
    }
    var fechaActual = fecha.getFullYear()+"-"+mes1+"-"+fecha.getDate();

    var fechafin1 = $("#muestrafechafin").val();

    if(fechafin1 == ""){
        finfecha = fechaActual;
        $("#finfecha").val(fechaActual);
        $("#muestrafechafin").val(fechaActual);
    }else{
        finfecha = fechafin1;
    }

    Llenargraficos(idnivel,idgrado,idseccion,fechainicio,finfecha);

});

$("#finfecha").change(function(){

    var idnivel1 = $("#SelecionadoNivel").val();

    if(idnivel1 == ""){
        idnivel = 0;
    }else{
        idnivel = idnivel1;
    }

    var idgrado1 = $("#SelecionadoGrado").val();

    if(idgrado1 == ""){
        idgrado = 0;
    }else{
        idgrado = idgrado1;
    }

    var idseccion1 = $("#SelecionadoSeccion").val();

    if(idseccion1 == ""){
        idseccion = 0;
    }else{
        idseccion = idseccion1;
    }
    

    var fechafin = $("#finfecha").val();

    $("#muestrafechafin").val(fechafin);

    var fecInicio = new Date($("#finfecha").val());

    var fechainicio1 = $("#muestrafechainicio").val();

    if(fechainicio1 == ""){
        iniciofecha = fecInicio;
        $("#iniciofecha").val(fecInicio);
        $("#muestrafechainicio").val(fecInicio);
    }else{
        iniciofecha = fechainicio1;
    }

    Llenargraficos(idnivel,idgrado,idseccion,iniciofecha,fechafin);

});

