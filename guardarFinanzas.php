<?php

require("config.php");

$monto = ucwords($_REQUEST['pago']);
$medioPago = ucwords($_REQUEST['medioPago']);
$receptor = ucwords($_REQUEST['receptor']);
$observacion = ucwords($_REQUEST['observacion']);
$alumnoId        = $_REQUEST['alumnoId'];

$sql = "INSERT INTO Finanzas (pago,medioPago,receptor,observacion,alumnoId) VALUES ('" .$monto. "','" .$medioPago. "','" .$receptor. "','" .$observacion. "','" .$alumnoId. "')";

$resultadoNuevoEvento = mysqli_query($con, $sql);

header("Location:index.php?e=1");

?>