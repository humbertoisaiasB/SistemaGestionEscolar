<?php
//Aqui se hara el modal para restauarr y backup
include("../php/Conexion.php");
session_start();
$hoy = getdate(); //La gecha
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/Home.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="../assets/css/Mycss.css">
    <script type="text/javascript" src="../assets/bootstrap/js/jquery-3.1.1.js" ></script>
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/JS/MyJS.js"></script>

</head>
<body class="site" >
	 
  <main class="content">
    <div class="container-fluid">
        <div class="row"> <!--Abre primer Row --> 
            <div class="col-sm-7"> <!--Abre col-sm-7  -->
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#gs" data-toggle="tab" onclick="return Solicitudes();">Guardar en el servidor</a></li>
                  <li ><a href="#gn" data-toggle="tab" >Guardar en la nube</a></li>
                </ul>
                <p></p>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="gs" > 
                         <div class="col-sm-12" onload=""> 
                            <div class="jumbotron">
                              <div class="container">
                                <h1>¡Bienvenido! <small>Administrador</small></h1>
                                <?php  
                                  echo "<p><b>Fecha de realizacion del backup es : </p></b> <p>$hoy[weekday], $hoy[mday]/$hoy[month]/$hoy[year]. Alas $hoy[hours]:$hoy[minutes]:$hoy[seconds].</p>";
                                    echo "<p><b>Precione el boton para la realizacion de la copia de seguridad</p></b>";
                                    echo "<form action='../php/guarda.php' method='post'>
                                        <input href='Main.php' type='submit' class='btn btn-primary' name='botonArre' id='botonArre' value='Realiza la copia'>
                                      </form>";
                                ?>
                              </div>
                            </div>
                         </div>
                         <br></br>
                          <div id="SAgendar"></div>
                       
                    </div>
                    <div class="tab-pane fade" id="gn"> 
                          <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                              <input id="txt_FindC" type="text" class="form-control" name="txt_FindC" placeholder="Buscar">
                            </div>
                          </div>
                          <br></br>
                    </div>
                </div>

            </div> <!--Cierra col-sm-7  -->

            <div class="col-sm-5"> <!--Abre col-sm-5  -->
              <div class="panel panel-primary">
                                  <div class="panel-heading">Copias de seguridad</div>
                                  <div class="panel-body">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Nombre asignado.</th>
                                          <th>fecha en que se realizo.</th>
                                          <th>Descargar</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php  
                                            $directorio = opendir("../php/myphp-backup-files"); //ruta actual
                                            $hoy = getdate(); //La gecha
                                            $fecha = "";
                                            $cadenaAño="201";
                                            $posi="";
                                            while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
                                            {
                                                if (!is_dir($archivo))//verificamos si es o no un directorio
                                                { 
                                                    $fecha = substr($archivo, 4,10);
                                                    echo  '<tr>
                                                            <td>'.$archivo.'</td>
                                                            <td>'.$fecha.'</td>
                                                            <td><input onclick="return descargaA('."'".'../php/myphp-backup-files/'.$archivo.''."'".','."'".'#listo'."'".');" type="submit" class="btn btn-primary" name="botonArre" id="botonArre" value="Descargar"></td>
                                                            <td></td>
                                                          </tr>';
                                                }
                                            }
                                        ?>
                                      </tbody>
                                      <div id="listo">
                                      
                                      </div>
                                    </table>
                                </div>
                            </div>
            </div> <!--Cierra col-sm-7  -->
        </div> <!--Cierra primer Row -->
        
    </div> 
  </main>  
  
  <div id="InfoAlert" class="modal fade" role="dialog">
    

  </div>
</body>
</html>