<?php

setlocale(LC_ALL,"es_ES");

require("config.php");
$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 
$hora_inicio       = ucwords($_REQUEST['hora_inicio']);
$hora_fin          = ucwords($_REQUEST['hora_fin']);
$fecha_prox        = ucwords($_REQUEST['fecha_prox']);
$pago              = ucwords($_REQUEST['pago']);
$tipoCurso         = ucwords($_REQUEST['tipoCurso']);
$observacion       = ucwords($_REQUEST['observacion']);  
$color_evento      = $_REQUEST['color_evento'];
$instructorId      = $_REQUEST['instructorId'];

//convertir fecha al formato que quiere fullcalendar
$fecha_hora_str = $fecha_inicio . 'T' . $hora_inicio;

$timestamp = $fecha_hora_str;

//misma conversion de fecha para la cita
$fecha_hora_str = $fecha_inicio . 'T' . $hora_fin;

$timestamp2 = $fecha_hora_str;

$asistencia = implode(',',$_POST['asistio']);

$InsertNuevoEvento = "INSERT INTO eventoscalendar(
  evento,
  instructorId,
  fecha_inicio,
  fecha_prox,
  fecha_fin,
  pago,
  tipoCurso,
  observacion,
  color_evento,
  hora_inicio,
  hora_fin,
  asistio
  )
VALUES (
  '" .$evento. "',
  '" .$instructorId. "',
  '". $timestamp."',
  '". $fecha_prox."',
  '" .$timestamp2. "',
  '" .$pago. "',
  '" .$tipoCurso. "',
  '" .$observacion. "',
  '" .$color_evento. "',
  '" .$hora_inicio. "',
  '" .$hora_fin. "',
  '" .$asistencia. "'
)";
$resultadoNuevoEvento = mysqli_query($con, $InsertNuevoEvento);

header("Location:index.php?e=1");


?>