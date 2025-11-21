<?php
// perfil_atleta.php
// Muestra el perfil del atleta basado en el ID pasado por parámetro GET

// Verificar que el ID sea válido
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$atleta_id = intval($_GET['id']); // Validar que sea número entero

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "ocr_atletas");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta preparada para evitar SQL injection
$stmt = $conexion->prepare("SELECT id, nombre, edad, fecha_nacimiento, documento, celular, correo FROM atletas WHERE id = ?");
$stmt->bind_param("i", $atleta_id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    die("<h1>Atleta no encontrado</h1>");
}

$atleta = $resultado->fetch_assoc();
$stmt->close();
$conexion->close();

// Intentar usar una foto personalizada si existe en la carpeta img
$imgCandidates = array(
  'img/perfil_' . $atleta_id . '.png',
  'img/perfil_' . $atleta_id . '.jpg',
  'img/perfil_' . $atleta_id . '.jpeg',
  'img/perfil_' . $atleta_id . '.webp',
  'img/perfil_' . $atleta['documento'] . '.png',
  'img/perfil_' . $atleta['documento'] . '.jpg',
  'img/perfil_' . $atleta['documento'] . '.jpeg',
  'img/perfil.png',
  'img/perfil.jpg',
  'img/' . $atleta_id . '.png',
  'img/' . $atleta_id . '.jpg',
  'img/' . $atleta['documento'] . '.png',
  'img/' . $atleta['documento'] . '.jpg'
);

$imgPath = 'img/perfil_default.png';
foreach ($imgCandidates as $candidate) {
  // Usar ruta relativa a este archivo
  if (file_exists(__DIR__ . '/' . $candidate)) {
    $imgPath = $candidate;
    break;
  }
}

// Elegir imagen de fondo para el hero (buscar fondo2.* primero)
$heroCandidates = array(
  'img/fondo2.jpg',
  'img/fondo2.png',
  'img/fondo2.jpeg',
  'img/portada.png'
);
$heroImg = 'img/portada.png';
foreach ($heroCandidates as $hc) {
  if (file_exists(__DIR__ . '/' . $hc)) {
    $heroImg = $hc;
    break;
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Perfil - Liga OCR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center brand-title" href="index.php"><img src="logo.png" alt="Logo" width="150" height="40" class="me-2"> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="competencias.php">Competencias</a></li>
          <li class="nav-item"><a class="nav-link" href="reglas.php">Reglas OCR</a></li>
          <li class="nav-item"><a class="nav-link" href="noticias.php">Noticias</a></li>
          <?php if (isset($atleta) && !empty($atleta)): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo htmlspecialchars($imgPath); ?>" alt="Avatar" width="36" height="36" class="rounded-circle me-2">
                <span><?php echo htmlspecialchars($atleta['nombre']); ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                <li><a class="dropdown-item" href="perfil_atleta.php?id=<?php echo intval($atleta['id']); ?>">Ver Perfil</a></li>
                <li><a class="dropdown-item" href="competencias.php">Competencias</a></li>
                <li><a class="dropdown-item" href="reglas.php">Reglas OCR</a></li>
                <li><a class="dropdown-item" href="noticias.php">Noticias</a></li>
              </ul>
            </li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Ingresar</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HERO SECTION -->
  <header class="hero-section text-center" style="background: url('<?php echo htmlspecialchars($heroImg); ?>') center center/cover no-repeat; position: relative;">
    <div style="position:absolute; inset:0; background: rgba(0,0,0,0.55); z-index:1;"></div>
    <div class="container" style="position: relative; z-index:2;">
      <h1 class="display-4">Mi Perfil de Atleta</h1>
      <p class="lead">Bienvenido <?php echo htmlspecialchars($atleta['nombre']); ?></p>
    </div>
  </header>

  <!-- SECCIÓN DE CONTENIDO DEL PERFIL -->
  <section class="container my-5">
    <div class="row">
      <!-- Espacio principal: aquí colocamos las tres opciones (Competencias / Reglas / Noticias) -->
      <div class="col-12">
        <div class="row text-center">
          <div class="col-md-4 mb-4">
            <div class="card h-100 border-0">
              <div class="card-body">
                <h5 class="card-title">Competencias</h5>
                <p class="card-text">Consulta las fechas, lugares y categorías de las próximas carreras OCR.</p>
                <a href="competencias.php" class="btn btn-outline-dark">Ver más</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 border-0">
              <div class="card-body">
                <h5 class="card-title">Reglas</h5>
                <p class="card-text">Infórmate sobre las reglas oficiales del OCR y las normas de competición.</p>
                <a href="reglas.php" class="btn btn-outline-dark">Ver reglas</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 border-0">
              <div class="card-body">
                <h5 class="card-title">Noticias</h5>
                <p class="card-text">Mantente al tanto de las últimas novedades y logros de los atletas.</p>
                <a href="noticias.php" class="btn btn-outline-dark">Ver noticias</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2025 Liga OCR - Todos los derechos reservados</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
