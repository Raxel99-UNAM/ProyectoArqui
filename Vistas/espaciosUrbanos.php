<?php require_once '../BaseDatos/db_connect.php';

$espacio_id = 1;

$query_espacio = "SELECT * FROM espacios_urbanos WHERE id = $espacio_id";
$result_espacio = mysqli_query($conn, $query_espacio);
$espacio = mysqli_fetch_assoc($result_espacio);

$nombre_espacio = $espacio['nombre'];
$descripcion_proyecto_original = $espacio['descripcion_proyecto_original'];
$ubicacion = $espacio['ubicacion'];
$contexto_historico = $espacio['contexto_historico'];
$transformaciones = $espacio['transformaciones'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espacios Urbanos</title>

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
                    <h1 class="titulo">Espacio Arquitectónico en México</h1>
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
                <img class="Prueba" src="https://www.msn.com/es-mx/entretenimiento/musica/arrojan-a-beb%C3%A9-al-escenario-durante-concierto-de-k-pop/ar-AA1aRXhB?ocid=msedgntp&cvid=72b3fdc653d247469f398492cdd9b9a4&ei=10&fullscreen=true#image=1"alt="Test">
                </div>
            </div>

            <div class="informacion__principal seccion">
                <h1 class="titulo"> <?php echo $nombre_espacio; ?></h1>
                <img class="imagen-edificio" src="https://espacioarquitectonicoenmexico.files.wordpress.com/2018/06/mineria-1.jpg?w=1000" alt="Palacio-Mineria">
            </div>

            <div class="ubicacion seccion">
                <h2 class="titulo">Ubicación</h2>
                <p>
                    <?php echo $ubicacion; ?>   
                </p>

                <div class="imagenes-ubicacion">

                    <img src="https://espacioarquitectonicoenmexico.files.wordpress.com/2018/06/mineria-3.jpg?w=309&h=412" alt="ubicacion">

                    <img src="https://espacioarquitectonicoenmexico.files.wordpress.com/2018/06/mineria-2-e1528178892289.png?w=1000" alt="ubicacion2">
                </div>

            </div>

            <div class="corriente-estilistica seccion">
                <h2 class="titulo">Corriente Estilistica</h2>
                <p>
                    <?php echo $descripcion_proyecto_original; ?>
                </p>

                <img class="imagen-edificio" src="https://espacioarquitectonicoenmexico.files.wordpress.com/2018/06/mineria-4.png?w=400&h=269" alt="">
            </div>

            <div class="historia seccion">
                <h2 class="titulo">Historia</h2>

                <p>
                    <?php echo $contexto_historico; ?>
                </p>

                <img class="imagen-edificio" src="https://espacioarquitectonicoenmexico.files.wordpress.com/2018/06/mineria-4.png?w=400&h=269" alt="">

            </div>

            <div class="transformaciones seccion">

                <h2 class="titulo">Transformaciones</h2>

                <p>
                    <?php echo $transformaciones; ?>
                </p>

                <img class="imagen-edificio" src="https://espacioarquitectonicoenmexico.files.wordpress.com/2018/06/mineria-4.png?w=400&h=269" alt="">

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