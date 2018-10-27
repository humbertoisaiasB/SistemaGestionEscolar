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
      url:'../php/ValidarSupervisor.php',
      data:datos,
      success:function(resp){
        $("#btn_Supervisor").html(resp);
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
function zonaRD(num,tipo,lugar){
  $.post("php/zonas.php", { numeroZ: num, tipoU: tipo}, function(data){
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