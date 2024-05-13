<?php

require("config.php");

$nombre = ucwords($_REQUEST['instructor']);
$ci = ucwords($_REQUEST['ci']);
$cel = ucwords($_REQUEST['cel']);
// Manejo de la imagen
$nombreImagen = $_FILES['foto']['name'];
$rutaTemporal = $_FILES['foto']['tmp_name'];
$rutaUploads = $_SERVER['DOCUMENT_ROOT'] . '/agenda2/uploads';
$rutaDestino = $rutaUploads . '/' . $nombreImagen;

// Verifica si la carpeta uploads existe, si no, la crea
if (!is_dir($rutaUploads)) {
    mkdir($rutaUploads, 0777, true);
}

// Mueve la imagen de la ruta temporal a la ruta de destino
move_uploaded_file($rutaTemporal, $rutaDestino);

$nombreImagenEscapado = mysqli_real_escape_string($con, $nombreImagen);

$sql = "INSERT INTO Instructor (instructor,ci,cel,foto) VALUES ('" .$nombre. "','" .$ci. "','" .$cel. "','" .$nombreImagenEscapado. "')";

$resultadoNuevoEvento = mysqli_query($con, $sql);

header("Location:index.php?e=1");

?>