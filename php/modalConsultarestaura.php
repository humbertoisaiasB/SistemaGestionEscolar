<?php
//Aqui se hara el modal para restauarr y backup
include("Conexion.php");
$queso="Nada";
session_start();
$asd = mysqli_query($con,"select * from usuarios u,empleador ed,empresa e where e.id_Usuario=".$_SESSION['id']." and e.id_Empresa=ed.id_Empresa and u.id_Usuario=ed.id_Usuario and u.id_Usuario='$_POST[info]'");
$row = mysqli_fetch_array($asd);
if($_POST['info']==1){
  $queso = "<b>¡Bienvenido!</b>, tu estas en restauracion de datos.";
}
else{
  $queso="<b>¡Bienvenido!</b>";
}
?>
<div class="modal-dialog modal-sm">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;"><?php echo "$queso"?></h4>
    </div>
    <div class="modal-body">
  <font size="4"></font>
          <?php
              if($_POST['info']==1){
                //
                $hoy = getdate(); //La gecha
                echo "<p><b>Fecha de restaurarcion es : </p></b> <p>$hoy[weekday], $hoy[mday]/$hoy[month]/$hoy[mon]/$hoy[year]. Alas $hoy[hours]:$hoy[minutes]:$hoy[seconds].</p>";
                echo "<p><b>Ingrese la ruta de restaurarcion :</b></p>";
                echo "<form enctype='multipart/form-data' action='../php/subirBackup.php' class='center' method='POST'>
                      <input name='uploadedfile' type='file'/></br>
                      <input type='submit' value='Subir archivo'/>
                      </form>";
                
              }
              elseif ($_POST['info']==2) {
                  $hoy = getdate(); //La gecha
                echo "<p>Usted podra hacer una copia de seguridad por medio manual o se aplicara la automatica alas 00:00 horas de cada dia.";
                echo "<p><b>Fecha de realizacion del backup es : </p></b> <p>$hoy[weekday], $hoy[mday]/$hoy[month]/$hoy[mon]/$hoy[year]. Alas $hoy[hours]:$hoy[minutes]:$hoy[seconds].</p>";
                echo "<p><b>Ingrese la ruta donde ser guardada la copia de seguridad.</p></b>";
                echo "<form action='../php/guarda.php' method='post'>
                  <input href='Main.php' type='submit' class='btn btn-primary' name='botonArre' id='botonArre' value='Realiza la copia'>
                </form>";
                
              }
          ?>
     </div>
  </div>
</div>
