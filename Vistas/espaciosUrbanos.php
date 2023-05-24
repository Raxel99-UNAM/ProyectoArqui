<?php
require_once '../BaseDatos/db_connect.php';

$query = "SELECT * FROM espacios_urbanos WHERE activo = 1 ORDER BY nombre";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espacios Urbanos</title>


    <link rel="stylesheet" href="../Diseño/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="..\favicon\apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="..\favicon\favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="..\favicon\favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">


    <!-- Aquí incluimos la librería de Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDP7dRMjVGQuZ5BpzxGvJfsr50UI_-zTTI"></script>
</head>

<body>

<div class="content-wrapper">
        <div class="header-bg">
            <header class="header container">
                <div class="titulo-contenedor">
                    <h1 class="titulo">Espacios Urbanos</h1>
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
<?php
while ($espacio_urbano = mysqli_fetch_array($result)) {
?>
    <div class="card">
        <div class="card-content">
            <h2><?php echo $espacio_urbano['nombre']; ?></h2>
            <p><?php echo $espacio_urbano['funcion']; ?></p>
            <p><?php echo $espacio_urbano['año_establecimiento']; ?></p>
            <!-- Aquí creamos el div donde se mostrará el mapa -->
            <div id="mapa_<?php echo $espacio_urbano['id']; ?>" style="width: 100%; height: 400px;"></div>
            <!-- Aquí creamos el script para mostrar el mapa -->
            <script>
                var map = new google.maps.Map(document.getElementById('mapa_<?php echo $espacio_urbano['id']; ?>'), {
                    zoom: 14,
                    center: new google.maps.LatLng(<?php echo $espacio_urbano['latitud']; ?>, <?php echo $espacio_urbano['longitud']; ?>),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(<?php echo $espacio_urbano['latitud']; ?>, <?php echo $espacio_urbano['longitud']; ?>),
                    map: map
                });
            </script>
        </div>
    </div>
<?php
}

?>
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
        <div class="footer-bottom">
            &copy; 2023 Espacio Arquitectónico en México
        </div>
    </div>
</footer>



</body>
</html>
