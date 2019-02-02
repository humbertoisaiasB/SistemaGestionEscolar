var alpha = /[A-Za-z]/;
var numeric = /[0-9]/;
var alphanumeric = /[A-Za-z0-9]/;
var alphanumeric1 = /[A-Za-z\s#0-9]/;
var helo = /[^\ ]/;
var alphaxd = /[A-Za-z\s.]/;

function validateKeypress(len) {
  if(len>=0&&len<4){
    var keyChar = String.fromCharCode(event.which || event.keyCode);
    return alpha.test(keyChar) ? keyChar : false;
  }else if(len>3&&len<10){
    var keyChar = String.fromCharCode(event.which || event.keyCode);
    return numeric.test(keyChar) ? keyChar : false;
  }else if(len>9&&len<=12){
    var keyChar = String.fromCharCode(event.which || event.keyCode);
    return alpha.test(keyChar) ? keyChar : false;
  }else if(len>12){
    return false;
  }
}

function validacion4all(regex,nom,evaluar){
  if(regex.test(evaluar)==false){
    $("#div_"+nom).addClass("has-error has-feedback");
    $("#span_"+nom).addClass("glyphicon glyphicon-remove form-control-feedback");
  }else{
    $("#div_"+nom).removeClass("has-error has-feedback");
    $("#span_"+nom).removeClass("glyphicon glyphicon-remove form-control-feedback");
    $("#div_"+nom).addClass("has-success has-feedback");
    $("#span_"+nom).addClass("glyphicon glyphicon-ok form-control-feedback");
  }
}

function checkPw(val){
  val = document.getElementById("txt_Psw").value;
  val2 = document.getElementById("txt_Psw2").value;
  if(val != val2 ){
    $("#div_Psw2").addClass("has-error has-feedback");
    $("#span_Psw2").addClass("glyphicon glyphicon-remove form-control-feedback");
  }else{
    $("#div_Psw2").removeClass("has-error has-feedback");
    $("#span_Psw2").removeClass("glyphicon glyphicon-remove form-control-feedback");
    $("#div_Psw2").addClass("has-success has-feedback");
    $("#span_Psw2").addClass("glyphicon glyphicon-ok form-control-feedback");
  }
}

function checkPw1(val){
  val = document.getElementById("txt_Psw1").value;
  val2 = document.getElementById("txt_Psw21").value;
  if(val != val2 ){
    $("#div_Psw21").addClass("has-error has-feedback");
    $("#span_Psw21").addClass("glyphicon glyphicon-remove form-control-feedback");
  }else{
    $("#div_Psw21").removeClass("has-error has-feedback");
    $("#span_Psw21").removeClass("glyphicon glyphicon-remove form-control-feedback");
    $("#div_Psw21").addClass("has-success has-feedback");
    $("#span_Psw21").addClass("glyphicon glyphicon-ok form-control-feedback");
  }
}

function checkPwCan(val){
  val = document.getElementById("txt_PswCan").value;
  val2 = document.getElementById("txt_Psw2Can").value;
  if(val != val2 ){
    $("#div_Psw2Can").addClass("has-error has-feedback");
    $("#span_Psw2Can").addClass("glyphicon glyphicon-remove form-control-feedback");
  }else{
    $("#div_Psw2Can").removeClass("has-error has-feedback");
    $("#span_Psw2Can").removeClass("glyphicon glyphicon-remove form-control-feedback");
    $("#div_Psw2Can").addClass("has-success has-feedback");
    $("#span_Psw2Can").addClass("glyphicon glyphicon-ok form-control-feedback");
  }
}

function NomValid(input){
  var regex = /\.(?=\.)|\s(?=\s)|\d/;
  input.value = input.value.replace(regex, "");
}
function NomEmpreValid(input){
  var regex = /\.(?=\.)|\s(?=\s)/;
  input.value = input.value.replace(regex, "");
}
function validateCurp(len) {
  if(len>=0&&len<4){
    var keyChar = String.fromCharCode(event.which || event.keyCode);
    return alpha.test(keyChar) ? keyChar : false;
  }else if(len>=4&&len<=9){
    var keyChar = String.fromCharCode(event.which || event.keyCode);
    return numeric.test(keyChar) ? keyChar : false;
  }else if(len>9&&len<=15){
    var keyChar = String.fromCharCode(event.which || event.keyCode);
    return alpha.test(keyChar) ? keyChar : false;
  }else if(len>15&&len<=17){
    var keyChar = String.fromCharCode(event.which || event.keyCode);
    return alphanumeric.test(keyChar) ? keyChar : false;
  }else if(len>17){
    return false;
  }
}
function validarXD(dis,longitud,maxlong){
  if(longitud>=0&&longitud<maxlong){
   var keyChar = String.fromCharCode(event.which || event.keyCode);
   return dis.test(keyChar) ? keyChar : false;
 }else{
   return false;
 }
}

function login(){
        var Pass=document.getElementById('txt_Password').value;
        var User=document.getElementById('txt_User').value;
        var datos='txt_Password='+Pass+'&txt_User='+User;
        $.ajax({
          type:'post',
          url:'php/Login.php',
          data:datos,
          success:function(resp){
            $("#Login").html(resp);
          }
        });
        return false;
}
//Funcion para el codigo postal registro 
function codigoEmp(urle,ids,divs){
       var Code=document.getElementById(ids).value;
        var datos='txt_CP='+Code;
        $.ajax({
          type:'post',
          url:urle,
          data:datos,
          success:function(resp){
            $(divs).html(resp);
          }
        });
        return false;
}
//Funcion para el codigo postal registro candidato 
function codigoU(cad,cad1,tipo){
  $.post("php/PostalCan.php",{codigo:cad1,tipoU:tipo}, function(data){
    $(cad).html(data);
  });
}
function codigoUS(cad,cad1,tipo){
  $.post("../php/PostalCan.php",{codigo:cad1,tipoU:tipo}, function(data){
    $(cad).html(data);
  });
}
//funcion para el registrob del maestro 
function codigoMaestro(){
       var cons=document.getElementById('txt_CPCanMaestro').value;
        var datos='input='+cons;
        $.ajax({
          type:'post',
          url:'../php/EliminarEmpleador.php',
          data:datos,
          success:function(resp){
            $('#Cons').html(resp);
          }
        });
        return false;
}
function ConsEmpleador2(){
       var cons=document.getElementById('myInput2').value;
        var datos='input='+cons;
        $.ajax({
          type:'post',
          url:'../php/ConsultarEmpleadores.php',
          data:datos,
          success:function(resp){
            $('#Cons2').html(resp);
          }
        });
        return false;
}
function ConsEmpleador3(){
       var cons=document.getElementById('myInput3').value;
        var datos='input='+cons;
        $.ajax({
          type:'post',
          url:'../php/ModificarEmpleador.php',
          data:datos,
          success:function(resp){
            $('#Cons3').html(resp);
          }
        });
        return false;
}

function MostrarModalConsultar(param){
        var datos='info='+param;
        $.ajax({
          type:'post',
          url:'../php/modalConsultar.php',
          data:datos,
          success:function(resp){
            $('#Mod').html(resp);
          }
        });
        return false;
}


function MostrarModalUpdate(param){
        var datos='info='+param;
        $.ajax({
          type:'post',
          url:'../php/modalUpdate.php',
          data:datos,
          success:function(resp){
            $('#Mod').html(resp);
          }
        });
        return false;
}

function validar(){
    var queso = document.getElementById('tipo');
    queso.setAttribute("value","Alumno");
    var Correo=document.getElementById('txt_Correo').value;
    /*var Nom=document.getElementById('txt_Nom').value;
    var Tel=document.getElementById('txt_Tel').value;
    //var RFC=document.getElementById('txt_RFC').value;
    var CP=document.getElementById('txt_CP').value;
    var Calle=document.getElementById('txt_Calle').value;
    
    var Pass=document.getElementById('txt_Psw').value;
    var Pass2=document.getElementById('txt_Psw2').value;
    */
    var datos='txt_Correo='+Correo;
/*
    'txt_Nom
    ='+Nom+'&txt_Tel='+Tel+'&txt_CP='+CP+'&txt_Calle='+Calle+'&txt_Correo='+Correo+'&txt_Psw='+Pass+'&txt_Psw2='+Pass2;
       */ $.ajax({
          type:'post',
          url:'php/Validar.php',
          data:datos,
          success:function(resp){
            $("#btn").html(resp);
          }
        });
        return false;
}
function validar2(){
    var queso = document.getElementById('tipo');
    queso.setAttribute("value","Maestro");
    /*var Nom=document.getElementById('txt_NomCandidato').value;
    var Ap=document.getElementById('txt_Ap').value;
    var Am=document.getElementById('txt_Am').value;
    var Correo=document.getElementById('txt_CorreoCan').value;
    var TelCasa=document.getElementById('txt_Telcasa').value;
    var TelCelular=document.getElementById('txt_Telcelular').value;
    var Curp=document.getElementById('txt_Curp').value;
    var Cp=document.getElementById('txt_CPCan').value;
    var Calle=document.getElementById('txt_CalleCan').value;
    var Pass=document.getElementById('txt_PswCan').value;
    var Pass2=document.getElementById('txt_Psw2Can').value;*/

    var datos='';
    /*'txt_Nom='+Nom+'&txt_Ap='+Ap+'&txt_Am='+Am+'&txt_Correo='+Correo+'&txt_TelCasa='+TelCasa+'&txt_TelCelular='+TelCelular+'&txt_Curp='+Curp+'&txt_CP='+Cp+'&txt_Calle='+Calle+'&txt_Psw='+Pass+'&txt_Psw2='+Pass2;
       */ 
        $.ajax({
          type:'post',
          url:'php/ValidarCan.php',
          data:datos,
          success:function(resp){
            $("#btnCan").html(resp);
          }
        });
        return false;
}

function validar3(){
  var queso = document.getElementById('tipo');
  queso.setAttribute("value","Director");
  /*var Nom = document.getElementById('txt_NomEmpleador').value;
  var Ap = document.getElementById('txt_Ap').value;
  var Am = document.getElementById('txt_Am').value;
  var TelTrabajo = document.getElementById('txt_Teltrabajo').value;
  var TelCelular = document.getElementById('txt_Telcelular').value;
  var Correo = document.getElementById('txt_Correo').value;
  var Departamento = document.getElementById('txt_Departamento').value;
  var Cp = document.getElementById('txt_CP').value;
  var Calle = document.getElementById('txt_Calle').value;
  var Pw = document.getElementById('txt_Psw').value;
  var Pw2 = document.getElementById('txt_Psw2').value;
  */
  var datos = ''; 
/*'txt_Nom='+Nom+'&txt_Ap='+Ap+'&txt_Am='+Am+'&txt_Correo='+Correo+'&txt_Teltrabajo='+TelTrabajo+'&txt_TelCelular='+TelCelular+'&txt_CP='+Cp+'&txt_Departamento='+Departamento+'&txt_Calle='+Calle+'&txt_Pw='+Pw+'&txt_Pw2='+Pw2;
    */$.ajax({
      type:'post',
      url:'php/ValidaDirector.php',
      data:datos,
      success:function(resp){
        $("#btn_director").html(resp);
      }
    });
    return false;
}
function validar4(){
  var queso = document.getElementById('tipo');
  queso.setAttribute("value","PersonalA");
  /*var Nom = document.getElementById('txt_NomEmpleador').value;
  var Ap = document.getElementById('txt_Ap').value;
  var Am = document.getElementById('txt_Am').value;
  var TelTrabajo = document.getElementById('txt_Teltrabajo').value;
  var TelCelular = document.getElementById('txt_Telcelular').value;
  var Correo = document.getElementById('txt_Correo').value;
  var Departamento = document.getElementById('txt_Departamento').value;
  var Cp = document.getElementById('txt_CP').value;
  var Calle = document.getElementById('txt_Calle').value;
  var Pw = document.getElementById('txt_Psw').value;
  var Pw2 = document.getElementById('txt_Psw2').value;
  */
  var datos = ''; 
/*'txt_Nom='+Nom+'&txt_Ap='+Ap+'&txt_Am='+Am+'&txt_Correo='+Correo+'&txt_Teltrabajo='+TelTrabajo+'&txt_TelCelular='+TelCelular+'&txt_CP='+Cp+'&txt_Departamento='+Departamento+'&txt_Calle='+Calle+'&txt_Pw='+Pw+'&txt_Pw2='+Pw2;
    */$.ajax({
      type:'post',
      url:'php/ValidarPersonalA.php',
      data:datos,
      success:function(resp){
        $("#btn_personalA").html(resp);
      }
    });
    return false;
}
function validar5(){
  var queso = document.getElementById('tipo');
  queso.setAttribute("value","Supervisor");
  /*var Nom = document.getElementById('txt_NomEmpleador').value;
  var Ap = document.getElementById('txt_Ap').value;
  var Am = document.getElementById('txt_Am').value;
  var TelTrabajo = document.getElementById('txt_Teltrabajo').value;
  var TelCelular = document.getElementById('txt_Telcelular').value;
  var Correo = document.getElementById('txt_Correo').value;
  var Departamento = document.getElementById('txt_Departamento').value;
  var Cp = document.getElementById('txt_CP').value;
  var Calle = document.getElementById('txt_Calle').value;
  var Pw = document.getElementById('txt_Psw').value;
  var Pw2 = document.getElementById('txt_Psw2').value;
  */
  var datos = ''; 
/*'txt_Nom='+Nom+'&txt_Ap='+Ap+'&txt_Am='+Am+'&txt_Correo='+Correo+'&txt_Teltrabajo='+TelTrabajo+'&txt_TelCelular='+TelCelular+'&txt_CP='+Cp+'&txt_Departamento='+Departamento+'&txt_Calle='+Calle+'&txt_Pw='+Pw+'&txt_Pw2='+Pw2;
    */$.ajax({
      type:'post',
      url:'php/ValidarSupervisor.php',
      data:datos,
      success:function(resp){
        $("#btn_Supervisor").html(resp);
      }
    });
    return false;
}
function validar6(){
  var queso = document.getElementById('tipo');
  queso.setAttribute("value","SubDirector");
  /*var Nom = document.getElementById('txt_NomEmpleador').value;
  var Ap = document.getElementById('txt_Ap').value;
  var Am = document.getElementById('txt_Am').value;
  var TelTrabajo = document.getElementById('txt_Teltrabajo').value;
  var TelCelular = document.getElementById('txt_Telcelular').value;
  var Correo = document.getElementById('txt_Correo').value;
  var Departamento = document.getElementById('txt_Departamento').value;
  var Cp = document.getElementById('txt_CP').value;
  var Calle = document.getElementById('txt_Calle').value;
  var Pw = document.getElementById('txt_Psw').value;
  var Pw2 = document.getElementById('txt_Psw2').value;
  */
  var datos = ''; 
/*'txt_Nom='+Nom+'&txt_Ap='+Ap+'&txt_Am='+Am+'&txt_Correo='+Correo+'&txt_Teltrabajo='+TelTrabajo+'&txt_TelCelular='+TelCelular+'&txt_CP='+Cp+'&txt_Departamento='+Departamento+'&txt_Calle='+Calle+'&txt_Pw='+Pw+'&txt_Pw2='+Pw2;
    */$.ajax({
      type:'post',
      url:'php/ValidarSubDirector.php',
      data:datos,
      success:function(resp){
        $("#btn_SubDirector").html(resp);
      }
    });
    return false;
}

function mensaje(num){
  swal({
  title: "Seguro que deseas eliminar?",
  text: "No podras revertir los cambios",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Chao Chao! Empleador Eliminado", {
      icon: "success",
    });
    deleteEmpleador(num);
  } else {
    swal("Uff! Por un momento pensamos que ibas a eliminarlo");
  }
});
}
//Aqui esta la accion para abrir el modal.
function MostrarModalConsultarAdmin(param){
        var datos='info='+param;
        $.ajax({
          type:'post',
          url:'../php/modalConsultarAdmin.php',
          data:datos,
          success:function(resp){
            $('#Mod').html(resp);
          }
        });
        return false;
}
//Aqui esta la accion para abrir el modal.
function MostrarModalConsultar(param){
        var datos='info='+param;
        $.ajax({
          type:'post',
          url:'../php/modalConsultar.php',
          data:datos,
          success:function(resp){
            $('#Mod').html(resp);
          }
        });
        return false;
}

