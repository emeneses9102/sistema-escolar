function mostrarGrados(){
    var idniveles2 = document.getElementById("niveles2");
    var idNivel = niveles2.options[niveles2.selectedIndex].value;
    $("#nombre_seccion").empty();
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {idNivel : idNivel},
        dataType: 'json',
        success: function(data){
            $(".listarGrados").empty();
            if(data == ""){
                $("#nombre_seccion").attr("disabled",true);
                $("#btnAgregarSeccion").attr("disabled",true);
                $("#datos_grado").empty();
                $("#datos_grado").append("<span class='h6' id='titulo_grado'>Datos del Grado</span>");
            }
            else{
            let contador=0;
            $("#nombre_seccion").removeAttr("disabled");
            $("#btnAgregarSeccion").removeAttr("disabled");
            for(let item of data){
                if(contador == 0){
                    $(".listarGrados").append("<a class='listaGrado list-group-item list-group-item-action active'  id="+item.idGrados+" href='#'>"+MaysPrimera(item.nombre_grado.toLowerCase())+"</a> <p class='nivel' hidden>"+MaysPrimera(item.nombre_nivel.toLowerCase())+"</p>");
                    $("#datos_grado").empty();
                    $("#datos_grado").append("<span class='h6' id='titulo_grado'>Datos del Grado</span>");
                    
                    $("#titulo_grado").html(""+MaysPrimera(item.nombre_grado.toLowerCase())+" - Nivel : "+MaysPrimera(item.nombre_nivel.toLowerCase())+"");
                    $("#titulo_grado").attr("nombre_grado",""+item.nombre_grado+"");
                    $("#titulo_grado").attr("nivel",""+item.nombre_nivel+"");
                    $("#titulo_grado").attr("id_nivel",""+item.idNiveles+"");
                    $("#datos_grado").append("<span class='btn btn-warning btn-sm ml-md-5 mr-1 editar_grado' id="+item.idGrados+"><i class='fas fa-edit m-0'></i></span><span class='btn btn-danger btn-sm eliminar_grado'><i class='fa fa-trash m-0' aria-hidden='true'></i></span>");
                    listarSeccion();

                    $("#lista_secciones").empty();
                    
                    mostrarSecciones(item.idGrados);
                }else{
                    $(".listarGrados").append("<a class='listaGrado list-group-item list-group-item-action ' id="+item.idGrados+" href='#'>"+MaysPrimera(item.nombre_grado.toLowerCase())+"</a>");
                }
                contador++;
            }
            //MOSTRAR LOS GRADOS
            $(".listaGrado").click(function (e) { 
                e.preventDefault();
                //Remover y agregar el atributo active
                $(".listaGrado.active").removeClass("active");
                $(this).addClass("active");
                
                //Pasar valores al resumen 
                var nombre_grado=$(this).text();
                var nivel = $(".nivel").text();
                var idGrado=$(this).attr("id");
                //var idNivel=$(this).attr("id_nivel");
                //Cambiamos los datos del grado
                
                $("#titulo_grado").html(""+nombre_grado+" - Nivel : "+nivel+"");
                $("#titulo_grado").attr("nombre_grado",""+nombre_grado+"");
                $("#titulo_grado").attr("nivel",""+nivel+"");
                //$("#titulo_grado").attr("id_nivel",""+id_nivel+"");
                $(".editar_grado").attr("id",""+idGrado+"");
                listarSeccion();
                
                //
                mostrarSecciones(idGrado);
                $("#lista_secciones").empty();
                $("#nombre_seccion").empty();
            });
            //enviar datos al formulario para editar
            $(".editar_grado").click(function (e){
                e.preventDefault();

                $("#enombreGrado").removeAttr("disabled");
                $("#eniveles").removeAttr("disabled");
                $("#actualizar_grado").removeAttr("disabled");

                var id= $(this).attr("id");
                var gradoName = $("#titulo_grado").attr("nombre_grado");
                var id_nivel = $("#titulo_grado").attr("id_nivel");
                mostrarEditarGrados(id, gradoName,id_nivel);
            });
            //eliminar grados
            $(".eliminar_grado").click(function (e){
                e.preventDefault();
                var id= $(".editar_grado").attr("id");
              
                eliminarGrados(id);
                
            });

            $("#btnAgregarSeccion").click(function (e) { 
                e.preventDefault();
                var idGrado=$(".listaGrado.active").attr("id");
                //var nombre_seccion=$("#nombre_seccion").val();
                var idSeccion = select();
                
                //llamamos el ajax para el registro de secciones
                $.ajax({
                    url	    : 'ajax/mGradosySecciones.ajax.php',
                    type    : 'POST',
                    data    : {idGrado : idGrado,
                                idSeccion : idSeccion},
                    success: function (data) {
                        if(data=="ok"){
                            swal.fire({
                                icon:"success",
                                title : "Sección registrada",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                            });
                            $("#lista_secciones").empty();
                            mostrarSecciones(idGrado);
                            
                        }
                        else if(data=="repet"){
                            swal.fire({
                                icon:"error",
                                title : "La sección ya existe en el grado",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                            })
                        }
                        else  if(data=="erro"){
                            swal.fire({
                                icon:"error",
                                title : "La sección no pudo ser agregada",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                            })
                        }
                    }
                });
               
            });

        }
    }
    });
    
}
function select(){
    return  nombre_seccion.options[nombre_seccion.selectedIndex];
 }
 
