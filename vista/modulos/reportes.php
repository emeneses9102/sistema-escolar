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
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <p>parrafo</p>
        <div class="row">
          <div class="col-md-4">
            <div class="col-md-12 form-group">
            <?php
            $item = null;
            $valor = null;
            $mostrarNiveles = ControladorNiveles::ctrMostrarNiveles($item, $valor);
            ?>
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
        <div class="col-md-6">
          <div class="tile"  id="cuadro1">
            <h3 class="tile-title">Bar Chart</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
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
</div>