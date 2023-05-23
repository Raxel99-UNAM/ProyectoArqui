<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
    header('Location: espaciosUrbanos.php');
    exit();
}

$nombre = $_POST['nombre'];
$año_establecimiento = $_POST['año_establecimiento'];
$funcion = $_POST['funcion'];
$arquitecto_id = $_POST['arquitecto_id'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$contexto_historico = $_POST['contexto_historico'];
$descripcion_proyecto_original = $_POST['descripcion_proyecto_original'];
$orientacion = $_POST['orientacion'];
$dimensiones = $_POST['dimensiones'];
$secciones = $_POST['secciones'];
$elementos_imagen_urbana = $_POST['elementos_imagen_urbana'];
$tipos_edificaciones = $_POST['tipos_edificaciones'];
$transformaciones = $_POST['transformaciones'];
$principios_diseno = $_POST['principios_diseno'];

$conexion = mysqli_connect("localhost", "root", "", "arqui");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

$query = "INSERT INTO espacios_urbanos (nombre, año_establecimiento, funcion, arquitecto_id, latitud, longitud, contexto_historico, descripcion_proyecto_original, orientacion, dimensiones, secciones, elementos_imagen_urbana, tipos_edificaciones, transformaciones, principios_diseno, activo) VALUES ('$nombre', '$año_establecimiento', '$funcion', '$arquitecto_id', '$latitud', '$longitud', '$contexto_historico', '$descripcion_proyecto_original', '$orientacion', '$dimensiones', '$secciones', '$elementos_imagen_urbana', '$tipos_edificaciones', '$transformaciones', '$principios_diseno', 1)";

if ($conexion->query($query) === TRUE) {
    echo "Nuevo espacio urbano creado exitosamente";
} else {
    echo "Error: " . $query . "<br>" . $conexion->error;
}

$conexion->close();
header('Location: espaciosUrbanos.php');
exit();
?>