function mostrarSecciones(id_Grado,tmostrar){
    var id_Grado=id_Grado;
    var tipo="mostrar";
    
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {id_Grado : id_Grado,
                    tipo:tipo},
        dataType: 'json',
        success: function(data){
            $("#secciones_disponibles").empty();
            $("#secciones_agregadas").empty();
            mostrarSeccionesDisponibles();
            if(tmostrar == "secciones"){
                for(let item of data){
                    $("#secciones_agregadas").append("<tr><td>"+item.nombre_seccion+"</td><td><button class='btn btn-sm btn-danger' onclick='eliminarSeccion("+item.idSeccion_Grados+")' id="+item.idSeccion_Grados+"><i class='fas fa-times-circle'></i></button></td></tr>");
                }
                
            }else{

                for(let item of data){
                    $("#lista_secciones").append("<div class='col-md'><p class='text-primary h6'>"+item.nombre_seccion+"</p></div>");
                }
            }
            
            
        }
    });
    
}

function mostrarSeccionesDisponibles(){
    var idGradoSD=$(".listaGrado.active").attr("id");
    var idSeccionSD = "";
    
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {idGradoSD : idGradoSD,
                    idSeccionSD : idSeccionSD},
        dataType: 'json',
        success: function(data){
            
            
                for(let item of data){
                    $("#secciones_disponibles").append("<tr><td>"+item.nombre_seccion+"</td><td><button class='btn btn-sm btn-primary' onclick='agregarSeccion("+item.idSeccion+")' id="+item.idSeccion+"><i class='fas fa-plus-circle'></i></button></td></tr>");
                }
                  
        }
    });

}

function MaysPrimera(string){
    return string.charAt(0).toUpperCase() + string.slice(1);
  }

function mostrarEditarGrados(id,grado_name,id_nivel){
    ocultar();
    var nombre_id=id;
    var nombre_grado=grado_name;
    var nivel_id =id_nivel;
    $("#enombreGrado").val(nombre_grado);
    $("#eniveles").val(id_nivel);
    $("#e_idGrado").val(nombre_id);
    tmostrar="secciones";
    //aqui oculta
    $("#secciones_agregadas").empty();
    $("#secciones_disponibles").empty();
    mostrarSecciones(nombre_id,tmostrar);
    
}

function ocultar(){
    $("#gradosySecciones").removeClass("active");
    $("#linkGS").removeClass("active");
    $("#linkAgregarGS").addClass("active");
    $("#editarGS").addClass("active");
    $("#editarGS").removeClass("fade");
}

$("#actualizar_grado").click(function(e){
    if ($("#enombreGrado").val().length<2){
        swal.fire({
            icon:"error",
            title : "El nombre es muy corto o está vacío",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            
        })
        e.preventDefault();
    }
});

function eliminarGrados(id){
    var ideGrado = id;
    var eliminarGrado= "delete";
    Swal.fire({
        title: 'Desea eliminar este grado?',
        text: "Todas las secciones agregadas a este grado tambien se eliminarán",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url		: 'ajax/mGradosySecciones.ajax.php',
                type	: 'POST',
                data: {ideGrado : ideGrado,
                eliminarGrado : eliminarGrado},
                success: function (data) {
                    swal.fire({
                        icon:"success",
                        title : "Grado eliminado",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                    })
                    mostrarGrados();                   
                },
                fail: function(data){
                    swal('Atención',data.msg,'error');
                }
            });
      
        }
      })
    
}

function listarSeccion(){
    //var id_Grado=id_Grado;
    var dato= "";
    var tipo="listarSeccion";
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {dato : dato,
                    tipo:tipo},
        dataType: 'json',
        success: function(data){

                for(let item of data){
                    $("#nombre_seccion").append("<option value="+item.idSeccion+">"+item.nombre_seccion+"</option>");
                    
                }
            
            
        }
    });
}


function eliminarSeccion(id){
    var datoID =id;
   
    var idGrado=$(".listaGrado.active").attr("id");
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {datoID : datoID},
        success: function(data){
            if(data=="ok"){
                swal.fire({
                    icon:"success",
                    title : "Sección eliminada",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                });
                mostrarSecciones(idGrado,"secciones");
            }
            else{
                swal.fire({
                    icon:"error",
                    title : "No puede eliminar una sección con clase asignada",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                });
            }
        }
    });
}

function agregarSeccion(idSeccion){
    var idGrado=$(".listaGrado.active").attr("id");
    var idSeccion = idSeccion;
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {idGrado : idGrado,
                    idSeccion : idSeccion},
        success: function (data) {
            if(data=="ok"){
                swal.fire({
                    icon:"success",
                    title : "Sección registrada",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                });
                mostrarSecciones(idGrado,"secciones");
                
            }
            else if(data=="repet"){
                swal.fire({
                    icon:"error",
                    title : "La sección ya existe en el grado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
            else  if(data=="erro"){
                swal.fire({
                    icon:"error",
                    title : "La sección no pudo ser agregada",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
        }
    });
}

$("#linkGS").click(function (e) { 
    e.preventDefault();
    location.reload();
    $("#secciones_disponibles").empty();
});