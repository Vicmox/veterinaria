<?php
include '../../app/config.php';
include '../../admin/layout/parte1.php';

$id_veterinario = $_GET['id_veterinario'];
include '../../app/controllers/veterinarios/datos_del_veterinario.php';
?>
    <br>
    <div class="container-fluid">
        <h1>Actualización del veterinario <?php echo $nombre_veterinario; ?></h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos del veterinario</b></h3>
                    </div>
                    <div class="card-body">
                        <form action="../../app/controllers/veterinarios/update.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nombre completo <b>*</b></label>
                                        <input type="text" name="nombre_veterinario" value="<?php echo $nombre_veterinario; ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Correo electronico <b>*</b></label>
                                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Celular </label>
                                        <input type="text" name="contacto" class="form-control" value="<?php echo $contacto; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Area Especializacion</label>
                                        <input type="text" name="area_especializacion" class="form-control" value="<?php echo $area_especializacion; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="activo">Estado del veterinario:</label>
                                        <span id="estadoTexto"><?php echo $activo ? 'Veterinario Activo' : 'Veterinario Inactivo'; ?></span>
                                        <br>
                                        <hr>
                                        <input type="checkbox" id="activoCheckbox" name="activo" class="form-control" <?php echo $activo ? 'checked' : ''; ?>>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <input type="hidden" name="id_veterinario" value="<?php echo $id_veterinario; ?>">
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                    <input type="submit" class="btn btn-success" value="Actualizar veterinario">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include '../../admin/layout/parte2.php';
include '../../admin/layout/mensaje.php';
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var checkbox = document.getElementById("activoCheckbox");
        var estadoTexto = document.getElementById("estadoTexto");

        function actualizarTexto() {
            estadoTexto.textContent = checkbox.checked ? "Veterinario Activo" : "Veterinario Inactivo";
        }

        // Escuchar el cambio del checkbox para actualizar el texto
        checkbox.addEventListener("change", actualizarTexto);
    });
</script>