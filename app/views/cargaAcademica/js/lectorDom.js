/*
	var TablaCargaAcademica = document.getElementsByName("NameTablaCargaAcademica");
	var filas = TablaCargaAcademica[0].getElementsByTagName("tr");
	var columna = filas[0].getElementsByTagName("td");
	for (var i = 0; i < columna.length; i++) {
		console.log(columna[i].childNodes[0].nodeValue);	
	};
	//var elemento = columna[1].childNodes[0].nodeValue;
	//alert(filas.length);
	alert(elemento);
*/

/*	var tabla = document.getElementsByName("NameTablaCargaAcademica");
	var trs = tabla[0].getElementsByTagName("tr");
	var tds = trs[2].getElementsByTagName("td");

	var valores = tds[0].childNodes[0].nodeValue;
	
	console.log(valores);
*/
	function generar(){
		var tabla = document.getElementsByName("NameTablaCargaAcademica");
		var trs = tabla[0].getElementsByTagName("tr");
		var tds = trs[2].getElementsByTagName("td");
		var divs = tds[1].getElementsByTagName("div");
		console.log(divs[0].childNodes[0].nodeValue);
		alert("hello world");
	}
	function leer(){
		var tabla = document.getElementsByName("NameTablaCargaAcademica");
		var trs = tabla[0].getElementsByTagName("tr");
		var tds = trs[2].getElementsByTagName("td");
		var divs = tds[1].getElementsByTagName("div");

		var docente = divs[0].getElementsByName("docente")[0];
		//var texto = tds[0].childNodes[0].nodeValue;
		alert(docente);

	}	

	function probar(){
	var nombre = document.getElementsByName("nombre")[0].value;
	console.log(nombre);
}