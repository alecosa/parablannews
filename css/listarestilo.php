<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2.

Listar estilos que se encuentren en carpetas dentro del 
directorio css.

--*/


$salto=0;

$caracter="\\";
//$ruta=getcwd(); //Directorio actual
$ruta="../css";
$dir = (isset($_GET['dir']))?$_GET['dir']:$ruta;
$directorio=opendir($dir); 
echo("<table border='0' width='100%'>");
while ($archivo = readdir($directorio)) { 
  if($archivo == '..'){
  //Son archivos
  }
  elseif(is_dir("$dir/$archivo"))
  if($archivo=="."){
  //Raiz
  }
  else{
  	echo("
	      <td>
		  <table border='0' width='100%'>
		  <td align='center'><h4>$archivo</h4></td>
		  <tr>
		  <td align='center'><a href='../librerias/motorPOSinstalacion.php?estilo=$archivo' id='night' name='night'><img src='../css/$archivo/$archivo.JPG' width='220' height='240'></img></a></td>
		  </table>
	     ");
		 $salto++;
		 if($salto==3){
		 echo("<tr>");
		 $salto=0;
		 }
  }
} 
closedir($directorio); 
echo("</table>");
?>
