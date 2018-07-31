<?php
include("Conexion.php");
session_start();
$asd = mysqli_query($con,"select * from usuarios u,empleador ed,empresa e where e.id_Usuario=".$_SESSION['id']." and e.id_Empresa=ed.id_Empresa and u.id_Usuario=ed.id_Usuario and u.id_Usuario='$_POST[info]'");
$row = mysqli_fetch_array($asd);
?>
<div class="modal-dialog modal-sm">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Consultar información</h4>
    </div>
    <div class="modal-body">
  <font size="4"></font>
          <?php
              echo "<p><b>Nombre: </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
              echo "<p><b>Telefono del trabajo: </b>".$row['Trabajo']."</p>";
              echo "<p><b>Telefono celular: </b>".$row['Celular']."</p>";
              echo "<p><b>Correo: </b>".$row['Correo']."</p>";
              echo "<p><b>Pais: </b>".$row['Pais']."</p>";
              echo "<p><b>Estado: </b>".$row['Estado']."</p>";
              echo "<p><b>Ciudad: </b>".$row['Ciudad']."</p>";
              echo "<p><b>Colonia: </b>".$row['Colonia']."</p>";
              echo "<p><b>Calle: </b>".$row['Calle']."</p>";
              echo "<p><b>Sexo: </b>".$row['Sexo']."</p>";
              echo "<p><b>Departamento: </b>".$row['Departamento']."</p>";
           ?>
     </div>
  </div>
</div>
