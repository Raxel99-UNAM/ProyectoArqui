<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
    header('Location: biografias.php');
    exit();
}

$arquitecto_id = $_POST['arquitecto_id'];
$año_ciudad_nacimiento = $_POST['año_ciudad_nacimiento'];
$lugar_estudios = $_POST['lugar_estudios'];
$disciplina = $_POST['disciplina'];
$principales_obras = $_POST['principales_obras'];
$elementos_caracteristicos = $_POST['elementos_caracteristicos'];

$conexion = mysqli_connect("localhost", "root", "", "arquitectura");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

$query = "INSERT INTO biografias (arquitecto_id, año_ciudad_nacimiento, lugar_estudios, disciplina, principales_obras, elementos_caracteristicos, activo) VALUES ('$arquitecto_id', '$año_ciudad_nacimiento', '$lugar_estudios', '$disciplina', '$principales_obras', '$elementos_caracteristicos', 1)";

if ($conexion->query($query) === TRUE) {
    echo "Nueva biografía creada exitosamente";
} else {
    echo "Error: " . $query . "<br>" . $conexion->error;
}

$conexion->close();
header('Location: biografias.php');
exit();
?>
