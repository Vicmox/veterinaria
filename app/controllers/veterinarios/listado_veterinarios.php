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

    
        $sql = "CREATE TABLE IF NOT EXISTS tb_veterinarios (
            id_veterinario INT AUTO_INCREMENT PRIMARY KEY,
            nombre_veterinario VARCHAR(255),
            email VARCHAR(255),
            password TEXT,
            contacto VARCHAR(50),
            area_especializacion TEXT,
            fecha_de_ingreso DATE,
            fyh_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            fyh_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            activo TINYINT(1) DEFAULT 1
        )";
        
        $pdo->exec($sql);
        
        $sql = "SELECT * FROM tb_veterinarios";
        $query = $pdo->prepare($sql);
        $query->execute();
        $veterinarios = $query->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "Error al consultar los datos de tb_veterinarios: " . $e->getMessage();
    }
?>