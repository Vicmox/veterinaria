<?php
include 'app/config.php';
include 'layout/parte1.php';

try {
  $sql = "SELECT * FROM tb_servicios";
  $query = $pdo->prepare($sql);
  $query->execute();
  $servicios = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error al consultar los datos de los servicios: " . $e->getMessage();
}

?>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>

      var a;
      var email_sesion = '<?php echo $email_sesion; ?>';

      document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            editable: true,
            selectable: true,
            allDaySlot: false,

            events: 'app/controllers/reservas/cargar_reservas.php',
            
            dateClick: function(info){
              a = info.dateStr;
              const fechaComoCadena = a;
              var numeroDia = new Date(fechaComoCadena).getDay();
              var dias = ["LUNES","MARTES","MIERCOLES","JUEVES","VIERNES"];

              if(email_sesion == ""){
                $("#modal_sesion").modal("show");
              } else {
                if( (numeroDia == "5") ){
                  alert("No hay atencion los dias sabados");
                }else if( (numeroDia == "6") ){
                    alert("No hay atencion los dias domingos");
                }else { 

                  $("#modal_reservas").modal("show");
                  $("#dia_de_la_semana").html(dias[numeroDia ] + " " + a);

                  var fecha = info.dateStr;
                  var res = "";
                  var url = 'app/controllers/reservas/verificar_horario.php';

                  $.get(url,{fecha:fecha},function (datos){
                    res = datos;
                    $('#respuesta_horario').html(res);
                  });
                    
                  }

              }

              

            }
          });
          calendar.render();
      });

    </script>


<section class="our-services">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
              <br><br>
              <h1 style="text-align: center">Reserva <b style="color: #0a58ca">una cita</b></h1>
              <br><br>
          </div>
      </div>
      <div class="row">
        <div id='calendar'></div>
      </div>
    </div>
</section>
<br>

<?php

include 'layout/parte2.php';
include 'admin/layout/mensaje.php';

?>

<div class="modal fade" id="modal_sesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><h3>Para reservar una cita, debe iniciar sesion o registrarse.</h3></p>
          <hr>
          <center>
            <div class="d-grid gap-2">
              <a href="<?php echo $URL;?>/login" type="button" class="btn btn-primary">Iniciar sesion</a>
              <a href="<?php echo $URL;?>/login/registro.php" type="button" class="btn btn-primary">Registrarse</a>              
            </div>
          </center>
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="modal_reservas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          <center><h2>Reserva tu cita</h2></center>
          <hr>
          <div class="row">
            <div id="respuesta_horario"> </div>
              <div class="col-md-6">
                    <center><b>Turno mañana</b></center>
                    <br>
                    <div class="d-grid gap-2">
                      <button type="button" class="btn btn-success mb-2" data-bs-dismiss="modal" id="btn_h1">08:00 - 09:00</button>
                      <button type="button" class="btn btn-success mb-2" data-bs-dismiss="modal" id="btn_h2">09:00 - 10:00</button>
                      <button type="button" class="btn btn-success mb-2" data-bs-dismiss="modal" id="btn_h3">10:00 - 11:00</button>
                      <button type="button" class="btn btn-success mb-2" data-bs-dismiss="modal" id="btn_h4">11:00 - 12:00</button>
                    </div>
                </div>
              <div class="col-md-6">                
                  <center><b>Turno tarde</b></center>
                  <br>
                  <div class="d-grid gap-2">
                      <button type="button" class="btn btn-success mb-2" data-bs-dismiss="modal" id="btn_h5">14:00 - 15:00</button>
                      <button type="button" class="btn btn-success mb-2" data-bs-dismiss="modal" id="btn_h6">15:00 - 16:00</button>
                      <button type="button" class="btn btn-success mb-2" data-bs-dismiss="modal" id="btn_h7">16:00 - 17:00</button>
                      <button type="button" class="btn btn-success mb-2" data-bs-dismiss="modal" id="btn_h8">17:00 - 18:00</button>
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <a href="" class="btn btn-primary">
            Escoger otra fecha
          </a>
        </div>
      </div>
  </div>
</div>



