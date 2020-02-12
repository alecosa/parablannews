/**
 modalparablan - Mensajes emergentes con estilo css
 version: 1.2 - (12/01/2014)
 @autor Hector Alejandro Parada Blanco
 licencia LGPL v.2.1
**/


function createDiv(t,c){//Crear div emergente
var divTag = document.createElement("div");divTag.id = "mensajemodal";divTag.className = "dynamicDiv";//Creamos contenido
divTag.innerHTML = "<table border=0 width=100% height=200px><td height=34px align=center class=titulo>"+t+"<tr><td class=contenido>"+c+"<tr><td height=34px align=center><input type=button value=Ok class=aceptar onclick=callback()></input></table>";
document.body.appendChild(divTag);}
function callback(config, result){var div = document.getElementById("mensajemodal");div.parentNode.removeChild(div);}//funcion retornar

//Mover div con el mouse
var x, y;
var estaPulsado = false;
function ratonPulsado(evt) {
//Posición inicial
x = evt.clientX;y = evt.clientY;estaPulsado = true;
}
function ratonMovido(evt) {if(estaPulsado) {
//Calcular la diferencia de posición
var xActual = evt.clientX;var yActual = evt.clientY;var xInc = xActual-x;var yInc = yActual-y;x = xActual;y = yActual;
//Establecer la nueva posición
var elemento = document.getElementById("mensajemodal");var position = getPosicion(elemento);elemento.style.top = (position[0] + yInc) + "px";elemento.style.left = (position[1] + xInc) + "px";}
}
function ratonSoltado(evt) {
estaPulsado = false;
}
/*
Nuevos valores para el elemento div
*/
function getPosicion(elemento) {
var posicion = new Array(2);if(document.defaultView && document.defaultView.getComputedStyle) {posicion[0] = parseInt(document.defaultView.getComputedStyle(elemento, null).getPropertyValue("top"))
posicion[1] = parseInt(document.defaultView.getComputedStyle(elemento, null).getPropertyValue("left"));
} else {
//Valores para Internet Explorer
posicion[0] = parseInt(elemento.currentStyle.top);            
posicion[1] = parseInt(elemento.currentStyle.left);              
}     
return posicion;
}
