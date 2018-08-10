<?php
  $cont = 10;
  /*
  if(preg_match('/[0-9a-zA-Z]{3,}/',$_POST['txt_Nom']) ){
    $cont=$cont-1;
  }
  if(preg_match('/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/',$_POST['txt_Ap']) ){
    $cont=$cont-1;
  }
  if(preg_match('/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/',$_POST['txt_Am']) ){
    $cont=$cont-1;
  }
  if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$_POST['txt_Correo']) ){
    $cont=$cont-1;
  }
  if(preg_match('/^[0-9]{6,8}$/',$_POST['txt_Teltrabajo']) ){
    $cont=$cont-1;
  }
  if(preg_match('/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/',$_POST['txt_TelCelular']) ){
    $cont=$cont-1;
  }
  if(preg_match('/[a-zA-Z]{4,}/',$_POST['txt_Departamento']) ){
    $cont=$cont-1;
  }
  if(preg_match('/^\d{4,5}$/',$_POST['txt_CP']) ){
    $cont=$cont-1;
  }
  if(preg_match('/[0-9a-zA-Z]{5,}/',$_POST['txt_Calle']) ){
    $cont=$cont-1;
  }
  if($_POST['txt_Pw']==$_POST['txt_Pw2'] ){
    $cont=$cont-1;
  }
  */
  $cont = 0;
  if($cont==0){
    echo '<p align="center"><input type="submit" class="btn btn-success" value="Registrar" name="btn_personalA"></p>';
  }else{
    echo '<p align="center"><button type="button" class="btn btn-danger" onmousemove="return validar3();">Check</button>';
  }

 ?>
