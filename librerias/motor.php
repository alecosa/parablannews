<?php
/*--

copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Motor se encarga de usar las librerias del directorio
parablanNews\librerias, con el fin de crear las páginas
necesarias del sitio web.

--*/

error_reporting(0);


$manejador=fopen("../index.php","a");
      $estructura="<?php
/*--

copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

redireccionamiento a inicio

--*/


header('Location: inicio/index.php');
?>
";
      fclose();
      if(@fwrite($manejador,$estructura)){
      header('Location: inicio/index.php');
      }

$idcss=$_GET['estilo'];
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

include("crearindexhome.php");
$indice=new crearindexhome;
$indice->estilo();
$indice->cuerpo();
$indice->contenidoadicional();

include("crearcategoria.php");
$cate=new crearcategoria;
$cate->estilo();
$cate->cuerpo();
$cate->contenidoadicional();

include("crearabout.php");
$acerca=new crearabout;
$acerca->estilo();
$acerca->cuerpo();
$acerca->contenidoadicional();

include("crearexaminar.php");
$examinar=new crearexaminar;
$examinar->estilo();
$examinar->cuerpo();
$examinar->contenidoadicional();

include("crearbuscar_noticia.php");
$buscar=new crearbuscar_noticia;
$buscar->estilo();
$buscar->cuerpo();
$buscar->contenidoadicional();

include("crearselectcategoria.php");
$selectcate=new crearselectcategoria;
$selectcate->estilo();
$selectcate->cuerpo();
$selectcate->contenidoadicional();

include("crearcontactame.php");
$contactame=new crearcontactame;
$contactame->estilo();
$contactame->cuerpo();
$contactame->contenidoadicional();

/*--

Eliminación archivos instalación

--*/

$install="../install.html";
$ayudainstall="../ayudainstall.php";
$requisitos="../requisitos.php";
$creardb="../creardb.php";
$verificar_requisitos="../verificar_requisitos.php";
$banner="../banner/crearbanner.html";
$procesarbanner="../banner/procesarbanner.php";
$contactame="../contactame/crearcontactame.html";
$estilo="../css/estilo.php";
$listarestiloinstalacion="../css/listarestiloinstalacion.php";
$procesarcontactame="../contactame/procesarcontactame.php";
$crearcontactame="../contactame/crearcontactame.html";
//librerias
$conect="../librerias/conect.php";
$crearabout="../librerias/crearabout.php";
$crearbuscar_noticia="../librerias/crearbuscar_noticia.php";
$crearcategoria="../librerias/crearcategoria.php";
$crearcontactame="../librerias/crearcontactame.php";
$crearexaminar="../librerias/crearexaminar.php";
$crearindexhome="../librerias/crearindexhome.php";
$crearselectcategoria="../librerias/crearselectcategoria.php";

if(@unlink($install) && @unlink($ayudainstall) && @unlink($requisitos) && @unlink($creardb) && @unlink($verificar_requisitos) && @unlink($banner) && @unlink($procesarbanner) && @unlink($contactame) && @unlink($estilo) && @unlink($listarestiloinstalacion) && @unlink($procesarcontactame) && @unlink($crearcontactame) && @unlink($conect) && @unlink($crearabout) && @unlink($crearbuscar_noticia) && @unlink($crearcategoria) && @unlink($crearcontactame) && @unlink($crearexaminar) && @unlink($crearindexhome) && @unlink($crearselectcategoria)){
//Archivos eliminados
}
else{
//no fue posible eliminar los archivos
}
?>
