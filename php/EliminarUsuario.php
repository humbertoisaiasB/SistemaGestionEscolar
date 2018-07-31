<?php
  include ("Conexion.php");
  session_start();
  $asd = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Nom like '$_POST[input]%' limit 0,6");
  if(mysqli_num_rows($asd)>1){
    while ($row = mysqli_fetch_array($asd)) {
      echo '<div class="col-md-4" style="word-wrap:break-word";>';
      echo "<a class='thumbnail' onclick='mensajeAdmin(".$row['id_Usuario'].");' >";
      echo '<img src="../assets/Profiles/user.png"  width="180px" height="100px"><p>'.$row['Nom'].'</p><p>Tipo: '.$row['Tipo'].'</p></a>';
      echo '</div>';
    }
  }else if(mysqli_num_rows($asd)==1){
    $row = mysqli_fetch_array($asd);
    echo '<div class="col-md-4" style="word-wrap:break-word";>';
    echo '<a href="#" class="thumbnail" onclick="mensajeAdmin('.$row['id_Usuario'].');" >';
    echo '<img src="../assets/Profiles/user.png"  width="180px" height="100px"><p>'.$row['Nom'].'</p><p>Tipo: '.$row['Tipo'].'</p></a>';
    echo '</div>';
  }
 ?>