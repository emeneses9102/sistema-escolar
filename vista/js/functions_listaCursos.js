$('#tableCursos').DataTable();
document.addEventListener('DOMContentLoaded',function(){
  tablecursos = $('#tableCursos').DataTable({
      "aProcessing": true,
      "aServerSide": true,
      "searching": true,
      "lengthMenu": [ [20, 50, 100, -1], [20, 50, 100, "All"] ],
      "pageLength": 20,
      "language": {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
          }
      },dom: 'B<clear>frtip',
      buttons: [
          'copy', 'excel', 'pdf'
      ],
      /*"ajax":{
          "url":"./models/usuarios/table_usuarios.php",
          "dataSrc":"",
      },
      "columns":[
          {"data":"acciones"},
          {"data":"nombre"},
          {"data":"apellidos"},
          {"data":"telefono_fijo"},
          {"data":"dni"},
          {"data":"usuario"},
          {"data":"dni"},
          {"data":"dni"},
          {"data":"estado"},
      ],*/
      "responsive": true,
      "bDestroy":true,
      "iDisplayLength":10,
      "order": [[0,"asc"]]
  });
  /*var formUsuario = document.querySelector('#formUsuario');
  formUsuario.onsubmit = function(e){
      e.preventDefault();
      
      

      var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microfost.XMLHTTP');
      var url = './models/usuarios/ajax-usuarios.php';
      var form = new FormData(formUsuario);
      request.open('POST',url,true);
      request.send(form);
      request.onreadystatechange = function(){
          
          if(request.readyState == 4 && request.status == 200){
              var data = JSON.parse(request.responseText);
              if(request.status){
                  $('#modalUsuario').modal('hide');
                  formUsuario.reset();
                  swal('Usuario',data.msg,'success');
                  tableusuarios.ajax.reload();
              }else{
                  swal('Usuario',data.msg,'error');
              }
          }
      }
  }*/
});

