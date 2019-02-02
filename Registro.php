<?php session_start();
      session_unset();
      session_destroy();
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/Home.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="assets/css/foot.css">
      <script type="text/javascript" src="assets/bootstrap/js/jquery-3.1.1.js" ></script>
      <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="assets/css/Mycss.css">
			<script type="text/javascript" src="assets/JS/MyJS.js"></script>
	<title>Registrarme</title>
	<style media="screen">
		span{
			margin-top:8px;
		}
	</style>
	<?php
	$cambio = "Alumno";
	$variableEscuela = "";
	$variableEscuelasTotal = 0;
	function devuelve($a){
	    $aux = "";
	    $cont = 0; 
	    $totalC = strlen($a);
	    for($i=0; $i<=$totalC; $i++){
	    	$aux = $a[$i];
	    	if($aux == ";"){
	    		$cont++;
	    	}
	    }
	    return $cont;
	} 
	 ?>
</head>
<body class="site" onload="return validar(); return validar2(); return validar3(); return validar4(); return validar5(); return validad6();" >
	<header>
		<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" style="color:white !important;" href="index.php">Gestión</a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
							</ul>
							<ul class="nav navbar-nav navbar-right ">
								<li><a style="color:white !important;" href="index.php">Inicio</a></li>
								<li> <a style="color:white !important;"  data-toggle="modal" data-target="#Mod"><i class="fa fa-user"></i> Iniciar sesión</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
		</nav>
	</header>
	<main class="content">
		<div class="container">
					<div class="row">
						<div class="col-md-11">
							<h1 align="center">Registro</h1>
							<div class="alert alert-dismissable alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Seleciona el tipo de usuario al que perteneces</strong> <br>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-11">
							<ul class="nav nav-pills">
								<li onload="return validar();" class="active"><a href="#alumno"  onclick="return validar();" data-toggle="tab">Alumno</a></li>
								<li onload="return validar4();"><a href="#PersonalA" data-toggle="tab" onclick="return validar4();">Personal de apoyo</a></li>
								<li onload="return validar2();"><a href="#maestro" onclick="return validar2();" data-toggle="tab">Maestro</a></li>
								<li onload="return validar6();"><a href="#sub" onclick="return validar6();" data-toggle="tab">Subdirector</a></li>
								<li onload="return validar3();"><a href="#director" onclick="return validar3();" data-toggle="tab">Director</a></li>
								<li onload="return validar5();"><a href="#supervisor" onclick="return validar5();" data-toggle="tab">Supervisor</a></li>
								<input type="hidden" id="tipo" value="Alumno">
								
							</ul>
					</div>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="alumno" >
								<div class="row">
									<div class="col-md-2" align="center"></div>
									  <div class="col-md-11"><br>
										<div class="registro1" align="center">
											<div class="panel-body" align="center">
												<div class="titulo" align="center">
													<h3>
														Registro Alumno
													</h3>
												</div>
												<!-- Aqui tenemos que empresa desaparecera y ahora sera alumnos-->
												<form  action="php/AddAlumno.php" method="POST">
													<div id="div_NomAlumno">
														<label>Nombre:</label><input id="txt_NomAlumno" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomAlumno',this.value);NomValid(this);"  type="text" class="form-control" name="txt_NomAlumno"><span id="span_NomAlumno" ></span>
													</div>
													<div id="div_Ap">
														<label>Apellido paterno:</label><input id="txt_Ap" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,25}$/,'Ap',this.value);NomValid(this);" type="text" class="form-control"  name="txt_Ap"><span id="span_Ap" ></span>
													</div>
													<div id="div_Am">
														<label>Apellido materno:</label><input id="txt_Am" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,25}$/,'Am',this.value);NomValid(this);" type="text" class="form-control" name="txt_Am"><span id="span_Am" ></span>
													</div>
													<div id="div_Correo">
														<label>Correo:</label><input id="txt_Correo" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'Correo',this.value); return validar(); return validaCorreo(this.value,'#div_CorreoRepetida');" type="email" class="form-control" name="txt_Correo" required><span id="span_Correo" ></span>
													</div>
													<div id="div_CorreoRepetida" ></div> 
													<div id="div_AgregaZonasAlumno">
															<div class="principal">
																<div class="wrap">
																<!-- Aqui empieza la modificacion -->
																	<h4>Ingresa tus datos!</h4>
																	<div class="input-group">
															      		<input type="text" class="form-control" placeholder="Search for...">
															      		<span class="input-group-btn">
															        		<button class="btn btn-default" type="button" onclick="return agregaCentros('Alumno','#centrosAlumno');" data-toggle="modal" data-target="#centrosAlumno">Agregar mas!</button>
															      		</span>
															 		</div><!-- /input-group -->
														  			<div id="centrosAlumno" class="modal fade" role="dialog"></div>		
																</div>
															</div>
															<div class="tareas">
																<div class="wrap">
																	<ul class="lista" id="listaAlumno">
																	</ul>
																</div>
															</div>
														</div>	
													<div id="zonaY"></div>
													<div style="display:block;margin-top:20px;">
															<div id="div_Telcasa" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_Telcasa" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^[0-9]{8,10}$/,'Telcasa',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_Telcasa"><span id="span_Telcasa" ></span>
															</div>
															<div id="div_Telcelular" style="display:inline-block;">
																<label>Teléfono celular:</label><input id="txt_Telcelular" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'Telcelular',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_Telcelular"><span id="span_Telcelular" ></span>
															</div>
														</div>

													    <div id="div_Curp">
															<label>CURP del Alumno:</label><input id="txt_Curp" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[A-Z0-9]{2}/,'Curp',this.value); return validaCurpE(this.value,'Alumno','#div_CurpRepetida');" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_Curp"><span id="span_Curp" ></span>
														</div>
														<div id="div_CurpRepetida" class="row"> 
														</div>
														<div id="div_CPCan">
																	<label>Código Postal:</label><input id="txt_CPCan" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCan',this.value); return codigoU('#codigoC',this.value,'Alumno');"  type="text" class="form-control" name="txt_CPCan" required><span id="span_CPCan" ></span>
														</div>
														<div id="codigoC"></div>
														<div id="div_CalleCan">
																<label>Calle:</label><input id="txt_CalleCan" onkeypress="return validarXD(alphanumeric1,this.value.length,30);" onkeyup="validacion4all(/^([A-Za-z\s]+)\s([#])\s([0-9A-Za-z]{1,5})$/,'CalleCan',this.value);"  type="text" class="form-control" name="txt_CalleCan" required><span id="span_CalleCan"></span>
														</div>
															<!-- Aqui se sale de lo normal de usuario aqui es modificar para cada uno de los actores. -->
															<div id="div_nomPapa">
																<label>Nombre del papá:</label><input id="txt_nomPapa" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomPapa',this.value);NomValid(this);"  type="text" class="form-control" name="txt_nomPapa"><span id="span_nomPapa" ></span>
															</div>
															<div id="div_apPapa">
																<label>Apellido paterno:</label><input id="txt_apPapa" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'apPapa',this.value);NomValid(this);" type="text" class="form-control"  name="txt_apPapa"><span id="span_apPapa" ></span>
															</div>
															<div id="div_amPapa">
																<label>Apellido materno:</label><input id="txt_amPapa" onkeypress="return validarXD(alphaxd,this.value.length,11);"  onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'amPapa',this.value);NomValid(this);" type="text" class="form-control" name="txt_amPapa"><span id="span_AmPapa" ></span>
															</div>
															<div id="div_curpPapa">
																<label>CURP del papá</label><input id="txt_curpPapa" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[0-9]{2}/,'curpPapa',this.value);" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_curpPapa"><span id="span_curpPapa" ></span>
															</div>
															<div id="div_telPapa" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono celular del papá: </label><input input id="txt_telPapa" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^[0-9]{6,10}$/,'telPapa',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_telPapa"><span id="span_telPapa" ></span>
															</div>
															<div id="div_nomMama">
																<label>Nombre de la mamá:</label><input id="txt_nomMama" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'nomMama',this.value);NomValid(this);"  type="text" class="form-control" name="txt_nomMama"><span id="span_nomPapa" ></span>
															</div>
															<div id="div_apMama">
																<label>Apellido paterno de la mamá</label><input id="txt_apMama" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'apMama',this.value);NomValid(this);" type="text" class="form-control"  name="txt_apMama"><span id="span_apMama" ></span>
															</div>
															<div id="div_amMama">
																<label>Apellido materno de la mamá:</label><input id="txt_amMama" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'amMama',this.value);NomValid(this);" type="text" class="form-control" name="txt_amMama"><span id="span_amMama" ></span>
															</div>
															<div id="div_curpMama">
																<label>CURP de la mamá</label><input id="txt_curpMama" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[0-9]{2}/,'curpMama',this.value);" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_curpMama"><span id="span_curpMama" ></span>
															</div>
															<div id="div_telMama" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono celular de la mamá: </label><input input id="txt_telMama" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^[0-9]{6,10}$/,'telMama',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_telMama"><span id="span_telMama" ></span>
															</div>
																<div id="div_Psw">
																	<label>Contraseña:</label><input id="txt_Psw" type="password" class="form-control" name="txt_Psw" required><span id="span_Psw" ></span>
																</div>
																<div id="div_Psw2">
																	<label>Repite Contraseña:</label><input id="txt_Psw2" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2" required><br><span id="span_Psw2" ></span>
																</div>
                                <div id="btn">
								</div>
									 			</form>
											</div>
										</div>
									  </div>
								</div>
							</div>
							<div class="tab-pane fade" id="maestro" >
								<div class="row">
									<div class="col-md-2"></div>
										<div class="col-md-11"><br>
										<div class="registro1" align="center">
											<div class="panel-body">
												<div class="titulo" align="center">
													<h3>
														Registro Maestro
													</h3>
												</div>
												<form  action="php/AddMaestro.php" method="POST">
													<div id="div_NomMaestro">
														<label>Nombre:</label><input id="txt_NomMaestro" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomMaestro',this.value);NomValid(this);"  type="text" class="form-control" name="txt_NomMaestro"><span id="span_NomMaestro" ></span>
													</div>
													<div id="div_ApMaestro">
														<label>Apellido paterno:</label><input id="txt_ApMaestro" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'ApMaestro',this.value);NomValid(this);" type="text" class="form-control"  name="txt_ApMaestro"><span id="span_ApMaestro" ></span>
													</div>
													<div id="div_AmMaestro">
														<label>Apellido materno:</label><input id="txt_AmMaestro" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'AmMaestro',this.value);NomValid(this);" type="text" class="form-control" name="txt_AmMaestro"><span id="span_AmMaestro" ></span>
													</div>
													<div id="div_CorreoMaestro">
														<label>Correo:</label><input id="txt_CorreoMaestro" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoMaestro',this.value);" type="email" class="form-control" name="txt_CorreoMaestro" required><span id="span_CorreoMaestro" ></span>
													</div>
														<div id="div_AgregaZonasMaestro">
															<div class="principal">
																<div class="wrap">
																<!-- Aqui empieza la modificacion -->
																	<h4>Ingresa tus datos!</h4>
																	<div class="input-group">
															      		<input type="text" class="form-control" placeholder="Search for...">
															      		<span class="input-group-btn">
															        		<button class="btn btn-default" type="button" onclick="return agregaCentros('Maestro','#centrosMaestros');" data-toggle="modal" data-target="#centrosMaestros">Agregar mas!</button>
															      		</span>
															 		</div><!-- /input-group -->
														  			<div id="centrosMaestros" class="modal fade" role="dialog"></div>		
																</div>
															</div>
															<div class="tareas">
																<div class="wrap">
																	<ul class="lista" id="listaMaestro">
																	</ul>
																</div>
															</div>
														</div>
														<!-- Para las claves aqui codigo empieza 
														<div id="div_AgregaClaves" >
															<div class="principal">
																<div class="wrap">
																	<h4>Ingresa tus claves!</h4>
																	<div class="input-group">
															      		<input type="text" class="form-control" placeholder="Escribe tu clave..." id="claveMaestro">
															      		<span class="input-group-btn">
															        		<button class="btn btn-default" type="button" id="btn-agregarClaveMaestro" onclick="return masClaves();">Agregar mas!</button>
															      		</span>
															 		</div>
														  			<div id="clavesMaestro" class="modal fade" role="dialog"></div>		
																</div>
															</div>
														</div>				
														Y aqui termina ese codigo  -->			
														<div style="display:block;margin-top:20px;">
															<div id="div_TelcasaMaestro" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_TelcasaMaestro" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^[0-9]{8,10}$/,'TelcasaMaestro',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_TelcasaMaestro"><span id="span_TelcasaMaestro" ></span>
															</div>
															<div id="div_TelcelularMaestro" style="display:inline-block;">
																<label>Teléfono celular:</label><input id="txt_TelcelularMaestro" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'TelcelularMaestro',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_TelcelularMaestro"><span id="span_TelcelularMaestro" ></span>
															</div>
														</div>
														<div id="div_S_Funcion"style="display: inline-block;margin: 20px;">
																<label for="S_Funcion">Función:</label>
																<select class="form-control" name="S_Funcion">
																	<option>Seleciona una Opción</option>
																	<option>Enlace de Supervisión</option>
																	<option>Maestro de Grupo</option>
																	<option>Enlace de Dirección con Grupo</option>
																	<option>Enlace de Dirección sin Grupo</option>
																	<option>Asesor Técnico Pedagógico</option>
																	<option>Otra Función.</option>
																</select>
														</div>
														<div id="div_CurpMaestro">
															<label>CURP del Maestro:</label><input id="txt_CurpMaestro" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[A-Z0-9]{2}/,'CurpMaestro',this.value); return validaCurpE(this.value,'Director','#div_CurpRepetidaM');" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_CurpMaestro"><span id="span_CurpMaestro" ></span>
														</div>
														<div id="div_CurpRepetidaM"></div>
															<div id="div_CPCanMaestro">
																	<label>Código Postal:</label><input id="txt_CPCanMaestro" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCanMaestro',this.value); return codigoU('#codigoCMaestro',this.value,'Maestro');"  type="text" class="form-control" name="txt_CPCanMaestro" required><span id="span_CPCanMaestro" ></span>
															</div>
															<div id="codigoCMaestro"></div>
															<div id="div_CalleCanMaestro">
																<label>Calle:</label><input id="txt_CalleCanMaestro" onkeypress="return validarXD(alphanumeric1,this.value.length,30);" onkeyup="validacion4all(/^([A-Za-z\s]+)\s([#])\s([0-9A-Za-z]{1,5})$/,'CalleCanMaestro',this.value);"  type="text" class="form-control" name="txt_CalleCanMaestro" required><span id="span_CalleCanMaestro"></span>
															</div>
															<!--Aqui comienza el registro con los de mas atribuytos de maestro -->
																<div id="div_ClavePresupuestalM">
																	<label>Clave Presupuestal:</label><input type="text" name="txt_ClavePresupuestalM" class="form-control" id="txt_ClavePresupuestalM"><span id="span_ClavePresupuestalM"></span>
																</div>

																<div id="div_rfc">
																	<label>RFC:</label><input id="txt_rfc" type="text" class="form-control" name="txt_rfc"><span id="span_rfc" ></span>
																</div>
																<div id="div_PswCanMaestro">
																	<label>Contraseña:</label><input id="txt_PswCanMaestro" type="password" class="form-control" name="txt_PswCanMaestro" required><span id="span_PswCanMaestro" ></span>
																</div>
																<div id="div_Psw2CanMaestro">
																	<label>Repite Contraseña:</label><input id="txt_Psw2CanMaestro" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2CanMaestro" required><br><span id="span_Psw2CanMaestro" ></span>
																</div>
                                <div id="btnCan">
                                </div>
    												</form>
											</div>
										</div>
										</div>
								</div>
							</div>
							<div class="tab-pane fade" id="PersonalA" >
								<div class="row">
									<div class="col-md-2"></div>
										<div class="col-md-11"><br>
										<div class="registro1" align="center">
											<div class="panel-body">
												<div class="titulo" align="center">
													<h3>
														Registro Personal de Apoyo
													</h3>
												</div>
												<form  action="php/AddAdmi.php" method="POST">
													<!-- Aqui em pieza de maestro-->
													<div id="div_NomAdmi">
														<label>Nombre:</label><input id="txt_NomAdmi" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomAdmi',this.value);NomValid(this);"  type="text" class="form-control" name="txt_NomAdmi"><span id="span_NomAdmi"></span>
													</div>
													<div id="div_ApAdmi">
														<label>Apellido paterno:</label><input id="txt_ApAdmi" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'ApAdmi',this.value);NomValid(this);" type="text" class="form-control"  name="txt_ApAdmi"><span id="span_ApAdmi" ></span>
													</div>
													<div id="div_AmAdmi">
														<label>Apellido materno:</label><input id="txt_AmAdmi" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'AmAdmi',this.value);NomValid(this);" type="text" class="form-control" name="txt_AmAdmi"><span id="span_AmAdmi" ></span>
													</div>
													<div id="div_CorreoAdmi">
														<label>Correo:</label><input id="txt_CorreoAdmi" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoAdmi',this.value);" type="email" class="form-control" name="txt_CorreoAdmi" required><span id="span_CorreoAdmi" ></span>
													</div>
											<div id="div_AgregaZonas1">
															<div class="principal">
																<div class="wrap">
																<!-- Aqui empieza la modificacion -->
																	<h4>Ingresa tus datos</h4>
																	<div class="input-group">
															      		<input type="text" class="form-control" placeholder="Search for...">

															      		<span class="input-group-btn">
															        		<button class="btn btn-default" type="button" onclick="return agregaCentros('PersonalA','#centrosPersonalA');" data-toggle="modal" data-target="#centrosPersonalA">Agregar mas!</button>
															      		</span>
															 		</div><!-- /input-group -->
														  			<div id="centrosPersonalA" class="modal fade" role="dialog"></div>		
																</div>
															</div>
															<div class="tareas">
																<div class="wrap">
																	<ul class="lista" id="listaPersonalA">
																	</ul>
																</div>
															</div>
														</div>	
													<div id="zonaAdmin"></div>
														<div style="display:block;margin-top:20px;">
															<div id="div_TelcasaAdmi" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_TelcasaAdmi" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^[0-9]{8,10}$/,'TelcasaAdmi',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_TelcasaAdmi"><span id="span_TelcasaAdmi" ></span>
															</div>
															<div id="div_TelcelularAdmi" style="display:inline-block;">
																<label>Teléfono celular:</label><input input id="txt_TelcelularAdmi" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'TelcelularAdmi',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_TelcelularAdmi"><span id="span_TelcelularAdmi" ></span>
															</div>
														</div>
													    <div id="div_CurpAdmi">
															<label>CURP:</label><input id="txt_CurpAdmi" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[A-Z0-9]{2}/,'CurpAdmi',this.value); return validaCurpE(this.value,'PersonalA','#div_CurpRepetidaAdmi');" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_CurpAdmi"><span id="span_CurpAdmi" ></span>
														</div>
														<div id="div_CurpRepetidaAdmi"></div>
															<div id="div_CPCanAdmi">
																	<label>Código Postal:</label><input id="txt_CPCanAdmi" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCanAdmi',this.value); return codigoU('#codigoCAdmi',this.value,'PersonalA');"  type="text" class="form-control" name="txt_CPCanAdmi" required><span id="span_CPCanAdmi" ></span>
															</div>
															<div id="codigoCAdmi"></div>
															<div id="div_CalleCanAdmi">
																<label>Calle:</label><input id="txt_CalleCanAdmi" onkeypress="return validarXD(alphanumeric1,this.value.length,30);" onkeyup="validacion4all(/^([A-Za-z\s]+)\s([#])\s([0-9A-Za-z]{1,5})$/,'CalleCanAdmi',this.value);"  type="text" class="form-control" name="txt_CalleCanAdmi"b required><span id="span_CalleCanAdmi"></span>
															</div>
															<!-- Extras para el usuario maestro -->
															<label for="funcionAdmi">Función :</label>
															<select class="form-control" name="funcionAdmi">
																<option>Intendencia</option>
																<option>Administrativo</option>
																<option>Docente frente a grupo</option>
															</select>
															<div id="div_PswCanAdmi">
																<label>Contraseña:</label><input id="txt_PswCanAdmi" type="password" class="form-control" name="txt_PswCanAdmi" required><span id="span_PswCanAdmi" ></span>
															</div>
															<div id="div_Psw2CanAdmi">
																<label>Repite Contraseña:</label><input id="txt_Psw2CanAdmi" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2CanAdmi" required><br><span id="span_Psw2CanAdmin" ></span>
															</div>
                                <div id="btn_personalA">
                                </div>
    												</form>
											</div>
										</div>
										</div>
								</div>
							</div>
							<div class="tab-pane fade" id="director" >
								<div class="row">
									<div class="col-md-2"></div>
										<div class="col-md-11"><br>
										<div class="registro1" align="center">
											<div class="panel-body">
												<div class="titulo" align="center">
													<h3>
														Registro Director
													</h3>
												</div>
												<form  action="php/AddDirector.php" method="POST">
													<div id="div_NomDirector">
														<label>Nombre:</label><input id="txt_NomDirector" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomDirector',this.value);NomValid(this);"  type="text" class="form-control" name="txt_NomDirector"><span id="span_NomDirector" ></span>
													</div>
													<div id="div_ApDirector">
														<label>Apellido paterno:</label><input id="txt_ApDirector" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'ApDirector',this.value);NomValid(this);" type="text" class="form-control"  name="txt_ApDirector"><span id="span_ApDirector" ></span>
													</div>
													<div id="div_AmDirector">
														<label>Apellido materno:</label><input id="txt_AmDirector" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'AmDirector',this.value);NomValid(this);" type="text" class="form-control" name="txt_AmDirector"><span id="span_AmDirector" ></span>
													</div>
													<div id="div_CorreoDirector">
														<label>Correo:</label><input id="txt_CorreoDirector" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoDirector',this.value);" type="email" class="form-control" name="txt_CorreoDirector" required><span id="span_CorreoDirector" ></span>
													</div>
													<div id="div_AgregaZonasDirector">
															<div class="principal">
																<div class="wrap">
																<!-- Aqui empieza la modificacion -->
																	<h4>Ingresa los grupos a tu cargo</h4>
																	<div class="input-group">
															      		<input type="text" class="form-control" placeholder="Search for...">
															      		<span class="input-group-btn">
															        		<button class="btn btn-default" type="button" onclick="return agregaCentros('Director','#centrosDirector');" data-toggle="modal" data-target="#centrosDirector">Agregar mas!</button>
															      		</span>
															 		</div><!-- /input-group -->
														  			<div id="centrosDirector" class="modal fade" role="dialog"></div>		
																</div>
															</div>
															<div class="tareas">
																<div class="wrap">
																	<ul class="lista" id="listaDirector">
																	</ul>
																</div>
															</div>
														</div>	
															<div id="div_S_FuncionD"style="display: inline-block;margin: 20px;">
																<label for="S_FuncionD">Función:</label>
																<select class="form-control" name="S_FuncionD">
																	<option>Seleciona una Opción</option>
																	<option>Director de Nivel</option>
																	<option>Enlace de Supervisión</option>
																	<option>Director Técnico</option>
																	<option>Director Técnico con Grupo</option>
																	<option>Asesor Técnico Pedagógico</option>
																	<option>Cambio de Actividad</option>
																	<option>Comisionado al SNTE</option>
																	<option>Otra Funcion</option>
																</select>
															</div>
														<div style="display:block;margin-top:20px;">
															<div id="div_TelcasaDirector" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input id="txt_TelcasaDirector" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^[0-9]{8,10}$/,'TelcasaDirector',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_TelcasaDirector"><span id="span_TelcasaDirector" ></span>
															</div>
															<div id="div_TelcelularDirector" style="display:inline-block;">
																<label>Teléfono celular:</label><input id="txt_TelcelularDirector" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'TelcelularDirector',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_TelcelularDirector"><span id="span_TelcelularDirector" ></span>
															</div>
														</div>
													<div id="div_CurpDirector">
															<label>CURP del Director:</label><input id="txt_CurpDirector" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[A-Z0-9]{2}/,'CurpDirector',this.value);  return validaCurpE(this.value,'Director','#div_CurpRepetidaD');" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase;" type="text" class="form-control" name="txt_CurpDirector"><span id="span_CurpDirector" ></span>
														</div>
														<div id="div_CurpRepetidaD" class="row"></div>
																<div id="div_CPCanDirector">
																	<label>Código Postal:</label><input id="txt_CPCanDirector" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCanDirector',this.value); return codigoU('#codigoCDirector',this.value,'Director');" type="text" class="form-control" name="txt_CPCanDirector" required><span id="span_CPCanDirector" ></span>
																</div>
															<div id="codigoCDirector"></div>
															<div id="div_CalleCanDirector">
																<label>Calle:</label><input id="txt_CalleCanDirector" onkeypress="return validarXD(alphanumeric1,this.value.length,30);" onkeyup="validacion4all(/^([A-Za-z\s]+)\s([#])\s([0-9A-Za-z]{1,5})$/,'CalleCanDirector',this.value);"  type="text" class="form-control" name="txt_CalleCanDirector" required><span id="span_CalleCanDirector"></span>
															</div>
																<div id="div_PswCanDirector">
																	<label>Contraseña:</label><input id="txt_PswCanDirector" type="password" class="form-control" name="txt_PswCanDirector" required><span id="span_PswCanDirector" ></span>
																</div>
																<div id="div_Psw2CanDirector">
																	<label>Repite Contraseña:</label><input id="txt_Psw2CanDirector" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2CanDirector" required><br><span id="span_Psw2CanDirector" ></span>
																</div>
                                <div id="btn_director">
                                </div>
    												</form>
											</div>
										</div>
										</div>
								</div>
							</div>
							<div class="tab-pane fade" id="supervisor" >
								<div class="row">
									<div class="col-md-2"></div>
										<div class="col-md-11"><br>
										<div class="registro1" align="center">
											<div class="panel-body">
												<div class="titulo" align="center">
													<h3>
														Registro Supervisor
													</h3>
												</div>
												<form  action="php/AddSupervisor.php" method="POST">
													<div id="div_NomSupervisor">
														<label>Nombre:</label><input id="txt_NomSupervisor" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomSupervisor',this.value);NomValid(this);"  type="text" class="form-control" name="txt_NomSupervisor"><span id="span_NomSupervisor" ></span>
													</div>
													<div id="div_ApSupervisor">
														<label>Apellido paterno:</label><input id="txt_ApSupervisor" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'ApSupervisor',this.value);NomValid(this);" type="text" class="form-control"  name="txt_ApSupervisor"><span id="span_ApSupervisor" ></span>
													</div>
													<div id="div_AmSupervisor">
														<label>Apellido materno:</label><input id="txt_AmSupervisor" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'AmSupervisor',this.value);NomValid(this);" type="text" class="form-control" name="txt_AmSupervisor"><span id="span_AmSupervisor" ></span>
													</div>
													<div id="div_CorreoSupervisor">
														<label>Correo:</label><input id="txt_CorreoSupervisor" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoSupervisor',this.value);" type="email" class="form-control" name="txt_CorreoSupervisor" required><span id="span_CorreoSupervisor" ></span>
													</div>
													<div id="div_AgregaZonasSupervisor">
															<div class="principal">
																<div class="wrap">
																<!-- Aqui empieza la modificacion -->
																	<h4>Ingresa tus datos!</h4>
																	<div class="input-group">
															      		<input type="text" class="form-control" placeholder="Search for...">
															      		<span class="input-group-btn">
															        		<button class="btn btn-default" type="button" onclick="return agregaCentros('Supervisor','#centrosSupervisor');" data-toggle="modal" data-target="#centrosSupervisor">Agregar mas!</button>
															      		</span>
															 		</div><!-- /input-group -->
														  			<div id="centrosSupervisor" class="modal fade" role="dialog"></div>		
																</div>
															</div>
															<div class="tareas">
																<div class="wrap">
																	<ul class="lista" id="listaSupervisor">
																	</ul>
																</div>
															</div>
														</div>	
													<div id="zonaSupervisor"></div>
														<div style="display:block;margin-top:20px;">
															<div id="div_TelcasaSupervisor" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input id="txt_TelcasaSupervisor" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^[0-9]{8,10}$/,'TelcasaSupervisor,this.value);" type="text" style="min-width:230px" class="form-control" name="txt_TelcasaSupervisor"><span id="span_TelcasaSupervisor" ></span>
															</div>
															<div id="div_TelcelularDirector" style="display:inline-block;">
																<label>Teléfono celular:</label><input id="txt_TelcelularSupervisor" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'TelcelularSupervisor',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_TelcelularSupervisor"><span id="span_TelcelularSupervisor" ></span>
															</div>
														</div>
													<div id="div_CurpSupervisor">
															<label>CURP del Supervisor:</label><input id="txt_CurpSupervisor" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[A-Z0-9]{2}/,'CurpSupervisor',this.value);  return validaCurpE(this.value,'Supervisor','#div_CurpRepetidaSupervisor');" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase;" type="text" class="form-control" name="txt_CurpSupervisor"><span id="span_CurpSupervisor" ></span>
														</div>
														<div id="div_CurpRepetidaSupervisor" class="row"></div>
																<div id="div_CPCanSupervisor">
																	<label>Código Postal:</label><input id="txt_CPCanSupervisor" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCanSupervisor',this.value); return codigoU('#codigoCSupervisor',this.value,'Supervisor');" type="text" class="form-control" name="txt_CPCanSupervisor" required><span id="span_CPCanSupervisor" ></span>
																</div>
															<div id="codigoCSupervisor"></div>
															<div id="div_CalleSupervisor">
																<label>Calle:</label><input id="txt_CalleCanSupervisor" onkeypress="return validarXD(alphanumeric1,this.value.length,30);" onkeyup="validacion4all(/^([A-Za-z\s]+)\s([#])\s([0-9A-Za-z]{1,5})$/,'CalleCanSupervisor',this.value);"  type="text" class="form-control" name="txt_CalleCanSupervisor" required><span id="span_CalleCanSupervisor"></span>
															</div>
																<div id="div_PswCanSupervisor">
																	<label>Contraseña:</label><input id="txt_PswCanSupervisor" type="password" class="form-control" name="txt_PswCanSupervisor" required><span id="span_PswCanSupervisor" ></span>
																</div>
																<div id="div_Psw2CanSupervisor">
																	<label>Repite Contraseña:</label><input id="txt_Psw2CanSupervisor" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2CanSupervisor" required><br><span id="span_Psw2CanSupervisor" ></span>
																</div>
                                <div id="btn_Supervisor">
                                </div>
    												</form>
											</div>
										</div>
										</div>
								</div>
							</div>
							<div class="tab-pane fade" id="sub" >
								<div class="row">
									<div class="col-md-2"></div>
										<div class="col-md-11"><br>
										<div class="registro1" align="center">
											<div class="panel-body">
												<div class="titulo" align="center">
													<h3>
														Registro Subdirector 
													</h3>
												</div>
												<div class="alert alert-danger" role="alert">
      												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 												<strong>¡Cuidado!</strong> Esta opcion de registro solo esta habilitada para las modalidades generales y tenicas.
      			   								</div>
												<form  action="php/AddSubDirector.php" method="POST">
													<div id="div_NomSubDirector">
														<label>Nombre:</label><input id="txt_NomSubDirector" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomSubDirector',this.value);NomValid(this);"  type="text" class="form-control" name="txt_NomSubDirector"><span id="span_NomSubDirector" ></span>
													</div>
													<div id="div_ApSubDirector">
														<label>Apellido paterno:</label><input id="txt_ApSubDirector" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'ApSubDirector',this.value);NomValid(this);" type="text" class="form-control"  name="txt_ApSubDirector"><span id="span_ApSubDirector" ></span>
													</div>
													<div id="div_AmSubDirector">
														<label>Apellido materno:</label><input id="txt_AmSubDirector" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'AmSubDirector',this.value);NomValid(this);" type="text" class="form-control" name="txt_AmSubDirector"><span id="span_AmSubDirector" ></span>
													</div>
													<div id="div_CorreoSubDirector">
														<label>Correo:</label><input id="txt_CorreoSubDirector" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoSubDirector',this.value);" type="email" class="form-control" name="txt_CorreoSubDirector" required><span id="span_CorreoSubDirector" ></span>
													</div>
														<div id="div_AgregaZonasSubDirector">
															<div class="principal">
																<div class="wrap">
																<!-- Aqui empieza la modificacion -->
																	<h4>Ingresa tus datos!</h4>
																	<div class="input-group">
															      		<input type="text" class="form-control" placeholder="Search for...">
															      		<span class="input-group-btn">
															        		<button class="btn btn-default" type="button" onclick="return agregaCentros('SubDirector','#centrosSubDirector');" data-toggle="modal" data-target="#centrosSubDirector">Agregar mas!</button>
															      		</span>
															 		</div><!-- /input-group -->
														  			<div id="centrosSubDirector" class="modal fade" role="dialog"></div>		
																</div>
															</div>
															<div class="tareas">
																<div class="wrap">
																	<ul class="lista" id="listaSubDirector">
																	</ul>
																</div>
															</div>
														</div>						
														<div style="display:block;margin-top:20px;">
															<div id="div_TelcasaSubDirector" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_TelcasaSubDirector" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^[0-9]{8,10}$/,'TelcasaSubDirector',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_TelcasaSubDirector"><span id="span_TelcasaSubDirector" ></span>
															</div>
															<div id="div_TelcelularSubDirector" style="display:inline-block;">
																<label>Teléfono celular:</label><input id="txt_TelcelularSubDirector" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'TelcelularSubDirector',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_TelcelularSubDirector"><span id="span_TelcelularSubDirector" ></span>
															</div>
														</div>
														<div id="div_CurpSubDirector">
															<label>CURP:</label><input id="txt_CurpSubDirector" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[A-Z0-9]{2}/,'CurpSubDirector',this.value); return validaCurpE(this.value,'SubDirector','#div_CurpRepetidaSubDirector');" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_CurpSubDirector"><span id="span_CurpSubDirector" ></span>
														</div>
														<div id="div_CurpRepetidaSubDirector"></div>
															<div id="div_CPCanSubDirector">
																	<label>Código Postal:</label><input id="txt_CPCanSubDirector" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCanSubDirector',this.value); return codigoU('#codigoCSubDirector',this.value,'Maestro');"  type="text" class="form-control" name="txt_CPCanSubDirector" required><span id="span_CPCanSubDirector" ></span>
															</div>
															<div id="codigoCSubDirector"></div>
															<div id="div_CalleCanSubDirector">
																<label>Calle:</label><input id="txt_CalleCanSubDirector" onkeypress="return validarXD(alphanumeric1,this.value.length,30);" onkeyup="validacion4all(/^([A-Za-z\s]+)\s([#])\s([0-9A-Za-z]{1,5})$/,'CalleCanSubDirector',this.value);"  type="text" class="form-control" name="txt_CalleCanSubDirector" required><span id="span_CalleCanSubDirector"></span>
															</div>
															<!--Aqui comienza el registro con los de mas atribuytos de maestro -->
																<div id="div_ClavePresupuestal">
																	<label>Clave Presupuestal:</label><input type="text" name="txt_ClavePresupuestal" class="form-control" id="txt_ClavePresupuestal"><span id="span_ClavePresupuestal"></span>
																</div>

																<div id="div_rfc">
																	<label>RFC:</label><input id="txt_rfc" type="text" class="form-control" name="txt_rfc"><span id="span_rfc" ></span>
																</div>
																<div id="div_PswCanSubDirector">
																	<label>Contraseña:</label><input id="txt_PswCanSubDirector" type="password" class="form-control" name="txt_PswCanSubDirector" required><span id="span_PswCanSubDirector" ></span>
																</div>
																<div id="div_Psw2CanSubDirector">
																	<label>Repite Contraseña:</label><input id="txt_Psw2CanSubDirector" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2CanSubDirector" required><br><span id="span_Psw2CanSubDirector" ></span>
																</div>
                                <div id="btn_SubDirector">
                                </div>
    												</form>
											</div>
										</div>
										</div>
								</div>
							</div>
						</div>
					</div>
<div id="Mod" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Iniciar sesión</h4>
      </div>
      <div class="modal-body">
    <font size="4"></font>

         <form  action="#">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="form-control" placeholder="E-mail" name="txt_User"  type="text" id="txt_User">
                        </div>
                        </br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" placeholder="Password" name="txt_Password" type="password" id="txt_Password">
                        </div>
                        </br>
                        <input class="btn btn-lg btn-success btn-block" type="submit"  value="Iniciar sesión" id="btn_Login" onclick="return login();">
                        <br>
                        <div id="Login" ></div>
                        <p class="">¿No tienes cuenta? <a href="">Registrate</a></p>
                        <p class="">Se te olvidó la contraseña? <a href="">Recuperar</a></p>

                    </form>
       </div>
    </div>
  </div>
</div>
	</main>
	<footer>

		<i class="fa fa-facebook-official f2c-hover-opacity"></i>
				<i class="fa fa-instagram f2c-hover-opacity"></i>
				<i class="fa fa-twitter f2c-hover-opacity"></i>
			<p>Powered by <strong>Dym Corp</p></strong>
	</footer>
	
</body>

</html>
