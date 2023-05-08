<?php
    include 'db_connect.php';

    // Consulta para obtener información de espacios_urbanos
    $sql_espacios = "SELECT * FROM espacios_urbanos";
    $result_espacios = $conn->query($sql_espacios);

    // Consulta para obtener información de edificaciones
    $sql_edificaciones = "SELECT * FROM edificaciones";
    $result_edificaciones = $conn->query($sql_edificaciones);

    // Consulta para obtener información de arquitectos
    $sql_arquitectos = "SELECT * FROM arquitectos";
    $result_arquitectos = $conn->query($sql_arquitectos);

    // Consulta para obtener información de biografias
    $sql_biografias = "SELECT * FROM biografias";
    $result_biografias = $conn->query($sql_biografias);

    // Cerrar conexión
    $conn->close();
?>