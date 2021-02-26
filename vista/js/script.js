//************** JS PARA NIVELES EDUCATIVOS ******//
function closeNuevoNivel(){
    $('#niveles').addClass("active");
    $('#agregarNiveles').removeClass("active");

    $('#linkNiveles').addClass("active");
    $('#linkAgregar').removeClass("active");

    $(".tConf").html('Configurar Niveles');
    $("#formNiveles").show();
    $("#eformNiveles").hide();
    $("#formNiveles")[0].reset();
}

function editNivel(id){
    var idNivel = id;
    var nombre =$(".detalle_"+id+">h4").text();
    var descripcion =$(".detalle_"+id+">p").text();
    var color = $(".detalle_"+id+">span").text();
    cambiarPestaña();
    $("#enombreNivel").val(nombre);
    $("#edescripcionNivel").val(descripcion);
    $("#enivel_color").val(color);
    $("#idNivel").val(idNivel);
}

function deleteNivel(id){
    
    idNivel=id;
    $.ajax({
        url	    : 'ajax/mNiveles.ajax.php',
        type    : 'POST',
        data    : {idNivel : idNivel},
        success: function(data){
           if(data == "ok"){
               
                swal.fire({
                    icon:"success",
                    title : "Nivel eliminado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                }).then((result)=>{
                    if(result.value){
                        window.location = "mniveles";
                    }
                })

           }
           
        }
    });
}

function cambiarPestaña(){
	$("#niveles").removeClass("active");
	$("#linkNiveles").removeClass("active");


	$("#linkAgregar").addClass("active");
	$("#agregarNiveles").removeClass("fade");
	$("#agregarNiveles").addClass("active");

    $("#formNiveles").hide();
    $("#eformNiveles").removeAttr('hidden');
    $("#eformNiveles").show();
	$(".tConf").html('Editar Nivel');
   
    $("#formNiveles")[0].reset();
}

//************** JS PARA GRADOS ******//

$("#nivel").change(function (e) { 
    var idNivel = nivel.options[nivel.selectedIndex].value;
    var grados = $("#grado");
    $("#nivel").removeClass("is-invalid");
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {idNivel : idNivel},
        dataType: 'json',
        success: function(data){
            // Limpiamos el select
            grados.find('option').remove();
            grados.append('<option value=""></option>');
            for(let item of data){
                grados.append('<option value="' + item.idGrados + '">' + item.nombre_grado + '</option>');
            }
            $("#grado").focus();
        }
    })
});

$("#grado").change(function (e) { 
    
    var id_Grado = grado.options[grado.selectedIndex].value;
    var tipo="mostrar";
    var secciones = $("#GS_disponibles");
    $("#GS_disponibles").empty();
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {id_Grado : id_Grado,
                    tipo:tipo},
        dataType: 'json',
        success: function(data){
            // Limpiamos el select
            for(let item of data){
                secciones.append("<tr><td>"+item.nombre_seccion+"</td><td>"+item.nombre_grado+"</td><td>"+item.nombre_nivel+"</td><td><span class='btn btn-primary btn-sm' onclick='generarClase("+item.idSeccion_Grados+")'><i class='fa fa-plus-circle ' aria-hidden='true'></i>Generar Clase</span></td></tr>");
            }
            $("#seccion").focus();
        }
    })
});

$(".mgrado").change(function (e) { 
    $(".mgrado").removeClass("is-invalid");
    var id_Grado = grado.options[grado.selectedIndex].value;
    var tipo="mostrar";
    var seccion = $("#seccion");
    $("#GS_disponibles").empty();
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {id_Grado : id_Grado,
                    tipo:tipo},
        dataType: 'json',
        success: function(data){
           // Limpiamos el select
           seccion.find('option').remove();
           seccion.append('<option value=""></option>');
           for(let item of data){
            seccion.append('<option value="' + item.idSeccion_Grados + '">' + item.nombre_seccion + '</option>');
           }
           $("#grado").focus();
        }
    })
});
$("#seccion").change(function (e) { 
    $("#seccion").removeClass("is-invalid");
    
    
});








//var idNivel = niveles2.options[niveles2.selectedIndex].value;

//************** JS PARA CURSOS ******//
$('#tablebProfesores').DataTable();
$('#tablaCursos').DataTable();
function AgregarProf(id){
    var idProfesor = id;
    $.ajax({
        type: "POST",
        url: "ajax/profesores.ajax.php",
        data: {idProfesor : idProfesor},
        dataType: "json",
        success: function (data) {
            $("#modalProfesor").modal('hide');  
            $("#nombreProfesor").val(data.nombre);
            $("#apellidosProfesor").val(data.apellidos);
            $("#documento_profesor").val(data.dni);
            $("#numero_profesor").val(data.celular);
            $("#idProfesor").val(data.usuario_id);
        }
    });
}

