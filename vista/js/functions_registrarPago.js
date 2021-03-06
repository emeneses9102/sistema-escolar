
$("#btnBuscarAlumno").click(function (e) { 
    e.preventDefault();
    var seleccion = $('input:radio[name=radio]:checked').val();
    var alumnoBuscar = $('#textoBuscar').val();
    if(seleccion == "codigo"){
        alumnoBuscar = "'"+alumnoBuscar+"'"
    }
    

    $("#datosAlumno").empty();
    $.ajax({
        url	    : 'ajax/registrarPago.ajax.php',
        type    : 'POST',
        data    : {seleccion : seleccion,
                    alumnoBuscar : alumnoBuscar},
        dataType: 'json',
        success: function(data){
            
            
                for(let item of data){
                    $("#datosAlumno").append("<tr><td>"+item.nombres+" "+item.apellidos+"</td><td>"+item.cod_matricula+"</td><td>"+item.dni+"</td><td>primaria</td><td><button class='btn btn-success btn-sm ' onclick='mostraDatosPago("+item.usuario_id+")' title='mostrar'><i class='fa fa-eye' aria-hidden='true'></i></button></td></tr>");
                }
                  
        }
    });
});

function mostraDatosPago(idMostrarPago){
    $("#mostrarDatos").modal("show");

    $.ajax({
        url	    : 'ajax/registrarPago.ajax.php',
        type    : 'POST',
        data    : {idMostrarPago : idMostrarPago},
        dataType: 'json',
        success: function(data){
            var grado = (data.nombre_grado == null)? "no matriculado": data.nombre_grado + " de "+data.nombre_nivel;
            
            $("#nombreAlum").text(data.nombres + " "+ data.apellidos);
            $("#codigoAlum").text(data.cod_matricula ); 
            $("#direccionAlum").text(data.direccion ); 
            $("#dniAlum").text(data.dni ); 
            $("#gradoAlum").text(grado); 

            //Datos del apoderado
            $("#nombreApod").text(data.nombres_apoderado + " "+ data.apellidos_apoderado);
            $("#dniApod").text(data.dni_apoderado ); 
            $("#direccionApod").text(data.direccion_apoderado ); 
            
                  
        }
    });
}