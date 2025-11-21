<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liga OCR - Página principal</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <!-- Estilos propios -->
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
          <li class="nav-item"><a class="nav-link" href="login.php">Ingresar</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- SECCIÓN PRINCIPAL -->
  <header class="hero-section text-center">
    <div class="container">
      <h1 class="display-4">Bienvenido Atleta</h1>
      <p class="lead">Descubre las próximas competencias, conoce las reglas y mantente al día con las noticias del mundo OCR.</p>
      <a href="register.php" class="btn btn-primary btn-lg">Crea tu perfil</a>
    </div>
  </header>

  <!-- SECCIÓN DE REDES SOCIALES -->
  <section class="container my-5 social-section">
    <div class="row justify-content-center text-center">
      <div class="col-12 mb-4">
        <h2 class="fw-bold">Síguenos en redes</h2>
        <p class="text-muted">Entérate de noticias, eventos y contenido exclusivo. Haz clic en la red y te llevamos directo.</p>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card shadow-sm h-100 border-0 social-card">
          <div class="card-body d-flex flex-column align-items-center">
            <img src="img/instagram.jpg" alt="Instagram" class="social-logo mb-2">
            <h5 class="card-title mt-3">Instagram</h5>
            <p class="card-text text-muted">Fotos y reels de competencias y entrenamientos.</p>
            <a href="https://www.instagram.com/ligaocro?igsh=NmZwdmZvNXZjNmM5" target="_blank" rel="noopener" class="btn btn-instagram mt-auto">Ir a Instagram</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card shadow-sm h-100 border-0 social-card">
          <div class="card-body d-flex flex-column align-items-center">
            <img src="img/tiktok.jpg" alt="TikTok" class="social-logo mb-2">
            <h5 class="card-title mt-3">TikTok</h5>
            <p class="card-text text-muted">Videos cortos, highlights y desafíos.</p>
            <a href="https://www.tiktok.com/@spartan" target="_blank" rel="noopener" class="btn btn-tiktok mt-auto">Ir a TikTok</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card shadow-sm h-100 border-0 social-card">
          <div class="card-body d-flex flex-column align-items-center">
            <img src="img/youtube.jpg" alt="YouTube" class="social-logo mb-2">
            <h5 class="card-title mt-3">YouTube</h5>
            <p class="card-text text-muted">Transmisiones, entrevistas y recap de eventos.</p>
            <a href="https://youtube.com/@spartanracetube?si=jwQyaqqhCBFhhT4U" target="_blank" rel="noopener" class="btn btn-youtube mt-auto">Ir a YouTube</a>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2025 Liga OCR - Todos los derechos reservados</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>