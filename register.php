<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Perfil - Liga OCR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg p-4 mx-auto" style="max-width: 600px;">

      <h2 class="text-center mb-4">Crear tu Perfil de Atleta</h2>

      <form action="registrar_atleta.php" method="POST">
        
        <div class="mb-3">
          <label class="form-label">Nombres y Apellidos</label>
          <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Edad</label>
          <input type="number" name="edad" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Fecha de Nacimiento</label>
          <input type="date" name="fecha_nacimiento" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Documento (CC / TI)</label>
          <input type="text" name="documento" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Celular</label>
          <input type="text" name="celular" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Correo Electrónico</label>
          <input type="email" name="correo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Guardar Perfil</button>

      </form>
    </div>
  </div>

</body>
</html>
