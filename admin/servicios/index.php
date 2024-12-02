<?php
include '../../app/config.php';
include '../../admin/layout/parte1.php';
include '../../app/controllers/servicios/listado_servicios.php';
?>

<?php
// Obtener la lista de servicios junto con los nombres de los veterinarios
try {
    $sql = "
    SELECT s.id_servicio, s.nombre_servicio, s.descripcion, s.precio, v.nombre_veterinario AS nombre_veterinario
    FROM tb_servicios s
    JOIN tb_veterinarios v ON s.id_veterinario = v.id_veterinario";
    $stmt = $pdo->query($sql);
    $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener la lista de servicios: " . $e->getMessage();
}
?>

<br>
<div class="container-fluid">
    <h1>Listado de servicios</h1>

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
                                <th style="text-align: center">Nombre del servicio</th>
                                <th style="text-align: center">Descripción del servicio</th>
                                <th style="text-align: center">Precio del servicio</th>
                                <th style="text-align: center">Veterinario asignado</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 0;
                            foreach ($servicios as $servicio) {
                                $contador++;
                                $id_servicio = $servicio['id_servicio'];
                                ?>
                                <tr style="text-align: center" class="mt-2">
                                    <td><center><?=$contador;?></center></td>
                                    <td><?=$servicio['nombre_servicio'];?></td>
                                    <td><?=$servicio['descripcion'];?></td>
                                    <td>$<?=$servicio['precio'];?></td>
                                    <td><?=$servicio['nombre_veterinario'];?></td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="show.php?id_servicio=<?php echo $id_servicio; ?>" class="btn btn-info mx-1 my-3 rounded"><i class="bi bi-eye-fill"></i> </a>
                                            <a href="update.php?id_servicio=<?php echo $id_servicio; ?>" type="button" class="btn btn-success mx-1 my-3 rounded"><i class="bi bi-pencil-square"></i> </a>
                                            <a href="delete.php?id_servicio=<?php echo $id_servicio; ?>" type="button" class="btn btn-danger mx-1 my-3 rounded"><i class="bi bi-trash3-fill"></i> </a>
                                        </div>
                                    </td>
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

