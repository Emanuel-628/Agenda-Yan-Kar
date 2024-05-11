<div class="modal" id="exampleModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar Nuevo Alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form name="formEvento" id="formEvento" action="nuevoEvento.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
	<div class="form-group">
			<label for="instructorId" class="col-sm-12 control-label">Nombre del Instructor</label>
			<div class="col-sm-10">			
        <select class="form-control" id="instructorId" name="instructorId">
        <?php
              // Consulta para obtener los pacientes
              $query = "SELECT id, instructor FROM Instructor";
              $result = mysqli_query($con, $query);

              // Crear opciones para la lista desplegable
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" . $row['id'] . "'>" . $row['instructor'] . "</option>";
              }
              ?>
          </select>
      </div>
		</div>
  
  <div class="form-group">
			<label for="evento" class="col-sm-12 control-label">Nombre del Alumno</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="evento" id="evento" />
			</div>
		</div>
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Fecha de Hoy</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio">
      </div>
    </div>
    <div class="form-group">
      <label for="hora_inicio" class="col-sm-12 control-label">Hora de Clase, desde:</label>
      <div class="col-sm-10">
        <input type="time" class="form-control" name="hora_inicio" id="hora_inicio" >
      </div>
    </div>
    <div class="form-group">
      <label for="hora_fin" class="col-sm-12 control-label">Hora de Clase, hasta: </label>
      <div class="col-sm-10">
        <input type="time" class="form-control" name="hora_fin" id="hora_fin" >
      </div>
    </div>
    <div class="form-group">
			<label for="tipoCurso" class="col-sm-12 control-label">Tipo de Curso</label>
			<div class="col-sm-10">			
        <select class="form-control" id="tipoCurso" name="tipoCurso">
          <option value="Mecanico" selected>Mecanico</option>
          <option value="Automatico">Automatico</option>
        </select>
      </div>
		</div>
    <div class="form-group">
			<label for="pago" class="col-sm-12 control-label">Costo de Curso</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="pago" id="pago"/>
			</div>
		</div>
    <div class="form-group">
      <label for="fecha_prox" class="col-sm-12 control-label">Fecha de Proxima Clase</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="fecha_prox" id="fecha_prox" placeholder="Fecha Final">
      </div>
    </div>
    
    <div class="form-group">
    <label for="asistio" class="col-sm-12 control-label">Asistencia</label>
    <div class="row">
        <div class="col-sm-6">
            <?php
            // Mostrar 5 checkboxes para las primeras 5 clases en una columna
            for ($i = 1; $i <= 5; $i++) {
                echo '<div class="form-check">';
                echo '<input class="form-check-input" type="checkbox" name="asistio[]" value="clase'.$i.'" style="display: inline">';
                echo '<label class="form-check-label" for="clase'.$i.'">Clase '.$i.'</label>'; 
                echo '</div>';
            }
            ?>
        </div>
        <div class="col-sm-6">
            <?php
            // Mostrar 5 checkboxes para las últimas 5 clases en otra columna
            for ($i = 6; $i <= 10; $i++) {
                echo '<div class="form-check">';
                echo '<input class="form-check-input" type="checkbox" name="asistio[]" value="clase'.$i.'" style="display: inline">';
                echo '<label class="form-check-label" for="clase'.$i.'">Clase '.$i.'</label>'; 
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>


    <div class="form-group">
			<label for="observacion" class="col-sm-12 control-label">Observacion</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="observacion" id="observacion"/>
			</div>
		</div>


  <div class="col-md-12" id="grupoRadio">
  
  <input type="radio" name="color_evento" id="orange" value="#FF5722" checked>
  <label for="orange" class="circu" style="background-color: #FF5722;"> </label>

  <input type="radio" name="color_evento" id="amber" value="#FFC107">  
  <label for="amber" class="circu" style="background-color: #FFC107;"> </label>

  <input type="radio" name="color_evento" id="lime" value="#8BC34A">  
  <label for="lime" class="circu" style="background-color: #8BC34A;"> </label>

  <input type="radio" name="color_evento" id="teal" value="#009688">  
  <label for="teal" class="circu" style="background-color: #009688;"> </label>

  <input type="radio" name="color_evento" id="blue" value="#2196F3">  
  <label for="blue" class="circu" style="background-color: #2196F3;"> </label>

  <input type="radio" name="color_evento" id="indigo" value="#9c27b0">  
  <label for="indigo" class="circu" style="background-color: #9c27b0;"> </label>

</div>
		
	   <div class="modal-footer">
      	<button type="submit" class="btn btn-success">Guardar Evento</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
    	</div>
	</form>
      
    </div>
  </div>
</div>
