<?php
require_once '../BaseDatos/db_connect.php';

$nombre = $_POST['nombre'];
$genero_tipologia = $_POST['genero_tipologia'];
$uso_actual = $_POST['uso_actual'];
$año_construccion = $_POST['año_construccion'];

$query = "INSERT INTO edificaciones (nombre, genero_tipologia, uso_actual, año_construccion) VALUES ('$nombre', '$genero_tipologia', '$uso_actual', '$año_construccion')";
$result = mysqli_query($conn, $query);

header('Location: edificios.php');
?>
