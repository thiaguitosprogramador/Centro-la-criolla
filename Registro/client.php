
<?php
include __DIR__ . '/../BD/Conexion.php';
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
  <title>Cetro de formación profesional N°61</title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="shortcut icon" href="./assets/img/Logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body style="background-color: #5fbdff;">
  <header>
    <div class="container text-center" id="Nombreescuela">
      <div class="row align-items-start">
        <div class="col-sm-12">
          <img src="/assets/img/Logo.png" alt="logoprincial" id="logoprincipal" height="10%" width="10%">
        </div>
        <div class="col-sm-12">
          <h1>Centro de formacion <br> profesional N°61</h1>
        </div>
      </div>
    </div>
  </header>
  <div id="color">
    <main>
      <div id="container"> 
                <div class="container text-center">
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
                    echo '<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#enrollModal" data-course="' . htmlspecialchars($curso['id']) . '">Anotarse</button>'; // Botón para anotarse
                    echo '</div>'; 
                    echo '</div>'; 
                  
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<p>No hay cursos destacados en este momento.</p>';
            }
            ?>
               
                
            </div>
                </div>
        <div style="text-align: center;">
          <a href="/" style="justify-content: center;"><button>Inicio</button></a>
           <a href="/logeo" style="justify-content: center;"><button>Editar tabla</button></a>
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
      <!-- Modal para inscribirse en un curso -->
      <div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="enrollModalLabel">Inscripción en Curso</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form target="_blank" action="https://formsubmit.co/thiagosarlo01@gmail.com" method="POST">
                <div class="mb-3">
                  <label for="studentName" class="form-label">Nombre del Estudiante</label>
                  <input type="text" class="form-control" id="nombreestudiante" name="nombreestudiante" required>
                </div>
                <div class="mb-3">
                  <label for="courseName" class="form-label">Gmail</label>
                  <input type="email" class="form-control" id="gmail" name="gmail" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Inscribirse</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script type="/assets/js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
  </html>
          