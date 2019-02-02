<?php


  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  	<link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div id="section-left">
      <div class="">
        <table>
      <tr >
        <td rowspan="1" class="logo">
          <img src="../assets/images/logoZ.png"> 
        </td>
        <td colspan="3">
          <h2>Secretaria de educacion publica</h2>
          <h3>CORDINACION DE EDUCACION BASICA</h3>
          <h4>DIRECCION GENERAL DE EDUCACION SECUNDARIA</h4>
          <h4>DIRECCION DE EDUCACION TELESECUNDARIA</h4>
          <h5>SUPERVISION ESCOLAR DE TELESECUNDARIAS</h5>
          <h3>'.$val["Nom"].' '.$val["Ap"].'</h3>
          <span class="intro">'.$val["curpMaestro"].'</span> 
                <span class="num">Celular: '.$val["Celular"].'</span>
                <span class="num">Casa: '.$val["Casa"].'</span>
        </td>
        <td rowspan="1" class="logo">
          <img src="../assets/images/logoE.png"> 
        </td>
      </tr>
    </table>
    <!--Aqui empieza la tabla mejorada full power-->7
    <div class="">
    	<h3>Titulo del informe</h3>
    	<p>Nombre de la escuela: <span>tal</span>    Clave:<span>14DT</span>   Zona: <span>6</span></p>
    	<p>Localidad: <span>tal</span>   Municipio: <span>Uno</span></p>
    	<p>Maestr(a): <span>Jose</span></p>
    	<p>Grado: <span>1</span>   Grupo: <span>B</span></p>
    	<table border="1">
    		<tr>
    			<td>
    				<p>Numero</p>
    			</td>
    			<td>
    				<p>Nombre de alumno</p>
    			</td>
    			<td>
    				<p>Grado</p>
    			</td>
    			<td>
    				<p>Grupo</p>
    			</td>
    			<td>
    				<p>Clave de centro de trabajo</p>
    			</td>
    		</tr>
    		<tr>
    			'.$datosFinal.'
    		</tr>
    	</table>
    </div>
    <!--Aqui acaba codigo agregado -->
        <div class="content">
          <span class="intro">'.$val["curpMaestro"].'</span> 
          <span class="num">Celular: '.$val["Celular"].'</span>
          <span class="num">Casa: '.$val["Casa"].'</span>
          <div class="email">
            <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
            '.$val["Correo"].'
          </div>
        </div>
      </div>
    </div>
    <div id="section-right">
      <div class="wrapper">
        <div class="section">
          <div class="title">
            <i class="fa fa-user" aria-hidden="true"></i>
            Lista de alumnos que toman clases contigo.
          </div>
          '.$datosFinal.'
        </div>
        </div>
      </div>
    </div>
  </body>
  </html>