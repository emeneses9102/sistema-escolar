const agregarPeriodo = ()=>{

    let nombrePeriodo = document.getElementById('nombrePeriodo').value
    let abreviacionPeriodo = document.getElementById('abreviacionPeriodo').value
    let pesoPeriodo = document.getElementById('pesoPeriodo').value

    if(nombrePeriodo == '' || nombrePeriodo.lenght < 5 || abreviacionPeriodo == ''){
        
        swal.fire({
            icon:"warning",
            title : "Campos vacíos",
            text: "El nombre y abreviatura no pueden ir vacíos y el nombre debe tener mas de 5 caracteres",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
        })
        return
    }
    //console.log(nombrePeriodo + ' '+abreviacionPeriodo + ' ' + pesoPeriodo )

    $.ajax({
        url	    : 'ajax/periodos.ajax.php',
        type    : 'POST',
        data    : {nombrePeriodo : nombrePeriodo,
                    abreviacionPeriodo : abreviacionPeriodo,
                    pesoPeriodo : pesoPeriodo
                },
        success: function(data){
            if(data === 'ok')
            {
                swal.fire({
                    icon:"success",
                    title : "Periodo registrado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                actualizarPeriodos()
                $("#formPeriodos")[0].reset();
            }else if(data === 'repet'){
                swal.fire({
                    icon:"warning",
                    title : "Periodo no registrado, existe un periodo con el mismo nombre",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
            else if(data === 'full'){
                swal.fire({
                    icon:"warning",
                    title : "Periodo no registrado, el porcentaje se encuentra en 100%",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
            else if(data === 'exceed'){
                swal.fire({
                    icon:"warning",
                    title : "Periodo no registrado, el porcentaje total no puede exceder al 100%",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
            else{
                swal.fire({
                    icon:"error",
                    title : "Error al registrar el periodo",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
        }
    })
}

const btnPeriodo = document.querySelector('#agregarPeriodo')

btnPeriodo.addEventListener('click', function(e){
    e.preventDefault();
    agregarPeriodo()
})

const actualizarPeriodos= ()=> {
    $.ajax({
        url	    : 'ajax/periodos.ajax.php',
        type    : 'POST',
        data    : {listarPeriodos:'listarPeriodos'},
        dataType: 'json',
        success: function(data){
            $("#listaPeriodos").empty();
            for(let item of data){
                $("#listaPeriodos").append(`<tr>
                <td>${item.nombrePeriodo}</td>
                <td>${item.abreviacionPeriodo}</td>
                <td>${item.pesoPeriodo}</td>
                <td><button class="btn btn-primary btn-sm " title="Editar" onclick="editarPeriodo(${item.idPeriodoAcademico})" ><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm " title="Eliminar" onclick="eliminarPeriodo(${item.idPeriodoAcademico})"><i class="fas fa-trash"></i></i></button>
                </td>
                </tr>`);
                
            }
        }
    })
}
function editarPeriodo (idPeriodo){
    passData(idPeriodo)
    $("#editarPeriodo").show()
    $("#agregarPeriodo").hide()
}

const passData = (idPeriodo) =>{
    $.ajax({
        url	    : 'ajax/periodos.ajax.php',
        type    : 'POST',
        data    : {idPeriodo:idPeriodo},
        dataType: 'json',
        success: function(data){
            document.getElementById('nombrePeriodo').value = data.nombrePeriodo
            document.getElementById('abreviacionPeriodo').value = data.abreviacionPeriodo
            document.getElementById('pesoPeriodo').value = data.pesoPeriodo
            document.getElementById('idPeriodo').value = data.idPeriodoAcademico
        }

    })
}
const btnCancelar = document.querySelector('#cancelarPeriodo')
btnCancelar.addEventListener('click', function(e){
    e.preventDefault();
    $("#editarPeriodo").hide()
    $("#agregarPeriodo").show()
    $("#formPeriodos")[0].reset();
}
)

const editPeriodoID = ()=>{
    let editPeriodoID = document.getElementById('idPeriodo').value
    let nombrePeriodoEdit = document.getElementById('nombrePeriodo').value
    let abreviacionPeriodo = document.getElementById('abreviacionPeriodo').value
    let pesoPeriodo = document.getElementById('pesoPeriodo').value
    //console.log(nombrePeriodo + ' '+abreviacionPeriodo + ' ' + pesoPeriodo )

    $.ajax({
        url	    : 'ajax/periodos.ajax.php',
        type    : 'POST',
        data    : {nombrePeriodoEdit : nombrePeriodoEdit,
                    abreviacionPeriodo : abreviacionPeriodo,
                    pesoPeriodo : pesoPeriodo,
                    editPeriodoID: editPeriodoID
                },
        success: function(data){
            if(data === 'ok')
            {
                swal.fire({
                    icon:"success",
                    title : "Periodo actualizado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
                actualizarPeriodos()
                $("#editarPeriodo").hide()
                $("#agregarPeriodo").show()
                $("#formPeriodos")[0].reset();
            }else if(data === 'repet'){
                swal.fire({
                    icon:"warning",
                    title : "Periodo no actualizado, existe un periodo con el mismo nombre",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
            else if(data === 'full'){
                swal.fire({
                    icon:"warning",
                    title : "Periodo no actualizado, el porcentaje se encuentra en 100%",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
            else if(data === 'exceed'){
                swal.fire({
                    icon:"warning",
                    title : "Periodo no actualizado, el porcentaje total no puede exceder al 100%",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
            else{
                swal.fire({
                    icon:"error",
                    title : "Error al editar el periodo",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })
            }
        }
    })
}

const btnEditarPeriodo = document.querySelector('#editarPeriodo')

btnEditarPeriodo.addEventListener('click', function(e){
    e.preventDefault();
    editPeriodoID()
})



function eliminarPeriodo (idPeriodo){
    let idEliminarPeriodo = idPeriodo
    Swal.fire({
        title: 'Desea eliminar este periodo?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url		: 'ajax/periodos.ajax.php',
                type	: 'POST',
                data: {idEliminarPeriodo : idEliminarPeriodo},
                success: function (data) {
                    if(data == 'ok'){
                        swal.fire({
                            icon:"success",
                            title : "Periodo eliminado",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        })
                        actualizarPeriodos() 
                    }else{
                        swal.fire({
                            icon:"alert",
                            title : "Error al eliminar el periodo",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                        })
                    }
                                     
                }
            });
      
        }
      })
}


