<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Instructores</title>
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
    </ul>
    </div>
</nav>


<div class="container mt-3">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h3 class="text-center mb-4 custom-heading">Crear Instructor</h3>
      <form action="guardarInstructor.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="instructor" class="form-label">Nombre del Instructor</label>
          <input type="text" class="form-control" id="instructor" name="instructor">
        </div>
        <div class = "mb-3">
          <label for = "foto">  Foto </label>
          <input type ="file" class="form-control-file" name="foto" id ="foto">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </div>

</body>
</html>