<?php
session_start();
include __DIR__ . '/../BD/Conexion.php';

// Obtener el ID del curso desde la URL
$id = $_GET['id'] ?? null;

if ($id) {
    // Consulta para obtener los datos del curso
    $consulta = "SELECT * FROM Curso WHERE id='$id'";
    $resultado = mysqli_query($conexion1, $consulta);
    
    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion1));
    }

    $curso = mysqli_fetch_array($resultado);
    
    if (!$curso) {
        die("Curso no encontrado.");
    }
} else {
    die("ID no proporcionado.");
}

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    // Consulta para actualizar el curso
    $consulta = "UPDATE Curso SET Titulo='$titulo', Descripcion='$descripcion' WHERE id='$id'";

    if (mysqli_query($conexion1, $consulta)) {
        header("Location: /"); // Redirige a la página principal después de la actualización
        exit();
    } else {
        die("Error en la consulta: " . mysqli_error($conexion1));
    }
}

// Cerrar la conexión
mysqli_free_result($resultado);
mysqli_close($conexion1);
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #5fbdff; /* Fondo azul */
        }
        .form-container {
            background-color: white; /* Fondo blanco para el formulario */
            border-radius: 10px; /* Bordes redondeados */
            padding: 20px; /* Espaciado interno */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra */
            margin: 20px auto; /* Margen superior e inferior */
            max-width: 600px; /* Ancho máximo */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Editar Curso</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del Curso:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo htmlspecialchars($curso['Titulo']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del Curso:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required><?php echo htmlspecialchars($curso['Descripcion']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Curso</button>
        </form>
        <br>
        <a href="/">Cancelar</a>
    </div>
</body>
</html>