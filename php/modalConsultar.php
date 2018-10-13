<?php
include("Conexion.php");
session_start();
$_SESSION['claveE'] = $_POST['info'];
?>
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Consultar información</h4>
    </div>
    <div class="modal-body">
          <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="../supervisor/GestionarAlumnos.php"></iframe>
          </div>
     </div>
  </div>
</div>
