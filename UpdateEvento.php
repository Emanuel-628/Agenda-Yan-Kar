<?php
//date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");

include('config.php');
                        
$idEvento         = $_POST['idEvento'];

$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio));
$hora_inicio       = ucwords($_REQUEST['hora_inicio']); 
$hora_fin          = ucwords($_REQUEST['hora_fin']);
$fecha_prox        = ucwords($_REQUEST['fecha_prox']);
$pago              = ucwords($_REQUEST['pago']);
$tipoCurso       = ucwords($_REQUEST['tipoCurso']);
$observacion       = ucwords($_REQUEST['observacion']);  
$color_evento      = $_REQUEST['color_evento'];
$asistio           = $_REQUEST['optradio'];
$instructorId        = $_REQUEST['instructorId'];

//convertir fecha al formato que quiere fullcalendar
$fecha_hora_str = $fecha_inicio . 'T' . $hora_inicio;

$timestamp = $fecha_hora_str;

//misma conversion de fecha para la cita
$fecha_hora_str = $fecha_inicio . 'T' . $hora_fin;

$timestamp2 = $fecha_hora_str;

$UpdateProd = ("UPDATE eventoscalendar 
    SET 
        evento ='$evento',
        instructorId = '$instructorId',
        fecha_inicio ='$timestamp',
        fecha_prox ='$fecha_prox',
        fecha_fin ='$timestamp2',
        pago = '$pago',
        tipoCurso = '$tipoCurso',
        observacion = '$observacion',
        color_evento ='$color_evento',
        asistio ='$asistio'
    WHERE id='".$idEvento."' ");
$result = mysqli_query($con, $UpdateProd);

header("Location:index.php?ea=1");
?>