<?php
define('APP_NAME', 'Sistema de Información Clínica Veterinaria PETS HOME');
define('SERVIDOR', 'mysql.railway.internal'); // Cambia por el hostname proporcionado por Railway
define('USUARIO', 'root');
define('PASSWORD', 'DB_PASS'); // Reemplaza con la contraseña correcta
define('BD', 'railway');

$conexion = mysqli_connect(SERVIDOR, USUARIO, PASSWORD, BD);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
echo "Conectado correctamente a la base de datos.";
?>
