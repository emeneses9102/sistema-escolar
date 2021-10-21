<?php

require_once "conexion.php";
require_once "usuarios.modelo.php";

if(isset($_POST['username'])){
  
  if(preg_match('/^[a-zA-Z0-9_]+$/',$_POST['username']) && 
  preg_match('/^[a-zA-Z0-9]+$/',$_POST['password'])){

      $tabla = "usuario";
      $encriptar=$_POST['password'];
      $item = "usuario";
      $valor = $_POST['username'];

      $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
      
      //var_dump($respuesta);
      if($respuesta == 0){echo "<script>alert('mensaje1')</script>";
          echo '<div class="alert alert-danger">Error al ingresar, vuelva a intentarlo!!</div>';
      }else{
          if($respuesta['usuario'] == $_POST['username'] && password_verify($encriptar, $respuesta['clave']) && $respuesta['estado'] == 1){
            echo "<script>alert('mensaje2')</script>";
              $_SESSION['iniciarSesion'] = 'ok';
              $_SESSION['usuario_id']= $respuesta['usuario_id'];
              $_SESSION['nombre']= $respuesta['nombres'];
              $_SESSION['apellidos']= $respuesta['apellidos'];
              $_SESSION['usuario']= $respuesta['usuario'];
              $_SESSION['dni']= $respuesta['dni'];
              $_SESSION['rol']=$respuesta['rol'];
              $_SESSION['nombre_rol']=$respuesta['nombre_rol'];
              $_SESSION['foto']= $respuesta['foto'];
              if($_SESSION['rol'] ==4){
                  echo "<script>window.location = '../pagosPendientes';</script>";
              }else{
                  echo "<script>window.location = '../alumnos';</script>";
              }
               
              //header('Location: inicio');
          }else{
              if($respuesta['estado'] == 2 ){
                  echo '<div class="text-danger mt-2">*Usuario inactivo</div>';
              }else{
                  echo '<div class="text-danger mt-2">*Usuario o contraseña incorrecta</div>';
              }
              
          }
      }
  }
}