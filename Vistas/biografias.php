<?php
require_once '../BaseDatos/db_connect.php';

$query = "SELECT arquitectos.nombre, biografias.* FROM biografias JOIN arquitectos ON arquitectos.id = biografias.arquitecto_id WHERE biografias.activo = 1 ORDER BY biografias.año_ciudad_nacimiento DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biografías</title>

    <link rel="stylesheet" href="../Diseño/styles.css">

    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="..\favicon\apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="..\favicon\favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="..\favicon\favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
</head>
<body>
    <div class="content-wrapper">
        <div class="header-bg">
            <header class="header container">
                <div class="titulo-contenedor">
                    <h1 class="titulo">Biografías</h1>
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
        <div class="biografia container">
            <div class="decoracion">
                <div class="circulo">
                </div>
            </div>
            <div class="informacion__principal seccion">
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='card'>";
                            echo "<div class='card-content'>";
                            echo "<h2>" . $row['nombre'] . "</h2>";
                            echo "<p>Año y ciudad de nacimiento: " . $row['año_ciudad_nacimiento'] . "</p>";
                            echo "<p>Lugar de estudios: " . $row['lugar_estudios'] . "</p>";
                            echo "<p>Disciplina: " . $row['disciplina'] . "</p>";
                            echo "<p>Principales obras: " . $row['principales_obras'] . "</p>";
                            echo "<p>Elementos característicos: " . $row['elementos_caracteristicos'] . "</p>";
                            echo "</div>";
                            echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
    <footer>
    <div class="footer">
        <div class="footer-content">
            <h2 class="footer-title">Síguenos</h2>
            <div class="social">
                <a href="https://www.facebook.com" target="_blank">Facebook</a> |
                <a href="https://www.instagram.com" target="_blank">Instagram</a> |
                <a href="https://www.twitter.com" target="_blank">Twitter</a> |
                <a href="https://www.linkedin.com" target="_blank">LinkedIn</a>
            </div>
        </div>
        <div class="privacy">
            <a href="privacidad.html">Aviso de privacidad</a>
        </div>
        <div class="footer-bottom">
            &copy; 2023 Espacio Arquitectónico en México
        </div>
    </div>
</footer>



</body>
</html>