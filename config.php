<?php
define('APP_NAME', 'Sistema de Información Clínica Veterinaria PETS HOME');
define('SERVIDOR', '127.0.0.1');  // O 'localhost'
define('USUARIO', 'root');         // Usuario por defecto en MySQL
define('PASSWORD', '');            // Contraseña si tiene, o vacío si no
define('BD', 'clinicaveterinaria'); // Nombre de la base de datos

$servidor = "mysql:host=" . SERVIDOR . ";dbname=" . BD;

date_default_timezone_set("America/Bogota");
$fechaHora = date("Y-m-d H:i:s");

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script>console.log('Connected to the database successfully!');</script>";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
