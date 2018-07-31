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

</head>
<body class="site" onload="return Solicitudes();">
	 
  <main class="content">
    <div class="container-fluid">
        <div class="row"> <!--Abre primer Row --> 
            <div class="col-sm-7"> <!--Abre col-sm-7  -->
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#Agendar" data-toggle="tab" onclick="return Solicitudes();">Agendar Cita</a></li>
                  <li ><a href="#Consultar" data-toggle="tab" >Consultar Citas</a></li>
                  <li ><a href="#Modificar" data-toggle="tab">Modificar Citas</a></li>
                  <li ><a href="#Cancelar" data-toggle="tab">Cancelar Citas</a></li>
                </ul>
                <p></p>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="Agendar" > 
                         <div class="col-sm-12"> <button type="button" class="btn btn-info btn-block" onclick="return Solicitudes();"><i class="glyphicon glyphicon-refresh"> </i> Actualizar</button></div>
                         <br></br>
                          <div id="SAgendar"></div>
                       
                    </div>
                    <div class="tab-pane fade" id="Consultar"> 
                          <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                              <input id="txt_FindC" type="text" class="form-control" name="txt_FindC" placeholder="Buscar">
                            </div>
                          </div>
                          <br></br>
                    </div>
                    <div class="tab-pane fade" id="Modificar"> 
                           <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                              <input id="txt_FindM" type="text" class="form-control" name="txt_FindM" placeholder="Buscar">
                            </div>
                          </div>  <br></br>
                    </div>
                    <div class="tab-pane fade " id="Cancelar"> 
                           <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                              <input id="txt_FindC" type="text" class="form-control" name="txt_FindC" placeholder="Buscar">
                            </div>
                          </div><br></br>
                    </div>
                </div>

            </div> <!--Cierra col-sm-7  -->

            <div class="col-sm-5"> <!--Abre col-sm-5  -->
              <div class="panel panel-primary">
                <div class="panel-heading">Citas para hoy</div>
                <div class="panel-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                      </tr>
                      <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                      </tr>
                      <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> <!--Cierra col-sm-7  -->
        </div> <!--Cierra primer Row -->
        
    </div> 
  </main>  
  
  <div id="InfoAlert" class="modal fade" role="dialog">
    

  </div>


  <script type="text/javascript">
       function Solicitudes(){    
        $.post("../php/SolicitudEmpleo.php", {  }, function(data){
        $('#SAgendar').html(data);
    });         
  }
   function InfoSolicitudes(cad,num,ct){    
        $.post("../php/InfoSolicitud.php", {name: cad, cand: num, cita: ct  }, function(data){
        $('#InfoAlert').html(data);
    });         
  }
  function AgendarCita(num){    
        $.post("../php/AgendarCita.php", { cita: num }, function(data){
        $('#InfoAlert').html(data);
    });         
  }

  </script>
</body>
</html>