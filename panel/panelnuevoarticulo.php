<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

panelnuevoarticulo permite la creacion de nuevos articulos

--*/


error_reporting(0);
session_start();
if (isset($_SESSION["usuario"])) {
$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$categoria=$_POST['categoria'];
$contenido=$_POST['contenido'];


/*--
		
Verificamos que nada este vacio.
        
--*/

if($_POST['titulo'] == "" || $_POST['autor'] == "" || $_POST['categoria'] == "" || $_POST['contenido'] == "") {
echo ("
<script>
location.href='index.php?resultado=1';
</script>
     ");
}
else
{

/*--
		
validar titulo y autor correctos

--*/

$validartitulo='/[a-zA-Z]((\.|_|-)?[a-zA-Z0-9]+){4}/i';
$validarautor='/[a-zA-Z]((\.|_|-)?[a-zA-Z0-9]+){4}/i';
$consultatitulo=preg_match($validartitulo,$titulo);
$consultaautor=preg_match($validarautor,$autor);

  if($consultatitulo && $consultaautor){
  
/*--
		
reemplazamos las tildes y letras especiales.
        
--*/

$letratilde=array("á","é","í","ó","ú","ñ");
$letranueva=array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;");
$a=str_replace($letratilde[0],$letranueva[0],$contenido);
$e=str_replace($letratilde[1],$letranueva[1],$a);
$i=str_replace($letratilde[2],$letranueva[2],$e);
$o=str_replace($letratilde[3],$letranueva[3],$i);
$u=str_replace($letratilde[4],$letranueva[4],$o);
$n=str_replace($letratilde[5],$letranueva[5],$u);
$nuevocontenido=$n;

include('../librerias/db/conectar.php');
$idcategoria=mysql_query("SELECT id FROM categorias WHERE nombrecat='$categoria'");
$count = mysql_result($idcategoria, 0, 0);
settype($count, "Integer");
mysql_query("INSERT INTO noticias (titulo,autor,contenido,fecha,id) VALUES ('$titulo','$autor','$nuevocontenido',NOW(),$count)");
header('Location: ../index.php');
  }
  else{
  echo ("
  <script>
  location.href='index.php?resultado=2';
  </script>
     ");
  }
}
}
else {
header("Location: index.php");
}
?>
