<?php
// Incluir la conexión a la base de datos
include __DIR__ . '/../BD/Conexion.php';

// Consulta para obtener todos los cursos
$consulta = "SELECT * FROM Curso"; 
$resultado = mysqli_query($conexion1, $consulta);
$sql = "SELECT * FROM Curso LIMIT 15";
$result = $conexion1->query($sql);
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion1));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de formación profesional N°61</title>
    <link rel="shortcut icon" href="./assets/img/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body style="background-color: #5fbdff;">
    <header>
        <div class="container text-center" id="Nombreescuela">
            <div class="row align-items-start">
                <div class="col-sm-12">
                    <img src="./assets/img/Logo.png" alt="logoprincial" id="logoprincipal" height="10%" width="10%">
                </div>
                <div class="col-sm-12">
                    <h1>Centro de formacion <br> profesional N°61</h1>
                </div>
                <div class="col-sm-12">
                    <h5>
                        <b style="color: blueviolet;"> El centro de formacion profesional N° 61 </b> es una institución educativa <br>dedicada a ofrecer formación técnica y profesional a jóvenes y adultos.  <br> Su misión es brindar una educación de calidad que prepare a los estudiantes para el mundo laboral, a través de una variedad de programas y cursos <br> que abordan diversas áreas del conocimiento.
                    </h5>
                </div>
            </div>
        </div>
        <br><br>
    </header>
    <div id="color">
    <main>

    <div class="container text-center" id="locate">
  <div class="row align-items-start" style="color:aliceblue;">
    <div class="col-sm" id="ubicacion" >
      <p style="margin-top: -10%;">¿Donde se encuentra?</p>
      <hr style=" color: black; justify-content: center;">
      <p>
        El centro de formacion Profesional N° 61 de Concordia se encuentra en la ciudad de Concordia en la calle 9 de Julio, en la provincia de Entre Ríos, Argentina</p>
    </div>
    <div class="col-sm">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d584.3578994644959!2d-58.107278588411646!3d-31.271157249094003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95adecb04d7457bd%3A0x98aa53d46aa8cd3f!2sR%C3%ADo%20Bermejo%2C%20La%20Criolla%2C%20Entre%20R%C3%ADos!5e1!3m2!1ses!2sar!4v1731880456746!5m2!1ses!2sar" width="80%"  style="border:0; margin-top:4%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     
    </div>
    
  </div>
</div>


            <div id="container">
                <div class="container text-center">
                    <hr id="cursos">
                    <h2>Cursos disponibles</h2>
                    <?php
            if ($result->num_rows > 0) {
              echo '<div class="row">';
                while ($curso = $result->fetch_assoc()) {
                   
                   
               
                echo '<div class="col-md-4 mb-4">';
                    
                    $foto = isset($curso['Imagen']) ? 'assets/img/' . htmlspecialchars($curso['Imagen']) : 'assets/img/default.jpg'; // Imagen por defecto si no hay
                    echo '<div class="card h-100">'; // Usar tarjeta de Bootstrap y asegurar que todas tengan la misma altura
                    echo '<img src="' . $foto . '" alt="' . htmlspecialchars($curso['Titulo']) . '" class="card-img-top" style="height: 200px; object-fit: cover;">'; // Ajustar altura y mantener aspecto
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($curso['Titulo']) . '</h5>';
                    echo '<p class="card-text">' . htmlspecialchars($curso['Descripcion']) . '</p>';
               
                    echo '</div>'; // Cerrar card-body
                    echo '</div>'; // Cerrar card
                    
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<p>No hay cursos destacados en este momento.</p>';
            }
            ?>
               
                <div style="text-align: center;">
                    <a href="/cursos" style="justify-content: center;"><button>Anotarse</button></a>
                </div>
            </div>
        </main>
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
    <button id="ir-arriba" title="Ir arriba">↑</button>
    <script src="./assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>