<?php
session_start();
include __DIR__ . '/../BD/Conexion.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $consulta = "DELETE FROM Curso WHERE id='$id'";
    if (mysqli_query($conexion1, $consulta)) {
        header("Location: /"); // Redirige a la página principal
        exit();
    } else {
        die("Error en la consulta: " . mysqli_error($conexion1));
    }
} else {
    die("ID no proporcionado.");
}
?>