<div class="modal fade" id="modal_formulario" data-backdrop="static" data-keyword="false" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 50%;">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Reservar cita para el dia <span id="dia_de_la_semana"></span></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
              <form action="<?php echo $URL;?>/app/controllers/reservas/controller_reservas.php" method="post">
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Nombre del usuario</label>
                      <input type="text" class="form-control" value="<?php echo $nombre_completo_sesion;?>" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="">Correo electronico</label>
                      <input type="text" class="form-control" value="<?php echo $email_sesion;?>" disabled>
                      <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion;?>" hidden>
                    </div>
                  </div>     
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Fecha de reserva</label>
                      <input type="text" class="form-control" id="fecha_reserva" disabled>
                      <input type="text" name="fecha_cita" class="form-control" id="fecha_reserva2" hidden>
                    </div>
                    <div class="col-md-6">
                      <label for="">Hora de reserva</label>
                      <input type="text" class="form-control" id="hora_reserva" disabled>
                      <input type="text" name="hora_cita" class="form-control" id="hora_reserva2" hidden>
                    </div>
                  </div>
                  <br>             
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Nombre de la mascota</label>
                      <input type="text" name="nombre_mascota"class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Tipo de servicio</label>
                        <select name="id_servicio" id="id_servicio" class="form-control">
                            <?php foreach ($servicios as $servicio): ?>
                                <option value="<?php echo $servicio['id_servicio']; ?>">
                                    <?php echo $servicio['nombre_servicio'] . ' - $' . $servicio['precio']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                  </div>                  
              
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" >Registrar Cita</button>
        </div>
        </form>
      </div>
  </div>
</div>


<script>     
    $("#btn_h1").click(function () {
        $("#modal_formulario").modal("show");
        $("#fecha_reserva").val(a);
        $("#fecha_reserva2").val(a);
        var h1 = "08:00 - 09:00";
        $("#hora_reserva").val(h1);
        $("#hora_reserva2").val(h1);
    });

    $("#btn_h2").click(function () {
        $("#modal_formulario").modal("show");
        $("#fecha_reserva").val(a);
        $("#fecha_reserva2").val(a);
        var h2 = "09:00 - 10:00";
        $("#hora_reserva").val(h2);
        $("#hora_reserva2").val(h2);
    });

    $("#btn_h3").click(function () {
        $("#modal_formulario").modal("show");
        $("#fecha_reserva").val(a);
        $("#fecha_reserva2").val(a);
        var h3 = "10:00 - 11:00";
        $("#hora_reserva").val(h3);
        $("#hora_reserva2").val(h3);
    });

    $("#btn_h4").click(function () {
        $("#modal_formulario").modal("show");
        $("#fecha_reserva").val(a);
        $("#fecha_reserva2").val(a);
        var h4 = "11:00 - 12:00";
        $("#hora_reserva").val(h4);
        $("#hora_reserva2").val(h4);
    });





    $("#btn_h5").click(function () {
        $("#modal_formulario").modal("show");
        $("#fecha_reserva").val(a);
        $("#fecha_reserva2").val(a);
        var h5 = "14:00 - 15:00";
        $("#hora_reserva").val(h5);
        $("#hora_reserva2").val(h5);
    });

    $("#btn_h6").click(function () {
        $("#modal_formulario").modal("show");
        $("#fecha_reserva").val(a);
        $("#fecha_reserva2").val(a);
        var h6 = "15:00 - 16:00";
        $("#hora_reserva").val(h6);
        $("#hora_reserva2").val(h6);
    });

    $("#btn_h7").click(function () {
        $("#modal_formulario").modal("show");
        $("#fecha_reserva").val(a);
        $("#fecha_reserva2").val(a);
        var h7 = "16:00 - 17:00";
        $("#hora_reserva").val(h7);
        $("#hora_reserva2").val(h7);
    });

    $("#btn_h8").click(function () {
        $("#modal_formulario").modal("show");
        $("#fecha_reserva").val(a);
        $("#fecha_reserva2").val(a);
        var h8 = "17:00 - 18:00";
        $("#hora_reserva").val(h8);
        $("#hora_reserva2").val(h8);
    });
</script>