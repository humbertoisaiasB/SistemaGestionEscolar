
   <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
<body class="site" onload="return CEmpleosAdmin('','','Consultar','Administrador','','#ConsA2'); return CEmpleosAdmin('','','Eliminar','Administrador','','#ConsA');">
  <main class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7">
              <ul class="nav nav-tabs">
                <li role="presentation" class="active" onclick="return CEmpleosAdmin('','','Consultar','Administrador','','#ConsA2');"> <a href="#Consultar" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Consultar</a></li>
                <li role="presentation" onclick="return CEmpleosAdmin('','','Eliminar','Administrador','','#ConsA');"><a href="#Eliminar" data-toggle="tab"><img src="../assets/images/Eliminar.png"  height="30px" width="30px" > Eliminar</a></li>
                <li role="presentation" onload="return validar5();"><a href="#Agregar" onclick="return validad5();" data-toggle="tab"><img src="../assets/images/agregar.png"  height="30px" width="30px" > Agregar Supervisor</a></li>
              </ul>
          </div>
          
        </div>  

        <div class="row">
            <div class="col-sm-7">

              <div class="tab-content"> 
                 <br>
                 <div class="tab-pane fade in active" id="Consultar">
                      <div class="col-sm-12 busca well">
                        <h1>Consultar usuario</h1>
                          <div class="input-group">
                            <input type="text" id="myInputA2" class="form-control" onkeyup="return CEmpleosAdmin('',this.value,'Consultar','Administrador','','#ConsA2');" placeholder="Buscar por el nombre">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" ariahaspopup="true" ariaexpanded="false">Filtros<span class="caret"></span></button>
                            </div>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                          </div>
                        </div><br><br>
                        <div id="ConsA2"></div>
                 </div>
                <div class="tab-pane fade" id="Eliminar">
                      <div class="col-sm-12 busca well">
                        <h1>Eliminar usuario</h1>
                            <div class="input-group">
                              <input type="text" id="myInputA" class="form-control" onkeyup="return CEmpleosAdmin('',this.value,'Eliminar','Administrador','','#ConsA');" placeholder="Buscar por el nombre">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" ariahaspopup="true" ariaexpanded="false">Filtros<span class="caret"></span></button>
                              </div>
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            </div>
                          </div><br><br>
                          <div id="ConsA"></div>
                 </div>
                 <div class="tab-pane fade" id="Agregar">
                      <div class="row">
                  <div class="col-md-12" align="center"></div>
                    <div class="col-md-12"><br>
                    <div class="registro1" align="center">
                      <div class="panel-body" align="center">
                        <div class="titulo" align="center">
                          <h3>
                            Registro Supervisor
                          </h3>
                        </div>
                        <!-- Aqui tenemos que empresa desaparecera y ahora sera alumnos-->
                        <form  action="../php/AddSupervisor.php" method="POST">
                          <div id="div_NomSupervisor">
                            <label>Nombre:</label><input id="txt_NomSupervisor" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomSupervisor',this.value);NomValid(this);"  type="text" class="form-control" name="txt_NomSupervisor"><span id="span_NomSupervisor" ></span>
                          </div>
                          <div id="div_ApSupervisor">
                            <label>Apellido paterno:</label><input id="txt_ApSupervisor" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,25}$/,'ApSupervisor',this.value);NomValid(this);" type="text" class="form-control"  name="txt_ApSupervisor"><span id="span_ApSupervisor" ></span>
                          </div>
                          <div id="div_AmSupervisor">
                            <label>Apellido materno:</label><input id="txt_AmSupervisor" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,25}$/,'Am',this.value);NomValid(this);" type="text" class="form-control" name="txt_Am"><span id="span_Am" ></span>
                          </div>
                          <div id="div_CorreoSupervisor">
                            <label>Correo:</label><input id="txt_CorreoSupervisor" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoSupervisor',this.value); return validar5()" type="email" class="form-control" name="txt_CorreoSupervisor" required><span id="span_CorreoSupervisor" ></span>
                          </div>
                          <div id="div_ZonaSupervisor" class="row">
                            <div class="col-2">
                              <div class="btn-group btn-lg" role="group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Zona escolar
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php
                                    for($i=1; $i<=56; $i++){
                                      echo '<li value="'.$i.'"><a onclick="return zonaRD('.$i.','."'".''."Alumno"."'".','."'"."#zonaY"."'".');">'.$i.'</a></li>';
                                    }
                                    ?>
                                </ul>
                              </div>
                              <div id="claveA" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
    <label style="margin: 5px;" id="clavecitaCA"></label><span style="margin:10px;font-size: 15px;" id="prueba13A" name="prueba13A" class="label label-info"></span><input type="hidden" id="prueba13EA" name="prueba13EA" value="">
                            </div>
                          </div>
                        </div>
                          <div id="zonaY"></div>
                            <div id="div_CurpSupervisor">
                              <label>CURP:</label><input id="txt_CurpSupervisor" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[A-Z0-9]{2}/,'CurpSupervisor',this.value); return validaCurpE(this.value,'Supervisor','#div_CurpRepetidaSupervisor');" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_CurpSupervisor"><span id="span_CurpSupervisor" ></span>
                            </div>
                            <div id="div_CurpRepetidaSupervisor" class="row">
                            <div id="div_CPCanSupervisor">
                                  <label>Código Postal:</label><input id="txt_CPCanSupervisor" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCanSupervisor',this.value); return codigoUS('#codigoCSupervisor',this.value,'Supervisor');"  type="text" class="form-control" name="txt_CPCanSupervisor" required><span id="span_CPCanSupervisor" ></span>
                            </div>
                            <div id="codigoCSupervisor"></div>
                            <div id="div_CalleSupervisor">
                                <label>Calle:</label><input id="txt_CalleSupervisor" onkeypress="return validarXD(alphanumeric1,this.value.length,30);" onkeyup="validacion4all(/^([A-Za-z\s]+)\s([#])\s([0-9A-Za-z]{1,5})$/,'CalleSupervisor',this.value);"  type="text" class="form-control" name="txt_CalleSupervisor" required><span id="span_CalleSupervisor"></span>
                            </div>
                            </div>
                                <div id="div_PswSupervisor">
                                  <label>Contraseña:</label><input id="txt_Psw" type="password" class="form-control" name="txt_PswSupervisor" required><span id="span_PswSupervisor" ></span>
                                </div>
                                <div id="div_Psw2Supervisor">
                                  <label>Repite Contraseña:</label><input id="txt_Psw2" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2Supervisor" required><br><span id="span_Psw2Supervisor" ></span>
                                </div>
                                <input type="submit" name="btn_Supervisor" id="btn_Supervisor" class="btn btn-primary" >
                        </form>
                      </div>
                    </div>
                    </div>
                </div>
              </div>
               </div> 
            </div>
            <div id="Mod" class="modal fade" role="dialog"></div>
        </div>

      </div><!-- Container-Fluid -->    
  </main>  
  
</body>
</html>


