<?php include '../php/Conexion.php';
      session_start();
      if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
      $query1 = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, a.id_Alumno, a.curpAlumno, u.Documento FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.id_Usuario=".$_SESSION['id']." && u.id_Usuario=a.id_Usuario");
      $val = mysqli_fetch_array($query1);
      $ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';
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
<?php
  $variable = $val['id_Usuario'];
  $curp = "'".$val['curpAlumno']."'";
  $nombre = $val['Nom'].' '.$val['Ap'].' '.$val['Am'] ;
  $DocumentosR = $val['Documento'];
  $DocumentosR = 4-$DocumentosR;
?>
<body class="site" onload="return BuscarDocumentos(<?php echo $variable;?>,<?php echo $curp ?>);">
	<main class="content">
     <div class="container-fluid well">
        <div class="row">
            <div class="col-sm-12 registro">
                <div class="input-group">
                    <h2 class="titulo"> Documentos: <?php echo $nombre.$curp;?></h2>
                    <span class="input-group-addon titulo"><i class="glyphicon glyphicon-eye-open"></i> <?php if($DocumentosR==0){echo '';}else{echo $DocumentosR;}?></span>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div  id="CResp"></div>
          </div>
          <div id="Alert"></div>
     </div>

  </main>
  <div id="InfoAlert" class="modal fade" role="dialog">
  </div>
  <div id="Alert"></div>

  <script type="text/javascript">
    function BuscarDocumentos(cad,cad1){    
      $.post("../php/FindEmpleo.php", { busqueda: cad, curp: cad1 }, function(data){
      $('#CResp').html(data);
      });         
    }
    //Para un modal aca perron
    function InfoSolicitudes(num,cad,cad1,numero,curp1){    
      $.post("../php/InfoEmpleo.php", { id_Usuario:  num, nombreN: cad, caso:cad1, es:numero, curp: curp1}, function(data){
      $('#InfoAlert').html(data);
      });         
    }
    function subirF(nom,condicion,curp){
      $.post("../php/SubirPdf.php", { archivo: nom, accion: condicion, clave: curp}, function(data){
      $('#InfoAlert').html(data);
      });
    }
    //Quitar con un div solamente en el modal sin abrir uno nuevo
    function subirT(cad1,cad2,cad3){
      $.post("../php/interSube.php", { archivo: cad1, tipo: cad2, curp: cad3}, function(data){
        $('#InfoAlert').html(data);
      });
    }
    function limpiar(){
      document.getElementById("#InfoAlert").innerHTML="";
    }
  </script>
</body>
</html>