//Aqui esta la accion para abrir el modal PARA LA LISTA DE EMPLEADOS.
function MostrarConsultarAdminL(param){
        var datos='info='+param;
        $.ajax({
          type:'post',
          url:'../php/modalConsultarInfo.php',
          data:datos,
          success:function(resp){
            $('#Mod').html(resp);
          }
        });
        return false;
}
//de aqui se consulta todos los usuarios
function ConsAdmi(param){
       var cons=document.getElementById('myInputA2').value;
       var parametros = {
                "input" : cons,
                "fil" : param
        };
        //var datos='input='+cons;
        $.ajax({
          type:'post',
          url:'../php/consultarUsuario.php',
          data:parametros,
          success:function(resp){
            $('#ConsA2').html(resp);
          }
        });
        return false;
}
//eliminar --Al cien
function EliAdmin(){
       var cons=document.getElementById('myInputA').value;
        var datos='input='+cons;
        $.ajax({
          type:'post',
          url:'../php/EliminarUsuario.php',
          data:datos,
          success:function(resp){
            $('#ConsA').html(resp);
          }
        });
        return false;
}
//Funcion eliminar para adminitrador
function deleteAdmin(num){
        var datos='info='+num;
        $.ajax({
          type:'post',
          url:'../php/DeleteAdmin.php',
          data:datos,
        });
}

