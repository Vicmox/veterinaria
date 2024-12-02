<?php
include '../../app/config.php';
include '../../admin/layout/parte1.php';
include '../../app/controllers/reservas/listado_reservas.php';


?>

<br>
<div class="container-fluid">
    <h1>Listado de citas</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Descargar en formato:</b></h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center">Nro</th>
                                <th style="text-align: center">Nombre de la mascota</th>
                                <th style="text-align: center">Correo del Cliente</th>
                                <th style="text-align: center">Fecha de la cita</th>
                                <th style="text-align: center">Hora de la cita</th>
                                <th style="text-align: center">Cliente</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $contador = 0;
                        foreach ($reservas as $reserva) {
                            $contador = $contador + 1;
                            ?>
                            <tr style="text-align: center" class="mt-2">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $reserva['nombre_mascota']; ?></td>
                                <td><?php echo $reserva['email']; ?></td>
                                <td><?php echo $reserva['fecha_cita']; ?></td>
                                <td><?php echo $reserva['hora_cita']; ?></td>
                                <td><?php echo $reserva['nombre_completo']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <br><br>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../../admin/layout/parte2.php';
include '../../admin/layout/mensaje.php';
?>

<<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, 
        "lengthChange": false, 
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>