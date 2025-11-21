<?php include('includes/header.php'); ?>

<section class="container my-5" style="max-width: 500px;">
  <h2 class="text-center mb-4">🔐 Iniciar Sesión</h2>
  
  <form>
    <div class="mb-3">
      <label for="email" class="form-label">Correo electrónico</label>
      <input type="email" class="form-control" id="email" placeholder="tu@correo.com">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="password" placeholder="••••••••">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </div>
  </form>

  <p class="text-center mt-3">
    ¿No tienes cuenta? <a href="register.php">Regístrate aquí</a>
  </p>
</section>

<?php include('includes/footer.php'); ?>