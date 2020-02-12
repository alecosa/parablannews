/**
 hideandshow - Ocultar o mostrar contenido del panel parablanNews
 version: 1.2 - (14/01/2014)
 @autor Hector Alejandro Parada Blanco
 licencia LGPL v.2.1
**/


//Ocultar divs
function ocultar(id){
document.getElementById(id).style.display="none";
}

//Mostrar Divs
function mostrar(id){
ocultar("panelnuevoarticulo");
ocultar("panelmodificar");
ocultar("panelnuevoestilo");
document.getElementById(id).style.display="block";
}

//Mostrar Divs editar contenido
function mostrar_coneditar(id){
ocultar("editar_banner");
ocultar("editar_contactame");
ocultar("editarcontenidoadd");
ocultar("editarcategorias");
document.getElementById(id).style.display="block";
}

//habilitar primer contenido
function habilitarcontenido1(url1, titulo1, descripcion1, imagen1){
  if(link1.checked==true){
  document.getElementById(url1).removeAttribute("disabled");
  document.getElementById(titulo1).removeAttribute("disabled");
  document.getElementById(descripcion1).removeAttribute("disabled");
  document.getElementById(imagen1).removeAttribute("disabled");
  }
  else{
  document.getElementById(url1).setAttribute("disabled","disabled");
  document.getElementById(titulo1).setAttribute("disabled","disabled");
  document.getElementById(descripcion1).setAttribute("disabled","disabled");
  document.getElementById(imagen1).setAttribute("disabled","disabled");
  //limpiar primer contenido
  document.getElementById(url1).value="";
  document.getElementById(titulo1).value="";
  document.getElementById(descripcion1).value="";
  document.getElementById(imagen1).value="";
  }
}

//habilitar segundo contenido
function habilitarcontenido2(url2, titulo2, descripcion2, imagen2){
  if(link2.checked==true){
  document.getElementById(url2).removeAttribute("disabled");
  document.getElementById(titulo2).removeAttribute("disabled");
  document.getElementById(descripcion2).removeAttribute("disabled");
  document.getElementById(imagen2).removeAttribute("disabled");
  }
  else{
  document.getElementById(url2).setAttribute("disabled","disabled");
  document.getElementById(titulo2).setAttribute("disabled","disabled");
  document.getElementById(descripcion2).setAttribute("disabled","disabled");
  document.getElementById(imagen2).setAttribute("disabled","disabled");
  //limpiar segundo contenido
  document.getElementById(url2).value="";
  document.getElementById(titulo2).value="";
  document.getElementById(descripcion2).value="";
  document.getElementById(imagen2).value="";
  }
}

//habilitar tercer contenido
function habilitarcontenido3(url3, titulo3, descripcion3, imagen3){
  if(link3.checked==true){
  document.getElementById(url3).removeAttribute("disabled");
  document.getElementById(titulo3).removeAttribute("disabled");
  document.getElementById(descripcion3).removeAttribute("disabled");
  document.getElementById(imagen3).removeAttribute("disabled");
  }
  else{
  document.getElementById(url3).setAttribute("disabled","disabled");
  document.getElementById(titulo3).setAttribute("disabled","disabled");
  document.getElementById(descripcion3).setAttribute("disabled","disabled");
  document.getElementById(imagen3).setAttribute("disabled","disabled");
  //limpiar tercer contenido
  document.getElementById(url3).value="";
  document.getElementById(titulo3).value="";
  document.getElementById(descripcion3).value="";
  document.getElementById(imagen3).value="";
  }
}

//habilitar cambiar nombre categoria
function habilitarcamcat(nombrecon,textdelete,nomnewcon){
  if(cambiacon.checked==true){
  document.getElementById(textdelete).value="";
  document.getElementById(textdelete).setAttribute("disabled","disabled");
  document.getElementById(nomnewcon).value="";
  document.getElementById(nomnewcon).setAttribute("disabled","disabled");
  eliminarcon.checked=false;
  nuevocon.checked=false;
  document.getElementById(nombrecon).removeAttribute("disabled");
  }
}

//habilitar nueva categoria
function habilitarnewcat(nombrecon,textdelete,nomnewcon){
  if(nuevocon.checked==true){
  document.getElementById(nombrecon).value="";
  document.getElementById(nombrecon).setAttribute("disabled","disabled");
  document.getElementById(textdelete).value="";
  document.getElementById(textdelete).setAttribute("disabled","disabled");
  cambiacon.checked=false;
  eliminarcon.checked=false;
  document.getElementById(nomnewcon).removeAttribute("disabled");
  }
}

//habilitar eliminar categoria
function habilitarelimicat(nombrecon,textdelete,nomnewcon){
  if(eliminarcon.checked==true){
  document.getElementById(nombrecon).value="";
  document.getElementById(nombrecon).setAttribute("disabled","disabled");
  document.getElementById(nomnewcon).value="";
  document.getElementById(nomnewcon).setAttribute("disabled","disabled");
  cambiacon.checked=false;
  nuevocon.checked=false;
  document.getElementById(textdelete).removeAttribute("disabled");
  }
}
