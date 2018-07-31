<?php
include ("Conexion.php");
if (isset($_POST['btn_Candidato'])){
  if(!mysqli_query($con,"insert into usuarios (Nom, Ap, Am, Casa, Celular, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia,Calle, Tipo)
  VALUES ('$_POST[txt_Nom]','$_POST[txt_Ap]','$_POST[txt_Am]','$_POST[txt_Telcasa]','$_POST[txt_Telcelular]','$_POST[txt_Correo]','$_POST[txt_Psw]','$_POST[txt_CP]','$_POST[Sl_Pais]', '$_POST[Sl_Estado]', '$_POST[Sl_Ciudad]' , '$_POST[Sl_Colonia]','$_POST[txt_Calle]','Candidato')")){
    echo '<script type="text/javascript">
       alert ("Ha Ocurrido un error");
    window.location.assign("../Registro.php");
    </script>';
    exit;
  }

  function calcutateAge($dob){
        $dob = date("Y-m-d",strtotime($dob));
        $dobObject = new DateTime($dob);
        $nowObject = new DateTime();
        $diff = $dobObject->diff($nowObject);
        return $diff->y;
}
  $Edad = calcutateAge("$_POST[Sl_Anio]-$_POST[Sl_Mes]-$_POST[Sl_Dia]");

  $Last_id=mysqli_insert_id($con);
  if(!mysqli_query($con,"insert into candidato(id_Usuario, Dia,Mes,Ano,Curp,Sexo,Edad,Nivel_estudio)
  VALUES ('$Last_id','$_POST[Sl_Dia]','$_POST[Sl_Mes]','$_POST[Sl_Anio]','$_POST[txt_Curp]','$_POST[Sl_Sexo]','$Edad','$_POST[Sl_Estudio]')")){
    echo '<script type="text/javascript">
       alert ("Ha Ocurrido un error");
    window.location.assign("../Registro.php");
    </script>';
    exit;
  }

  echo '<script type="text/javascript">
       alert ("Registrado Correctamente");
    window.location.assign("../index.php");
    </script>';
    exit;
}

 ?>
