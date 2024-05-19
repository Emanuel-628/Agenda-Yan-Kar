<?php

require("config.php");

$monto = ucwords($_REQUEST['pago']);
$medioPago = ucwords($_REQUEST['medioPago']);
$receptor = ucwords($_REQUEST['receptor']);
$observacion = ucwords($_REQUEST['observacion']);
$fecha_pago = ucwords($_REQUEST['fecha_pago']);    
$alumnoId = $_REQUEST['alumnoId'];

$sql = "INSERT INTO Finanzas (
    pago,
    medioPago,
    receptor,
    observacion,
    fecha_pago,
    alumnoId
    ) 
    VALUES 
    ('" .$monto. "',
    '" .$medioPago. "',
    '" .$receptor. "',
    '" .$observacion. "',
    '" .$fecha_pago. "',
    '" .$alumnoId. "'
    )
    ON DUPLICATE KEY UPDATE 
    pago = VALUES(pago),
    medioPago = VALUES(medioPago),
    receptor = VALUES(receptor),
    observacion = VALUES(observacion),
    fecha_pago = VALUES(fecha_pago)
    ";


$resultadoNuevoEvento = mysqli_query($con, $sql);

header("Location:index.php?e=1");

?>