$("#btnLimpiar").click(function (e) { 
    e.preventDefault();
    $("#frmCursos")[0].reset();
    
});


//** JS PARA MOSTRAR LOS DATOS QUE SE ACTUALIZARÁN*//
function editarCurso(id){
    $('#listadeCursos').removeClass('active');
    $('#listarCursos').removeClass('active');
    $('#listarCursos').addClass('fade');

    $('#linkEditar').addClass('active');
    $('#linkEditar').removeClass('disabled');
    $('#editarCurso').removeClass('fade');
    $('#editarCurso').addClass('active');
    mostrarCurso(id);
}
function mostrarCurso(id){
    var idCurso = id;
    $.ajax({
        type: "POST",
        url: "ajax/mCursos.ajax.php",
        data: {idCurso : idCurso},
        dataType: "json",
        success: function (data) {
            $("#idCurso").val(data.idCursos);
            $("#enombre_curso").val(data.nombre_curso);  
            $("#enombrec_curso").val(data.nombre_corto);
            $("#ecodigo_curso").val(data.codigo_curso);
            $("#edescripcion_curso").val(data.descripcion);
            
           
            
        }
    });
}

function eliminarCurso(id,nombre_curso){
    var idCursoE = id;
    Swal.fire({
        title: 'Realmente desea desactivar el usuario?',
        showDenyButton: true,
        
        confirmButtonText: `Sí, descativar`,
        denyButtonText: `No, Cancelar`,
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "ajax/mCursos.ajax.php",
                data: {idCursoE : idCursoE},
                success: function (data) {
                    Swal.fire('Se eliminó correctamente el curso', '');
                   
                }
            });
            window.location = "mCursos";
    }
    else if (result.isDenied) {
        Swal.fire('No se guardaron los cambios', '', '');
      }
    })

}

function listarGrados(dato){
    var idNivel = enivel.options[enivel.selectedIndex].value;
    var grados = $("#egrado");
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {idNivel : idNivel},
        dataType: 'json',
        success: function(data){
            // Limpiamos el select
            grados.find('option').remove();
            grados.append('<option value=""></option>');
            for(let item of data){
                grados.append('<option value="' + item.idGrados + '">' + item.nombre_grado + '</option>');
            }
            $("#egrado").val(dato);
            $("#egrado").focus();
        }
    })
}

function listarSecciones(dato,grado){
    var id_Grado = grado;
    var tipo="mostrar";
    var secciones = $("#eseccion");
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {id_Grado : id_Grado,
                    tipo:tipo},
        dataType: 'json',
        success: function(data){
            // Limpiamos el select
            secciones.find('option').remove();
            
            for(let item of data){
                secciones.append('<option value="' + item.idSeccion + '">' + item.nombre + '</option>');
            }
            $("#eseccion").val(dato);
            $("#eseccion").focus();
        }
    })
}

$("#enivel").change(function (e) { 
    var idNivel = enivel.options[enivel.selectedIndex].value;
    var grados = $("#egrado");
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {idNivel : idNivel},
        dataType: 'json',
        success: function(data){
            // Limpiamos el select
            grados.find('option').remove();
            grados.append('<option value=""></option>');
            for(let item of data){
                grados.append('<option value="' + item.grado_id + '">' + item.nombre_grado + '</option>');
            }
            $("#egrado").focus();
        }
    })
});

$("#egrado").change(function (e) { 
    
    var id_Grado = egrado.options[egrado.selectedIndex].value;
    var tipo="mostrar";
    var secciones = $("#eseccion");
    $.ajax({
        url	    : 'ajax/mGradosySecciones.ajax.php',
        type    : 'POST',
        data    : {id_Grado : id_Grado,
                    tipo:tipo},
        dataType: 'json',
        success: function(data){
            // Limpiamos el select
            secciones.find('option').remove();
            
            for(let item of data){
                secciones.append('<option value="' + item.id_seccion + '">' + item.nombre + '</option>');
            }
            $("#eseccion").focus();
        }
    })
});
$('#etablebProfesores').DataTable();
function listarProf(id){
    var idProfesor = id;
    $.ajax({
        type: "POST",
        url: "ajax/profesores.ajax.php",
        data: {idProfesor : idProfesor},
        dataType: "json",
        success: function (data) {
            $("#emodalProfesor").modal('hide');  
            $("#enombreProfesor").val(data.nombre);
            $("#eapellidosProfesor").val(data.apellidos);
            $("#edocumento_profesor").val(data.dni);
            $("#enumero_profesor").val(data.celular);
            $("#eidProfesor").val(data.usuario_id);
        }
    });
}

