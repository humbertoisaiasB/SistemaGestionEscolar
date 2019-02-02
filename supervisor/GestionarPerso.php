
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
<body class="site" onload="return CEmpleosAdmin('','Consultar','Administrador','PersonalA','#ConsA2'); return CEmpleosAdmin('','Eliminar','Administrador','PersonalA','#ConsA');">
  <main class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7">
              <ul class="nav nav-tabs">
                <li role="presentation" class="active" onclick="return CEmpleosAdmin('','Consultar','Administrador','PersonalA','#ConsA2');"> <a href="#Consultar" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Consultar</a></li>
                <li role="presentation" onclick="return CEmpleosAdmin('','Eliminar','Administrador','PersonalA','#ConsA');"><a href="#Eliminar" data-toggle="tab"><img src="../assets/images/Eliminar.png"  height="30px" width="30px" > Eliminar</a></li>
              </ul>
          </div>
          
        </div>  

        <div class="row">
            <div class="col-sm-7">

              <div class="tab-content"> 
                 <br>
                 <div class="tab-pane fade in active" id="Consultar">
                      <div class="col-sm-12 registro1 well">
                        <h1>Consultar personal</h1>
                          <div class="input-group">
                            <input type="text" id="myInputA2" class="form-control" onkeyup="return CEmpleosAdmin(this.value,'Consultar','Administrador','PersonalA','#ConsA2');" placeholder="Buscar por el nombre">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" ariahaspopup="true" ariaexpanded="false">Filtros<span class="caret"></span></button>
                              <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                  <a href="#">Solo usuarios de tipo "Empresa"</a>
                                </li>
                                <li>
                                  <a href="#">Solo usuarios de tipo "Empleador"</a>
                                </li>
                                <li>
                                  <a href="#">Solo usuarios de tipo "Candidato"</a>
                                </li>
                              </ul>
                            </div>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                          </div>
                        </div><br><br>
                        <div id="ConsA2"></div>
                 </div>
                <div class="tab-pane fade" id="Eliminar">
                      <div class="col-sm-12 registro1 well">
                        <h1>Eliminar personal</h1>
                            <div class="input-group">
                              <input type="text" id="myInputA" class="form-control" onkeyup="return CEmpleosAdmin(this.value,'Eliminar','Administrador','PersonalA','#ConsA');" placeholder="Buscar por el nombre">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" ariahaspopup="true" ariaexpanded="false">Filtros<span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                  <li>
                                    <a href="#">Solo usuarios de tipo "Empresa"</a>
                                  </li>
                                  <li>
                                    <a href="#">Solo usuarios de tipo "Empleador"</a>
                                  </li>
                                  <li>
                                    <a href="#">Solo usuarios de tipo "Candidato"</a>
                                  </li>
                                </ul>
                              </div>
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            </div>
                          </div><br><br>
                          <div id="ConsA"></div>
                 </div>
               </div> 
            </div>
        </div>

      </div><!-- Container-Fluid -->    
  </main>  
  <div class="modal fade" id="Mod" role="dialog"></div>
</body>
</html>


