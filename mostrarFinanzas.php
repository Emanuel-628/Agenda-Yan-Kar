<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Finanzas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" type="image/jpg" href="/agenda2/yankar.jpg">

<!-- CSS de DataTables -->
<!--
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
-->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap4.css">

<!-- JavaScript de jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- JavaScript de DataTables -->
<!--
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap4.js"></script>
-->
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

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
    <?php
    // Incluir el archivo de configuración de la base de datos
    include('config.php');

    // Incluir el archivo de cálculo de recaudación
    include('calculoIngreso.php');
    ?>

    <div class="container mt-3">
        <h3 class="custom-heading">Historial de Finanzas</h3>
        <div class="mt-3">
            <div>Recaudación por día: <?php echo "$" . number_format($recaudacionDia, 2); ?></div>
            <div>Recaudación por semana: <?php echo "$" . number_format($recaudacionSemana, 2); ?></div>
            <div>Recaudación por mes: <?php echo "$" . number_format($recaudacionMes, 2); ?></div>
        </div>

        <div class="row mb-3">
        <div class="col-md-4">
            <label for="min-date">Fecha Inicio:</label>
            <input type="date" id="min-date" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="max-date">Fecha Fin:</label>
            <input type="date" id="max-date" class="form-control">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button id="clear-filter" class="btn btn-success">Limpiar Filtro</button>
        </div>
    </div>
        <div id="listaEventos" class="mt-3">
        
        <?php
            include('config.php');
            $query = "SELECT e.evento, e.ci, f.pago, f.medioPago, f.receptor, f.observacion, f.fecha_pago
            FROM Finanzas AS f
            LEFT JOIN eventoscalendar AS e ON f.alumnoId = e.id";

            $result = mysqli_query($con, $query);

            $contador = 1;
            // Verificar si se encontraron resultados
            if(mysqli_num_rows($result) > 0) {
                // Imprimir la tabla HTML
                echo '<table id="tablaEventos" class="table table-striped table-bordered" style="width:100%">';
                echo '<thead><tr>
                <th>N°</th>
                <th>Alumno</th>
                <th>C.I.</th>
                <th>Pago</th>
                <th>Metodo de pago</th>
                <th>Cuenta que recibe</th>
                <th>Observacion</th>
                <th>Fecha de pago</th>
                </tr></thead>';
                echo '<tbody>';
                while ($row = mysqli_fetch_assoc($result)) {   
                    echo '<tr>';
                    echo '<td>' . $contador . '</td>';
                    echo '<td>' . $row['evento'] . '</td>';
                    echo '<td>' . $row['ci'] . '</td>';
                    echo '<td>' . $row['pago'] . '</td>';
                    echo '<td>' . $row['medioPago'] . '</td>';
                    echo '<td>' . $row['receptor'] . '</td>';
                    echo '<td>' . $row['observacion'] . '</td>';
                    echo '<td>' . $row['fecha_pago'] . '</td>';
                    //echo '<td>' . substr($row['fecha_inicio'], 0, 10) . '</td>';
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
    // Inicializar DataTable
    var table = $('#tablaEventos').DataTable(
        {
        layout: {
            topStart: {
                buttons: ['excel', 'pdf', 'print']
            }
        }
    });

   /* new DataTable('#tablaEventos', {
    layout: {
        topStart: {
            buttons: ['excel', 'pdf', 'print']
        }
    }
    });*/

    // Filtros personalizados
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = $('#min-date').val();
            var max = $('#max-date').val();
            var date = data[7] || 0; // Usar la columna "Fecha de ultima clase"

            if (
                (min === "" || max === "") ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );

    // Evento para aplicar los filtros
    $('#min-date, #max-date').change(function() {
        table.draw();
    });
    // Evento para limpiar los filtros
    $('#clear-filter').click(function() {
        $('#min-date').val('');
        $('#max-date').val('');
        table.draw();
    });
});
</script>
