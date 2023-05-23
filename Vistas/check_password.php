<?php
session_start();

$correct_password = 'Juan'; // Deberás reemplazar esto con la contraseña que desees

if ($_POST['Juan'] == $correct_password) {
    $_SESSION['authenticated'] = true;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?incorrect_password=true');
}
?>
