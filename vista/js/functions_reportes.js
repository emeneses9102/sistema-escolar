var cantidadTotalCobrosMes1;
var cantidadTotalCobrosMes2;
var cantidadTotalCobrosMes3;
var cantidadTotalCobrosFinal;

var cantidadTotalCobrosPagadosMes1;
var cantidadTotalCobrosPagadosMes2;
var cantidadTotalCobrosPagadosMes3;
var cantidadTotalCobrosPagadosFinal;

var nombreMes1;
var nombreMes2;
var nombreMes3;
var graficoNivel;
var graficoGrado;
var graficoSeccion;
var ctxb3 = $("#barChartDemo").get(0).getContext("2d");
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
            data    : {id_nivel:idnivel, id_grado:idgrado, id_seccion:idseccion, iniciofecha:iniciofecha, finfecha:finfecha},
            dataType:   "json",
            async: false,
            success: function(data){
                cantidadTotalCobrosMes1 = data[0][1];
                cantidadTotalCobrosMes2 = data[1][1];
                $("#muestra1").val(data[0][1]+"");
                cantidadTotalCobrosMes3 = data[2][1];        
                nombreMes1 = data[0][0]+"";
                nombreMes2 = data[1][0]+"";
                nombreMes3 = data[2][0]+"";

                //console.log(data+"");
            }
        });
    
        $.ajax({
            url	    : 'ajax/reportes.ajax.php',
            type    : 'POST',
            data    : {id_nivel2:idnivel, id_grado2:idgrado, id_seccion2:idseccion, iniciofecha:iniciofecha, finfecha:finfecha},
            dataType:   "json",
            async: false,
            success: function(data){
                cantidadTotalCobrosPagadosMes1 = data[0][1];
                cantidadTotalCobrosPagadosMes2 = data[1][1];
                $("#muestra2").val(data[0][1]+"");
                cantidadTotalCobrosPagadosMes3 = data[2][1];        
                //console.log(data+"");
            }
        });

        $.ajax({
            url	    : 'ajax/reportes.ajax.php',
            type    : 'POST',
            data    : {id_nivel3:idnivel, id_grado3:idgrado, id_seccion3:idseccion, iniciofecha:iniciofecha, finfecha:finfecha},
            async: false,
            success: function(data){
                cantidadTotalCobrosFinal = data;
                //console.log(data+"Julio1");
            }
        });

        $.ajax({
            url	    : 'ajax/reportes.ajax.php',
            type    : 'POST',
            data    : {id_nivel4:idnivel, id_grado4:idgrado, id_seccion4:idseccion, iniciofecha1:iniciofecha, finfecha1:finfecha},
            async: false,
            success: function(data){
                cantidadTotalCobrosPagadosFinal = data;
                //console.log(data+"Julio");
            }
        });
    
        var data3 = {
            labels: [nombreMes1+"",nombreMes2+"",nombreMes3+""],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [ porcentajesNoPagados(cantidadTotalCobrosMes1,cantidadTotalCobrosPagadosMes1), 
                        porcentajesNoPagados(cantidadTotalCobrosMes2,cantidadTotalCobrosPagadosMes2), 
                        porcentajesNoPagados(cantidadTotalCobrosMes3,cantidadTotalCobrosPagadosMes3)]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [porcentajesPagados(cantidadTotalCobrosMes1,cantidadTotalCobrosPagadosMes1), 
                        porcentajesPagados(cantidadTotalCobrosMes2,cantidadTotalCobrosPagadosMes2), 
                        porcentajesPagados(cantidadTotalCobrosMes3,cantidadTotalCobrosPagadosMes3)]
                }
            ]
        };
    
    
        
        
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

    function NomNivelGradoSeccion(idnivel,idgrado,idseccion){
        $.ajax({
            url	    : 'ajax/reportes.ajax.php',
            type    : 'POST',
            data    : {id_nivel6:idnivel, id_grado6:idgrado, id_seccion6:idseccion},
            dataType:   "json",
            async: false,
            success: function(data){
                for(let item of data){

                graficoNivel = item.nombre_nivel;
                graficoGrado = item.nombre_grado;
                graficoSeccion = item.nombre_seccion;

                }

                if(graficoNivel == undefined){
                    graficoNivel = " ";
                }else{
                    graficoNivel = " - "+graficoNivel;
                }

                if(graficoGrado == undefined){
                    graficoGrado = " ";
                }else{
                    graficoGrado = " - "+graficoGrado;
                }

                if(graficoSeccion == undefined){
                    graficoSeccion = " ";
                }else{
                    graficoSeccion = " - "+graficoSeccion;
                }

                document.getElementById('nombregrafico').innerHTML='Gráfico'+graficoNivel +'' + graficoGrado + ''+graficoSeccion;
                document.getElementById('nombregrafico2').innerHTML='Gráfico'+graficoNivel +'' + graficoGrado + ''+graficoSeccion;
                document.getElementById('nombregrafico3').innerHTML='Gráfico'+graficoNivel +'' + graficoGrado + ''+graficoSeccion;

            }
        });
    }

    function total(idnivel,idgrado,idseccion,iniciofecha,finfecha){
        $.ajax({
            url	    : 'ajax/reportes.ajax.php',
            type    : 'POST',
            data    : {id_nivel7:idnivel, id_grado7:idgrado, id_seccion7:idseccion, iniciofecha7:iniciofecha, finfecha7:finfecha},
            async: false,
            success: function(data){
                console.log(data+"amor");
                document.getElementById('ingresosoles').innerHTML=' '+data;
            }
        });
    }

