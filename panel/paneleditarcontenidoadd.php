<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

paneleditarcontenidoadd modifica el div derecho del sitio

--*/


error_reporting(0);
session_start();
if (isset($_SESSION["usuario"])) {

if(isset($_POST["url1"])) 
{
$url1=$_POST['url1'];
$titulo1=$_POST['titulo1'];
$descripcion1=$_POST['descripcion1'];
  //cada 50 caracteres agregar un salto de linea
  $descripcion1subs1=substr($descripcion1,0,50);
  $descripcion1subs2=substr($descripcion1,50,50);
  $descripcion1subs3=substr($descripcion1,100,50);
  $descripcion1=$descripcion1subs1.'</br>'.$descripcion1subs2.'</br>'.$descripcion1subs3;
}else{
$url1="";
$titulo1="";
}
if(isset($_POST["url2"])){
$url2=$_POST['url2'];
$titulo2=$_POST['titulo2'];
$descripcion2=$_POST['descripcion2'];
  //cada 50 caracteres agregar un salto de linea
  $descripcion2subs1=substr($descripcion2,0,50);
  $descripcion2subs2=substr($descripcion2,50,50);
  $descripcion2subs3=substr($descripcion2,100,50);
  $descripcion2=$descripcion2subs1.'</br>'.$descripcion2subs2.'</br>'.$descripcion2subs3;
}else{
$url2="";
$titulo2="";
}
if(isset($_POST["url3"])){
$url3=$_POST['url3'];
$titulo3=$_POST['titulo3'];
$descripcion3=$_POST['descripcion3'];
  //cada 50 caracteres agregar un salto de linea
  $descripcion3subs1=substr($descripcion3,0,50);
  $descripcion3subs2=substr($descripcion3,50,50);
  $descripcion3subs3=substr($descripcion3,100,50);
  $descripcion3=$descripcion3subs1.'</br>'.$descripcion3subs2.'</br>'.$descripcion3subs3;
}else{
$url3="";
$titulo3="";
}
//barra superior hr
if(isset($_POST["hr"])){
$hr="<hr>";
}else{
$hr="";
}
//barra inferior hr
if(isset($_POST["hr2"])){
$hr2="<hr>";
}else{
$hr2="";
}
//contenido horizontal
if(isset($_POST["hori"])){
$hori="<td>";
}else{
$hori="<tr>";
}


/*--

Clase contenidoadd

--*/


class contenidoadd{
var $url_modulounico1;
var $url_modulounico2;
var $url_modulounico3;
var $titulo_modulounico1;
var $titulo_modulounico2;
var $titulo_modulounico3;
var $descripcion_modulounico1;
var $descripcion_modulounico2;
var $descripcion_modulounico3;
var $destino_modulounico1;
var $destino_modulounico2;
var $destino_modulounico3;

  function crear_modulounico_NoImagen($url, $titulo, $descripcion, $hr, $hr2){
  $this->url_modulounico1=$url;
  $this->titulo_modulounico1=$titulo;
  $this->descripcion_modulounico1=$descripcion;
  $this->hr=$hr;
  $this->hr2=$hr2;
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'>$this->titulo_modulounico1</a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
                 </table>
                 </center>$this->hr2";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  
  function crear_modulounico_Imagen($url, $titulo, $descripcion, $destino, $hr, $hr2){
  $this->url_modulounico1=$url;
  $this->titulo_modulounico1=$titulo;
  $this->descripcion_modulounico1=$descripcion;
  $this->destino_modulounico1=$destino;
  $this->hr=$hr;
  $this->hr2=$hr2;
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="<?php
if (file_exists('../contenidoadd/imagenes/imagen1.png')) {
    \$ruta='../contenidoadd/imagenes/imagen1.png';
} else {
    \$ruta='contenidoadd/imagenes/imagen1.png';
}
echo(\"
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'><img src=\$ruta id='$this->titulo_modulounico1' name='$this->titulo_modulounico1'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
                 </table>
                 </center>$this->hr2
				 \");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  
  function crear_modulodoble_NoImagen($urlp, $titulop, $descripcionp, $urls, $titulos, $descripcions, $hr, $hori, $hr2){
  $this->url_modulounico1=$urlp;
  $this->titulo_modulounico1=$titulop;
  $this->descripcion_modulounico1=$descripcionp;
  $this->url_modulounico2=$urls;
  $this->titulo_modulounico2=$titulos;
  $this->descripcion_modulounico2=$descripcions;
  $this->hr=$hr;
  $this->hori=$hori;
  $this->hr2=$hr2;
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'>$this->titulo_modulounico1</a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'>$this->titulo_modulounico2</a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
                 </table>
                 </center>$this->hr2";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }

  function crear_modulodoble_Imagen($urlP, $tituloP, $descripcionP, $destinoP, $urlS, $tituloS, $descripcionS, $destinoS, $hr, $hori, $hr2){
  $this->url_modulounico1=$urlP;
  $this->titulo_modulounico1=$tituloP;
  $this->descripcion_modulounico1=$descripcionP;
  $this->destino_modulounico1=$destinoP;
  $this->url_modulounico2=$urlS;
  $this->titulo_modulounico2=$tituloS;
  $this->descripcion_modulounico2=$descripcionS;
  $this->destino_modulounico2=$destinoS;
  $this->hr=$hr;
  $this->hori=$hori;
  $this->hr2=$hr2;
  if($this->destino_modulounico1!="" && $this->destino_modulounico2!=""){
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="<?php
if (file_exists('../contenidoadd/imagenes/imagen1.png')) {
    \$ruta='../contenidoadd/imagenes/imagen1.png';
} else {
    \$ruta='contenidoadd/imagenes/imagen1.png';
}
if (file_exists('../contenidoadd/imagenes/imagen1.png')) {
    \$ruta2='../contenidoadd/imagenes/imagen2.png';
} else {
    \$ruta2='contenidoadd/imagenes/imagen2.png';
}
echo(\"
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'><img src='\$ruta' id='$this->titulo_modulounico1' name='$this->titulo_modulounico1'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'><img src='\$ruta2' id='$this->titulo_modulounico2' name='$this->titulo_modulounico2'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
                 </table>
                 </center>$this->hr2
				\");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  elseif($this->destino_modulounico1!="" && $this->destino_modulounico2==""){
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	<?php
if (file_exists('../contenidoadd/imagenes/imagen1.png')) {
    \$ruta='../contenidoadd/imagenes/imagen1.png';
} else {
    \$ruta='contenidoadd/imagenes/imagen1.png';
}
echo(\"
    $this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'><img src='\$ruta' id='$this->titulo_modulounico1' name='$this->titulo_modulounico1'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'>$this->titulo_modulounico2</a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
                 </table>
                 </center>$this->hr2
				 \");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  elseif($this->destino_modulounico1=="" && $this->destino_modulounico2!=""){
  $manejador=fopen("../contenidoadd/add.php","w+");
  $estructura="
  	<?php
if (file_exists('../contenidoadd/imagenes/imagen2.png')) {
    \$ruta2='../contenidoadd/imagenes/imagen2.png';
} else {
    \$ruta2='contenidoadd/imagenes/imagen2.png';
}
echo(\"
    $this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'>$this->titulo_modulounico1</a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'><img src='\$ruta2' id='$this->titulo_modulounico2' name='$this->titulo_modulounico2'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
                 </table>
                 </center>$this->hr2
				 \");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  }
  
  function crear_modulotriple_NoImagen($urlP, $tituloP, $descripcionP, $urlS, $tituloS, $descripcionS, $urlT, $tituloT, $descripcionT, $hr, $hori, $hr2){
  $this->url_modulounico1=$urlP;
  $this->titulo_modulounico1=$tituloP;
  $this->descripcion_modulounico1=$descripcionP;
  $this->url_modulounico2=$urlS;
  $this->titulo_modulounico2=$tituloS;
  $this->descripcion_modulounico2=$descripcionS;
  $this->url_modulounico3=$urlT;
  $this->titulo_modulounico3=$tituloT;
  $this->descripcion_modulounico3=$descripcionT;
  $this->hr=$hr;
  $this->hori=$hori;
  $this->hr2=$hr2;
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'>$this->titulo_modulounico1</a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'>$this->titulo_modulounico2</a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico3'>$this->titulo_modulounico3</a>
                 </br>
                 <p>$this->descripcion_modulounico3</p>
                 </td>
                 </table>
                 </center>$this->hr2";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  
  function crear_modulotriple_Imagen($urlP, $tituloP, $descripcionP, $destinoP, $urlS, $tituloS, $descripcionS, $destinoS, $urlT, $tituloT, $descripcionT, $destinoT, $hr, $hori, $hr2){
  $this->url_modulounico1=$urlP;
  $this->titulo_modulounico1=$tituloP;
  $this->descripcion_modulounico1=$descripcionP;
  $this->destino_modulounico1=$destinoP;
  $this->url_modulounico2=$urlS;
  $this->titulo_modulounico2=$tituloS;
  $this->descripcion_modulounico2=$descripcionS;
  $this->destino_modulounico2=$destinoS;
  $this->url_modulounico3=$urlT;
  $this->titulo_modulounico3=$tituloT;
  $this->descripcion_modulounico3=$descripcionT;
  $this->destino_modulounico3=$destinoT;
  $this->hr=$hr;
  $this->hori=$hori;
  $this->hr2=$hr2;

  if($this->destino_modulounico1!=null && $this->destino_modulounico2!=null && $this->destino_modulounico3==null){
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	<?php
if (file_exists('../contenidoadd/imagenes/imagen1.png')) {
    \$ruta1='../contenidoadd/imagenes/imagen1.png';
} else {
    \$ruta1='contenidoadd/imagenes/imagen1.png';
}
if (file_exists('../contenidoadd/imagenes/imagen2.png')) {
    \$ruta2='../contenidoadd/imagenes/imagen2.png';
} else {
    \$ruta2='contenidoadd/imagenes/imagen2.png';
}
echo(\"
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'><img src='\$ruta1' id='$this->titulo_modulounico1' name='$this->titulo_modulounico1'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'><img src='\$ruta2' id='$this->titulo_modulounico2' name='$this->titulo_modulounico2'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico3'>$this->titulo_modulounico3</a>
                 </br>
                 <p>$this->descripcion_modulounico3</p>
                 </td>
                 </table>
                 </center>$this->hr2
				 \");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  elseif($this->destino_modulounico1==null && $this->destino_modulounico2!=null && $this->destino_modulounico3!=null){
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	<?php
if (file_exists('../contenidoadd/imagenes/imagen2.png')) {
    \$ruta2='../contenidoadd/imagenes/imagen2.png';
} else {
    \$ruta2='contenidoadd/imagenes/imagen2.png';
}
if (file_exists('../contenidoadd/imagenes/imagen3.png')) {
    \$ruta3='../contenidoadd/imagenes/imagen3.png';
} else {
    \$ruta3='contenidoadd/imagenes/imagen3.png';
}
echo(\"
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'>$this->titulo_modulounico1</a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'><img src='\$ruta2' id='$this->titulo_modulounico2' name='$this->titulo_modulounico2'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico3'><img src='\$ruta3' id='$this->titulo_modulounico3' name='$this->titulo_modulounico3'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico3</p>
                 </td>
                 </table>
                 </center>$this->hr2
				 \");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  elseif($this->destino_modulounico1!=null && $this->destino_modulounico2==null && $this->destino_modulounico3!=null){
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	<?php
if (file_exists('../contenidoadd/imagenes/imagen1.png')) {
    \$ruta1='../contenidoadd/imagenes/imagen1.png';
} else {
    \$ruta1='contenidoadd/imagenes/imagen1.png';
}
if (file_exists('../contenidoadd/imagenes/imagen3.png')) {
    \$ruta3='../contenidoadd/imagenes/imagen3.png';
} else {
    \$ruta3='contenidoadd/imagenes/imagen3.png';
}
echo(\"
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'><img src='\$ruta1' id='$this->titulo_modulounico1' name='$this->titulo_modulounico1'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'>$this->titulo_modulounico2</a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico3'><img src='\$ruta3' id='$this->titulo_modulounico3' name='$this->titulo_modulounico3'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico3</p>
                 </td>
                 </table>
                 </center>$this->hr2
				 \");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  elseif($this->destino_modulounico1!=null && $this->destino_modulounico2==null && $this->destino_modulounico3==null){
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	<?php
if (file_exists('../contenidoadd/imagenes/imagen1.png')) {
    \$ruta1='../contenidoadd/imagenes/imagen1.png';
} else {
    \$ruta1='contenidoadd/imagenes/imagen1.png';
}
echo(\"
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'><img src='\$ruta1' id='$this->titulo_modulounico1' name='$this->titulo_modulounico1'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'>$this->titulo_modulounico2</a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico3'>$this->titulo_modulounico3</a>
                 </br>
                 <p>$this->descripcion_modulounico3</p>
                 </td>
                 </table>
                 </center>$this->hr2
				 \");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  elseif($this->destino_modulounico1==null && $this->destino_modulounico2!=null && $this->destino_modulounico3==null){
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	<?php
if (file_exists('../contenidoadd/imagenes/imagen2.png')) {
    \$ruta2='../contenidoadd/imagenes/imagen2.png';
} else {
    \$ruta2='contenidoadd/imagenes/imagen2.png';
}
echo(\"
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'>$this->titulo_modulounico1</a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'><img src='\$ruta2' id='$this->titulo_modulounico2' name='$this->titulo_modulounico2'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico3'>$this->titulo_modulounico3</a>
                 </br>
                 <p>$this->descripcion_modulounico3</p>
                 </td>
                 </table>
                 </center>$this->hr2
				 \");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  elseif($this->destino_modulounico1==null && $this->destino_modulounico2==null && $this->destino_modulounico3!=null){
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	<?php
if (file_exists('../contenidoadd/imagenes/imagen3.png')) {
    \$ruta3='../contenidoadd/imagenes/imagen3.png';
} else {
    \$ruta3='contenidoadd/imagenes/imagen3.png';
}
echo(\"
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'>$this->titulo_modulounico1</a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'>$this->titulo_modulounico2</a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico3'><img src='\$ruta3' id='$this->titulo_modulounico3' name='$this->titulo_modulounico3'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico3</p>
                 </td>
                 </table>
                 </center>$this->hr2
				 \");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
  elseif($this->destino_modulounico1!=null && $this->destino_modulounico2!=null && $this->destino_modulounico3!=null){
    $manejador=fopen("../contenidoadd/add.php","w+");
    $estructura="
	<?php
if (file_exists('../contenidoadd/imagenes/imagen1.png')) {
    \$ruta1='../contenidoadd/imagenes/imagen1.png';
} else {
    \$ruta1='contenidoadd/imagenes/imagen1.png';
}
if (file_exists('../contenidoadd/imagenes/imagen2.png')) {
    \$ruta2='../contenidoadd/imagenes/imagen2.png';
} else {
    \$ruta2='contenidoadd/imagenes/imagen2.png';
}
if (file_exists('../contenidoadd/imagenes/imagen3.png')) {
    \$ruta3='../contenidoadd/imagenes/imagen3.png';
} else {
    \$ruta3='contenidoadd/imagenes/imagen3.png';
}
echo(\"
	$this->hr</br>
                 </br>
                 <center>
                 <table border='0' width='95%'>
                 <td align='center'>
                 <a href='$this->url_modulounico1'><img src='\$ruta1' id='$this->titulo_modulounico1' name='$this->titulo_modulounico1'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico1</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico2'><img src='\$ruta2' id='$this->titulo_modulounico2' name='$this->titulo_modulounico2'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico2</p>
                 </td>
				 $this->hori
				 <td align='center'>
                 <a href='$this->url_modulounico3'><img src='\$ruta3' id='$this->titulo_modulounico3' name='$this->titulo_modulounico3'></img></a>
                 </br>
                 <p>$this->descripcion_modulounico3</p>
                 </td>
                 </table>
                 </center>$this->hr2
				 \");
?>";
			    fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../index.php');
                }
  }
}
}

/*--
		
Validar los contenidos enviados de forma individual

--*/


if($url1!="" && $titulo1!="" && $url2=="" && $titulo2=="" && $url3=="" && $titulo3==""){
  if($_FILES['imagen1']['type']==""){
  //Crear el contenido sin la imagen
  $contenidounicoNoImagen=new contenidoadd;
  $contenidounicoNoImagen->crear_modulounico_NoImagen($url1,$titulo1,$descripcion1,$hr,$hr2);
  }
  elseif($_FILES['imagen1']['type']!=""){
    if($_FILES['imagen1']['type']!="image/png"){
    imagengrande();
    }
	elseif($_FILES['imagen1']['type']=="image/png"){
	  if($_FILES['imagen1']['size']>20480){
	  imagengrande();
      }
      else{
      $fichero=$imagen1=$_FILES['imagen1']['tmp_name'];
      $destino="../contenidoadd/imagenes/imagen1.png";
      move_uploaded_file($fichero, $destino);
	  //modificamos ruta de destino
	  $destino="contenidoadd/imagenes/imagen1.png";
	  //Crear el contenido con la imagen
      $contenidounicoImagen=new contenidoadd;
      $contenidounicoImagen->crear_modulounico_Imagen($url1,$titulo1,$descripcion1,$destino,$hr,$hr2);
      }
	}
  }
}



if($url2!="" && $titulo2!="" && $url1=="" && $titulo1=="" && $url3=="" && $titulo3==""){
  if($_FILES['imagen2']['type']==""){
  //Crear el contenido sin la imagen
  $contenidounicoNoImagen=new contenidoadd;
  $contenidounicoNoImagen->crear_modulounico_NoImagen($url2,$titulo2,$descripcion2,$hr,$hr2);
  }
  elseif($_FILES['imagen2']['type']!=""){
    if($_FILES['imagen2']['type']!="image/png"){
    imagengrande();
    }
	elseif($_FILES['imagen2']['type']=="image/png"){
	  if($_FILES['imagen2']['size']>20480){
	  imagengrande();
      }
      else{
      $fichero=$imagen2=$_FILES['imagen2']['tmp_name'];
      $destino="../contenidoadd/imagenes/imagen2.png";
      move_uploaded_file($fichero, $destino);
	  //modificamos ruta de destino
	  $destino="contenidoadd/imagenes/imagen2.png";
	  //Crear el contenido con la imagen
      $contenidounicoImagen=new contenidoadd;
      $contenidounicoImagen->crear_modulounico_Imagen($url2,$titulo2,$descripcion2,$destino,$hr,$hr2);
      }
	}
  }
}



if($url3!="" && $titulo3!="" && $url2=="" && $titulo2=="" && $url1=="" && $titulo1==""){
  if($_FILES['imagen3']['type']==""){
  //Crear el contenido sin la imagen
  $contenidounicoNoImagen=new contenidoadd;
  $contenidounicoNoImagen->crear_modulounico_NoImagen($url3,$titulo3,$descripcion3,$hr,$hr2);
  }
  elseif($_FILES['imagen3']['type']!=""){
    if($_FILES['imagen3']['type']!="image/png"){
    imagengrande();
    }
	elseif($_FILES['imagen3']['type']=="image/png"){
	  if($_FILES['imagen3']['size']>20480){
	  imagengrande();
      }
      else{
      $fichero=$imagen3=$_FILES['imagen3']['tmp_name'];
      $destino="../contenidoadd/imagenes/imagen3.png";
      move_uploaded_file($fichero, $destino);
	  //modificamos ruta de destino
	  $destino="contenidoadd/imagenes/imagen3.png";
	  //Crear el contenido con la imagen
      $contenidounicoImagen=new contenidoadd;
      $contenidounicoImagen->crear_modulounico_Imagen($url3,$titulo3,$descripcion3,$destino,$hr,$hr2);
      }
	}
  }
}


/*--
		
Validar los contenidos enviados de forma doble

--*/


if($url1!="" && $titulo1!="" && $url2!="" && $titulo2!="" && $url3=="" && $titulo3==""){
  if($_FILES['imagen1']['type']=="" && $_FILES['imagen2']['type']==""){
  //Crear el contenido sin la imagen
  $contenidounicoNoImagen=new contenidoadd;
  $contenidounicoNoImagen->crear_modulodoble_NoImagen($url1, $titulo1, $descripcion1, $url2, $titulo2, $descripcion2,$hr,$hori,$hr2);
  }
  elseif($_FILES['imagen1']['type']=="image/png" && $_FILES['imagen2']['type']!="image/png"){
	  if($_FILES['imagen1']['size']>20480){
	  imagengrande();
      }elseif($_FILES['imagen1']['size']<20480 && $_FILES['imagen2']['type']==""){
	  $fichero=$imagen1=$_FILES['imagen1']['tmp_name'];
	  $destino="../contenidoadd/imagenes/imagen1.png";
      move_uploaded_file($fichero, $destino);
	  //modificamos ruta de destino
	  $destino="contenidoadd/imagenes/imagen1.png";
	  $destino2="";
	  $contenidounicoNoImagen=new contenidoadd;
      $contenidounicoNoImagen->crear_modulodoble_Imagen($url1,$titulo1,$descripcion1,$destino,$url2,$titulo2,$descripcion2,$destino2,$hr,$hori,$hr2);
	  }elseif($_FILES['imagen1']['size']<20480 && $_FILES['imagen2']['type']!="image/png"){
	  imagengrande();
	  }
	}
	elseif($_FILES['imagen1']['type']!="image/png" && $_FILES['imagen2']['type']=="image/png"){
	  if($_FILES['imagen2']['size']>20480){
	  imagengrande();
      }elseif($_FILES['imagen2']['size']<20480 && $_FILES['imagen1']['type']==""){
	  $fichero2=$imagen2=$_FILES['imagen2']['tmp_name'];
      $destino2="../contenidoadd/imagenes/imagen2.png";
      move_uploaded_file($fichero2, $destino2);
	  //modificamos ruta de destino
	  $destino2="contenidoadd/imagenes/imagen2.png";
	  $destino="";
	  $contenidounicoNoImagen=new contenidoadd;
      $contenidounicoNoImagen->crear_modulodoble_Imagen($url1,$titulo1,$descripcion1,$destino,$url2,$titulo2,$descripcion2,$destino2,$hr,$hori,$hr2);
	  }elseif($_FILES['imagen2']['size']<20480 && $_FILES['imagen1']['type']!="image/png"){
	  imagengrande();
	  }
	}
	elseif($_FILES['imagen1']['type']=="image/png" && $_FILES['imagen2']['type']=="image/png"){
	  if($_FILES['imagen1']['size']>20480 || $_FILES['imagen2']['size']>20480){
	  imagengrande();
      }
      else{
      $fichero=$imagen1=$_FILES['imagen1']['tmp_name'];
	  $destino="../contenidoadd/imagenes/imagen1.png";
      move_uploaded_file($fichero, $destino);
	  //modificamos ruta de destino
	  $destino="contenidoadd/imagenes/imagen1.png";
	  $fichero2=$imagen2=$_FILES['imagen2']['tmp_name'];
      $destino2="../contenidoadd/imagenes/imagen2.png";
      move_uploaded_file($fichero2, $destino2);
	  //modificamos ruta de destino
	  $destino2="contenidoadd/imagenes/imagen2.png";
	  //Crear el contenido con las imagenes
      $contenidounicoImagen=new contenidoadd;
      $contenidounicoImagen->crear_modulodoble_Imagen($url1,$titulo1,$descripcion1,$destino,$url2,$titulo2,$descripcion2,$destino2,$hr,$hori,$hr2);
      }
	}
    elseif($_FILES['imagen1']['type']!="image/png" || $_FILES['imagen2']['type']!="image/png"){
	imagengrande();
    }
}



if($url1!="" && $titulo1!="" && $url2=="" && $titulo2=="" && $url3!="" && $titulo3!=""){
  if($_FILES['imagen1']['type']=="" && $_FILES['imagen3']['type']==""){
  //Crear el contenido sin la imagen
  $contenidounicoNoImagen=new contenidoadd;
  $contenidounicoNoImagen->crear_modulodoble_NoImagen($url1, $titulo1, $descripcion1, $url3, $titulo3, $descripcion3,$hr,$hori,$hr2);
  }
  elseif($_FILES['imagen1']['type']=="image/png" && $_FILES['imagen3']['type']!="image/png"){
	  if($_FILES['imagen1']['size']>20480){
	  imagengrande();
      }elseif($_FILES['imagen1']['size']<20480 && $_FILES['imagen3']['type']==""){
	  $fichero=$imagen1=$_FILES['imagen1']['tmp_name'];
	  $destino="../contenidoadd/imagenes/imagen1.png";
      move_uploaded_file($fichero, $destino);
	  //modificamos ruta de destino
	  $destino="contenidoadd/imagenes/imagen1.png";
	  $destino2="";
	  $contenidounicoNoImagen=new contenidoadd;
      $contenidounicoNoImagen->crear_modulodoble_Imagen($url1,$titulo1,$descripcion1,$destino,$url3,$titulo3,$descripcion3,$destino2,$hr,$hori,$hr2);
	  }elseif($_FILES['imagen1']['size']<20480 && $_FILES['imagen3']['type']!="image/png"){
	  imagengrande();
	  }
	}
	elseif($_FILES['imagen1']['type']!="image/png" && $_FILES['imagen3']['type']=="image/png"){
	  if($_FILES['imagen3']['size']>20480){
	  imagengrande();
      }elseif($_FILES['imagen3']['size']<20480 && $_FILES['imagen1']['type']==""){
	  $fichero2=$imagen3=$_FILES['imagen3']['tmp_name'];
      $destino2="../contenidoadd/imagenes/imagen3.png";
      move_uploaded_file($fichero2, $destino2);
	  //modificamos ruta de destino
	  $destino2="contenidoadd/imagenes/imagen3.png";
	  $destino="";
	  $contenidounicoNoImagen=new contenidoadd;
      $contenidounicoNoImagen->crear_modulodoble_Imagen($url1,$titulo1,$descripcion1,$destino,$url3,$titulo3,$descripcion3,$destino2,$hr,$hori,$hr2);
	  }elseif($_FILES['imagen3']['size']<20480 && $_FILES['imagen1']['type']!="image/png"){
	  imagengrande();
	  }
	}
	elseif($_FILES['imagen1']['type']=="image/png" && $_FILES['imagen3']['type']=="image/png"){
	  if($_FILES['imagen1']['size']>20480 || $_FILES['imagen3']['size']>20480){
	  imagengrande();
      }
      else{
      $fichero=$imagen1=$_FILES['imagen1']['tmp_name'];
	  $destino="../contenidoadd/imagenes/imagen1.png";
      move_uploaded_file($fichero, $destino);
	  //modificamos ruta de destino
	  $destino="contenidoadd/imagenes/imagen1.png";
	  $fichero2=$imagen3=$_FILES['imagen3']['tmp_name'];
      $destino2="../contenidoadd/imagenes/imagen3.png";
      move_uploaded_file($fichero2, $destino2);
	  //modificamos ruta de destino
	  $destino2="contenidoadd/imagenes/imagen3.png";
	  //Crear el contenido con las imagenes
      $contenidounicoImagen=new contenidoadd;
      $contenidounicoImagen->crear_modulodoble_Imagen($url1,$titulo1,$descripcion1,$destino,$url3,$titulo3,$descripcion3,$destino2,$hr,$hori,$hr2);
      }
	}
    elseif($_FILES['imagen1']['type']!="image/png" || $_FILES['imagen3']['type']!="image/png"){
	imagengrande();
    }
}



if($url1=="" && $titulo1=="" && $url2!="" && $titulo2!="" && $url3!="" && $titulo3!=""){
  if($_FILES['imagen2']['type']=="" && $_FILES['imagen3']['type']==""){
  //Crear el contenido sin la imagen
  $contenidounicoNoImagen=new contenidoadd;
  $contenidounicoNoImagen->crear_modulodoble_NoImagen($url2, $titulo2, $descripcion2, $url3, $titulo3, $descripcion3,$hr,$hori,$hr2);
  }
  elseif($_FILES['imagen2']['type']=="image/png" && $_FILES['imagen3']['type']!="image/png"){
	  if($_FILES['imagen2']['size']>20480){
	  imagengrande();
      }elseif($_FILES['imagen2']['size']<20480 && $_FILES['imagen3']['type']==""){
	  $fichero=$imagen2=$_FILES['imagen2']['tmp_name'];
	  $destino="../contenidoadd/imagenes/imagen2.png";
      move_uploaded_file($fichero, $destino);
	  //modificamos ruta de destino
	  $destino="contenidoadd/imagenes/imagen2.png";
	  $destino2="";
	  $contenidounicoNoImagen=new contenidoadd;
      $contenidounicoNoImagen->crear_modulodoble_Imagen($url2,$titulo2,$descripcion2,$destino,$url3,$titulo3,$descripcion3,$destino2,$hr,$hori,$hr2);
	  }elseif($_FILES['imagen2']['size']<20480 && $_FILES['imagen3']['type']!="image/png"){
	  imagengrande();
	  }
	}
	elseif($_FILES['imagen2']['type']!="image/png" && $_FILES['imagen3']['type']=="image/png"){
	  if($_FILES['imagen3']['size']>20480){
	  imagengrande();
      }elseif($_FILES['imagen3']['size']<20480 && $_FILES['imagen2']['type']==""){
	  $fichero2=$imagen3=$_FILES['imagen3']['tmp_name'];
      $destino2="../contenidoadd/imagenes/imagen3.png";
      move_uploaded_file($fichero2, $destino2);
	  //modificamos ruta de destino
	  $destino2="contenidoadd/imagenes/imagen3.png";
	  $destino="";
	  $contenidounicoNoImagen=new contenidoadd;
      $contenidounicoNoImagen->crear_modulodoble_Imagen($url2,$titulo2,$descripcion2,$destino,$url3,$titulo3,$descripcion3,$destino2,$hr,$hori,$hr2);
	  }elseif($_FILES['imagen3']['size']<20480 && $_FILES['imagen2']['type']!="image/png"){
	  imagengrande();
	  }
	}
	elseif($_FILES['imagen2']['type']=="image/png" && $_FILES['imagen3']['type']=="image/png"){
	  if($_FILES['imagen2']['size']>20480 || $_FILES['imagen3']['size']>20480){
	  imagengrande();
      }
      else{
      $fichero=$imagen2=$_FILES['imagen2']['tmp_name'];
	  $destino="../contenidoadd/imagenes/imagen2.png";
      move_uploaded_file($fichero, $destino);
	  //modificamos ruta de destino
	  $destino="contenidoadd/imagenes/imagen2.png";
	  $fichero2=$imagen3=$_FILES['imagen3']['tmp_name'];
      $destino2="../contenidoadd/imagenes/imagen3.png";
      move_uploaded_file($fichero2, $destino2);
	  //modificamos ruta de destino
	  $destino2="contenidoadd/imagenes/imagen3.png";
	  //Crear el contenido con las imagenes
      $contenidounicoImagen=new contenidoadd;
      $contenidounicoImagen->crear_modulodoble_Imagen($url2,$titulo2,$descripcion2,$destino,$url3,$titulo3,$descripcion3,$destino2,$hr,$hori,$hr2);
      }
	}
    elseif($_FILES['imagen2']['type']!="image/png" || $_FILES['imagen3']['type']!="image/png"){
	imagengrande();
    }
}

/*--
		
Validar los contenidos enviados de forma triple

--*/



if($url1!="" && $titulo1!="" && $url2!="" && $titulo2!="" && $url3!="" && $titulo3!=""){
  if($_FILES['imagen1']['type']=="" && $_FILES['imagen2']['type']=="" && $_FILES['imagen3']['type']==""){
  //Crear el contenido sin las imagenes
  $contenidounicoNoImagen=new contenidoadd;
  $contenidounicoNoImagen->crear_modulotriple_NoImagen($url1,$titulo1,$descripcion1,$url2,$titulo2,$descripcion2,$url3,$titulo3,$descripcion3,$hr,$hori,$hr2);
  }
  elseif($_FILES['imagen1']['type']=="image/png" && $_FILES['imagen2']['type']!="image/png" && $_FILES['imagen3']['type']!="image/png"){
    if($_FILES['imagen1']['size']>20480){
    imagengrande();
	}
    elseif($_FILES['imagen1']['size']<20480 && $_FILES['imagen2']['type']=="" && $_FILES['imagen3']['type']==""){
    $fichero1=$imagen1=$_FILES['imagen1']['tmp_name'];
    $destino1="../contenidoadd/imagenes/imagen1.png";
    move_uploaded_file($fichero1, $destino1);
    //modificamos ruta de destino
    $destino1="contenidoadd/imagenes/imagen1.png";
    $destino2="";
    $destino3="";
    $contenidounicoImagen=new contenidoadd;
    $contenidounicoImagen->crear_modulotriple_Imagen($url1,$titulo1,$descripcion1,$destino1,$url2,$titulo2,$descripcion2,$destino2,$url3,$titulo3,$descripcion3,$destino3,$hr,$hori,$hr2);
    }
	elseif($_FILES['imagen1']['size']<20480 && ($_FILES['imagen2']['type']!="image/png" || $_FILES['imagen3']['type']=="image/png")){
	imagengrande();
	}
  }
  elseif($_FILES['imagen1']['type']!="image/png" && $_FILES['imagen2']['type']=="image/png" && $_FILES['imagen3']['type']!="image/png"){
    if($_FILES['imagen2']['size']>20480){
    imagengrande();
	}
    elseif($_FILES['imagen2']['size']<20480 && $_FILES['imagen1']['type']=="" && $_FILES['imagen3']['type']==""){
    $fichero2=$imagen2=$_FILES['imagen2']['tmp_name'];
    $destino2="../contenidoadd/imagenes/imagen2.png";
    move_uploaded_file($fichero2, $destino2);
    //modificamos ruta de destino
    $destino2="contenidoadd/imagenes/imagen2.png";
    $destino1="";
    $destino3="";
    $contenidounicoImagen=new contenidoadd;
    $contenidounicoImagen->crear_modulotriple_Imagen($url1,$titulo1,$descripcion1,$destino1,$url2,$titulo2,$descripcion2,$destino2,$url3,$titulo3,$descripcion3,$destino3,$hr,$hori,$hr2);
    }
	elseif($_FILES['imagen2']['size']<20480 && ($_FILES['imagen1']['type']!="image/png" || $_FILES['imagen3']['type']=="image/png")){
	imagengrande();
	}
  }
  elseif($_FILES['imagen1']['type']!="image/png" && $_FILES['imagen2']['type']!="image/png" && $_FILES['imagen3']['type']=="image/png"){
    if($_FILES['imagen3']['size']>20480){
    imagengrande();
	}
    elseif($_FILES['imagen3']['size']<20480 && $_FILES['imagen1']['type']=="" && $_FILES['imagen2']['type']==""){
    $fichero3=$imagen3=$_FILES['imagen3']['tmp_name'];
    $destino3="../contenidoadd/imagenes/imagen3.png";
    move_uploaded_file($fichero3, $destino3);
    //modificamos ruta de destino
    $destino3="contenidoadd/imagenes/imagen3.png";
    $destino1="";
    $destino2="";
    $contenidounicoImagen=new contenidoadd;
    $contenidounicoImagen->crear_modulotriple_Imagen($url1,$titulo1,$descripcion1,$destino1,$url2,$titulo2,$descripcion2,$destino2,$url3,$titulo3,$descripcion3,$destino3,$hr,$hori,$hr2);
    }
	elseif($_FILES['imagen3']['size']<20480 && ($_FILES['imagen1']['type']!="image/png" || $_FILES['imagen2']['type']=="image/png")){
	imagengrande();
	}
  }
  elseif($_FILES['imagen1']['type']=="image/png" && $_FILES['imagen2']['type']=="image/png" && $_FILES['imagen3']['type']!="image/png"){
    if($_FILES['imagen1']['size']>20480 || $_FILES['imagen2']['size']>20480){
    imagengrande();
	}
    elseif($_FILES['imagen1']['size']<20480 && $_FILES['imagen2']['size']<20480 && $_FILES['imagen3']['type']==""){
    $fichero1=$imagen1=$_FILES['imagen1']['tmp_name'];
    $destino1="../contenidoadd/imagenes/imagen1.png";
    move_uploaded_file($fichero1, $destino1);
    //modificamos ruta de destino
    $destino1="contenidoadd/imagenes/imagen1.png";
	$fichero2=$imagen2=$_FILES['imagen2']['tmp_name'];
    $destino2="../contenidoadd/imagenes/imagen2.png";
    move_uploaded_file($fichero2, $destino2);
	//modificamos ruta de destino
	$destino2="contenidoadd/imagenes/imagen2.png";
    $destino3="";
    $contenidounicoImagen=new contenidoadd;
    $contenidounicoImagen->crear_modulotriple_Imagen($url1,$titulo1,$descripcion1,$destino1,$url2,$titulo2,$descripcion2,$destino2,$url3,$titulo3,$descripcion3,$destino3,$hr,$hori,$hr2);
    }
	elseif($_FILES['imagen1']['size']<20480 && $_FILES['imagen2']['size']<20480 && $_FILES['imagen3']['type']!="image/png"){
	imagengrande();
	}
  }
  elseif($_FILES['imagen1']['type']=="image/png" && $_FILES['imagen2']['type']!="image/png" && $_FILES['imagen3']['type']=="image/png"){
    if($_FILES['imagen1']['size']>20480 || $_FILES['imagen3']['size']>20480){
    imagengrande();
	}
    elseif($_FILES['imagen1']['size']<20480 && $_FILES['imagen3']['size']<20480 && $_FILES['imagen2']['type']==""){
    $fichero1=$imagen1=$_FILES['imagen1']['tmp_name'];
    $destino1="../contenidoadd/imagenes/imagen1.png";
    move_uploaded_file($fichero1, $destino1);
    //modificamos ruta de destino
    $destino1="contenidoadd/imagenes/imagen1.png";
	$fichero3=$imagen3=$_FILES['imagen3']['tmp_name'];
    $destino3="../contenidoadd/imagenes/imagen3.png";
    move_uploaded_file($fichero3, $destino3);
	//modificamos ruta de destino
	$destino3="contenidoadd/imagenes/imagen3.png";
    $destino2="";
    $contenidounicoImagen=new contenidoadd;
    $contenidounicoImagen->crear_modulotriple_Imagen($url1,$titulo1,$descripcion1,$destino1,$url2,$titulo2,$descripcion2,$destino2,$url3,$titulo3,$descripcion3,$destino3,$hr,$hori,$hr2);
    }
	elseif($_FILES['imagen1']['size']<20480 && $_FILES['imagen3']['size']<20480 && $_FILES['imagen2']['type']!="image/png"){
	imagengrande();
	}
  }
  elseif($_FILES['imagen1']['type']!="image/png" && $_FILES['imagen2']['type']=="image/png" && $_FILES['imagen3']['type']=="image/png"){
    if($_FILES['imagen2']['size']>20480 || $_FILES['imagen3']['size']>20480){
    imagengrande();
	}
    elseif($_FILES['imagen2']['size']<20480 && $_FILES['imagen3']['size']<20480 && $_FILES['imagen1']['type']==""){
    $fichero2=$imagen2=$_FILES['imagen2']['tmp_name'];
    $destino2="../contenidoadd/imagenes/imagen2.png";
    move_uploaded_file($fichero2, $destino2);
    //modificamos ruta de destino
    $destino2="contenidoadd/imagenes/imagen2.png";
	$fichero3=$imagen3=$_FILES['imagen3']['tmp_name'];
    $destino3="../contenidoadd/imagenes/imagen3.png";
    move_uploaded_file($fichero3, $destino3);
	//modificamos ruta de destino
	$destino3="contenidoadd/imagenes/imagen3.png";
    $destino1="";
    $contenidounicoImagen=new contenidoadd;
    $contenidounicoImagen->crear_modulotriple_Imagen($url1,$titulo1,$descripcion1,$destino1,$url2,$titulo2,$descripcion2,$destino2,$url3,$titulo3,$descripcion3,$destino3,$hr,$hori,$hr2);
    }
	elseif($_FILES['imagen2']['size']<20480 && $_FILES['imagen3']['size']<20480 && $_FILES['imagen1']['type']!="image/png"){
	imagengrande();
	}
  }
  elseif($_FILES['imagen1']['type']=="image/png" && $_FILES['imagen2']['type']=="image/png" && $_FILES['imagen3']['type']=="image/png"){
    if($_FILES['imagen1']['size']>20480 || $_FILES['imagen2']['size']>20480 || $_FILES['imagen3']['size']>20480){
    imagengrande();
	}
    elseif($_FILES['imagen1']['size']<20480 && $_FILES['imagen2']['size']<20480 && $_FILES['imagen3']['size']<20480){
	$fichero1=$imagen2=$_FILES['imagen2']['tmp_name'];
    $destino1="../contenidoadd/imagenes/imagen1.png";
    move_uploaded_file($fichero1, $destino1);
    //modificamos ruta de destino
    $destino1="contenidoadd/imagenes/imagen1.png";
    $fichero2=$imagen2=$_FILES['imagen2']['tmp_name'];
    $destino2="../contenidoadd/imagenes/imagen2.png";
    move_uploaded_file($fichero2, $destino2);
    //modificamos ruta de destino
    $destino2="contenidoadd/imagenes/imagen2.png";
	$fichero3=$imagen3=$_FILES['imagen3']['tmp_name'];
    $destino3="../contenidoadd/imagenes/imagen3.png";
    move_uploaded_file($fichero3, $destino3);
	//modificamos ruta de destino
	$destino3="contenidoadd/imagenes/imagen3.png";
    $contenidounicoImagen=new contenidoadd;
    $contenidounicoImagen->crear_modulotriple_Imagen($url1,$titulo1,$descripcion1,$destino1,$url2,$titulo2,$descripcion2,$destino2,$url3,$titulo3,$descripcion3,$destino3,$hr,$hori,$hr2);
    }
  }
}



elseif($url1=="" && $titulo1=="" && $url2=="" && $titulo2=="" && $url3=="" && $titulo3==""){
faltainformacion();
}
elseif($url1!="" && $titulo1=="" || $url2!="" && $titulo2=="" || $url3!="" && $titulo3==""){
faltainformacion();
}
}
else {
header("Location: index.php");
}

function imagengrande(){
echo("
<script>
location.href='index.php?resultado=8';
</script>
     ");
}

function faltainformacion(){
echo ("
<script>
location.href='index.php?resultado=7';
</script>
     ");
}
?>