<?php
session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conexion = mysqli_connect("localhost", "root", "", "aquitectura");

    if ($conexion->connect_error) {
        die("La conexión falló: " . $conexion->connect_error);
    }

    $query = "SELECT * FROM usuarios WHERE username = '$username' and password = '$password'";

    $result = mysqli_query($conexion, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        header('Location: menu.php');
        exit();
    } else {
        $error = "El usuario o la contraseña son incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../Diseño/styles.css">
    
    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="content-wrapper">
            <div class="header-bg">
                <header class="header container">
                    <div class="titulo-contenedor">
                        <h1 class="titulo">Login</h1>
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

        <div class="login-container">
            <form class="formulario" action="" method="POST">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Ingresar">
            </form>

            <?php if (!empty($error)): ?>
                <p><?php echo $error; ?></p>
            <?php endif; ?>
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
