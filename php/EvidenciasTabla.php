<?php
  function control($cad1){
    $aux = "";
    $total = strlen($cad1);
    $cont =0;
    for($i=0; $i<$total; $i++){
      if($cad1[$i] == "_"){
        $cont++;
      }
    }
    
    return $chico;
  }  
  //mostrarEvidencia
  function caele($cad1,$cad2){
    $total = strlen($cad1);
    $aux = "";
    $salida = false;
    for($i=0; $i<$total; $i++){
      if($cad1[$i] == "_"){
        if($aux == $cad2){
          $aux = "";
          $salida = true;
          break;
        }else{
          $aux = "";
          $salida = false;
        }
      }else{
        $aux = $aux.$cad1[$i];
      }
    }
    return $salida; 
  }
	include 'Conexion.php';
	session_start();
	$directorio = opendir("../php/documentos/alumno/".$_POST['curp']."/"); //ruta actual
?>
<table class="table">
                                      <thead>
                                        <tr>
                                          <th>Nombre asignado.</th>
                                          <th>Fecha en que se realizó.</th>
                                          <th>Ver PDF.</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php  
                                            $hoy = getdate(); //La gecha
                                            $fecha = "";
                                            $cadenaAño="201";
                                            $posi="";
                                            while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
                                            {
                                                if (!is_dir($archivo) && caele($archivo,$_POST['materia'])== true)//verificamos si es o no un directorio
                                                { 
                                                    $fecha = substr($archivo, 4,10);
                                                    echo  '<tr>
                                                            <td>'.$archivo.'</td>
                                                            <td>'.$fecha.'</td>
                                                            <td><button class="btn btn-info"  onclick="window.open('."'".'../php/documentos/alumno/'.$_POST['curp'].'/'.$archivo."'".');" >Ver pdf</button></td>
                                                          </tr>';
                                                }
                                            }
                                        ?>
                                      </tbody>
                                    </table>