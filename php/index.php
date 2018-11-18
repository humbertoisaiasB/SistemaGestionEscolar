<?php
    include 'Conexion.php';
    session_start(); 
    $name = $_SESSION['User'];
	$mensaje="";
     $contenido_html =  "<div>
              <p style='color:#F00'>
                Prueba realizada correctamente<strong><br>Esto en negrita.</strong><br>Cargando Imagen<br>
              </p>
              <p>Descargue aqui.   http://f2c.com.mx".$_POST['ruta1']."</p>
              <p>No responder a este mensaje. </p>
              </div>";
	if(isset($_POST["envio"])){
            include("php/envioCorreo.php");
            $email = new email("Noreply","humbertobernardino4@gmail.com","is@eslisto","".$_POST['ruta1'],"u","1");
            $email->agregar($_POST["email"],$_POST["nombre"]);
                        
            if ($email->enviar('Envio de documento.',$contenido_html)){
                            
                    $mensaje= 'Mensaje enviado'.$_POST['ruta1'];
                    echo '<script type="text/javascript">
                alert ("Correo enviado con exito.");
                window.location.assign("../maestro/buscar.php");
                </script>';
                exit;
                            
            }else{
                           
               $mensaje= 'Mensaje no enviado'.$_POST['ruta1'];
                    echo '<script type="text/javascript">
                alert ("Correo no enviado. error.");
                window.location.assign("../maestro/buscar.php");
                </script>';
                exit;
            }
			
}
?>
<!--Aqui va el modal para enviar documementos-->
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Enviar pdf a...</h4>
    </div>
    <div class="modal-body">
            <div class="panel panel-primary">
              <div class="panel-heading">De : <?php echo $name; ?></div>
              <div class="panel-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="application/x-www-form-urlencoded" name="envio">
                    <table>
                        <tr>
                            <td>
                                <label for="email">Email <?php echo $_SERVER['PHP_SELF']; ?></label>
                                <br>
                            </td>
                            <td>
                                <input type="text" name="email" id="email" class="form-control" placeholder="ejemplo@dominio.com" autofocus maxlength="50" size="20">
                            </td>
                            <td>
                                <label for="nombre"> Asunto</label>
                                <br>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Asunto" autofocus maxlength="50" size="20">
                                <input name="envio" value="si" hidden="hidden">
                                <?php $queso = strlen("'".$_POST['ruta']."'");
                                    $ñam = substr( "'".$_POST['ruta']."'" ,3, $queso );

                                ?>
                                 
                                <input type="text" name="ruta1" id="ruta1" value="<?php echo $ñam;?>" hidden="hidden">
                            </td>
                            <td>
                                <button id="envio" class="btn btn-info" type="submit">Enviar</button>
                            </td>

                        </tr>
                    </table>
                </form>
              </div>
              <div class="panel-footer">
                <?php
                    echo "<p>".$mensaje."</p>";
                ?>
              </div>
            </div>
     </div>
  </div>
</div>
