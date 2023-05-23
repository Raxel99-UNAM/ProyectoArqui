<?php
require_once '../BaseDatos/db_connect.php';

$query = "SELECT arquitectos.nombre, biografias.* FROM biografias JOIN arquitectos ON arquitectos.biografia_id = biografias.id ORDER BY biografias.año_ciudad_nacimiento DESC";
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

    <?php session_start(); ?>
        <?php if (!isset($_SESSION['authenticated'])): ?>
            <form action="check_password.php" method="post">
                <label for="password">Ingrese la contraseña para añadir una nueva biografía:</label>
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
        <div class="Pie-pagina">
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            </p>
        </div>
    </footer>
    
    <?php if (isset($_SESSION['authenticated'])): ?>
        <form action="insert_biografia.php" method="post">
            <label for="nombre">Nombre del arquitecto:</label>
            <input type="text" id="nombre" name="nombre">

            <label for="año_ciudad_nacimiento">Año y ciudad de nacimiento:</label>
            <input type="text" id="año_ciudad_nacimiento" name="año_ciudad_nacimiento">

            <label for="lugar_estudios">Lugar de estudios:</label>
            <input type="text" id="lugar_estudios" name="lugar_estudios">

            <label for="disciplina">Disciplina:</label>
            <input type="text" id="disciplina" name="disciplina">

            <label for="principales_obras">Principales obras:</label>
            <input type="text" id="principales_obras" name="principales_obras">

            <label for="elementos_caracteristicos">Elementos característicos:</label>
            <input type="text" id="elementos_caracteristicos" name="elementos_caracteristicos">

            <input type="submit" value="Añadir biografía">
        </form>
    <?php endif; ?>
</body>
</html>