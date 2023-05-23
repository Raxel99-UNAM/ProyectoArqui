<?php
$conexion = mysqli_connect("localhost", "root", "", "arqui");
if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM espacios_urbanos ORDER BY nombre";
$result = $conexion->query($sql);
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

<?php session_start(); ?>
    <?php if (!isset($_SESSION['authenticated'])): ?>
        <form action="check_password.php" method="post">
            <label for="password">Ingrese la contraseña para añadir un nuevo espacio urbano:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Ingresar">
        </form>
        <?php if (isset($_GET['incorrect_password'])): ?>
            <p>La contraseña ingresada es incorrecta.</p>
        <?php endif; ?>
    <?php endif; ?>

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
    $conexion->close();
    ?>

<footer>
    <div class="Pie-pagina">
        <p>
            Lorem ipsum dolor, s
        </p>
    </div>
</footer>

<?php if (isset($_SESSION['authenticated'])): ?>
        <form action="insert_espacioUrbano.php" method="post">
            <label for="nombre">Nombre del espacio urbano:</label>
            <input type="text" id="nombre" name="nombre">

            <label for="funcion">Función:</label>
            <input type="text" id="funcion" name="funcion">

            <label for="año_establecimiento">Año de establecimiento:</label>
            <input type="text" id="año_establecimiento" name="año_establecimiento">

            <label for="latitud">Latitud:</label>
            <input type="text" id="latitud" name="latitud">

            <label for="longitud">Longitud:</label>
            <input type="text" id="longitud" name="longitud">

            <input type="submit" value="Añadir espacio urbano">
        </form>
    <?php endif; ?>

</body>
</html>