function mensajeAdmin(num){
  swal({
  title: "Seguro que deseas eliminar?",
  text: "No podras revertir los cambios",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Usuario eliminado con exito", {
      icon: "success",
    });
    deleteAdmin(num);
  } else {
    swal("Uff! Por un momento pensamos que ibas a eliminarlo");
  }
});
}
//Las funciones de este "mensaje" son las siguiientes
//Dado una respuesta afirmativa se tomara las cadenas determinadas
function mensajeBorra(cad1,cad2){
  swal({
  title: "Seguro que deseas eliminar?",
  text: "No podras revertir los cambios",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Usuario eliminado con exito", {
      icon: "success",
    });
    eliminarCosa(cad1,cad2);
  } else {
    swal("Uff! Por un momento pensamos que ibas a eliminarlo");
  }
});
}
//funcion auxiliar
//Donde cad = ala cadena entera sin eliminar nada y con la cadena aun
//Y cad1 = a la cadena de caracteres a eliminar.
function eliminarCosa(cad,cad1){
  var cadena = cad; 
  var res = cadena.replace(cad1, "");
  $.post("../php/DeleteAdmin.php",{todo:todo},function(data){
    //$().html(data);
  });
}
//Funciones de eliminar y consultar empleo de administrador
function ConsAdmiE(param){
       var cons=document.getElementById('myInputE2').value;
        var parametros = {
                "input" : cons,
                "fil" : param
        };
        //var datos='input='+cons;
        $.ajax({
          type:'post',
          url:'../php/consultarEmpleoA.php',
          data:parametros,
          success:function(resp){
            $('#ConsE2').html(resp);
          }
        });
        return false;
}
//eliminar
function EliAdminE(){
       var cons=document.getElementById('myInputE').value;
        var datos='input='+cons;
        $.ajax({
          type:'post',
          url:'../php/EliminarEmpleoA.php',
          data:datos,
          success:function(resp){
            $('#ConsE').html(resp);
          }
        });
        return false;
}

