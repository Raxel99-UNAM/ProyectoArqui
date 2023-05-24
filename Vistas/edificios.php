<?php
require_once '../BaseDatos/db_connect.php'; 

$results_per_page = 10;

$query = "SELECT * FROM edificaciones";
$result = mysqli_query($conn, $query);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $results_per_page;

$orderby = $_GET['orderby'] ?? 'año_construccion'; 
$order = $_GET['order'] ?? 'DESC'; 

$query = 'SELECT * FROM edificaciones ORDER BY ' . $orderby . ' ' . $order . ' LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.8.0/slick.css"/>

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

        <div class="edificios container slick-slider">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='edificio'>";
                echo "<h2>" . $row['nombre'] . "</h2>";
                echo "<p>Género/Tipología: " . $row['genero_tipologia'] . "</p>";
                echo "<p>Uso Actual: " . $row['uso_actual'] . "</p>";
                echo "<p>Año de Construcción: " . $row['año_construccion'] . "</p>";
                echo "<p>Ubicación: " . $row['ubicacion'] . "</p>";
                echo "<p>Contexto Histórico: " . $row['contexto_historico'] . "</p>";
                echo "<p>Descripción Espacio: " . $row['descripcion_espacio'] . "</p>";
                echo "<p>Plantas Arquitectónicas: " . $row['plantas_arquitectonicas'] . "</p>";
                echo "<p>Fachadas y Ornamentos: " . $row['fachadas_ornamentos'] . "</p>";
                echo "<p>Corriente Estilística: " . $row['corriente_estilistica'] . "</p>";
                echo "<p>Materiales y Sistemas Constructivos: " . $row['materiales_sistemas_constructivos'] . "</p>";
                echo "<p>Contexto Urbano: " . $row['contexto_urbano'] . "</p>";
                echo "<p>Transformaciones: " . $row['transformaciones'] . "</p>";
                echo "</div>";
            }
            
            ?>
        </div>
        
        <div class="pagination container">
            <?php
            for ($page = 1; $page <= $number_of_pages; $page++) {
                echo '<a href="edificios.php?page=' . $page . '">' . $page . '</a> ';
            }
            ?>
        </div>
    </div>

    <footer>
    <div class="Pie-pagina">
        <p>
            Lorem ipsum dolor, s
        </p>
    </div>
</footer>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.8.0/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.slick-slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>

</body>
</html>
