<?php
include '../../app/config.php';
include '../../admin/layout/parte1.php';?>

<div class="container-fluid">
  <h2>Creacion de un nuevo veterinario</h2>

  <div class="row">
    <div class="col-md-6">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h2 class="card-title"><b>Datos del usuario</b></h2>
        </div>
        <div class="card-body">
          <form action="../../app/controllers/veterinarios/create.php" method="post" onsubmit="return validateForm()">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Nombre completo<b>*</b></label>
                  <input type="text" name="nombre_veterinario" class="form-control" placeholder="Nombre completo" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Correo electronico <b>*</b></label>
                  <input type="email" name="email" class="form-control" placeholder="Correo electronico" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Celular<b>*</b></label>
                  <input type="text" name="contacto" class="form-control" placeholder="Celular" required pattern="\d{10}" title="El celular debe ser un número de 10 dígitos" maxlength="10">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Area de especializacion <b>*</b></label>
                  <input type="text" name="area_especializacion" class="form-control" placeholder="Area de especializacion" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Fecha de Ingreso</label><b> *</b>
                  <input type="date" name="fecha_de_ingreso" id="fecha_de_ingreso" class="form-control" required max="<?php echo date('Y-m-d'); ?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="activo">Estado Veterinario </label>
                  <span id="estadoTexto">Veterinario activo</span>
                  <br>
                  <hr>
                  <input type="checkbox" name="activo" id="activoCheckbox" class="form-control" checked>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-md-12">
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
                <input type="submit" class="btn btn-primary" value="Registrar veterinario">
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
      estadoTexto.textContent = checkbox.checked ? "Veterinario activo" : "Veterinario inactivo";
    }

    // Inicializar el texto basado en el estado inicial del checkbox
    actualizarTexto();

    // Escuchar el cambio del checkbox para actualizar el texto
    checkbox.addEventListener("change", actualizarTexto);
  });

  function validateForm() {
    var fechaIngreso = document.getElementById("fecha_de_ingreso").value;
    var today = new Date().toISOString().split('T')[0];

    if (fechaIngreso > today) {
      alert("La fecha de ingreso no puede ser una fecha futura.");
      return false;
    }

    var contacto = document.getElementsByName("contacto")[0].value;
    if (contacto.length !== 8 || isNaN(contacto)) {
      alert("El celular debe ser un número de 8 dígitos.");
      return false;
    }

    return true;
  }
</script>
