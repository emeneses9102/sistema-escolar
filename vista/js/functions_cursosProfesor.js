function verClaseProfesor(idCurso) {
    let id_Curso = idCurso;
    let idSeccion_grado =0;
    
    $.ajax({
        type: "POST",
        url: "ajax/cursosProfesor.ajax.php",
        data: { idCurso: id_Curso },
        dataType: "json",
        success: function (data) {
           console.log(data)
            $("#titulo_curso ").text(data[0].curso); 
            $("#seccion_curso").text(data[0].nseccion); 
            $("#grado_curso").text(data[0].grado);
            $("#nivel_curso").text(data[0].nivel); 
            $("#id_curso_").val(id_Curso)
            $('#listCursosProfesor').removeClass('active');
            $('#listCursosProfesor').addClass('fade');
            
            $('#editarCursoProfesor').removeClass('fade');
            $('#editarCursoProfesor').addClass('active');
            listarAlumnosCurso(parseInt(data[0].idSeccionGrado))  
        }
    });
    

}

const regresarCurso = ()=>{
    $('#listCursosProfesor').addClass('active');
    $('#listCursosProfesor').removeClass('fade');
    
    $('#editarCursoProfesor').addClass('fade');
    $('#editarCursoProfesor').removeClass('active');
}

//listar alumnos matriculados en el curso

const listarAlumnosCurso = (idSeccion_grado)=>{
    $.ajax({
        type: "POST",
        url: "ajax/cursosProfesor.ajax.php",
        data: { idSeccionCurso: idSeccion_grado },
        dataType: "json",
        success: function (data) {
           console.log(data)
           
           var tabla = $("#tabla_alumnosCurso").DataTable();
           tabla.clear().draw();
           for(let item of data){

            tabla.row.add(
                [
            "<td>"+item.apellidos+", "+item.nombres+"</td>",
            "<td></td>",           
            "<td></td>",
            "<td><button  type='button' class='btn btn-warning btn-sm px-1 mr-2' onclick='calificarAlumno("+item.idAlumno+")' title='Calificar'><i class='fas fa-sort-numeric-up-alt'></i></button></td>",
            ]
            ).draw(false);
            
        }
        tabla.destroy()
        }
    });

}
$("#btn_Cerrar").click(function (e){
    $("#formConfCalificaciones")[0].reset();
})
$("#btn_CerrarP").click(function (e){
    $("#formConfNotasParciales")[0].reset();
    $("#confCalificaciones").addClass('active show')
    $("#tab_notas").addClass('active')
    $("#confCalificacionesParciales").removeClass('active show')
    $("#tab_parciales").removeClass('active')
})


$("#btnConfNotas").click(function (e){
    e.preventDefault();
    let seleccion = $('#periodoAcademico option:selected').html()
    let seleccion_val = $('#periodoAcademico option:selected').val()
    $("#periodoText").text(seleccion)
    $("#periodoVal").val(seleccion_val)
})

