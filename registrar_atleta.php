<?php
// registrar_atleta.php
// Procesa el registro de un nuevo atleta con seguridad mejorada

$conexion = new mysqli("localhost", "root", "", "ocr_atletas");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'] ?? '';
$edad = $_POST['edad'] ?? '';
$fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
$documento = $_POST['documento'] ?? '';
$celular = $_POST['celular'] ?? '';
$correo = $_POST['correo'] ?? '';

// Usar consulta preparada para evitar SQL injection
$stmt = $conexion->prepare("INSERT INTO atletas (nombre, edad, fecha_nacimiento, documento, celular, correo) VALUES (?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die("Error en la consulta preparada: " . $conexion->error);
}

// Vincular parámetros (s = string, i = integer)
$stmt->bind_param("ssisss", $nombre, $edad, $fecha_nacimiento, $documento, $celular, $correo);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Obtener el ID del atleta recién insertado
    $atleta_id = $stmt->insert_id;
    $stmt->close();
    $conexion->close();
    
    // Redirigir a perfil_atleta.php con el ID como parámetro
    echo "
        <script>
            alert('¡Perfil creado exitosamente!');
            window.location.href='perfil_atleta.php?id=" . intval($atleta_id) . "';
        </script>
    ";
} else {
    $error_msg = $stmt->error;
    $stmt->close();
    $conexion->close();
    
    echo "
        <script>
            alert('Error al crear el perfil: " . htmlspecialchars($error_msg) . "');
            window.history.back();
        </script>
    ";
}
?>
