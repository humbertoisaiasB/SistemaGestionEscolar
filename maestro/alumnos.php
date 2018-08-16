<?php
  session_start();
  include '../php/Conexion.php';
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
    <script type="text/javascript" src="../assets/JS/sweetalert.js"></script>
        <script type="text/javascript" src="../assets/JS/MyJS.js"></script>
</head>
<body class="site" onload='return CEmpleos("","Modificar", "#RespM");' >
	<main class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7">
              <ul class="nav nav-pills">
                <li role="presentation" onclick="limpiar(); return CEmpleos('','Consultar','#RespC');" > <a href="#Consultar" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Consultar</a></li>
              </ul>
          </div>
        </div>  

        <div class="row">
            <div class="col-sm-7">

              <div class="tab-content">
                 <div class="tab-pane fade in active" id="Consultar">
                      <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                              <input id="txt_FindC" type="text" class="form-control" name="txt_FindM" placeholder="Buscar" onkeyup="return CEmpleos(this.value,'Consultar','#RespC');">
                            </div>
                          </div><br><br>
                          <div id="RespC"></div>
                 </div>
               </div> 
            </div>

            <div class="col-sm-5" id="EmpleoAlert"></div>

        </div>

      </div><!-- Container-Fluid -->    

	</main>
  <?php 
    if(isset($_GET["alert"]) && $_GET['alert']=="Yes"){
        echo '<script type="text/javascript">
          swal("Buen Trabajo!", "Empleo Agregado Correctamente!", "success");
      </script>';
    }else if(isset($_GET["alert"]) && $_GET['alert']=="Not"){
        echo '<script type="text/javascript">
          swal("Ha Ocurrido un error!", "Empleo no agregado!", "error");
      </script>'; 
    }
    if(isset($_GET["mod"]) && $_GET['mod']=="Yes"){
        echo '<script type="text/javascript">
          swal("Excelente!", "Empleo Modificado Correctamente!", "success");
          $("#Agregar").removeClass("in active");
          $("#Modificar").addClass("in active"); 
          $("#Add").removeClass("active");
          $("#Mod").addClass("active"); 
      </script>';
    }else if(isset($_GET["mod"]) && $_GET['mod']=="Not"){
        echo '<script type="text/javascript">
          swal("Ha Ocurrido un error!", "Empleo no modificado!", "error");
      </script>'; 
    }
  ?>


</body>
</html>
