(function(){
	// Variables
	var raiz = document.getElementById("tipo"),
		raiz1 = ""+raiz.value;
	  //Modificacion al codigo en la linia tarea input dando a oportunidad a un changue 
  var lista = document.getElementById("listaClave"+raiz1),
      cont = 0,
      clave = document.getElementById("clave"+raiz1),
      btnNuevaTarea = document.getElementById("btn-agregarClave"+raiz1);
	// Funciones
	var agregarTarea1 = function(){
		var final = ""+clave.value;
        aux = "";
    var nuevaTarea = document.createElement("li"),
        enlace = document.createElement("a"),
        contenido = document.createTextNode(final);

      //alert("El valor de el grado es: "+final+" Y el valor de grupo es : "+tarea1);     
    cont++;
    // Agregamos el contenido al enlace
    enlace.appendChild(contenido);
    // Le establecemos un atributo href
    enlace.setAttribute("href", "#");
    // Agrergamos el enlace (a) a la nueva tarea (li)
    nuevaTarea.appendChild(enlace);
    // Agregamos la nueva tarea a la lista
    lista.appendChild(nuevaTarea);

    alert("queso ya llego y el valor es :"+raiz1);
    final.value = "";
		for (var i = 0; i <= lista.children.length -1; i++) {
			lista.children[i].addEventListener("click", function(){
				this.parentNode.removeChild(this);
			});
		}

	};
	var comprobarInput = function(){
		//tareaInput.className = "";
		//tareaInput.setAttribute("placeholder", "Agrega tu tarea");
	};

	var eleminarTarea1 = function(){
		this.parentNode.removeChild(this);
	};

	// Eventos
	// Agregar Tarea	
	btnNuevaTarea.addEventListener("click", agregarTarea1);
	// Comprobar Input
	//tareaInput.addEventListener("click", comprobarInput);

	// Borrando Elementos de la lista
	for (var i = 0; i <= lista.children.length -1; i++) {
		lista.children[i].addEventListener("click", eleminarTarea1);
		

		//lista1.children[i].addEventListener("click",eleminarTarea);
	}
}());