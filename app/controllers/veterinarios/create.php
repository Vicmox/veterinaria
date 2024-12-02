<?php
include '../../../app/config.php';

// Recibir datos del formulario
$nombre_veterinario = $_POST['nombre_veterinario'];
$email = $_POST['email'];
$contacto = $_POST['contacto'];
$area_especializacion = $_POST['area_especializacion'];
$fecha_de_ingreso = $_POST['fecha_de_ingreso'];

$activo = isset($_POST['activo']) ? 1 : 0; 

try {
    // Consulta preparada para insertar un nuevo veterinario
    $sql = "INSERT INTO tb_veterinarios (nombre_veterinario, email, contacto, area_especializacion, fecha_de_ingreso, activo)
            VALUES (:nombre_veterinario, :email, :contacto, :area_especializacion, :fecha_de_ingreso, :activo)";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':nombre_veterinario', $nombre_veterinario);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':contacto', $contacto);
    $sentencia->bindParam(':area_especializacion', $area_especializacion);
    $sentencia->bindParam(':fecha_de_ingreso', $fecha_de_ingreso);
    $sentencia->bindParam(':activo', $activo);
    
    // Ejecutar la consulta
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se registró el veterinario exitosamente";
        $_SESSION['icono'] = 'success';
        header('Location: ' . $URL . '/admin/veterinarios');
        exit();
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error, no se pudo registrar al veterinario en la base de datos";
        $_SESSION['icono'] = 'error';
        header('Location: ' . $URL . '/admin/veterinarios/create.php');
        exit();
    }
} catch (PDOException $e) {
    echo "Error al insertar el veterinario: " . $e->getMessage();
}
?>
