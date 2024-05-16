<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finanzas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" type="image/jpg" href="/agenda2/yankar.jpg">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a href="index.php" class="navbar-brand">
          <img src="/agenda2/yankar.jpg" alt="Yan-kar" class="logo-img">
        </a>
        <ul class="navbar-nav">        
        <li class="nav-item"><a href="mostrarAlumnos.php" class="nav-link">Historial de Alumnos</a></li>
        <li class="nav-item"><a href="crearInstructores.php" class="nav-link">Crear Instructores</a></li>
        <li class="nav-item"><a href="mostrarInstructores.php" class="nav-link">Lista de Instructores</a></li>   
        <li class="nav-item"><a href="finanzas.php" class="nav-link">Finanzas</a></li>
        <li class="nav-item"><a href="mostrarFinanzas.php" class="nav-link">Historial de Finanzas</a></li> 
    </ul>
    </div>
</nav>


<div class="container mt-3">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h3 class="text-center mb-4 custom-heading">Finanzas</h3>
      <form action="guardarFinanzas.php" method="post">
        <div class="mb-3">
			    <label for="alumnoId" class="form-label">Seleccione el alumno</label>			
          <select class="form-control" id="alumnoId" name="alumnoId">
          <?php
                // Consulta para obtener los alumnos
                include('config.php');

                $query = "SELECT id, evento FROM eventoscalendar";
                $result = mysqli_query($con, $query);

                // Crear opciones para la lista desplegable
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['evento'] . "</option>";
                }
            ?>
            </select>
        </div>  
      <div class="mb-3">
        <label for="pago" class="form-label">Introduzca el monto</label>
        <input type="number" class="form-control" id="pago" name="pago">
      </div>
        <div class="mb-3">
          <label for="medioPago" class="form-label">Selecciona el metodo de pago</label>
          <select class="form-control" id="medioPago" name="medioPago">
                <option value="Efectivo" selected>Efectivo</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Giro">Giro</option>
                <option value="Cheque">Cheque</option>
            </select>
        </div>
        <div class="mb-3">
          <label for="receptor" class="form-label">Cuenta que recibe</label>
          <select class="form-control" id="receptor" name="receptor">
                <option value="" selected>Seleccionar...</option>      
                <option value="Lili">Lili</option>
                <option value="Lety">Lety</option>
                <option value="Bichi">Bichi</option>
            </select>
        </div>
        <div class="mb-3">
          <label for="observacion" class="form-label">Observacion</label>
          <input type="text" class="form-control" id="observacion" name="observacion">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </div>
</body>
</html>