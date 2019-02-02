<?php
include("Conexion.php");
session_start();
$asd = mysqli_query($con,"select Nom,Ap,Contrasena,Am,id_Usuario,Tipo,Pais,Estado,Ciudad,Correo from usuarios where id_Usuario='$_POST[info]'");
  $row = mysqli_fetch_array($asd);
?>
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Consultar información</h4>
    </div>
   <div class="modal-body" align="center">
              <?php
                if($row['Tipo']=="Alumno"){
                echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                echo "<p><b>Tipo de usuario: </b>".$row['Tipo']."</p>";
                echo "<p><b>PW: </b>".$row['Contrasena']."</p>";
                }elseif($row['Tipo']=="Maestro") {
                  echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                  echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                  echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                  echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                  echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                  echo "<p><b>Tipo de usuario: </b>".$row['Tipo']."</p>";
                  echo "<p><b>PW: </b>".$row['Contrasena']."</p>";
                }elseif ($row['Tipo']=="PersonalA") {
                  echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                  echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                  echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                  echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                  echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                  echo "<p><b>Tipo de usuario: </b>Personal Administrativo</p>";
                  echo "<p><b>PW: </b>".$row['Contrasena']."</p>";
                }elseif ($row['Tipo'] == "Supervisor") {
                  echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                  echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                  echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                  echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                  echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                  echo "<p><b>Tipo de usuario: </b>".$row['Tipo']."</p>";
                  echo "<p><b>PW: </b>".$row['Contrasena']."</p>";
                }
                elseif ($row['Tipo'] == "SubDirector") {
                  echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                  echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                  echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                  echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                  echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                  echo "<p><b>Tipo de usuario: </b>".$row['Tipo']."</p>";
                  echo "<p><b>PW: </b>".$row['Contrasena']."</p>";
                }
                else {
                  echo "No pe".$row['Tipo'];
                }
                ?>
            </div>
  </div>
</div>