//Funcion eliminar para adminitrador
function deleteAdminE(num){
        var datos='info='+num;
        $.ajax({
          type:'post',
          url:'../php/DeleteAdmin.php',
          data:datos,
        });
        EliAdminE();
}

function mensajeAdminE(num){
  swal({
  title: "Seguro que deseas eliminar?",
  text: "No podras revertir los cambios",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Chao Chao! Empleador Eliminado", {
      icon: "success",
    });
    deleteAdminE(num);
  } else {
    swal("Uff! Por un momento pensamos que ibas a eliminarlo");
  }
});
}
function limpiar(){
  document.getElementById("EmpleoAlert").innerHTML="";
}
//aqui le voy a mover yo jajaja ala verga todo
//donde cad= ala cadena enviada y ty= al tipo del mismo puede ser (consultar admin o empleos) cont=contenedor 
function CEmpleosAdmin(clave,cad,ty,tyC,fil,cont){    
    $.post("../php/consultarUsuario.php", { claveE:clave, busqueda: cad, tipoC: tyC, filtro: fil, tipo: ty }, function(data){
    $(cont).html(data);
    });         
}
function usuariosA(num,ty){
    $.post("../php/modalConsultarAdmin.php", { usuario: num, tipo: ty }, function(data){
    $('#EmpleoAlert').html(data);
    });  
}
function zonaN(num){
  $.post("php/zonas.php", { numeroZ: num}, function(data){
    $('#zonaY').html(data);
  });
}
function zonaRM(num){
  $.post("php/zonas.php", { numeroZ: num}, function(data){
    $('#zonaYM').html(data);
  });
}
function zonaRD(num,tipo,lugar,mod,clave){
  $.post("php/zonas.php", { numeroZ: num, tipoU: tipo, modalidad:mod, claveE:clave}, function(data){
    $(lugar).html(data);
  });
}
//Esta funcion servira para el cambio de clave de escuela en todos los usuarios
function zonaCU(num,tipo,lugar){
  $.post("../php/zonas.php", {numeroZ: num, tipoU: tipo}, function(data){
    $(lugar).html(data);
  });
}
function validaCurpE(cadena,tipo,destino){
  $.post("php/validaCurpR.php",{curpC: cadena,tipoU:tipo}, function(data){
    $(destino).html(data);
  });
}
function ShowSelected(loca,clave,destino1,destino2,destino3){
/* Para obtener el valor,loca es localidad nombre evaluado y clave es, donde esta la clavesita y destino1 y destino2 son para el nombre de la escuela */
var cod = document.getElementById(loca).value;
/* Para obtener el texto */
var combo = document.getElementById(loca);
var selected = combo.options[combo.selectedIndex].text;
document.getElementById(clave).innerHTML = "Clave: ";
/*alert(selected);*/
var cadena = cod;
var res = cadena.split("-");
var valor1 = res[0]; //Valor del primer atributo
var valor2 = res[1]; //Valor segundo atributo
    document.getElementById(destino1).innerHTML = valor1;
    document.getElementById(destino2).innerHTML = valor2;
    $("#"+destino3).val(''+valor2);

    //

}
//Agrega
function ShowSelectedSupervisor(loca,clave,destino1,destino2,destino3){
/* Para obtener el valor,loca es localidad nombre evaluado y clave es, donde esta la clavesita y destino1 y destino2 son para el nombre de la escuela */
var cod = document.getElementById(loca).value;
/* Para obtener el texto */
var combo = document.getElementById(loca);
var selected = combo.options[combo.selectedIndex].text;
document.getElementById(clave).innerHTML = "Clave: ";
/*alert(selected);*/
var cadena = cod;
var res = cadena.split("-");
var valor1 = res[0]; //Valor del primer atributo
var valor2 = res[1]; //Valor segundo atributo
    document.getElementById(destino1).innerHTML = valor1;
    document.getElementById(destino2).innerHTML = valor2;
    $("#"+destino3).val(''+valor2);

    //

}
//Agrega
function ShowSelected2(numero){
/* Para obtener el valor,loca es localidad nombre evaluado y clave es, donde esta la clavesita y destino1 y destino2 son para el nombre de la escuela */
var cod = document.getElementById(numero).value;
/* Para obtener el texto */
var combo = document.getElementById(numero);
var selected = combo.options[combo.selectedIndex].text;
document.getElementById(clave).innerHTML = "Clave: ";
/*alert(selected);*/
zonaCU(cod,'Alumno','#zonaYO');
//var cadena = cod;
//var res = cadena.split("-");
//var valor1 = res[0]; //Valor del primer atributo
//var valor2 = res[1]; //Valor segundo atributo
  //  document.getElementById(destino1).innerHTML = valor1;
  //  document.getElementById(destino2).innerHTML = valor2;
  //  $("#"+destino3).val(''+valor2);

    //

}
//Obtener por grado alumnos y grupo
function alumnosV(cad,tipo, tipo1,grado, grupo, clave, cadD){
  $.post("../php/ConsultaFiltros.php",{busqueda:cad,tipoU: tipo, tipoC: tipo1, GradoU:grado, GrupoU:grupo, claveEscuela1:clave}, function(data){
    $(cadD).html(data);
  });
}
//Una mejora sobre el metodo anterior
function alumnosVA(cad,tipo, tipo1,grado, grupo, clave, cadD, contenido,caso){
  $.post("../php/ConsultaFiltroM.php",{busqueda:cad,tipoU: tipo, tipoC: tipo1, GradoU:grado, GrupoU:grupo, claveEscuela1:clave, todo:contenido, casoT:caso}, function(data){
    $(cadD).html(data);
  });
}
// Esta funcion obtiene las escuelas con los directores asignados para el mismo.
function escuelas(cad1,cad2,cad3,cad4,cad5){
  $.post("../php/Escuelas.php",{clave:cad1, zona:cad2, tipo:cad4, busqueda:cad5}, function(data){
    $(cad3).html(data);
  });
}
//Funcion utilizada para el envio de pdf 
//Ubicacion de archivo = cad1 y cad2 sirve para indicar el div con devolucion
function enviar(cad1,cad2){
  $.post("../php/index.php",{ruta:cad1},function(data){
    $(cad2).html(data);
  });
}
function descargaA(cad1,cad2){
  $.post("../php/descarga.php",{ruta:cad1},function(data){
    $(cad2).html(data);
  });
}
function modifica(cad1,cad2,cad3,cad4){
  $.post("../php/UpdateTotal.php",{Tipo:cad1,TipoDCambio:cad2,id:cad3},function(data){
    $(cad4).html(data);
  });
}
function validaCorreo(cad1,destino){
  $.post("php/ValidaCorreo.php",{correo:cad1},function(data){
    $(destino).html(data);
  });
}
function recuperaE(){
  var correo=document.getElementById('correo').value;
        var curp=document.getElementById('curp').value;
        var datos='correo='+correo+'&curp='+curp;
        $.ajax({
          type:'post',
          url:'php/recupera.php',
          data:datos,
          success:function(resp){
            $("#Log").html(resp);
          }
        });
        return false;
}

