var cantidadTotalCobrosEnero;
var cantidadTotalCobrosFebrero;
var cantidadTotalCobrosMarzo;
var cantidadTotalCobrosAbril;
var cantidadTotalCobrosMayo;

var cantidadTotalCobrosPagadosEnero;
var cantidadTotalCobrosPagadosFebrero;
var cantidadTotalCobrosPagadosMarzo;
var cantidadTotalCobrosPagadosAbril;
var cantidadTotalCobrosPagadosMayo;


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

$( document ).ready(function() {

 
        idnivel = 0;
        idgrado = 0;
        idseccion = 0;
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
                cantidadTotalCobrosPagadosMarzo = data[2]+"";
                cantidadTotalCobrosPagadosAbril = data[3]+"";
                cantidadTotalCobrosPagadosMayo = data[4]+"";
            }
        });

var data = {
    labels: ["Enero", "Febrero", "Marzo", "April", "May"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [ porcentajesNoPagados(cantidadTotalCobrosEnero,cantidadTotalCobrosPagadosEnero), porcentajesNoPagados(cantidadTotalCobrosFebrero,cantidadTotalCobrosPagadosFebrero), porcentajesNoPagados(cantidadTotalCobrosMarzo,cantidadTotalCobrosPagadosMarzo), porcentajesNoPagados(cantidadTotalCobrosAbril,cantidadTotalCobrosPagadosAbril), porcentajesNoPagados(cantidadTotalCobrosMayo,cantidadTotalCobrosPagadosMayo)]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [porcentajesPagados(cantidadTotalCobrosEnero,cantidadTotalCobrosPagadosEnero), porcentajesPagados(cantidadTotalCobrosFebrero,cantidadTotalCobrosPagadosFebrero), porcentajesPagados(cantidadTotalCobrosMarzo,cantidadTotalCobrosPagadosMarzo), porcentajesPagados(cantidadTotalCobrosAbril,cantidadTotalCobrosPagadosAbril), porcentajesPagados(cantidadTotalCobrosMayo,cantidadTotalCobrosPagadosMayo)]
        }
    ]
};

var pdata = [
    {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
    },
    {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
    },
    {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
    }
]

var ctxb = $("#barChartDemo").get(0).getContext("2d");

if(window.grafica){
    window.grafica.clear();
    window.grafica.destroy();
}

window.grafica = new Chart(ctxb).Bar(data);

$('#nivelreporte').on('change', function(){
    var value = $(this).val();

   $("#SelecionadoNivel").val(value+"");

    console.log(value+"- valor de nivel");

    if(value == ""){
        idnivel = 0;
    }else { 
        idnivel = value;
    }

    idgrado = 0;
    idseccion = 0;

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
                cantidadTotalCobrosPagadosMarzo = data[2]+"";
                cantidadTotalCobrosPagadosAbril = data[3]+"";
                cantidadTotalCobrosPagadosMayo = data[4]+"";
                console.log(data+"");
            }
        });

        console.log(cantidadTotalCobrosFebrero +"-"+ cantidadTotalCobrosPagadosFebrero);

        var data1 = {
            labels: ["Enero", "Febrero", "Marzo", "April", "May"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [ porcentajesNoPagados(cantidadTotalCobrosEnero,cantidadTotalCobrosPagadosEnero), porcentajesNoPagados(cantidadTotalCobrosFebrero,cantidadTotalCobrosPagadosFebrero), porcentajesNoPagados(cantidadTotalCobrosMarzo,cantidadTotalCobrosPagadosMarzo), porcentajesNoPagados(cantidadTotalCobrosAbril,cantidadTotalCobrosPagadosAbril), porcentajesNoPagados(cantidadTotalCobrosMayo,cantidadTotalCobrosPagadosMayo)]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [porcentajesPagados(cantidadTotalCobrosEnero,cantidadTotalCobrosPagadosEnero), porcentajesPagados(cantidadTotalCobrosFebrero,cantidadTotalCobrosPagadosFebrero), porcentajesPagados(cantidadTotalCobrosMarzo,cantidadTotalCobrosPagadosMarzo), porcentajesPagados(cantidadTotalCobrosAbril,cantidadTotalCobrosPagadosAbril), porcentajesPagados(cantidadTotalCobrosMayo,cantidadTotalCobrosPagadosMayo)]
                }
            ]
        };


        var ctxb1 = $("#barChartDemo").get(0).getContext("2d");
        
        if(window.grafica){
            window.grafica.clear();
            window.grafica.destroy();
        }

        window.grafica = new Chart(ctxb1).Bar(data1);
    
});

