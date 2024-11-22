<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Curso</title>
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
        <h1>Subir Curso</h1>
        <form action="/up" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del Curso:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del Curso:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Imagen del Curso:</label>
                <input type="file" id="foto" name="foto" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir Curso</button>
        </form>
        <br>
        <a href="/">Cancelar</a>
    </div>
</body>
</html>