<?php
session_start();

$_SESSION['key']
if()      

}
include __DIR__ . '/../BD/Conexion.php';
// Consulta para obtener todos los cursos
$consulta = "SELECT * FROM Curso"; 
$resultado = mysqli_query($conexion1, $consulta);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion1));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="./assets/img/Logo.png" type="image/x-icon">
    <title>Centro de formación profesional N°61</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        body {
            background-color: #5fbdff; /* Fondo azul */
        }
        .table-container {
            background-color: white; /* Fondo blanco para la tabla */
            border-radius: 10px; /* Bordes redondeados */
            padding: 20px; /* Espaciado interno */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra */
            margin: 20px auto; /* Margen superior e inferior */
            max-width: 800px; /* Ancho máximo */
        }
        table {
            width: 100%; /* Ancho completo */
        }
    </style>
</head>
<body>
    <div style="justify-content: center; text-align: center;">
        <h1>Cursos Disponibles</h1>

        <!-- Contenedor de la tabla -->
        <div class="table-container">
         
            <div class="text-center" style="margin: 20px;">
        <a href="/subir"><button class="btn btn-primary">Agregar Nuevo Curso</button></a>
    </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Curso</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($curso = mysqli_fetch_array($resultado)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($curso['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($curso['Titulo']) . '</td>';
                        echo '<td>' . htmlspecialchars($curso['Descripcion']) . '</td>';
                        echo '<td>
                                <a href="/editar?id=' . htmlspecialchars($curso['id']) . '">Editar</a>
                                <a href="/borrar?id=' . htmlspecialchars($curso['id']) . '">Borrar</a>
                              </td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center" style="margin-top: 20px;">
        <a href="./"><button class="btn btn-primary">Inicio</button></a>
    </div>
    </div>
    <footer>
        <div class="container text-center" id="redes">
            <div class="row align-items-start">
                <div class="col-md">
                    <p>&copy; 2024 El centro de formacion profesional N° 61. Todos los derechos reservados.</p>
                    <p>Este sitio web y su contenido están protegidos por leyes de derechos de autor. Queda prohibida la reproducción total o parcial sin autorización previa.</p>
                </div>
                <div class="col-md">
                    <h4>Nuestras Redes</h4>
                    <div class="social-links text-center">
                        <a href="https://www.facebook.com/cfp61"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/cfp61lacriolla/?igsh=ZGpiNDl4bm5oN3Zk"><i class="fab fa-instagram"></i></a>
                        <a href="https://api.whatsapp.com/send/?phone=5493454123356&text=contactanos&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
