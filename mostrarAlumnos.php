<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Alumnos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" type="image/jpg" href="/agenda2/yankar.jpg">

<!-- CSS de DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap4.css">

<!-- JavaScript de jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- JavaScript de DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap4.js"></script>

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
        <h3 class="custom-heading">Historial de Alumnos</h3>
        <div id="listaEventos" class="mt-3">
            <?php
            
            // Incluir el archivo de configuración de la base de datos
            include('config.php');

            // Consultar todos los eventos en la base de datos
            //$sql = "SELECT * FROM eventoscalendar";
            //$resultado = mysqli_query($con, $sql);
            

            $query = "SELECT e.*, p.instructor, p.foto FROM eventoscalendar AS e
            LEFT JOIN Instructor AS p ON e.instructorId = p.id";
            $result = mysqli_query($con, $query);

            $contador = 1;
            // Verificar si se encontraron resultados
            if(mysqli_num_rows($result) > 0) {
                // Imprimir la tabla HTML
                echo '<table id="tablaEventos" class="table table-striped table-bordered" style="width:100%">';
                echo '<thead><tr>
                <th>N°</th>
                <th>Alumno</th>
                <th>Instructor</th>
                <th>Tipo de Curso</th>
                <th>Costo de Curso</th>
                <th>Fecha de Proxima Clase</th>
                <th>Observacion</th>
                <th>Asistencia</th>
                </tr></thead>';
                echo '<tbody>';
                while ($row = mysqli_fetch_assoc($result)) {   
                    echo '<tr>';
                    echo '<td>' . $contador . '</td>';
                    echo '<td>' . $row['evento'] . '</td>';
                    echo '<td>' . $row['instructor'] . '</td>';
                    echo '<td>' . $row['tipoCurso'] . '</td>';
                    echo '<td>' . $row['pago'] . '</td>';
                    echo '<td>' . $row['fecha_prox'] . '</td>';
                    echo '<td>' . $row['observacion'] . '</td>';
                    //echo '<td>' . ($row['asistio'] == 'No' ? 'No' : 'Si') . '</td>';
                    echo '<td>';
        
                    // Deserializar la cadena de asistencia para obtener el array
                    $asistencia = explode(',',$row['asistio']);

                    // Verificar si la deserialización fue exitosa y $asistencia es un array
                    if (is_array($asistencia)) {
                        // Mostrar el estado de cada checkbox
                        for ($i = 1; $i <= 10; $i++) {
                            echo '<input type="checkbox" name="asistio[]" value="clase'.$i.'"';
                            if (in_array('clase'.$i, $asistencia)) {
                                echo ' checked';
                            }
                            echo '>';
                            //echo '<label for="clase'.$i.'">Clase '.$i.'</label>'; 
                        }
                    } else {
                        // Si no hay datos de asistencia, mostrar todos los checkboxes desmarcados
                        for ($i = 1; $i <= 10; $i++) {
                            echo '<input type="checkbox" name="asistio[]" value="clase'.$i.'">';
                            //echo '<label for="clase'.$i.'">Clase '.$i.'</label>'; 
                        }
                    }

                    echo '</td>';
                    echo '</tr>';
                    $contador++;
                }

                echo '</tbody></table>';
            } else {
                echo "No se encontraron eventos en la base de datos.";
            }
            
            // Cerrar la conexión a la base de datos
            mysqli_close($con);
            ?>
        </div>
    </div>
</body>
</html>

<script>
$(document).ready(function() {
    /*$('#tablaEventos').DataTable({
        "pagingType": "full_numbers", // Agrega paginación completa
        "language": { // Personaliza el idioma de DataTable
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json" // Utiliza el archivo de idioma español
        }
    });*/
    new DataTable('#tablaEventos');

});
</script>