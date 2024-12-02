<?php

$sql_create_table = "CREATE TABLE IF NOT EXISTS tb_usuarios (
    id_usuario SERIAL PRIMARY KEY,
    nombre_completo VARCHAR(255),
    email VARCHAR(255),
    password TEXT,
    token VARCHAR(11) DEFAULT NULL,
    nombre_mascota VARCHAR(30),
    cargo VARCHAR(50),
    fyh_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fyh_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,               
    activo TINYINT(1) DEFAULT 1
)";

try {
    // Agrega la conexión a la base de datos aquí
    $dsn = 'mysql:host=127.0.0.1;dbname=clinicaveterinaria;charset=utf8';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    $pdo = new PDO($dsn, $username, $password, $options);

    // Ejecutar la consulta para crear la tabla
    $pdo->exec($sql_create_table);
    
    // Verificar si el usuario administrador por defecto ya existe
    $sql_check_admin = "SELECT COUNT(*) AS count FROM tb_usuarios WHERE email = 'dayler@gmail.com'";
    $query_check_admin = $pdo->prepare($sql_check_admin);
    $query_check_admin->execute();
    $result_check_admin = $query_check_admin->fetch();
    
    // Si el usuario administrador no existe, insertarlo
    if ($result_check_admin['count'] == 0) {
        $hashed_password = password_hash('1234', PASSWORD_DEFAULT);
        $sql_insert_admin = "INSERT INTO tb_usuarios (nombre_completo, email, password, cargo)
                             VALUES ('Dayler Stivenson', 'dayler@gmail.com', :password, 'ADMINISTRADOR')";
        $query_insert_admin = $pdo->prepare($sql_insert_admin);
        $query_insert_admin->execute(['password' => $hashed_password]);
    }
    
    // Selección de todos los usuarios
    $sql = "SELECT * FROM tb_usuarios";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll();
    
} catch (PDOException $e) {
    echo "Error al conectar o ejecutar consulta: " . $e->getMessage();
}
?>
