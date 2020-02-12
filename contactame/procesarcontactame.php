<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Este fichero crea el documento datos.html, ademas de procesar
la imagen del usuario.

--*/


$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$descripcion=$_POST['descripcion'];
$email=$_POST['email'];

if($nombre!="" && $apellido!="" && $descripcion!="" && $email!=""){

/*--
		
Procesar email.
        
--*/

$cadena="/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
if (preg_match($cadena,$email)) {
  if($_FILES['foto']['type']!="image/jpeg"){
  header("location: crearcontactame.html");
  }
  else{
    if($_FILES['foto']['size']>143360){
    header("location: crearcontactame.html");
    }
    else{
    $fichero=$foto=$_FILES['foto']['tmp_name'];
    $destino="imagen/imagen.jpg";
    move_uploaded_file($fichero, $destino);
    
    $manejador=fopen("../contactame/datos.html","a");
    $estructura="
                <!-Datos-->
			    <table border='0' width='60%'>
			    <tr>
			    <td>
                <p>Nombres: $nombre <br/>Apellidos: $apellido </br>Correo: $email<br/></br><small>$descripcion</small></p>
			    <td>
			    <img src='imagen/imagen.jpg' width='150' height='180' align=right></img>
			    </table>
                ";
			  fclose();
			    if(@fwrite($manejador,$estructura)){
			    header('Location: ../css/estilo.php');
                }
    }
  }	
}
else{
header("location: crearcontactame.html");
}
}
else{
header("location: crearcontactame.html");
}
?>