//onchange 
function selecion(cad1,cad2,cad3)
{
/* Para obtener el valor */
var cod = document.getElementById("cambioZona").value;
alert(cod);
 
/* Para obtener el texto */
var combo = document.getElementById("cambioZona");
var selected = combo.options[combo.selectedIndex].value;
alert(selected);

  $.post("../php/zonas.php",{numeroZ:selected,tipoU:cad2},function(data){
    $(cad3).html(data);
  });
}
//funcion 
function agregaCentros(cad1,cad2){
  $.post("php/Centros.php",{tipo:cad1},function(data){
    $(cad2).html(data);
  });
}
function agregaZonas(cad1, cad2, cad3){
  $.post("php/CentrosZona.php",{modalidad:cad1,tipo:cad3},function(data){
    $(cad2).html(data);
  });
}
function subirEvidencias(cad1,cad2){
  //Variables
  var nombre = document.getElementById("txt_NombreEvidencia"),
      nombreF = nombre.value,
      modal = document.getElementById("Mod"),
      modalImpreso = modal.value,
      aux = "modal fade";
  //Funciones
  if(nombreF === ""){
    nombre.setAttribute("placeholder","Agrega una tarea");
    alert("Tienes que introducir un nombre");

  }else{
    aux = "modal fade in"
    $.post("../php/subirEvidencia.php",{nombreN:cad1,nombreFinal:nombreF,materia:cad2},function(data){
      $('#Mod').html(data);
    });
  }
  $('#Mod').addClass(aux);
}
function actualizarTabla(cad1, cad2, cad3){
  $.post("../php/EvidenciasTabla.php",{materia:cad1,curp:cad2},function(data){
    $(cad3).html(data);
  });
}
//La funcion de un menu
function menuAgregarEvidencias(cad1,cad2,cad3){
  $.post("../php/datosEvidencias.php",{aux:cad2,materia:cad3},function(data){
    $(cad1).html(data);
  });
}

