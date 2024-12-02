<?php
define('APP_NAME', 'Sistema de Información Clínica Veterinaria PETS HOME');
define('SERVIDOR', '127.0.0.1');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'clinicaveterinaria'); // Cambia el nombre de la base de datos si es diferente

$URL = "http://localhost/gestionveterinaria";

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
