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

        <div class="edificios container">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='edificio'>";
                echo "<h2>" . $row['nombre'] . "</h2>";
                echo "<p>Género/Tipología: " . $row['genero_tipologia'] . "</p>";
                echo "<p>Uso Actual: " . $row['uso_actual'] . "</p>";
                echo "<p>Año de Construcción: " . $row['año_construccion'] . "</p>";
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

    <footer class="Pie-pagina">
        <div class="container">
            <div class="footer-links">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Edificios</a></li>
                    <li><a href="#">Espacios Urbanos</a></li>
                    <li><a href="#">Biografías</a></li>
                </ul>
            </div>
            <div class="footer-credits">
                <p>&copy; 2023 - Arquitectura - UAM Iztapalapa</p>
            </div>
        </div>
    </footer>

</body>
</html>