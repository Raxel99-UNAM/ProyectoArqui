<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
    header('Location: edificios.php');
    exit();
}

$nombre = $_POST['nombre'];
$genero_tipologia = $_POST['genero_tipologia'];
$uso_actual = $_POST['uso_actual'];
$año_construccion = $_POST['año_construccion'];
$arquitecto_id = $_POST['arquitecto_id'];

$conexion = mysqli_connect("localhost", "root", "", "aquitectura");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

$query = "INSERT INTO edificaciones (nombre, genero_tipologia, uso_actual, año_construccion, arquitecto_id) VALUES ('$nombre', '$genero_tipologia', '$uso_actual', '$año_construccion', '$arquitecto_id')";

if ($conexion->query($query) === TRUE) {
    echo "Nuevo edificio creado exitosamente";
} else {
    echo "Error: " . $query . "<br>" . $conexion->error;
}

$conexion->close();
header('Location: edificios.php');
exit();
?>
