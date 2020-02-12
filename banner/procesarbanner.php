<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Este fichero crea el documento banner.html.

--*/


$titulo=$_POST['titulo'];
$slogan=$_POST['slogan'];

if($titulo!="" && $slogan!=""){

/*--
		
reemplazamos las tildes y letras especiales slogan.
        
--*/

$letratilde=array("á","é","í","ó","ú","ñ");
$letranueva=array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;");
$a=str_replace($letratilde[0],$letranueva[0],$slogan);
$e=str_replace($letratilde[1],$letranueva[1],$a);
$i=str_replace($letratilde[2],$letranueva[2],$e);
$o=str_replace($letratilde[3],$letranueva[3],$i);
$u=str_replace($letratilde[4],$letranueva[4],$o);
$n=str_replace($letratilde[5],$letranueva[5],$u);
$nuevoslogan=$n;

$manejador=fopen("../banner/banner.html","a");
$estructura="
             <!-Banner title-->
             <h1>$titulo <br/><small>$nuevoslogan</small></h1>
            ";
			fclose();
			  if(@fwrite($manejador,$estructura)){
			  header('Location: ../contactame/crearcontactame.html');
              }
}
else{
header('Location: crearbanner.html');
}
?>