$( document ).ready(function() {

        idnivel = 0;
        idgrado = 0;
        idseccion = 0;

    var fecha = new Date();
    var mes = fecha.getMonth()+1;

    if(mes<10){
        mes1="0"+mes;
    }else{
        mes1 = ""+mes;
    }
    var fechaActual = fecha.getFullYear()+"-"+mes1+"-"+fecha.getDate();
    var anyo;
    var mes2;
    var mes3;
    if(mes==1 || mes ==2){
            mes2 = mes-2;

            if(mes2==0){
                mes3=12;
                anyo = fecha.getFullYear()-1;
                iniciofecha = anyo+"-"+mes3+"-01";
            }else if(mes2==-1){
                mes3=11;
                anyo = fecha.getFullYear()-1;
                iniciofecha = anyo+"-"+mes3+"-01";
            }else{
            mes2=mes-2;
            if(mes2<10){
                mes3="0"+mes2;
            }else{
                mes3 = ""+mes2;
            }
            anyo = fecha.getFullYear();
            iniciofecha = anyo+"-"+mes3+"-01";
        }
    }else{
        mes2=mes-2;
            if(mes2<10){
                mes3="0"+mes2;
            }else{
                mes3 = ""+mes2;
            }
            anyo = fecha.getFullYear();
            iniciofecha = anyo+"-"+mes3+"-01";
    }

        finfecha = fechaActual;

        Llenargraficos(idnivel,idgrado,idseccion,iniciofecha,finfecha);

        console.log(cantidadTotalCobrosMes1+"amor1");
        console.log(cantidadTotalCobrosMes2+"amor2");
        console.log(cantidadTotalCobrosMes3+"amor3");

        var pagostotales = parseInt(cantidadTotalCobrosMes1) + parseInt(cantidadTotalCobrosMes2) + parseInt(cantidadTotalCobrosMes3);

        console.log(pagostotales+"amor4");
    
        var pagosRealizados = parseInt(cantidadTotalCobrosPagadosMes1) + parseInt(cantidadTotalCobrosPagadosMes2) + parseInt(cantidadTotalCobrosPagadosMes3);

        console.log(pagosNoRealizados+"amor5");
    
        var pagosNoRealizados = pagostotales - pagosRealizados;

        console.log(pagosRealizados+"amor6");

        document.getElementById('pagosrealizados').innerHTML=' '+pagosRealizados;
        document.getElementById('pagosnorealizados').innerHTML=' '+pagosNoRealizados;

        total(idnivel,idgrado,idseccion,iniciofecha,finfecha);

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

            var fecha = new Date();
            var mes = fecha.getMonth()+1;
        
            if(mes<10){
                mes1="0"+mes;
            }else{
                mes1 = ""+mes;
            }
            var fechaActual = fecha.getFullYear()+"-"+mes1+"-"+fecha.getDate();
            var anyo;
            var mes2;
            var mes3;
           
            var fechainicio1 = $("#muestrafechainicio").val();

            if(fechainicio1 == ""){
                if(mes==1 || mes ==2){
                    mes2 = mes-2;
                    if(mes2==0){
                        mes3=12;
                        anyo = fecha.getFullYear()-1;
                        iniciofecha = anyo+"-"+mes3+"-01";
                    }else if(mes2==-1){
                        mes3=11;
                        anyo = fecha.getFullYear()-1;
                        iniciofecha = anyo+"-"+mes3+"-01";
                    }else{
                    mes2=mes-2;
                    if(mes2<10){
                        mes3="0"+mes2;
                    }else{
                        mes3 = ""+mes2;
                    }
                    anyo = fecha.getFullYear();
                    iniciofecha = anyo+"-"+mes3+"-01";
                }
            }else{
                mes2=mes-2;
                    if(mes2<10){
                        mes3="0"+mes2;
                    }else{
                        mes3 = ""+mes2;
                    }
                    anyo = fecha.getFullYear();
                    iniciofecha = anyo+"-"+mes3+"-01";
            }
            }else{
                iniciofecha = fechainicio1;
            }
        
            var fechafin1 = $("#muestrafechafin").val();
        
            if(fechafin1 == ""){
                finfecha = fechaActual;
            }else{
                finfecha = fechafin1;
            }

            Llenargraficos(idnivel2,idgrado,idseccion,iniciofecha,finfecha);
            NomNivelGradoSeccion(idnivel2,idgrado,idseccion);

        var pagostotales = parseInt(cantidadTotalCobrosMes1) + parseInt(cantidadTotalCobrosMes2) + parseInt(cantidadTotalCobrosMes3);
    
        var pagosRealizados = parseInt(cantidadTotalCobrosPagadosMes1) + parseInt(cantidadTotalCobrosPagadosMes2) + parseInt(cantidadTotalCobrosPagadosMes3);
    
        var pagosNoRealizados = pagostotales - pagosRealizados;

        document.getElementById('pagosrealizados').innerHTML=' '+pagosRealizados;
        document.getElementById('pagosnorealizados').innerHTML=' '+pagosNoRealizados;

        total(idnivel2,idgrado,idseccion,iniciofecha,finfecha);

        } 
 
});


