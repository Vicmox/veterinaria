 <?php
include '../app/config.php';
include '../admin/layout/parte1.php';
include '../app/controllers/usuarios/listado_de_usuarios.php';
include '../app/controllers/productos/listado_de_productos.php';
include '../app/controllers/reservas/listado_reservas.php';
include '../app/controllers/servicios/listado_servicios.php';
include '../app/controllers/veterinarios/listado_veterinarios.php';
?>

  <br>
  <h2>Bienvenido al sistema - <?=$cargo_sesion;?></h2>
  <hr>
  
<div class="container-fluid">
  <div class="row">

  <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <?php
          $contador_de_servicios = 0;
          foreach ($servicios as $servicio) {
            $contador_de_servicios = $contador_de_servicios + 1;
          }
          ?>
          <h3><?=$contador_de_servicios;?></h3>

          <p>Servicios registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-">
            <i class="nav-icon fas fa-wrench"></i>
          </i>
        </div>
        <a href="<?=$URL."/admin/servicios";?>" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <?php
          $contador_de_reservas = 0;
          foreach ($reservas as $reserva) {
            $contador_de_reservas = $contador_de_reservas + 1;
          }
          ?>
          <h3><?=$contador_de_reservas;?></h3>

          <p>Citas registradas</p>
        </div>
        <div class="icon">
          <i class="ion ion-">
            <i class="bi bi-calendar-check-fill"></i>
          </i>
        </div>
        <a href="<?=$URL."/admin/reservas";?>" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- small box ------------------------------------------>

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <?php
          $contador_de_veterinarios = 0;
          foreach ($veterinarios as $veterinario) {
            $contador_de_veterinarios = $contador_de_veterinarios + 1;
          }
          ?>
          <h3><?=$contador_de_veterinarios;?></h3>

          <p>Veterinarios registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-">
            <i class="nav-icon fas fa-paw"></i>
          </i>
        </div>
        <a href="<?=$URL."/admin/veterinarios";?>" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- small box ------------------------------------------>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <?php
          $contador_de_usuario = 0;
          foreach ($usuarios as $usuario) {
            $contador_de_usuario = $contador_de_usuario + 1;
          }
          ?>
          <h3><?=$contador_de_usuario;?></h3>

          <p>Usuarios registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-">
            <i class="nav-icon fas fa-users"></i>
          </i>
        </div>
        <a href="<?=$URL."/admin/usuarios";?>" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-secondary">
        <div class="inner">
          <?php
          $contador_de_productos = 0;
          foreach ($productos as $producto) {
            $contador_de_productos = $contador_de_productos + 1;
          }
          ?>
          <h3><?=$contador_de_productos;?></h3>

          <p>Productos registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-">
            <i class="bi bi-basket"></i>
          </i>
        </div>
        <a href="<?=$URL."/admin/productos";?>" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    

    


  </div>
</div>  

<?php include '../admin/layout/parte2.php';
