<?php
require_once 'controlador/plantilla.controlador.php';
require_once 'controlador/alumnos.controlador.php';
require_once 'controlador/profesores.controlador.php';
require_once 'controlador/administrativos.controlador.php';
require_once 'controlador/directivos.controlador.php';
require_once 'controlador/usuarios.controlador.php';
require_once 'controlador/niveles.controlador.php';
require_once 'controlador/mGradosySecciones.controlador.php';
require_once 'controlador/mCursos.controlador.php';
require_once 'controlador/mClases.controlador.php';
require_once 'controlador/cobros.controlador.php';
require_once 'controlador/institucion.controlador.php';
require_once 'controlador/listaDeuda.controlador.php';
require_once 'controlador/matricula.controlador.php';
require_once 'controlador/pagoPendiente.controlador.php';
require_once 'controlador/apoderado.controlador.php';
require_once 'controlador/MailPagoPendiente.controlador.php';
require_once 'controlador/registrarPago.controlador.php';
require_once 'controlador/MailGenerarComprobante.controlador.php';
require_once 'controlador/reporte.controlador.php';


require_once 'modelo/alumnos.modelo.php';
require_once 'modelo/profesores.modelo.php';
require_once 'modelo/administrativos.modelo.php';
require_once 'modelo/directivos.modelo.php';
require_once 'modelo/usuarios.modelo.php';
require_once 'modelo/niveles.modelo.php';
require_once 'modelo/mGradosySecciones.modelo.php';
require_once 'modelo/mCursos.modelo.php';
require_once 'modelo/mClases.modelo.php';
require_once 'modelo/curso_clase.modelo.php';
require_once 'modelo/cobros.modelo.php';
require_once 'modelo/institucion.modelo.php';
require_once 'modelo/listaDeuda.modelo.php';
require_once 'modelo/matricula.modelo.php';
require_once 'modelo/pagoPendiente.modelo.php';
require_once 'modelo/apoderado.modelo.php';
require_once 'modelo/registrarPago.modelo.php';
require_once 'modelo/imagen.modelo.php';
require_once 'modelo/reporte.modelo.php';

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
//cambios 19