//detectamos la seleccion del filtro
$("#nivelesLC").change(function (e) {
  let seleccion = nivelesLC.options[nivelesLC.selectedIndex].value;
  //alert(seleccion)
  var filtro2 = $("#gradosLC");
  if(seleccion != ""){
    $.ajax({
      url	    : 'ajax/listaCursos.ajax.php',
      type    : 'POST',
      data    : {seleccion:seleccion},
      dataType:   "json",
      success: function(data){
        let arreglo=[]
        for(let item of data){
          arreglo.push(item.nombre_grado)
        }
        let result = arreglo.filter((item,index)=>{
          return arreglo.indexOf(item) === index;
        })
        console.log(result)
        filtro2.find('option').remove();
        $("#seccionLC").find('option').remove();
        filtro2.append('<option value=""></option>');

        //Recorrer el result
        result.forEach(function(elemento, indice, array) {
          filtro2.append('<option value="' + elemento + '">' + elemento + '</option>');
      })
        $("#gradosLC").focus();

        var tabla = $("#tableCursos").DataTable();
            tabla.clear().draw();
            var estado = "";
            for(let item of data){
              
              numAlumnos = (item.idAlumno == "" || item.idAlumno == null)?"0":item.numeroAlumnos;
                
                tabla.row.add(
                    [
                "<td>"+item.nombre_nivel+"</td>",
                "<td>"+item.nombre_grado+"</td>",           
                "<td>"+item.nombre_seccion+"</td>",
                "<td>"+item.nombre_curso+"</td>",
                "<td>"+item.apellidos+" , "+item.nombres+"</td>",
                "<td>"+numAlumnos+"</td>",
                
                ]
                ).draw(false);
                
            }
      }
  }); 
  }
  
 })

 $("#gradosLC").change(function (e) {
  let seleccion2 = gradosLC.options[gradosLC.selectedIndex].value;
  
  codNivel = document.getElementById("nivelesLC").value;
  //alert(cod)
  var filtro2 = $("#seccionLC");
  if(seleccion2 != ""){
    $.ajax({
      url	    : 'ajax/listaCursos.ajax.php',
      type    : 'POST',
      data    : {seleccion2:seleccion2,
                codNivel:codNivel},
      dataType:   "json",
      success: function(data){
        let arreglo=[]
        for(let item of data){
          arreglo.push(item.nombre_seccion)
        }
        let result = arreglo.filter((item,index)=>{
          return arreglo.indexOf(item) === index;
        })
        console.log("seccion: "+result)
        filtro2.find('option').remove();
        filtro2.append('<option value=""></option>');

        //Recorrer el result
        result.forEach(function(elemento, indice, array) {
          filtro2.append('<option value="' + elemento + '">' + elemento + '</option>');
      })
        $("#seccionLC").focus();

        var tabla = $("#tableCursos").DataTable();
            tabla.clear().draw();
            var estado = "";
            for(let item of data){
              
              numAlumnos = (item.idAlumno == "" || item.idAlumno == null)?"0":item.numeroAlumnos;
                
                tabla.row.add(
                    [
                "<td>"+item.nombre_nivel+"</td>",
                "<td>"+item.nombre_grado+"</td>",           
                "<td>"+item.nombre_seccion+"</td>",
                "<td>"+item.nombre_curso+"</td>",
                "<td>"+item.apellidos+" , "+item.nombres+"</td>",
                "<td>"+numAlumnos+"</td>",
                
                ]
                ).draw(false);
                
            }
      }
  }); 
  }
  
 })

 $("#seccionLC").change(function (e) {
  let seleccion3 = seccionLC.options[seccionLC.selectedIndex].value;
  //console.log(seleccion3)
  codNivel = document.getElementById("nivelesLC").value;
  codGrado = document.getElementById("gradosLC").value;
  //alert(cod)
  var filtro2 = $("#seccionLC");
  if(seleccion3 != ""){
    $.ajax({
      url	    : 'ajax/listaCursos.ajax.php',
      type    : 'POST',
      data    : {seleccion3:seleccion3,
                codNivel:codNivel,
                codGrado:codGrado},
      dataType:   "json",
      success: function(data){
        //alert("seccion")
        //console.log(data)
        var tabla = $("#tableCursos").DataTable();
            tabla.clear().draw();
            
            for(let item of data){
              
              numAlumnos = (item.idAlumno == "" || item.idAlumno == null)?"0":item.numeroAlumnos;
                
                tabla.row.add(
                    [
                "<td>"+item.nombre_nivel+"</td>",
                "<td>"+item.nombre_grado+"</td>",           
                "<td>"+item.nombre_seccion+"</td>",
                "<td>"+item.nombre_curso+"</td>",
                "<td>"+item.apellidos+" , "+item.nombres+"</td>",
                "<td>"+numAlumnos+"</td>",
                
                ]
                ).draw(false);
                
            }
      }
  }); 
  }
  
 })

 $("#btnClearFilter").click(function (e) { 
   e.preventDefault();
   clearfiltro="vacio"
   $.ajax({
    url	    : 'ajax/listaCursos.ajax.php',
    type    : 'POST',
    data    : {clearfiltro:clearfiltro,},
    dataType:   "json",
    success: function(data){
      $("#seccionLC").find('option').remove();
      $("#GradosLC").find('option').remove();
      $("#nivelesLC").val("");
      var tabla = $("#tableCursos").DataTable();
          tabla.clear().draw();
          
          for(let item of data){
            
            numAlumnos = (item.idAlumno == "" || item.idAlumno == null)?"0":item.numeroAlumnos;
              
              tabla.row.add(
                  [
              "<td>"+item.nombre_nivel+"</td>",
              "<td>"+item.nombre_grado+"</td>",           
              "<td>"+item.nombre_seccion+"</td>",
              "<td>"+item.nombre_curso+"</td>",
              "<td>"+item.apellidos+" , "+item.nombres+"</td>",
              "<td>"+numAlumnos+"</td>",
              
              ]
              ).draw(false);
              
          }
    }
});
 });

        
      
      