<?php
// Incluir el archivo de configuración de la base de datos
include('config.php');

// Función para calcular la recaudación por día
function calcularRecaudacionPorDia($con) {
    $query = "SELECT fecha_pago, SUM(pago) AS total_pago 
          FROM Finanzas 
          WHERE DATE(fecha_pago) = CURDATE()";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_pago'];
}

// Función para calcular la recaudación por semana
function calcularRecaudacionPorSemana($con) {
    $query = "SELECT fecha_pago, SUM(pago) AS total_pago 
    FROM Finanzas 
    WHERE WEEK(fecha_pago) = WEEK(NOW())";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_pago'];
}

// Función para calcular la recaudación por mes
function calcularRecaudacionPorMes($con) {
    $query = "SELECT fecha_pago, SUM(pago) AS total_pago 
    FROM Finanzas
    WHERE MONTH(fecha_pago) = MONTH(NOW())";
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


