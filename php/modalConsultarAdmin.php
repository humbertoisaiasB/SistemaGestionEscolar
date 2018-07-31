<?php
session_start();
include 'Conexion.php';
//if ('$_POST[es]'=="empleo") {
  //$asd = mysqli_query($con,"select em.id_Empresa, u.Tipo, u.Nom, u.Ap, u.Am, em.Sexo, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle
  //FROM empleador AS em 
  //INNER JOIN usuarios AS u ON ( em.id_Usuario = u.id_Usuario ) 
  //INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador AND e.id_Empleador=em.id_Empleador) where em.id_Empleador=e.id_Empleador and u.id_Usuario='$_POST[info]'");
  $asd = mysqli_query($con,"select Nom,Ap,Am,id_Usuario,Tipo,Pais,Estado,Ciudad,Correo from usuarios where id_Usuario='$_POST[info]'");
  $row = mysqli_fetch_array($asd);
  //if ($row['Tipo'] == "Empresa") {
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
              if ($row['Tipo'] == "Alumno") {
                echo "<p><b>Nombre: </b>".$row['Nom']."</p>";
                echo "<p><b>Apeido paterno: </b>".$row['Ap']."</p>";
                echo "<p><b>Apeido materno: </b>".$row['Am']."</p>";
                echo "<p><b>Correo Electronico: </b>".$row['Correo']."</p>";
                echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                echo "<p><b>Ciudad: </b>".$row['Ciudad']."</p>";
                //echo "<p><b>Colonia: </b>".$row['Colonia']."</p>";
                echo "<p><b>Correo: </b>".$row['Correo']."</p>";
              }
              elseif ($row['Tipo'] == "Maestro") {
                echo "<p><b>Nombre: </b>".$row['Nom']."</p>";
                echo "<p><b>Apeido paterno: </b>".$row['Ap']."</p>";
                echo "<p><b>Apeido materno: </b>".$row['Am']."</p>";
                echo "<p><b>Correo Electronico: </b>".$row['Correo']."</p>";
                echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                echo "<p><b>Ciudad: </b>".$row['Ciudad']."</p>";
                //echo "<p><b>Colonia: </b>".$row['Colonia']."</p>";
                echo "<p><b>Correo: </b>".$row['Correo']."</p>";
              }
              elseif ($row['Tipo'] == "PersonalA") {
                echo "<p><b>Nombre: </b>".$row['Nom']."</p>";
                echo "<p><b>Apeido paterno: </b>".$row['Ap']."</p>";
                echo "<p><b>Apeido materno: </b>".$row['Am']."</p>";
                echo "<p><b>Correo Electronico: </b>".$row['Correo']."</p>";
                echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                echo "<p><b>Ciudad: </b>".$row['Ciudad']."</p>";
                echo "<p><b>Correo: </b>".$row['Correo']."</p>";
              }
          ?>
     </div>
  </div>
</div>
<?php  
  //}

//}

            //echo '<p>'.$_POST['es'].'</p>'; 
            /*echo '<div class="col-md-6" style="word-wrap:break-word; display: inline-table;">';
            echo '<ul class="list-unstyled">';
            if(mysqli_num_rows($asd)>1){
              
              while ($row = mysqli_fetch_array($asd)) {
                //echo '<div class="col-md-4" style="word-wrap:break-word";>';
                echo '<li>';
                echo '<a data-toggle="modal" data-target="#Mod" class="thumbnail">';
                echo '<img src="../assets/Profiles/user.png"  width="180px" height="100px"><p>'.$row['Nom'].'</p><p>Tipo : '.$row['cont'].'</p></a>';
                echo '</li>';
              } 
              
            }else if(mysqli_num_rows($asd)==1){
              $row = mysqli_fetch_array($asd);
              echo '<div class="col-md-4" style="word-wrap:break-word";>';
              echo '<a  data-toggle="modal" data-target="#Mod" class="thumbnail">';
              echo '<img src="../assets/Profiles/user.png"  width="180px" height="100px"><p>'.$row['Nom'].'</p><p>Tipo : '.$row['cont'].'</p></a>';
              echo '</div>';
            }*/

             /* if ($row['Tipo'] == "Empresa") {
                echo "<p><b>Nombre: </b>".$row['Nom']."</p>";
                echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                echo "<p><b>Ciudad: </b>".$row['Ciudad']."</p>";
                //echo "<p><b>Colonia: </b>".$row['Colonia']."</p>";
                echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                echo "<button onclick='mensajeAdmin(".$row['id_Usuario'].");' >¿Eliminar?</button>";
              }
              elseif ($row['Tipo'] == "Empleador") {
                echo "<p><b>Nombre: </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                echo "<p><b>Ciudad: </b>".$row['Ciudad']."</p>";
                //echo "<p><b>Colonia: </b>".$row['Colonia']."</p>";
                echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                echo "<button onclick='mensajeAdmin(".$row['id_Usuario'].");' >¿Eliminar?</button>";
              }
              elseif ($row['Tipo'] == "Candidato") {
                echo "<p><b>Nombre: </b>".$row['Nom']."</p>";
                echo "<button onclick='mensajeAdmin(".$row['id_Usuario'].");' >¿Eliminar?</button>";
              }
              //
              //echo "<p><b>Tipo: </b>".$row['Tipo'].;
              //echo "<p><b>Telefono del trabajo: </b>".$row['Trabajo']."</p>";
              //echo "<p><b>Telefono celular: </b>".$row['Celular']."</p>";
              //
              //echo "<p><b>Estado: </b>".$row['Estado']."</p>";
              //echo "<p><b>Ciudad: </b>".$row['Ciudad']."</p>";
              //echo "<p><b>Colonia: </b>".$row['Colonia']."</p>";
              //echo "<p><b>Calle: </b>".$row['Calle']."</p>";
              //echo "<p><b>Sexo: </b>".$row['Sexo']."</p>";
              //echo "<p><b>Departamento: </b>".$row['Departamento']."</p>";
              */
           ?>
           