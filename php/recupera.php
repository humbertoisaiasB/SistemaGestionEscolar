<?php 
	include "Conexion.php";
	include("php/envioCorreo.php");
	if(isset($_POST['correo'])){
		$query1 = mysqli_query($con,"select Tipo, Contraseña from usuarios WHERE Correo='$_POST[correo]'");
      	$val = mysqli_fetch_array($query1);
      	if($val['Tipo']=="Alumno"){
      		$query2 = mysqli_query($con,"select curpAlumno from alumnos WHERE curpAlumno='$_POST[curp]'");
      		$val1 = mysqli_fetch_array($query2);
      		if($val1==$_POST['curp']){

            $email = new email("Noreply","humbertobernardino4@gmail.com","is@eslisto","","'".$val['Contraseña']."'","2");
            $email->agregar($_POST["correo"],"Recuperación.");
                        
            if ($email->enviar('Envio de documento.',$contenido_html)){
                            
                    $mensaje= 'Mensaje enviado'.$_POST['ruta1'];
                    echo '<script type="text/javascript">
                alert ("$mensaje.");
                </script>';
                exit;
                            
            }else{
                           
               $mensaje= 'El mensaje no se pudo enviar';
               $email->ErrorInfo;
               echo '<script type="text/javascript">
                alert ("Fallo.");
                </script>';
                exit;
            }
      			echo '<script type="text/javascript">
                alert ("Enviando contraseña.");
                window.location.assign("../index.php");
                </script>';
                exit;
      		}
      	}
	}else{
		echo '<script type="text/javascript">
                alert ("Oh no.");
                window.location.assign("recuperacion.php");
                </script>';
                exit;
	}
 ?>