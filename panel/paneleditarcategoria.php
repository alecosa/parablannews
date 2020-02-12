<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

paneleditarcategoria modifica las categorias del sitio.

--*/


error_reporting(0);
session_start();
if (isset($_SESSION["usuario"])) {
	
if(isset($_POST["nombrecon"])) 
{
$nombrecon=$_POST['nombrecon'];
}else{
$nombrecon="";
}
if(isset($_POST["nomnewcon"])) 
{
$nomnewcon=$_POST['nomnewcon'];
}else{
$nomnewcon="";
}
if(isset($_POST["textdelete"])) 
{
$textdelete=$_POST['textdelete'];
}else{
$textdelete="";
}
if(isset($_POST["categoria"])) 
{
$categoria=$_POST['categoria'];
}else{
$categoria="";
}


if($categoria!=""){
include('../librerias/db/conectar.php');
  if($nombrecon!=""){
  mysql_query("UPDATE categorias SET nombrecat='$nombrecon' WHERE nombrecat='$categoria'");
  header("Location: index.php");
  }
  elseif($nomnewcon!=""){
    $nombreactual=mysql_query("select nombrecat from categorias where nombrecat='$nomnewcon'");
	$row = mysql_fetch_row($nombreactual);
	  if($row[0]!=null){
	  //ya extiste esta categoria
	  echo ("
      <script>
      location.href='index.php?resultado=9';
      </script>
      ");
	  }
	  else{
	  mysql_query("INSERT INTO categorias (nombrecat) VALUES ('$nomnewcon')");
      header("Location: index.php");
	  }
  }
  elseif($textdelete=="DELETE"){
  //Recuperar ID
  $idcategoria=mysql_query("SELECT id FROM categorias WHERE nombrecat='$categoria'");
  $row = mysql_fetch_row($idcategoria);
  //Eliminar articulos relacionados
  mysql_query("DELETE FROM noticias WHERE id=$row[0]");
  //Eliminar categoria
  mysql_query("DELETE FROM categorias WHERE id=$row[0]");
  header("Location: index.php");
  }
  else{
  echo ("
  <script>
  location.href='index.php?resultado=9';
  </script>
  ");
  }
}
else{
echo ("
<script>
location.href='index.php?resultado=9';
</script>
");
}

}
else {
header("Location: index.php");
}
?>