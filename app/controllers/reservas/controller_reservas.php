<?php

include '../../../app/config.php';

$id_usuario = $_POST['id_usuario'];
$email = $_POST['email'];

$nombre_mascota = $_POST['nombre_mascota'];

$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
// $nombre_completo_sesion = = $_POST['nombre_mascota'];
$id_servicio = $_POST['id_servicio'];



$start = $fecha_cita;
$end_date = $fecha_cita;
$color = "#2324ff";

$fechaHoraActualizacion = '0000-00-00 00:00:00';

$sentencia = $pdo->prepare('INSERT INTO tb_reservas
(id_usuario, nombre_mascota, email, fecha_cita, hora_cita, id_servicio, start, end_date, color, fyh_creacion)
VALUES (:id_usuario, :nombre_mascota, :email, :fecha_cita, :hora_cita, :id_servicio, :start, :end_date, :color, :fyh_creacion)');


$sentencia->bindParam(':id_usuario', $id_usuario);
$sentencia->bindParam(':nombre_mascota', $nombre_mascota);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':fecha_cita', $fecha_cita);
$sentencia->bindParam(':hora_cita', $hora_cita);
$sentencia->bindParam(':id_servicio', $id_servicio);
$sentencia->bindParam(':start', $start);
$sentencia->bindParam(':end_date', $end_date);
$sentencia->bindParam(':color', $color);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registro la cita !! ";
    $_SESSION['icono'] = 'success';
    header('Location: ' . $URL . '/reservar.php');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar la cita";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/reservar.php');

}
