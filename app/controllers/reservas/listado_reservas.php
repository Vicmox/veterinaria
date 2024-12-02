<?php

try {
    // Consulta para crear la tabla con fyh_actualizacion como DATETIME
    $sql = "CREATE TABLE IF NOT EXISTS tb_reservas (
        id_reserva SERIAL PRIMARY KEY,
        id_usuario INT,
        nombre_mascota VARCHAR(255),
        email VARCHAR(100),
        id_servicio INT, 
        id_veterinario INT, 
        fecha_cita DATE,
        hora_cita VARCHAR(100),
        nombre_veterinario VARCHAR(100),
        nombre_servicio VARCHAR(100),
        start DATE,
        end_date DATE,
        color VARCHAR(50),
        fyh_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        fyh_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    $pdo->exec($sql);
    
} catch (PDOException $e) {
    echo "Error al crear la tabla tb_reservas: " . $e->getMessage();
}


$sql = "
SELECT r.*, u.nombre_completo AS nombre_completo, u.email AS email 
FROM tb_reservas r
JOIN tb_usuarios u ON r.id_usuario = u.id_usuario";
$query = $pdo->prepare($sql);
$query->execute();
$reservas = $query->fetchAll(PDO::FETCH_ASSOC);

?>
