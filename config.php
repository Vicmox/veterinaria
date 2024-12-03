<?php
define('APP_NAME', 'Sistema de Información Clínica Veterinaria PETS HOME');

// Obtén las credenciales desde las variables de entorno
define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_PORT', getenv('DB_PORT'));


// Construcción de la cadena de conexión PDO
$servidor = "mysql:host=" . DB_HOST . ";port=" . getenv('DB_PORT') . ";dbname=" . DB_NAME;

// Zona horaria
date_default_timezone_set("America/Bogota");
$fechaHora = date("Y-m-d H:i:s");

// Conexión a la base de datos
try {
    $pdo = new PDO($servidor, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script>console.log('Connected to the database successfully!');</script>";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