$("#btn_GuardarCalificaciones").click(function (e){
    e.preventDefault();
    let nombreCalificacion = $('#nombreCalificacion').val().toUpperCase()
    let siglasCalificacion = $('#siglasCalificacion').val().toUpperCase()
    let pesoCalificacion = $('#pesoCalificacion').val()
    let chkSubNotas = $('#chkSubNotas').is(':checked') ? 1 : 0
    let detalleCalificaciones = $('#detalleCalificaciones').val()
    let id_curso_ = $('#id_curso_').val()
    let periodoVal = $("#periodoVal").val()

    nombreCalificacion == '' ? $('#nombreCalificacion').addClass('is-invalid'): $('#nombreCalificacion').removeClass('is-invalid') 
    siglasCalificacion == '' ? $('#siglasCalificacion').addClass('is-invalid'): $('#siglasCalificacion').removeClass('is-invalid') 
    pesoCalificacion == '' ? $('#pesoCalificacion').addClass('is-invalid'): $('#pesoCalificacion').removeClass('is-invalid') 
    
    if(nombreCalificacion !== '' && siglasCalificacion !== '' && pesoCalificacion !== ''){
        $.ajax({
            type: "POST",
            url: "ajax/cursosProfesor.ajax.php",
            data: {nombreCalificacion:nombreCalificacion,
                    siglasCalificacion:siglasCalificacion,
                    pesoCalificacion:pesoCalificacion,
                    chkSubNotas:chkSubNotas,
                    detalleCalificaciones:detalleCalificaciones,
                    id_curso_: id_curso_,
                    periodoVal:periodoVal
                    },
            success: function (respuesta) {
                if(respuesta == "repetido"){
                    swal.fire({
                        icon: "error",
                        title: "La calificación  ya existe",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                }
                if(respuesta == "ok"){
                    swal.fire({
                        icon: "success",
                        title: "Calificación registrada exitosamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                    actualizar()
                    $("#formConfCalificaciones")[0].reset();
                    
                }
                if(respuesta == "error"){
                    swal.fire({
                        icon: "error",
                        title: "Error al registrar la calificacion",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                }
            }
        });
    }
    
     
})

$("#btn_GuardarNotaParcial").click(function (e){
    e.preventDefault();
    let nombreNotaParcial = $('#nombreNotaParcial').val().toUpperCase()
    let siglasNotaParcial = $('#siglasNotaParcial').val().toUpperCase()
    let pesoNotaParcial = $('#pesoNotaParcial').val()
    let notaReferenciada = $('#notaReferenciada').val()
    let detalleNotaParcial = $('#detalleNotaParcial').val().toUpperCase()

    nombreNotaParcial == '' ? $('#nombreNotaParcial').addClass('is-invalid'): $('#nombreNotaParcial').removeClass('is-invalid') 
    siglasNotaParcial == '' ? $('#siglasNotaParcial').addClass('is-invalid'): $('#siglasNotaParcial').removeClass('is-invalid') 
    pesoNotaParcial == '' ? $('#pesoNotaParcial').addClass('is-invalid'): $('#pesoNotaParcial').removeClass('is-invalid') 
    
    if(nombreNotaParcial !== '' && siglasNotaParcial !== '' && pesoNotaParcial !== '' && notaReferenciada !== '0'){
        $.ajax({
            type: "POST",
            url: "ajax/cursosProfesor.ajax.php",
            data: {nombreNotaParcial:nombreNotaParcial,
                    siglasNotaParcial:siglasNotaParcial,
                    pesoNotaParcial:pesoNotaParcial,
                    notaReferenciada:notaReferenciada,
                    detalleNotaParcial:detalleNotaParcial,
                    },
            success: function (respuesta) {
                if(respuesta == "repetido"){
                    swal.fire({
                        icon: "error",
                        title: "La calificación  ya existe",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                }
                if(respuesta == "ok"){
                    swal.fire({
                        icon: "success",
                        title: "Calificación registrada exitosamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                    actualizar()
                    $("#formConfNotasParciales")[0].reset();
                    
                }
                if(respuesta == "error"){
                    swal.fire({
                        icon: "error",
                        title: "Error al registrar la calificacion",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    })
                }
            }
        });
    }   
})

$("#tab_parciales").click(function (e){
    let id_curso_cmb = $('#id_curso_').val()
    let periodoVal_cmb = $("#periodoVal").val()
    let $select = document.querySelector("#notaReferenciada");
    
    $.ajax({
        type: "POST",
        url: "ajax/cursosProfesor.ajax.php",
        data: { id_curso_cmb: id_curso_cmb,
                periodoVal_cmb:periodoVal_cmb},
        dataType: "json",
        success: function (data) {
            //console.log(data)
            for (let i = $select.options.length; i >= 0; i--) {
                $select.remove(i);
              }
            const option = document.createElement('option');
            option.value = 0;
            option.text = '';
            $select.appendChild(option);
            data.map((item)=>{
            const option = document.createElement('option');
            option.value = item.idConfNotas;
            option.text = item.nombre_nota;
            $select.appendChild(option);
           })
        }
    });
})

/*
$( '#chkParcial' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        
        $("#selectPaciales").prop('disabled', false);
    }else{
        $("#selectPaciales").prop('disabled', true);
    }
})
*/
/*if( $('#chkParcial').is(':checked') ) {
    alert('Seleccionado');
}*/