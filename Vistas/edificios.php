<?php
require_once '../BaseDatos/db_connect.php'; // Asegúrate de proporcionar la ruta correcta al archivo db_connect.php

$query = "SELECT * FROM edificaciones ORDER BY fecha_creacion DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edificios</title>

    <link rel="stylesheet" href="../Diseño/styles.css">
    
    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="..\favicon\apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="..\favicon\favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="16x16" href="..\favicon\favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
        
</head>

<body>
    <div class="content-wrapper">
        <div class="header-bg">
            <header class="header container">
        
                <div class="titulo-contenedor">
                    <h1 class="titulo">Edificios</h1>
                </div>
        
                <div class="navegacion">
                    <ul class="links">
                        <li class="link"><a href="inicio.html">Inicio</a></li>
                        <li class="link"><a href="edificios.php">Edificios</a></li>
                        <li class="link"><a href="espaciosUrbanos.php">Espacios Urbanos</a></li>
                        <li class="link"><a href="biografias.php">Biografías</a></li>
                    </ul>
                </div>
        
            </header>
        </div>


        <!-- Información Edificio -->

        <div class="edificio container">

            <div class="decoracion">
                <div class="circulo">

                </div>
            </div>

            <div class="informacion__principal seccion">
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='edificio'>";
                    echo "<h2>" . $row['nombre'] . "</h2>";
                    echo "<p>Género y tipología: " . $row['genero_tipologia'] . "</p>";
                    echo "<p>Uso actual: " . $row['uso_actual'] . "</p>";
                    echo "<p>Año de construcción: " . $row['año_construccion'] . "</p>";
                    echo "</div>";
                }
                ?>
            </div>

        </div>
    </div>
    
<footer>
    <div class="Pie-pagina">
        <p>
            Lorem ipsum dolor, s
        </p>
    </div>
</footer>

</body>
</html>
