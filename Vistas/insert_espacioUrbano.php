<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
    header('Location: espaciosUrbanos.php');
    exit();
}

$nombre = $_POST['nombre'];
$funcion = $_POST['funcion'];
$año_establecimiento = $_POST['año_establecimiento'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];

$conexion = mysqli_connect("localhost", "root", "", "arqui");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

$query = "INSERT INTO espacios_urbanos (nombre, funcion, año_establecimiento, latitud, longitud) VALUES ('$nombre', '$funcion', '$año_establecimiento', '$latitud', '$longitud')";

if ($conexion->query($query) === TRUE) {
    echo "Nuevo espacio urbano creado exitosamente";
} else {
    echo "Error: " . $query . "<br>" . $conexion->error;
}

$conexion->close();
header('Location: espaciosUrbanos.php');
exit();
?>
