<?php
// Incluir el archivo de configuración de la base de datos
include('config.php');

// Verificar si se recibió el ID del paciente a editar
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtener el ID del paciente desde la URL
    $id = $_GET['id'];
    
    // Consultar la base de datos para obtener los detalles del paciente
    $query = "SELECT * FROM Instructor WHERE id = $id";
    $result = mysqli_query($con, $query);

    // Verificar si se encontraron resultados
    if(mysqli_num_rows($result) > 0) {
        // Obtener los detalles del paciente
        $instructor = mysqli_fetch_assoc($result);
        // Mostrar el formulario de edición prellenado con los detalles del paciente
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Instructor</title>
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
            <h3 class="text-center mb-4 custom-heading">Editar Instructor</h3>
            <form action="actualizarInstructor.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $instructor['id']; ?>">
                <div class="mb-3">
                    <label for="instructor">Nombre del Paciente:</label>
                    <input type="text" class="form-control" id="instructor" name="instructor" value="<?php echo $instructor['instructor']; ?>">
                </div>
                <div class="mb-3">
                    <label for="instructor" class="form-label">Cedula de Identidad</label>
                    <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $instructor['ci']; ?>">
                </div>
                <div class="mb-3">
                    <label for="instructor" class="form-label">Numero de telefono</label>
                    <input type="text" class="form-control" id="cel" name="cel" value="<?php echo $instructor['cel']; ?>">
                </div>
                <div class = "mb-3">
                    <label for = "foto">Foto </label>
                    <input type ="file" class="form-control-file" name="foto" id ="foto">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
            </div>
        </div>
    </div> 
</body>
</html>
<?php
    } else {
        echo "No se encontró ningún instructor con el ID especificado.";
    }
} else {
    echo "No se especificó ningún ID de instructor para editar.";
}
// Cerrar la conexión a la base de datos
mysqli_close($con);
?>