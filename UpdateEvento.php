<?php

setlocale(LC_ALL,"es_ES");

include('config.php');
                        
$idEvento         = $_POST['idEvento'];

$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio));
$hora_inicio       = ucwords($_REQUEST['hora_inicio']); 
$hora_fin          = ucwords($_REQUEST['hora_fin']);
$fecha_prox        = ucwords($_REQUEST['fecha_prox']);
$tipoCurso         = ucwords($_REQUEST['tipoCurso']);
$observacion       = ucwords($_REQUEST['observacion']);
$ci                = ucwords($_REQUEST['ci']);  
$cel               = ucwords($_REQUEST['cel']);  
$fecha_ult         = ucwords($_REQUEST['fecha_ult']);     
$color_evento      = $_REQUEST['color_evento'];
$instructorId      = $_REQUEST['instructorId'];

//convertir fecha al formato que quiere fullcalendar
$fecha_hora_str = $fecha_prox . 'T' . $hora_inicio;

$timestamp = $fecha_hora_str;

//misma conversion de fecha para la cita
$fecha_hora_str = $fecha_prox . 'T' . $hora_fin;

$timestamp2 = $fecha_hora_str;

$asistencia = isset($_POST['asistio']) ? implode(',', $_POST['asistio']) : '';

$UpdateProd = ("UPDATE eventoscalendar 
    SET 
        evento ='$evento',
        instructorId = '$instructorId',
        fecha_inicio ='$timestamp',
        fecha_prox ='$fecha_prox',
        fecha_fin ='$timestamp2',
        tipoCurso = '$tipoCurso',
        observacion = '$observacion',
        ci = '$ci',
        cel = '$cel',
        fecha_ult = '$fecha_ult',
        color_evento ='$color_evento',
        hora_inicio = '$hora_inicio',
        hora_fin = '$hora_fin',
        asistio ='$asistencia'
    WHERE id='".$idEvento."' ");
$result = mysqli_query($con, $UpdateProd);

header("Location:index.php?ea=1");
?>