$('#gradoReport').change(function(){
    selected_value = $("input[name='chkgrado']:checked").val();
    
    var id_Grado = selected_value;
        
    $("#SelecionadoGrado").val(id_Grado);

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
    

    var fecha = new Date();
            var mes = fecha.getMonth()+1;
        
            if(mes<10){
                mes1="0"+mes;
            }else{
                mes1 = ""+mes;
            }
            var fechaActual = fecha.getFullYear()+"-"+mes1+"-"+fecha.getDate();
            var anyo;
            var mes2;
            var mes3;

    var fechainicio1 = $("#muestrafechainicio").val();

    if(fechainicio1 == ""){
        if(mes==1 || mes ==2){
            mes2 = mes-2;
            if(mes2==0){
                mes3=12;
                anyo = fecha.getFullYear()-1;
                iniciofecha = anyo+"-"+mes3+"-01";
            }else if(mes2==-1){
                mes3=11;
                anyo = fecha.getFullYear()-1;
                iniciofecha = anyo+"-"+mes3+"-01";
            }else{
            mes2=mes-2;
            if(mes2<10){
                mes3="0"+mes2;
            }else{
                mes3 = ""+mes2;
            }
            anyo = fecha.getFullYear();
            iniciofecha = anyo+"-"+mes3+"-01";
        }
    }else{
        mes2=mes-2;
            if(mes2<10){
                mes3="0"+mes2;
            }else{
                mes3 = ""+mes2;
            }
            anyo = fecha.getFullYear();
            iniciofecha = anyo+"-"+mes3+"-01";
    }
    }else{
        iniciofecha = fechainicio1;
    }

    var fechafin1 = $("#muestrafechafin").val();

    if(fechafin1 == ""){
        finfecha = fechaActual;
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
         NomNivelGradoSeccion(idnivel,idgrado2,idseccion);

         var pagostotales = parseInt(cantidadTotalCobrosMes1) + parseInt(cantidadTotalCobrosMes2) + parseInt(cantidadTotalCobrosMes3);
    
        var pagosRealizados = parseInt(cantidadTotalCobrosPagadosMes1) + parseInt(cantidadTotalCobrosPagadosMes2) + parseInt(cantidadTotalCobrosPagadosMes3);
    
        var pagosNoRealizados = pagostotales - pagosRealizados;

        document.getElementById('pagosrealizados').innerHTML=' '+pagosRealizados;
        document.getElementById('pagosnorealizados').innerHTML=' '+pagosNoRealizados;

        total(idnivel,idgrado2,idseccion,iniciofecha,finfecha);
            
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

    var fecha = new Date();
    var mes = fecha.getMonth()+1;

    if(mes<10){
        mes1="0"+mes;
    }else{
        mes1 = ""+mes;
    }
    var fechaActual = fecha.getFullYear()+"-"+mes1+"-"+fecha.getDate();
    var anyo;
    var mes2;
    var mes3;

    var fechainicio1 = $("#muestrafechainicio").val();

    if(fechainicio1 == ""){
        if(mes==1 || mes ==2){
            mes2 = mes-2;
            if(mes2==0){
                mes3=12;
                anyo = fecha.getFullYear()-1;
                iniciofecha = anyo+"-"+mes3+"-01";
            }else if(mes2==-1){
                mes3=11;
                anyo = fecha.getFullYear()-1;
                iniciofecha = anyo+"-"+mes3+"-01";
            }else{
            mes2=mes-2;
            if(mes2<10){
                mes3="0"+mes2;
            }else{
                mes3 = ""+mes2;
            }
            anyo = fecha.getFullYear();
            iniciofecha = anyo+"-"+mes3+"-01";
        }
    }else{
        mes2=mes-2;
            if(mes2<10){
                mes3="0"+mes2;
            }else{
                mes3 = ""+mes2;
            }
            anyo = fecha.getFullYear();
            iniciofecha = anyo+"-"+mes3+"-01";
    }
    }else{
        iniciofecha = fechainicio1;
    }

    var fechafin1 = $("#muestrafechafin").val();

    if(fechafin1 == ""){
        finfecha = fechaActual;
    }else{
        finfecha = fechafin1;
    }

    Llenargraficos(idnivel,idgrado,idseccion2,iniciofecha,finfecha);
    console.log(idgrado+"sad");
    NomNivelGradoSeccion(idnivel,idgrado,idseccion2);

    var pagostotales = parseInt(cantidadTotalCobrosMes1) + parseInt(cantidadTotalCobrosMes2) + parseInt(cantidadTotalCobrosMes3);
    
        var pagosRealizados = parseInt(cantidadTotalCobrosPagadosMes1) + parseInt(cantidadTotalCobrosPagadosMes2) + parseInt(cantidadTotalCobrosPagadosMes3);
    
        var pagosNoRealizados = pagostotales - pagosRealizados;

        document.getElementById('pagosrealizados').innerHTML=' '+pagosRealizados;
        document.getElementById('pagosnorealizados').innerHTML=' '+pagosNoRealizados;

        total(idnivel,idgrado,idseccion2,iniciofecha,finfecha);

});


function diamesfin(mesOficial,cifras2){
    var diafinfecha2;
    if(mesOficial == 1 || mesOficial == 3 || mesOficial == 5 || mesOficial == 7 || mesOficial == 8 || mesOficial == 10 || mesOficial == 12){
        return diafinfecha2=31;
    }else if(mesOficial == 4 || mesOficial == 6 || mesOficial == 9 || mesOficial == 11){
        return diafinfecha2=30;
    }else{
        if(cifras2 % 4 == 0){
            return diafinfecha2=29;
        }else{
            return diafinfecha2=28;
        }
    }
}

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

    fechainicio = $("#iniciofecha").val();

    $("#muestrafechainicio").val(fechainicio);

    var mesOficial;
    var fechanum;
    var anyonum;
    var consfecha;
    var consfecha1;
    var consanyo;
    var fechaFinOficial;
    var fechaSeparador = fechainicio.split("-");
    

    var anyoSeparador = fechaSeparador[0];
    var cifras;
    var cifras2;
    var texto1;
    var diaOficialFinal;
    var mesSeparador = fechaSeparador[1];

    if(mesSeparador[0] == 0){
        mesOficial=mesSeparador[1];
    }else{
        mesOficial=mesSeparador;
    }

    
    
    if(mesOficial == 11 || mesOficial == 12){
        fechanum = parseInt(mesOficial);
        anyonum = parseInt(anyoSeparador);
        consfecha = fechanum+2;
        if(consfecha==13){
            consfecha1 = 1;
            consanyo = anyonum+1;
            texto1 = consanyo.toString();
            cifras = texto1[2]+texto1[3];
            cifras2 = parseInt(cifras);
            diaOficialFinal=diamesfin(consfecha1,consanyo);
            fechaFinOficial = consanyo+"-0"+consfecha1+"-"+diaOficialFinal;
        }else if(consfecha==14){
            consfecha1 = 2;
            consanyo = anyonum+1;
            texto1 = consanyo.toString();
            cifras = texto1[2]+texto1[3];
            cifras2 = parseInt(cifras);
            diaOficialFinal=diamesfin(consfecha1,consanyo);
            fechaFinOficial = consanyo+"-0"+consfecha1+"-"+diaOficialFinal;
        }else{
            consanyo = anyonum;
            consfecha = fechanum+2;
            texto1 = consanyo.toString();
            cifras = texto1[2]+texto1[3];
            cifras2 = parseInt(cifras);
            diaOficialFinal=diamesfin(consfecha,consanyo);
            if(consfecha<10){
                consfecha1="0"+consfecha;
            }else{
                consfecha1 = ""+consfecha;
            }
            fechaFinOficial = consanyo+"-"+consfecha1+"-"+diaOficialFinal;
        }
    }else{
        anyonum = parseInt(anyoSeparador);
        fechanum = parseInt(mesOficial);
        consanyo = anyonum;
        consfecha = fechanum+2;
        texto1 = consanyo.toString();
        cifras = texto1[2]+texto1[3];
        cifras2 = parseInt(cifras);
        diaOficialFinal=diamesfin(consfecha,consanyo);
        if(consfecha<10){
            consfecha1="0"+consfecha;
        }else{
            consfecha1 = ""+consfecha;
        }
        fechaFinOficial = consanyo+"-"+consfecha1+"-"+diaOficialFinal;

    }
        finfecha = fechaFinOficial;
        $("#finfecha").val(fechaFinOficial);
        $("#muestrafechafin").val(fechaFinOficial);

        console.log(finfecha+"fecha fin");
        console.log(fechainicio+"fecha inicio");

    Llenargraficos(idnivel,idgrado,idseccion,fechainicio,finfecha);

    var pagostotales = parseInt(cantidadTotalCobrosMes1) + parseInt(cantidadTotalCobrosMes2) + parseInt(cantidadTotalCobrosMes3);
    
        var pagosRealizados = parseInt(cantidadTotalCobrosPagadosMes1) + parseInt(cantidadTotalCobrosPagadosMes2) + parseInt(cantidadTotalCobrosPagadosMes3);
    
        var pagosNoRealizados = pagostotales - pagosRealizados;

        document.getElementById('pagosrealizados').innerHTML=' '+pagosRealizados;
        document.getElementById('pagosnorealizados').innerHTML=' '+pagosNoRealizados;

        total(idnivel,idgrado,idseccion,fechainicio,finfecha);

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
    

    fechafin = $("#finfecha").val();

    $("#muestrafechafin").val(fechafin);

    var mesOficial;
    var fechanum;
    var anyonum;
    var consfecha;
    var consfecha1;
    var consanyo;
    var fecInicio;
    var fechaSeparador = fechafin.split("-");

    var anyoSeparador = fechaSeparador[0];
    var mesSeparador = fechaSeparador[1];

    if(mesSeparador[0] == 0){
        mesOficial=mesSeparador[1];
    }else{
        mesOficial=mesSeparador;
    }
    
    if(mesOficial == 1 || mesOficial == 2){
        fechanum = parseInt(mesOficial);
        anyonum = parseInt(anyoSeparador);
        consfecha = fechanum-2;
        if(consfecha==0){
            consfecha1 = 12;
            consanyo = anyonum-1;
            fecInicio = consanyo+"-"+consfecha1+"-01";
        }else if(consfecha==-1){
            consfecha1 = 11;
            consanyo = anyonum-1;
            fecInicio = consanyo+"-"+consfecha1+"-01";
        }else{
            consanyo = anyonum;
            consfecha = fechanum-2;
            if(consfecha<10){
                consfecha1="0"+consfecha;
            }else{
                consfecha1 = ""+consfecha;
            }
            fecInicio = consanyo+"-"+consfecha1+"-01";
        }
    }else{
        fechanum = parseInt(mesOficial);
        anyonum = parseInt(anyoSeparador);
        consanyo = anyonum;
        consfecha = fechanum-2;
        if(consfecha<10){
            consfecha1="0"+consfecha;
        }else{
            consfecha1 = ""+consfecha;
        }
        fecInicio = consanyo+"-"+consfecha1+"-01";
    }


    
        iniciofecha = fecInicio;
        $("#iniciofecha").val(fecInicio);
        $("#muestrafechainicio").val(fecInicio);
   
        console.log(iniciofecha+"fecha fin2");
        console.log(fechafin+"fecha inicio2");

    Llenargraficos(idnivel,idgrado,idseccion,iniciofecha,fechafin);

    var pagostotales = parseInt(cantidadTotalCobrosMes1) + parseInt(cantidadTotalCobrosMes2) + parseInt(cantidadTotalCobrosMes3);
    
    var pagosRealizados = parseInt(cantidadTotalCobrosPagadosMes1) + parseInt(cantidadTotalCobrosPagadosMes2) + parseInt(cantidadTotalCobrosPagadosMes3);

    var pagosNoRealizados = pagostotales - pagosRealizados;

    document.getElementById('pagosrealizados').innerHTML=' '+pagosRealizados;
    document.getElementById('pagosnorealizados').innerHTML=' '+pagosNoRealizados;

    total(idnivel,idgrado,idseccion,iniciofecha,fechafin);

});

