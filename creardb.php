<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Este fichero crea la base de datos y estructura de la misma.

--*/


$usuariodb=$_POST['usuariodb'];
$clavedb=$_POST['clavedb'];
$claveroot=$_POST['claveroot'];
for($i=0;$i<5;$i++){
$array[$i]=$_POST['c'.$i];
}

if($usuariodb != "" && $clavedb != ""){
$nombrevalid="/[a-zA-Z]((\.|_|-)?[a-zA-Z0-9]+){4}/i";
$clavevalida='/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
$consultanombre=preg_match($nombrevalid,$usuariodb);
$consultaclave=preg_match($clavevalida,$clavedb);

  if($consultanombre && $consultaclave){
	$esttablenews="CREATE TABLE noticias
	              (id_noticia INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			      titulo CHAR(50) NOT NULL, 
				  autor CHAR(15) NOT NULL, 
				  contenido LONGTEXT NOT NULL, 
				  fecha VARCHAR(15) NOT NULL, 
				  id INT(1) NOT NULL, 
				  foreign key (id) references categorias(id))";
				  
	$esttablecategory="CREATE TABLE categorias
	                  (id INT(1) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			          nombrecat CHAR(15))";
	estructura($esttablenews, $esttablecategory, $array, $usuariodb, $clavedb, $claveroot);
  }
  else{
  header('Location: ayudainstall.php');
  }
}
else{
header('Location: ayudainstall.php');
}

function estructura($esttablenews, $esttablecategory, $array, $usuariodb, $clavedb, $claveroot){
$conectar=@mysql_connect('localhost','root',$claveroot);
  if (!$conectar){
  die("
<!--

copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Acceso denegado al usuario root o perdida de conexión.

-->


<!doctype html>

<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'/>
  <link rel='stylesheet' type='text/css' href='css/estilodwelcome.css'>
  <link rel='stylesheet' type='text/css' href='css/estilologoparablan.css'>
  <link rel='stylesheet' type='text/css' href='css/estilobloqueizqparablan.css'>
  <link rel='stylesheet' type='text/css' href='css/estilopie.css'>
  <link href='imagenes/parablannews.ico' type='image/x-icon' rel='shortcut icon' />
<title>parablannews</title>
</head>
<body>

<div id='wrapper'>

  <div id='header'>  
  
    <table border=0 width=100%>
    <td>  
    <img src='imagenes/parablannews.png' align='left' width='10%'></img><h1>parablanNews <br/><small>un poquito de conocimiento</small></h1>
    </table>
  
  </div>

        <div id='cuerpo'>

          <div id='interior'>
		  
		  <h3>No es posible establecer conexión al motor MySQL. Aseg&uacute;rese de escribir la clave correcta del s&uacute;per usuario root.</h3>
		  
		  </div><!--fin div interior-->
		 
		</div><!--fin div cuerpo-->
		  
		  <div id='footer'>
  
          <h1><p><small>Copyright &copy; 2013  parablan - Hector Alejandro Parada Blanco</small></p></h1>
  
          </div><!--fin div footer-->
		  
</div><!--fin div wrapper-->

</body>
</html>
");
  }
  else{
  
  /*--
		
  Creación de la base de datos.
        
  --*/

  mysql_query("CREATE DATABASE IF NOT EXISTS parablannews ");
  mysql_select_db("parablannews",$conectar);
  
  /*--
		
  Creación de la estructura.
        
  --*/
  
  mysql_query($esttablecategory);
  mysql_query($esttablenews);
  
  /*--

  Asignamos usuario a la base de datos.
   
  --*/
  
  mysql_query("GRANT ALL PRIVILEGES ON parablannews.* TO '".$usuariodb."'@'localhost' IDENTIFIED BY '".$clavedb."'");

    for($j=0;$j<5;$j++){
	  $remplazar=strpos($array[$j]," ");
	  if($remplazar==true){
	  $cambio=str_replace(" ","&nbsp;",$array[$j]);
	  mysql_query("INSERT INTO categorias (nombrecat) VALUES ('$array[$j]')");
	  }
	  else{
      mysql_query("INSERT INTO categorias (nombrecat) VALUES ('$array[$j]')");
	  }
    }

  /*--

  Creación de libreria necesaria para la conexión.
   
  --*/
  
  include("librerias/conect.php");
  $archiconectar=new conect;
  $archiconectar->libconect($usuariodb, $clavedb);

  header('Location: requisitos.php');
  }
}
?>
