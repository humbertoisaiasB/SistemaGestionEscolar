(function(){
	// Variables
	var tipo = document.getElementById("tipo"),
		tipo1 = tipo.value;
	//Modificacion al codigo en la linia tarea input dando a oportunidad a un changue 
	var lista = document.getElementById("lista"+tipo1),
		aux = "",
		destino = document.getElementById("valor1"),
		claveEscuela = document.getElementById("prueba13E"+tipo1),
		modalidad = document.getElementById("prueba14"+tipo1),
		tareaInput1 = document.getElementById("S_Grado"+tipo1),
		tareaInput2 = document.getElementById("S_Grupo"+tipo1),
		btnNuevaTarea = document.getElementById("btn-agregar"+tipo1);
	//Agregado
	var hace = document.getElementById("S_Quehace"+tipo1),
		valorH = hace.value;
	//Agregado 
	// Funciones
	var agregarTarea = function(){
		if(tipo1 == "Maestro" || tipo1 == "Alumno" || tipo1 == "Director"){
			var gradosYg = (valorH == "maestroG" || valorH == "nuevo" || valorH == "directorG") ? ", "+tareaInput1.value+"°"+tareaInput2.value : " ";
			var auxGra = (valorH == "maestroG" || valorH == "nuevo" || valorH == "directorG") ? "|"+tareaInput1.value+"|"+tareaInput2.value+"|":"| ";
			var final = ""+(lista.children.length+1)+".- "+modalidad.value+", "+claveEscuela.value+gradosYg,
			aux = ""+modalidad.value+"|"+claveEscuela.value+auxGra+valorH+"|",
			id = "id_"+(lista.children.length)+tipo1;
		}else{
			var final = ""+(lista.children.length+1)+".- "+modalidad.value+", "+claveEscuela.value,
			aux = ""+modalidad.value+"|"+claveEscuela.value+"|",
			id = "id_"+(lista.children.length)+tipo1;
		}
		//formato modalidad|centroTrabajo|grado|grupo|
		var nuevaTarea = document.createElement("li"),
			cosa = document.createElement("input"),
			enlace = document.createElement("a"),
			contenido = document.createTextNode(final);

			//alert("El valor de el grado es: "+final+" Y el valor de grupo es : "+tarea1);	
		//mover
		cosa.setAttribute("value",aux);
		cosa.setAttribute("name",id);
		cosa.setAttribute("type","hidden");
		//mover		
		//mover
		enlace.appendChild(cosa);
		//mover
		// Agregamos el contenido al enlace
		enlace.appendChild(contenido);
		// Le establecemos un atributo href
		enlace.setAttribute("href", "#");
		// Agrergamos el enlace (a) a la nueva tarea (li)
		nuevaTarea.appendChild(enlace);
		// Agregamos la nueva tarea a la lista
		lista.appendChild(nuevaTarea);

		final.value = "";

		alert("Usted a agregado un grado y grupo a su cargo. Continue agregando o cierre la pestaña para continuar");

		for (var i = 0; i <= lista.children.length -1; i++) {
			lista.children[i].addEventListener("click", function(){
				this.parentNode.removeChild(this);
			});
		}

	};

	var eleminarTarea = function(){
		this.parentNode.removeChild(this);
	};
	// Eventos
	// Agregar Tara
	btnNuevaTarea.addEventListener("click", agregarTarea);
	//
	for (var i = 0; i <= lista.children.length -1; i++) {
		lista.children[i].addEventListener("click", eleminarTarea);
		//lista1.children[i].addEventListener("click",eleminarTarea);
	}
	
	// Comprobar Input
	//tareaInput.addEventListener("click", comprobarInput);
	
	//queso
	// Borrando Elementos de la lista
	
}());