$('#gradoreporte').on('change', function(){
    var value = $(this).val();

    $("#SelecionadoGrado").val(value+"");

    var seleccionadonivel = $("#SelecionadoNivel").val();

    console.log(seleccionadonivel+"- valor de nivel");

    console.log(value+"- valor de grado");

    if(seleccionadonivel == ""){
        idnivel = 0;
    }else { 
        idnivel = seleccionadonivel;
    }

    if(value == ""){
        idgrado = 0;
    }else { 
        idgrado = value;
    }

    idseccion = 0;

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
                cantidadTotalCobrosPagadosMarzo = data[2]+"";
                cantidadTotalCobrosPagadosAbril = data[3]+"";
                cantidadTotalCobrosPagadosMayo = data[4]+"";
                console.log(data+"");
            }
        });

   
        console.log(cantidadTotalCobrosFebrero +"-"+ cantidadTotalCobrosPagadosFebrero);

        var data2 = {
            labels: ["Enero", "Febrero", "Marzo", "April", "May"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [ porcentajesNoPagados(cantidadTotalCobrosEnero,cantidadTotalCobrosPagadosEnero), porcentajesNoPagados(cantidadTotalCobrosFebrero,cantidadTotalCobrosPagadosFebrero), porcentajesNoPagados(cantidadTotalCobrosMarzo,cantidadTotalCobrosPagadosMarzo), porcentajesNoPagados(cantidadTotalCobrosAbril,cantidadTotalCobrosPagadosAbril), porcentajesNoPagados(cantidadTotalCobrosMayo,cantidadTotalCobrosPagadosMayo)]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [porcentajesPagados(cantidadTotalCobrosEnero,cantidadTotalCobrosPagadosEnero), porcentajesPagados(cantidadTotalCobrosFebrero,cantidadTotalCobrosPagadosFebrero), porcentajesPagados(cantidadTotalCobrosMarzo,cantidadTotalCobrosPagadosMarzo), porcentajesPagados(cantidadTotalCobrosAbril,cantidadTotalCobrosPagadosAbril), porcentajesPagados(cantidadTotalCobrosMayo,cantidadTotalCobrosPagadosMayo)]
                }
            ]
        };


        var ctxb2 = $("#barChartDemo").get(0).getContext("2d");
        
        if(window.grafica){
            window.grafica.clear();
            window.grafica.destroy();
        }

        window.grafica = new Chart(ctxb2).Bar(data2);
    
});

$('#seccionreporte').on('change', function(){
    var value = $(this).val();

    var seleccionadonivel = $("#SelecionadoNivel").val();

    var seleccionadogrado = $("#SelecionadoGrado").val();

    console.log(seleccionadonivel+"- valor de nivel");

    console.log(seleccionadogrado+"- valor de grado");

    console.log(value+"- valor de grado");

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

    if(value == ""){
        idseccion = 0;
    }else { 
        idseccion = value;
    }

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
                console.log(data+"");
            }
        });

   
        console.log(cantidadTotalCobrosFebrero +"-"+ cantidadTotalCobrosPagadosFebrero);

        var data3 = {
            labels: ["Enero", "Febrero", "Marzo", "April", "May"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [ porcentajesNoPagados(cantidadTotalCobrosEnero,cantidadTotalCobrosPagadosEnero), porcentajesNoPagados(cantidadTotalCobrosFebrero,cantidadTotalCobrosPagadosFebrero), porcentajesNoPagados(cantidadTotalCobrosMarzo,cantidadTotalCobrosPagadosMarzo), porcentajesNoPagados(cantidadTotalCobrosAbril,cantidadTotalCobrosPagadosAbril), porcentajesNoPagados(cantidadTotalCobrosMayo,cantidadTotalCobrosPagadosMayo)]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [porcentajesPagados(cantidadTotalCobrosEnero,cantidadTotalCobrosPagadosEnero), porcentajesPagados(cantidadTotalCobrosFebrero,cantidadTotalCobrosPagadosFebrero), porcentajesPagados(cantidadTotalCobrosMarzo,cantidadTotalCobrosPagadosMarzo), porcentajesPagados(cantidadTotalCobrosAbril,cantidadTotalCobrosPagadosAbril), porcentajesPagados(cantidadTotalCobrosMayo,cantidadTotalCobrosPagadosMayo)]
                }
            ]
        };


        var ctxb3 = $("#barChartDemo").get(0).getContext("2d");
        
        if(window.grafica){
            window.grafica.clear();
            window.grafica.destroy();
        }

        window.grafica = new Chart(ctxb3).Bar(data3);
    
});

//  NUEVOS GRAFICOS
        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxp = $("#pieChartDemo").get(0).getContext("2d");
        var pieChart = new Chart(ctxp).Pie(pdata);

});
