<?php
define('APP_NAME', 'Sistema de Información Clínica Veterinaria PETS HOME');

// Obtén las credenciales desde las variables de entorno
define('SERVIDOR', getenv('DB_HOST'));
define('USUARIO', getenv('DB_USER'));
define('PASSWORD', getenv('DB_PASS'));
define('BD', getenv('DB_NAME'));

// Construcción de la cadena de conexión PDO
$servidor = "mysql:host=" . SERVIDOR . ";dbname=" . BD;

// Zona horaria
date_default_timezone_set("America/Bogota");
$fechaHora = date("Y-m-d H:i:s");

// Conexión a la base de datos
try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script>console.log('Connected to the database successfully!');</script>";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
