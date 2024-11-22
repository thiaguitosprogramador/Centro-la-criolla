<?php
include __DIR__ . '/../BD/Conexion.php';
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $titulo = $_POST['titulo']; // Cambiado a 'titulo'
    $descripcion = $_POST['descripcion'];

    // Manejo de la carga de la imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Definir la ruta donde se guardará la imagen
        $uploadFileDir = '../public/assets/img/';
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension; // Generar un nuevo nombre único
        $dest_path = $uploadFileDir . $newFileName;

        // Mover el archivo a la carpeta de destino
        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            // Guardar la información del curso en la base de datos
            $sql = "INSERT INTO Curso (Titulo, Descripcion, Imagen) VALUES ('$titulo', '$descripcion', '$newFileName')";
            if ($conexion1->query($sql) === TRUE) {
                echo '<div class="container mt-5">';
                echo '<h2>Curso cargado exitosamente.</h2>';
                echo '<a href="/admin" class="btn btn-primary">Volver al Panel</a>';       
            } else {
                echo "Error al agregar el curso: " . $conexion1->error;
            }
        } else {
            echo "Error al cargar la imagen.";
        }
    } else {
        echo "Error: No se ha subido ninguna imagen.";
    }
} else {
    echo "Error: Método de solicitud no válido.";
}
$conexion1->close();
?>