<?php
include '../app/config.php';
include '../layout/parte1.php';
include '../app/controllers/productos/listado_de_productos.php';
?>

<div class="container">
    <br><br>
    <center>
        <h1>Regístrate</h1><br>
    </center>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Verifica tus datos
                </div>
                <div class="card-body">
                    <form action="../app/controllers/login/controller_registro.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre del usuario</label>
                                    <input type="text" name="nombre_completo" class="form-control">
                                </div>
                            </div>                    
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Correo electrónico</label>
                                    <input type="email" class="form-control" name="email" maxlength="35">
                                </div>
                            </div>                    
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre de mascota</label>
                                    <input type="text" class="form-control" name="nombre_mascota">
                                </div>
                            </div>                    
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <input type="password" id="password" class="form-control" name="password" maxlength="40" onkeyup="checkPasswordStrength('password', 'password-strength');">
                                    <div id="password-strength" class="strength-bar"></div>
                                </div>
                            </div>                    
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Repita contraseña</label>
                                    <input type="password" id="password_repetido" class="form-control" name="password_repetido" maxlength="40" onkeyup="checkPasswordStrength('password_repetido', 'repeat-password-strength');">
                                    <div id="repeat-password-strength" class="strength-bar"></div>
                                </div>
                            </div>                    
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="submit">Registrarme</button>  
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </form>                
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    <br><br>

<?php
include '../layout/parte2.php';
include '../admin/layout/mensaje.php';
?>

<style>
    .strength-bar {
        height: 10px;
        border-radius: 5px;
        margin-top: 5px;
        background-color: #e0e0e0;
        transition: background-color 0.3s ease, width 0.3s ease;
    }

    .strength-bar.basic {
        width: 33%;
        background-color: #ff4d4d;
    }

    .strength-bar.intermediate {
        width: 66%;
        background-color: #ffcc00;
    }

    .strength-bar.strong {
        width: 100%;
        background-color: #66cc66;
    }
</style>

<script>
    function checkPasswordStrength(inputId, strengthBarId) {
        var password = document.getElementById(inputId).value;
        var strengthBar = document.getElementById(strengthBarId);
        
        // Resetea la clase de la barra de fuerza
        strengthBar.className = 'strength-bar';

        // Contraseña fuerte
        if (password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password) && /[@$!%*?&#]/.test(password)) {
            strengthBar.classList.add('strong');
        }
        // Contraseña intermedia
        else if (password.length >= 6 && /[A-Z]/.test(password) && /[0-9]/.test(password)) {
            strengthBar.classList.add('intermediate');
        }
        // Contraseña básica
        else if (password.length > 0) {
            strengthBar.classList.add('basic');
        }
    }
</script>

