<?php
define('APP_NAME', 'Sistema de Información Clínica Veterinaria PETS HOME');
define('SERVIDOR', '127.0.0.1');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'clinicaveterinaria');

$URL = "http://localhost/gestionveterinaria";

$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

date_default_timezone_set("America/Bogota");
$fechaHora = date("Y-m-d H:i:s");

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