//funcion determinada para todos los informes de todos los usuarios modal y opciones
//Esta funcion es la que maneja todos los usuarios para la realizacion de un reporte
//Los parametros son los siguientes
//Catgorias para los reportes seran los siguientes.
//La primera seria listado: listado
//La segunda seria expediente listado: expediente
//La tercera seria Total de H y M: total
//La cuarta seria ficha de identificacion: identificacion
//La quinta seria reporte personal de archivos subidos ala plataforma: personal
//(cad1=tipoReporte,cad2=DequeUsuarioLoHaras,cad3=Modalidad,cad4=claveCentroTrabajo,cad5=retorno)
function reporte(cad1,cad2,cad3,cad4,cad5){
  $.post("../php/reportes.php",{tipo:cad1,para:cad2,todo:cad3,tipoU:cad4},function(data){
    $(cad5).html(data);
  });
}
//funcion para ir hacia la preparacion del pdf
function crearPdf(cad1,cad2,cad3){
  //Para las variables
  var filtro1 = document.getElementById("S_Modalidad"+cad2),
      valF1 = filtro1.value,
      filtro2 = document.getElementById("S_Centros"+cad2),
      valF2 = filtro2.value,
      filtro3 = document.getElementById("S_Grados"+cad2),
      valF3 = filtro3.value,
      filtro4 = document.getElementById("S_Grupos"+cad2),
      valF4 = filtro4.value,
      filtro = "no",
      vacio = " ";
  if(cad1 == "total"){
    var filtro5 = document.getElementById("S_Sexo"+cad2),
        valF5 = filtro5.value;
    if(valF1 == "todos" && valF2 == "todos" && valF3 == "todos"){
    alert("Muy bien amiguito, significa que filtros nel");
    filtro = "no";
    $.post("../php/librerias/GenerarPDF.php",{informeT:cad1,tipoU:cad2,filtro:filtro,f1:vacio,f2:vacio,f3:vacio,f4:vacio,f5:vacio},function(data){
      $(cad3).html(data);
    }); 
    }else{
      var condicion1 = ((valF1 == "todos") ? " ":valF1),
        condicion2 = ((valF2 == "todos") ? " ":valF2),
        condicion3 = ((valF3 == "todos") ? " ":valF3),
        condicion4 = ((valF4 == "todos") ? " ":valF4),
        condicion5 = ((valF5 == "todos") ? " ":valF5),
    filtro = "si";
    alert("hey1 : "+condicion1+" hey1 : "+condicion2);
    $.post("../php/librerias/GenerarPDF.php",{informeT:cad1,tipoU:cad2,filtro:filtro,f1:condicion1,f2:condicion2,f3:condicion3,f4:condicion4,f5:condicion5},function(data){
      $(cad3).html(data);
    }); 
  }

  }else{
    if(valF1 == "todos" && valF2 == "todos" && valF3 == "todos"){
    alert("Muy bien amiguito, significa que filtros nel");
    filtro = "no";
    $.post("../php/librerias/GenerarPDF.php",{informeT:cad1,tipoU:cad2,filtro:filtro,f1:vacio,f2:vacio,f3:vacio,f4:vacio},function(data){
      $(cad3).html(data);
    }); 
    }else{
      var condicion1 = ((valF1 == "todos") ? " ":valF1),
        condicion2 = ((valF2 == "todos") ? " ":valF2),
        condicion3 = ((valF3 == "todos") ? " ":valF3),
        condicion4 = ((valF4 == "todos") ? " ":valF4),
    filtro = "si";
    alert("hey1 : "+condicion1+" hey1 : "+condicion2);
    $.post("../php/librerias/GenerarPDF.php",{informeT:cad1,tipoU:cad2,filtro:filtro,f1:condicion1,f2:condicion2,f3:condicion3,f4:condicion4},function(data){
      $(cad3).html(data);
    }); 
  }
  }      
  alert ('El pdf se esta realizando'); 
  setTimeout ("window.open('../assets/Pdf/Prueba100.pdf'); alert ('Redireccionando...');", 5000); 
}
//funcion para las claves maestros
//Esta funcion tiene por parametros esto y es;:
//Que son los siguientes:(cad1=tipoDeRai
//Para las funciones
function funcionDeterminada(cad1,cad2,cad3,cad4){
  /* Para obtener el valor,loca es localidad nombre evaluado y clave es, donde esta la clavesita y destino1 y destino2 son para el nombre de la escuela */
  var cod = document.getElementById(cad1).value;
  /* Para obtener el texto */
  var combo = document.getElementById(cad1);
  var selected = combo.options[combo.selectedIndex].text;
  alert("hola como estas "+cod);
  var es = "";
  if(cod == "super"){
    es = "no";
  }else if(cod == "maestroG"){
    es = "si";
  }else if (cod == "directorG") {
    es = "si";
  }else if (cod == "directorNG"){
    es = "no";
  }else if (cod == "asesorP") {
    es = "no";
  }else if (cod == "nuevo") {
    es = "si";
  }else if (cod == "sub") {
    es = "no";
  }else{
    es = "no";
  } 
  $.post("php/Grados.php",{tipoU:cad3,modalidad:cad4,caso:es},function(data){
      $(cad2).html(data);
    }); 
}
//Para las funciones 
//Para las claves dinamicas
function masClaves(){

}
//Claves termina aqui