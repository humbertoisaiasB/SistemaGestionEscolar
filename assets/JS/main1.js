(function(){
	// Variables
	//Modificacion al codigo en la linia tarea input dando a oportunidad a un changue 
	var lista = document.getElementById("lista"),
		aux = "",
		destino = document.getElementById("valor1"),
		claveEscuela = document.getElementById("prueba13EM"),
		tareaInput1 = document.getElementById("S_GradoM"),
		tareaInput2 = document.getElementById("S_GrupoM"),
		btnNuevaTarea = document.getElementById("btn-agregar");

	// Funciones
	var agregarTarea = function(){
		var final = ""+tareaInput1.value+" "+tareaInput2.value+" Clave escuela : "+claveEscuela.value,
			aux = "";
		var tarea = tareaInput1.value,
			tarea1 = tareaInput2.value,
			nuevaTarea = document.createElement("li"),
			enlace = document.createElement("a"),
			contenido = document.createTextNode(final);

			//alert("El valor de el grado es: "+final+" Y el valor de grupo es : "+tarea1);			

		// Agregamos el contenido al enlace
		enlace.appendChild(contenido);
		// Le establecemos un atributo href
		enlace.setAttribute("href", "#");
		// Agrergamos el enlace (a) a la nueva tarea (li)
		nuevaTarea.appendChild(enlace);
		// Agregamos la nueva tarea a la lista
		lista.appendChild(nuevaTarea);

		final.value = "";

		alert("Usted a agregado un grado y grupo a su cargo. Continue agregando o cierre la pestaña para continuar")

		for (var i = 0; i <= lista.children.length -1; i++) {
			lista.children[i].addEventListener("click", function(){
				this.parentNode.removeChild(this);
			});
			aux+=lista.children[i]"";
		}

	};
	var comprobarInput = function(){
		//tareaInput.className = "";
		//tareaInput.setAttribute("placeholder", "Agrega tu tarea");
	};

	var eleminarTarea = function(){
		this.parentNode.removeChild(this);
	};

	// Eventos
	// Agregar Tarea	
	btnNuevaTarea.addEventListener("click", agregarTarea);
	// Comprobar Input
	//tareaInput.addEventListener("click", comprobarInput);

	// Borrando Elementos de la lista
	for (var i = 0; i <= lista.children.length -1; i++) {
		lista.children[i].addEventListener("click", eleminarTarea);
		

		//lista1.children[i].addEventListener("click",eleminarTarea);
	}
	destino.setAttribute("placeholder", ""+aux);
}());