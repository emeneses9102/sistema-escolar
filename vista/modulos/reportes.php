<?php
            $item = null;
            $valor = null;
            $mostrarNiveles = ControladorNiveles::ctrMostrarNiveles($item, $valor);
            ?>
<div class="app-title">
  <div>
    <h3 id="tituloAlumno"><i class="fa fa-clipboard"></i> Reportes</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Reportes</a></li>
  </ul>
</div>
<div class="row" id="listAlumno">
  <div class="col-lg-3">
    <div class="tile">
      <div class="tile-body">
        <ul class="app-menu">    
          <li class="treeview">
            <a class="app-menu__item buscador-item" href="javascript:void(0)" data-toggle="treeview"><span class=" buscador-label">Nivel</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2 arbol-menu" id="nivelReport">
              <?php foreach ($mostrarNiveles as $nivel) { ?>
                  
                  <li><label class="treeview-item pt-2 arbol-item textoNivel" id="<?php echo $nivel['idNiveles'] ?>_<?php echo $nivel['nombre_nivel'] ?>"><input type="radio" name="chknivel" value="<?php echo $nivel['idNiveles'] ?>" id="<?php echo $nivel['idNiveles'] ?>" class="buscador-check mr-2" > <?php echo $nivel['nombre_nivel'] ?></label> </li>
                <?php
                }
                ?>
              
            </ul>
          </li>
          <li class="treeview">
            <a class="app-menu__item buscador-item" href="javascript:void(0)" data-toggle="treeview"><span class=" buscador-label">Grado</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2 arbol-menu" id="gradoReport">
              
            </ul>
          </li>
          <li class="treeview">
            <a class="app-menu__item buscador-item" href="javascript:void(0)" data-toggle="treeview"></i><span class=" buscador-label">Sección</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2 arbol-menu" id="seccionReport">
              
            </ul>
          </li>
          <li class="treeview">
            <a class="app-menu__item buscador-item" href="" data-toggle="treeview"><span class=" buscador-label">Gráficos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2 arbol-menu">
            <li><label class="treeview-item pt-2 arbol-item "><input type="radio" name="chkgrafico" value="barras" id="" class="buscador-check mr-2" onclick="radiosGraficos(this);" checked>De Barra</label> </li>
            <li><label class="treeview-item pt-2 arbol-item "><input type="radio" name="chkgrafico" value="lineas" id="" class="buscador-check mr-2" onclick="radiosGraficos(this);">De Líneas</label> </li>
            <li><label class="treeview-item pt-2 arbol-item "><input type="radio" name="chkgrafico" value="circular" id="" class="buscador-check mr-2" onclick="radiosGraficos(this);">Circular</label> </li>
            </ul>
          </li>
          <li class="treeview">
            <a class="app-menu__item buscador-item" href="javascript:void(0)" data-toggle="treeview"><span class=" buscador-label">Por Fechas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2 arbol-menu">
              <div>
                <label for="" class="label-control">Desde</label>
                <input type="date" name="iniciofecha" id="iniciofecha" class="form-control" max="<?php echo date("Y-m-d");?>">
              </div>
              <div>
                <label for="" class="label-control">Hasta</label>
                <input type="date" name="finfecha" id="finfecha" class="form-control">
              </div>

            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
 
  <div class="col-lg-7">
    <div class="tile">
      <h2 class="mb-4">Gráficas de pagos</h2>
      <div class="tile-body">
     <div class="col-lg-10 extension"></div>

    <div class="SelectorGrafico" id="SelectorGrafico">

      <div class="SelectorGrafico1" id="SelectorGrafico1">


      <div class="col-lg-12 graficograf" id="graficobarras">
              <div class="tile"> 
                <h3 class="tile-title nombregrafico" id="nombregrafico">Gráfico </h3>
                <div class="embed-responsive embed-responsive-16by9">
                  <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                </div>
              </div>
            </div>

         

          <div class="col-lg-12 graficograf" id="graficolineal">
            <div class="tile">
              <h3 class="tile-title nombregrafico" id="nombregrafico2">Gráfico </h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>
      

 
            <div class="col-lg-12 graficograf" id="graficocircular">
              <div class="tile">
                <h3 class="tile-title nombregrafico" id="nombregrafico3">Gráfico</h3>
                <div class="embed-responsive embed-responsive-16by9">
                  <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                </div>
              </div>
            </div>
 

    </div>
    </div>


    <input type="text" id="muestra1" value="" hidden>
    <input type="text" id="muestra2" value="" hidden>
    <input type="text" id="SelecionadoNivel" value="" hidden>
    <input type="text" id="SelecionadoGrado" value="" hidden>
    <input type="text" id="SelecionadoSeccion" value="" hidden>
    <input type="text" id="muestrafechainicio" value="" hidden>
    <input type="text" id="muestrafechafin" value="" hidden>

      </div>
    </div>
  </div>
  <div class="col-lg-2">
    <div class="tile">
      <span>Pagos Realizados :</span>
      <br>
      <p class="text-center" id="pagosrealizados"></p>
      <br>
      <br>
      <span>Pagos No Realizados :</span>
      <br>
      <p class="text-center" id="pagosnorealizados"></p> 
      <br>
      <br>
      <span>Ingreso en soles :</span>
      <br>
      <p class="text-center" id="ingresosoles"></p>
    </div>
</div>

</div>
