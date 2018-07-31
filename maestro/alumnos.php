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
                <li role="presentation" class="active" onclick="limpiar();" id="Add"><a href="#Agregar" data-toggle="tab"><img src="../assets/images/Agregar.png"  height="30px" width="30px" > Agregar</a></li>
                <li role="presentation" onclick="limpiar(); return CEmpleos('','Consultar','#RespC');" > <a href="#Consultar" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Consultar</a></li>
                <li role="presentation" onclick="limpiar(); return CEmpleos('','Modificar','#RespM'); " id="Mod"><a href="#Modificar" data-toggle="tab"><img src="../assets/images/Modificar.png"  height="30px" width="30px" > Modificar</a></li>
                <li role="presentation" onclick="limpiar(); return CEmpleos('','Eliminar','#RespE'); "><a href="#Eliminar" data-toggle="tab"><img src="../assets/images/Eliminar.png"  height="30px" width="30px" > Eliminar</a></li>
              </ul>
          </div>
          <?php
          session_start();
          include '../php/Conexion.php';
           $sql=mysqli_query($con,"select count(*) as kk from empleo where id_Empleador=".$_SESSION['id_Empleador'] ); 
           $row=mysqli_fetch_array($sql);
           $sql2=mysqli_query($con,"select Nom from empresa em, empleador el, usuarios u where em.id_Usuario=u.id_Usuario and el.id_Empresa=em.id_Empresa and el.id_Usuario=".$_SESSION['id']);
           $row2=mysqli_fetch_array($sql2);
           ?>
            <div class="col-sm-2">
               <h4><span class="label label-danger">Num. Empleos: <?php echo $row['kk']; ?></span></h4>
            </div>
            <div class="col-sm-3">
               <h4><span class="label label-success">Empresa: <?php echo $row2['Nom']; ?></span></h4>
            </div>
        </div>  

        <div class="row">
            <div class="col-sm-7">

              <div class="tab-content">
                <div class="tab-pane fade in active" id="Agregar">
                    <div class="panel panel-success">
                      <div class="panel-heading">Agregar Empleo</div>
                      <div class="panel-body">
                          <form action="../php/AddEmpleo.php" method="POST">
                                <div id="div_Puesto">
                                  <label>Puesto:</label><input id="txt_puesto" type="text" class="form-control" name="txt_puesto"><span id="" ></span>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <label>Puestos Disponibles:</label>
                                    <select class="form-control" id="" name="sl_PuestosD" onmousedown="if(this.options.length>5){this.size=5;}" onchange="this.blur()" onblur="this.size=0;">
                                    <?php for($var=1; $var<=50; $var++){
                                        echo "<option>".$var." </option>";
                                      }?>
                                    </select></div>
                                    <div class="col-sm-6">
                                      <label>Turno:</label>
                                    <select class="form-control" id="" name="sl_Turno" >
                                        <option>Matutino</option>
                                        <option>Vespertino</option>
                                    </select></div>
                                </div>
                                <label>Sueldo:</label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                  <input id="txt_Sueldo" type="text" class="form-control" name="txt_Sueldo" >
                                </div>
                                  <div id="div_descripcion" >
                                  <label>Descripción: </label><input id="txt_Desc" type="text" class="form-control" name="txt_Desc" ><span id="" ></span>
                                </div>
                                <br>
                                <p align="center"><input type="submit" class="btn btn-success" value="Agregar Empleo" name="btn_empleo"></p>
                          </form>
                      </div>
                    </div>
                 </div> 
                 <br>
                 <div class="tab-pane fade" id="Consultar">
                      <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                              <input id="txt_FindC" type="text" class="form-control" name="txt_FindM" placeholder="Buscar" onkeyup="return CEmpleos(this.value,'Consultar','#RespC');">
                            </div>
                          </div><br><br>
                          <div id="RespC"></div>
                 </div>

                 <div class="tab-pane fade"  id="Modificar">
                    <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                              <input id="txt_FindM" type="text" class="form-control" name="txt_FindM" placeholder="Buscar" onkeyup="return CEmpleos(this.value,'Modificar','#RespM');">
                            </div>
                          </div><br><br>
                          <div id="RespM"></div>
                 </div>
                <div class="tab-pane fade" id="Eliminar">
                      <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                              <input id="txt_FindE" type="text" class="form-control" name="txt_FindM" placeholder="Buscar" onkeyup="return CEmpleos(this.value,'Eliminar','#RespE');">
                            </div>
                          </div><br><br>
                          <div id="RespE"></div>
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
