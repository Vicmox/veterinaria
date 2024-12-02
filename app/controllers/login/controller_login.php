<?php
include '../../config.php';
session_start();

if (isset($_SESSION['sesion_email'])) {
    session_destroy();
    header('Location: ' . $URL . '/');
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_usuarios WHERE email = :email";
$query = $pdo->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

if ($usuarios) {
    $usuario = $usuarios[0];
    $password_tabla = $usuario['password'];
    $cargo_tabla = $usuario['cargo'];

    if (password_verify($password, $password_tabla)) {
        session_start();
        $_SESSION['sesion_email'] = $email;

        if ($cargo_tabla == "ADMINISTRADOR") {
            header('Location: ' . $URL . '/admin');
        } else {
            header('Location: ' . $URL . '/');
        }
        exit();
    } else {
        session_start();
        $_SESSION['error_message'] = "Contraseña incorrecta, verifique sus datos.";
        header('Location: ' . $URL . '/login');
        exit();
    }
} else {
    session_start();
    $_SESSION['error_message'] = "Correo electrónico no registrado, verifique sus datos.";
    header('Location: ' . $URL . '/login');
    exit();
}
?>
