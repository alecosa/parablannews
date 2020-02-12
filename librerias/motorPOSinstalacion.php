<?php
/*--

copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

MotorPOSinstalacion  se encarga modificar el archivo 
estilos.html, desde el panel de control.

--*/

error_reporting(0);
session_start();
if (isset($_SESSION["usuario"])) {
if(isset($_GET["estilo"])) 
{
$idcss=$_GET['estilo'];
}else{
$idcss="";
}


$manejador=fopen("../css/estilos.html","w+");
      $estructura="<!--

                   copyright © 2013 parablan - Hector Alejandro Parada Blanco

                   parablanNews es un sistema libre de articulos, el cual 
                   puede ser modificado y redistribuido como cita la GPL v2. 

                   Este archivo contiene los estilos de las paginas.

                   -->
				   
                   <link rel='stylesheet' type='text/css' href='/parablannews/css/$idcss/estilodanjo.css'>
                   <link rel='stylesheet' type='text/css' href='/parablannews/css/$idcss/estilologo.css'>
                   <link rel='stylesheet' type='text/css' href='/parablannews/css/$idcss/estilobuscar.css'>
                   <link rel='stylesheet' type='text/css' href='/parablannews/css/$idcss/estilomenu.css'>
                   <link rel='stylesheet' type='text/css' href='/parablannews/css/$idcss/estilobloqueizq.css'>
                   <link rel='stylesheet' type='text/css' href='/parablannews/css/$idcss/estilobloqueder.css'>
                   <link rel='stylesheet' type='text/css' href='/parablannews/css/$idcss/estilopie.css'>
                  ";
      fclose();
      if(@fwrite($manejador,$estructura)){
      header('Location: ../index.php');
      }
}
else
{
header('Location: ../index.php');
}
?>
