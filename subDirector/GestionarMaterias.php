<?php  
  include "../php/Conexion.php";
  session_start(); 
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ 
  header("Location: ../index.php");}
  $ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';
      $query1 = mysqli_query($con,"select id_Usuario,claveEscuela FROM usuarios WHERE id_Usuario=".$_SESSION['id']."");
      $val = mysqli_fetch_array($query1);
?>
   <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/Home.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="../assets/css/Mycss.css">
  <script type="text/javascript" src="../assets/bootstrap/js/jquery-3.1.1.js" ></script>
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../assets/JS/EmpleadorVal.js"></script>
  <script type="text/javascript" src="../assets/JS/EmpleadorUpdate.js"></script>
  <script type="text/javascript" src="../assets/JS/MyJS.js"></script>
  <script type="text/javascript" src="../assets/JS/sweetalert.js"></script>

</head>
<?php
  $variable = "'".$val['claveEscuela']."'";
?>
<body class="site" onload="return alumnosV('','PersonalA','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA2');">
  <main class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7">
              <ul class="nav nav-tabs">
                <li role="presentation" class="active" onclick="return alumnosV('','PersonalA','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA2');"> <a href="#Consultar" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Consultar personal de apoyo</a></li>
              </ul>
          </div>
          
        </div>  
        <div class="row">
            <div class="col-sm-7">
              <div class="tab-content"> 
                 <br>
                 <div class="tab-pane fade in active" id="Consultar">
                      <div class="col-sm-12 registro1 well">
                        <h1>Consultar personal de apoyo</h1>
                          <div class="input-group">
                            <input type="text" id="myInputA2" class="form-control" onkeyup="return alumnosV('','PersonalA','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA2');" placeholder="Buscar por el nombre">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" ariahaspopup="true" ariaexpanded="false">Filtros<span class="caret"></span></button>
                              <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                  <a href="#">Intendencia/a>
                                </li>
                                <li>
                                  <a href="#">Administrativo</a>
                                </li>
                                <li>
                                  <a href="#">Docente frente a grupo</a>
                                </li>
                              </ul>
                            </div>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                          </div>
                        </div><br><br>
                        <div id="ConsA2"></div>
                 </div>
               </div> 
            </div>
        </div>

      </div><!-- Container-Fluid -->    
  </main>  
  <div class="modal fade" id="Mod" role="dialog"></div>
</body>
</html>


