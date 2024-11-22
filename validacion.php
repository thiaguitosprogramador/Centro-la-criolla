<?php
session_start();
require __DIR__ . '/BD/Conexion.php';

// Obtener las entradas del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Asegúrate de que las variables no estén vacías
if (empty($usuario) || empty($contraseña)) {
    echo '<h1 class="bad" style="text-align:center;">Por favor, completa todos los campos.</h1>';

    include __DIR__ . ("/public/editar.html");
    exit();
}

// Consulta para verificar el usuario y la contraseña
$consulta = "SELECT * FROM usuario WHERE Usuario='$usuario' AND contraseña='$contraseña'";
$resultado = mysqli_query($conexion1, $consulta);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion1));
}

$filas = mysqli_fetch_array($resultado);

if ($filas['id_cargo'] == 1) { // administrador
        header("Location: /admin"); // Redirige a la ruta definida en app.php
        exit();
} else {
    echo '<h1 class="bad" style="text-align:center;">ERROR EN LA AUTENTIFICACION</h1>';
    include __DIR__ . '/public/editar.html';
}

mysqli_free_result($resultado);
mysqli_close($conexion1);
?>