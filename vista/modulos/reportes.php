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
  <div class="col-md-2">
    <div class="tile">
      <div class="tile-body">
        <ul class="app-menu">    
          <li class="treeview">
            <a class="app-menu__item buscador-item" href="javascript:void(0)" data-toggle="treeview"><span class=" buscador-label">Nivel</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2 arbol-menu" id="nivelReport">
              <?php foreach ($mostrarNiveles as $nivel) { ?>
                  
                  <li><label class="treeview-item pt-2 arbol-item "><input type="radio" name="chknivel" value="<?php echo $nivel['idNiveles'] ?>" id="<?php echo $nivel['idNiveles'] ?>" class="buscador-check mr-2" > <?php echo $nivel['nombre_nivel'] ?></label> </li>
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
            <a class="app-menu__item buscador-item" href="javascript:void(0)" data-toggle="treeview"><span class=" buscador-label">Gráficos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2 arbol-menu">
            <li><label class="treeview-item pt-2 arbol-item "><input type="radio" name="chknivel" value="" id="" class="buscador-check mr-2" >De Barra</label> </li>
            <li><label class="treeview-item pt-2 arbol-item "><input type="radio" name="chknivel" value="" id="" class="buscador-check mr-2" >De Líneas</label> </li>
            <li><label class="treeview-item pt-2 arbol-item "><input type="radio" name="chknivel" value="" id="" class="buscador-check mr-2" >Circular</label> </li>
            </ul>
          </li>
          <li class="treeview">
            <a class="app-menu__item buscador-item" href="javascript:void(0)" data-toggle="treeview"><span class=" buscador-label">Por Fechas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu ml-2 arbol-menu">
              <div>
                <label for="" class="label-control">Desde</label>
                <input type="date" name="" id="" class="form-control">
              </div>
              <div>
                <label for="" class="label-control">Hasta</label>
                <input type="date" name="" id="" class="form-control">
              </div>

            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
 
  <div class="col-md-10">
    <div class="tile">
      <h2 class="mb-4">Gráficas de pagos</h2>
      <div class="tile-body">
        
        <div class="row">
          <div class="col-md-4">
            <div class="col-md-12 form-group">
            
              <label for="nivel">Nivel:</label>
              <select id="nivelreporte" class="form-control" type="select" name="nivelreporte" required>
                <option value="0"></option>
                <?php foreach ($mostrarNiveles as $nivel) { ?>
                  <option value="<?php echo $nivel['idNiveles'] ?>"><?php echo $nivel['nombre_nivel'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="col-md-12 form-group">
                <label for="grado">Grado:</label>
                <select id="gradoreporte" class="form-control" type="text" name="gradoreporte" required>
                </select>
            </div>
          </div>
          <div class="col-md-4">
              <div class="col-md-12 form-group">
                  <label for="seccion">Sección:</label>
                  <select id="seccionreporte" class="form-control" type="text" name="seccionreporte" required></select>
              </div>
          </div>
        </div>
        

        <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="radio"  id="barras" name="grafico" value="barras" class="w-25" checked onclick="radiosGraficos(this);">
                        <label for="barras" class="m-1">Gráfico de Barras</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="radio"  id="lineas" name="grafico" value="lineas" class="w-25" onclick="radiosGraficos(this);">
                        <label for="lineas" class="m-1">Gráfico de Líneas</label> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="radio" id="circular" name="grafico" value="circular" class="w-25" onclick="radiosGraficos(this);">
                        <label for="circular" class="m-1">Gráfico Circular</label>
                    </div>
                </div>
        </div>

        

     <div class="col-lg-6 extension"></div>

    <div class="SelectorGrafico" id="SelectorGrafico">

      <div class="SelectorGrafico1" id="SelectorGrafico1">


      <div class="col-lg-6 graficograf" id="graficobarras">
              <div class="tile"> 
                <h3 class="tile-title">Bar Chart</h3>
                <div class="embed-responsive embed-responsive-16by9">
                  <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                </div>
              </div>
            </div>

         

          <div class="col-lg-6 graficograf" id="graficolineal">
            <div class="tile">
              <h3 class="tile-title">Line Chart</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>
      

 
            <div class="col-lg-6 graficograf" id="graficocircular">
              <div class="tile">
                <h3 class="tile-title">Pie Chart</h3>
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

      </div>
    </div>
  </div>
</div>