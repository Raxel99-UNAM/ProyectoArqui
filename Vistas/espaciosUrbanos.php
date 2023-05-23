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

            <label for="año_establecimiento">Año de establecimiento:</label>
            <input type="number" id="año_establecimiento" name="año_establecimiento">

            <label for="funcion">Función:</label>
            <input type="text" id="funcion" name="funcion">

            <label for="arquitecto_id">ID del arquitecto:</label>
            <input type="number" id="arquitecto_id" name="arquitecto_id">

            <label for="latitud">Latitud:</label>
            <input type="number" id="latitud" name="latitud" step="any">

            <label for="longitud">Longitud:</label>
            <input type="number" id="longitud" name="longitud" step="any">

            <label for="contexto_historico">Contexto histórico:</label>
            <textarea id="contexto_historico" name="contexto_historico"></textarea>

            <label for="descripcion_proyecto_original">Descripción del proyecto original:</label>
            <textarea id="descripcion_proyecto_original" name="descripcion_proyecto_original"></textarea>

            <label for="orientacion">Orientación:</label>
            <input type="text" id="orientacion" name="orientacion">

            <label for="dimensiones">Dimensiones:</label>
            <input type="text" id="dimensiones" name="dimensiones">

            <label for="secciones">Secciones:</label>
            <textarea id="secciones" name="secciones"></textarea>

            <label for="elementos_imagen_urbana">Elementos de imagen urbana:</label>
            <textarea id="elementos_imagen_urbana" name="elementos_imagen_urbana"></textarea>

            <label for="tipos_edificaciones">Tipos de edificaciones:</label>
            <input type="text" id="tipos_edificaciones" name="tipos_edificaciones">

            <label for="transformaciones">Transformaciones:</label>
            <textarea id="transformaciones" name="transformaciones"></textarea>

            <label for="principios_diseno">Principios de diseño:</label>
            <textarea id="principios_diseno" name="principios_diseno"></textarea>

            <input type="submit" value="Añadir espacio urbano">
        </form>
    <?php endif; ?>


</body>
</html>
