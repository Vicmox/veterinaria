<?php

try {
    $dsn = 'mysql:host=127.0.0.1;dbname=clinicaveterinaria;charset=utf8';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    $pdo = new PDO($dsn, $username, $password, $options);

    
    $sql = "CREATE TABLE IF NOT EXISTS tb_servicios (
        id_servicio INT AUTO_INCREMENT PRIMARY KEY,
        nombre_servicio VARCHAR(255),
        descripcion TEXT,
        precio INT,
        fecha_creacion DATE DEFAULT CURRENT_DATE,
        fecha_actualizacion DATE DEFAULT CURRENT_DATE,
        id_usuario INT,
        id_veterinario INT NOT NULL,
        FOREIGN KEY (id_veterinario) REFERENCES tb_veterinarios(id_veterinario)
        )";
    
    $pdo->exec($sql);


    $sql = "SELECT * FROM tb_servicios";
    $query = $pdo->prepare($sql);
    $query->execute();
    $servicios = $query->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    echo "Error al consultar los datos de tb_servicios: " . $e->getMessage();
}
?>