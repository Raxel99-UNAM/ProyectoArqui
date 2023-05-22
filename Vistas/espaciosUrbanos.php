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
    <title>Espacios Urbanos</title>
    <link rel="stylesheet" href="../Diseño/styles.css">
    <!-- Aquí incluimos la librería de Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDP7dRMjVGQuZ5BpzxGvJfsr50UI_-zTTI"></script>
</head>

<body>
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

</body>
</html>
