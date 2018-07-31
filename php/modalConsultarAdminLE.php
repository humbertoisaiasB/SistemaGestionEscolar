<?php
include("Conexion.php");
session_start();
//if ('$_POST[es]'=="empleo") {
  $asd = mysqli_query($con,"select e.Puesto, u.Nom, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle
  FROM empleador AS em 
  INNER JOIN usuarios AS u ON ( em.id_Usuario = u.id_Usuario ) 
  INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador AND e.id_Empleador=em.id_Empleador) where e.id_Empleo='$_POST[info]' and em.id_Empresa=em.id_Empresa");
  $row = mysqli_fetch_array($asd);
//}
?>
<div class="modal-dialog modal-sm">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Consultar información</h4>
    </div>
    <div class="modal-body">
  <font size="4"></font>
          <?php
                echo "<p><b>El nombre del empleo es: </b>".$row['Puesto']."</p>";
                echo "<p><b>Nombre de la empresa: </b>".$row['Nom']."</p>";
          ?>
     </div>
  </div>
</div>

<?php 

  //SQL para consultar con empresa con numeros de empleos (filtro y el standar)
  //SELECT emp.id_Empresa, u.Nom, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle, COUNT(u.Nom) cont
  //FROM empresa AS emp
  //INNER JOIN empleador AS em ON ( emp.id_Empresa= em.id_Empresa )
  //INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador )
  //INNER JOIN usuarios AS u ON ( emp.id_Usuario=u.id_Usuario ) WHERE emp.id_Empresa=em.id_Empresa GROUP BY u.Nom
  //sql dentro del filtro empresa donde se muestra una lista de empleadores con un id empresa que pasaremos por parametro-----------------
  //SELECT u.Nom, u.Ap, u.Am, em.Sexo, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle, COUNT(em.id_Empleador) cont
  //FROM empleador AS em 
  //INNER JOIN usuarios AS u ON ( em.id_Usuario = u.id_Usuario ) 
  //INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador AND e.id_Empleador=em.id_Empleador) where em.id_Empleador=e.id_Empleador and em.id_Empresa=1 GROUP BY em.id_Empleador
  //sql para la lista de empreos dentro del filtro empresa-------
  //SELECT e.Puesto, u.Nom, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle
  //FROM empleador AS em 
  //INNER JOIN usuarios AS u ON ( em.id_Usuario = u.id_Usuario ) 
  //INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador AND e.id_Empleador=em.id_Empleador) where em.id_Empleador=e.id_Empleador and em.id_Empresa=1  
  //sql dentro del filtro empresa un empleo specifico
  //SELECT e.Puesto,e.Turno,emp.id_Empresa, u.Nom, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle
  //FROM empresa AS emp
  //INNER JOIN  empleador AS em ON ( emp.id_Empresa= em.id_Empresa )
  //INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador )
  //INNER JOIN usuarios AS u ON ( emp.id_Usuario=u.id_Usuario ) WHERE emp.id_Empresa=em.id_Empresa and e.id_Empleo=1  





  //SQL PARA consultar con empleadores (filtro empleador solo)
  //SELECT u.Nom, u.Ap, u.Am, em.Sexo, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle, COUNT(u.Nom) cout 
  //FROM empleador AS em 
  //INNER JOIN usuarios AS u ON ( em.id_Usuario = u.id_Usuario ) 
  //INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador AND e.id_Empleador=em.id_Empleador) where em.id_Empleador=e.id_Empleador GROUP BY u.Nom


  //SELECT u.Nom, u.Ap, u.Am, em.Sexo, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle, COUNT(u.Nom) cout 
//FROM empleador AS em 
//INNER JOIN usuarios AS u ON ( em.id_Usuario = u.id_Usuario )
//INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador AND e.id_Empleador=em.id_Empleador) where em.id_Empleador=e.id_Empleador and e.id_Empleador=1 GROUP BY u.Nom
 ?>