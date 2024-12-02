<?php
include '../../../app/config.php';

$id_veterinario = $_POST['id_veterinario'];
$nombre_veterinario = $_POST['nombre_veterinario'];
$contacto = $_POST['contacto'];
$area_especializacion = $_POST['area_especializacion']; 
$activo = isset($_POST['activo']) ? 1 : 0;

$sentencia = $pdo->prepare("UPDATE tb_veterinarios
SET nombre_veterinario = :nombre_veterinario,
    contacto = :contacto,
    area_especializacion = :area_especializacion,
    activo = :activo 
    WHERE id_veterinario = :id_veterinario");

$sentencia->bindValue(':nombre_veterinario', $nombre_veterinario);
$sentencia->bindValue(':contacto', $contacto);
$sentencia->bindValue(':area_especializacion', $area_especializacion);
$sentencia->bindValue(':id_veterinario', $id_veterinario);
$sentencia->bindValue(':activo', $activo);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el veterinario correctamente";
    $_SESSION['icono'] = 'success';
    header('Location: ' . $URL . '/admin/veterinarios/');
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo actualizar al veterinario";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/veterinarios/update.php?id_veterinario=' . $id_veterinario);
}
?>
