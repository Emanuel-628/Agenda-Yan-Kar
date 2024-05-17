<?php
// Incluir el archivo de configuración de la base de datos
include('config.php');

// Función para calcular la recaudación por día
function calcularRecaudacionPorDia($con) {
    $query = "SELECT SUM(f.pago) AS total_pago 
    FROM Finanzas AS f
    LEFT JOIN eventoscalendar AS e ON f.alumnoId = e.id
    WHERE DATE(fecha_inicio) = CURDATE()";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_pago'];
}

// Función para calcular la recaudación por semana
function calcularRecaudacionPorSemana($con) {
    $query = "SELECT SUM(f.pago) AS total_pago 
    FROM Finanzas AS f
    LEFT JOIN eventoscalendar AS e ON f.alumnoId = e.id
    WHERE WEEK(e.fecha_inicio) = WEEK(NOW())";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_pago'];
}

// Función para calcular la recaudación por mes
function calcularRecaudacionPorMes($con) {
    $query = "SELECT SUM(f.pago) AS total_pago
     FROM Finanzas AS f 
     LEFT JOIN eventoscalendar AS e ON f.alumnoId = e.id
     WHERE MONTH(e.fecha_inicio) = MONTH(NOW())";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_pago'];
}

// Calcular la recaudación por día, semana y mes
$recaudacionDia = calcularRecaudacionPorDia($con);
$recaudacionSemana = calcularRecaudacionPorSemana($con);
$recaudacionMes = calcularRecaudacionPorMes($con);

// Cerrar la conexión a la base de datos
mysqli_close($con);
?>


