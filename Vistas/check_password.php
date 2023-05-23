<?php
session_start();

$correct_password = 'Juan'; // Deberás reemplazar esto con la contraseña que desees

if (isset($_POST['password']) && $_POST['password'] == $correct_password) {
    $_SESSION['authenticated'] = true;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?incorrect_password=true');
}
?>

