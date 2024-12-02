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

        $sql = "CREATE TABLE IF NOT EXISTS tb_productos (
            id_producto SERIAL PRIMARY KEY,
            codigo VARCHAR(50),
            nombre_producto VARCHAR(255),
            descripcion TEXT,
            imagen TEXT,
            stock INT,
            stock_minimo INT,
            stock_maximo INT,
            precio_compra INT,
            precio_venta INT,
            fecha_de_ingreso DATE,
            fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
            fyh_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            id_usuario INT,
            activo TINYINT(1) DEFAULT 1
        )";    
        
        $pdo->exec($sql);
        
        $sql = "SELECT * FROM tb_productos";
        $query = $pdo->prepare($sql);
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_ASSOC);
            
    } catch (PDOException $e) {
        echo "Error al crear la tabla tb_productos: " . $e->getMessage();
    }


?>
