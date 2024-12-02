<?php

$sql = "SELECT * FROM tb_veterinarios 
        WHERE id_veterinario = '$id_veterinario' ";

$query = $pdo->prepare($sql);
$query->execute();
$veterinarios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($veterinarios as $veterinario) {
    $nombre_veterinario = $veterinario['nombre_veterinario'];
    $email = $veterinario['email'];
    $contacto = $veterinario['contacto'];
    $area_especializacion = $veterinario['area_especializacion'];
    $fecha_de_ingreso = $veterinario['fecha_de_ingreso'];
    $activo = $veterinario['activo'];
}
