<?php
  include ("Conexion.php");
  session_start();
  $asd = mysqli_query($con,"select e.id_Empleo,e.Puesto,e.Turno,emp.id_Empresa, u.Nom, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle
  FROM empresa AS emp
  INNER JOIN  empleador AS em ON ( emp.id_Empresa= em.id_Empresa )
  INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador )
  INNER JOIN usuarios AS u ON ( emp.id_Usuario=u.id_Usuario ) WHERE emp.id_Empresa=em.id_Empresa and e.Puesto LIKE '$_POST[input]%'");
  //$asd = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Nom like '$_POST[input]%' limit 0,6");
  //if(mysqli_num_rows($asd)>1){
    while ($row = mysqli_fetch_array($asd)) {
      echo '<div class="col-sm-4">
            <div class="thumbnail">
              <a  class="img-fluid thumbnail" oonclick="return MostrarConsultarAdminL('.$row['id_Empleo'].');">
                <img src="../assets/images/Jobs.png" height="70px" width="70px">
              </a>
              <div class="caption">
                <h3>'.$row['Puesto'].'</h3>
                <p><a onclick="return MostrarConsultarAdminL('.$row['id_Empleo'].');" class="btn btn-primary" role="button">Consultar!</a>
              </div>
            </div>
          </div>';
      }

  
  //}

  //SQL para consultar con empresa con numeros de empleos (filtro y el standar)
  //SELECT emp.id_Empresa, u.Nom, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle, COUNT(u.Nom) cont
  //FROM empresa AS emp
  //INNER JOIN  empleador AS em ON ( emp.id_Empresa= em.id_Empresa )
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


