<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

paneleditarcontactame modifica los datos de datos.html
ubicado en el directorio parablannews\contactame\

--*/


error_reporting(0);
session_start();
if (isset($_SESSION["usuario"])) {
	
if(isset($_POST["nombre"])) 
{
$nombre=$_POST['nombre'];
}else{
$nombre="";
}
if(isset($_POST["apellido"])) 
{
$apellido=$_POST['apellido'];
}else{
$apellido="";
}
if(isset($_POST["descripcion"])) 
{
$descripcion=$_POST['descripcion'];
}else{
$descripcion="";
}
if(isset($_POST["email"])) 
{
$email=$_POST['email'];
}else{
$email="";
}


if($nombre!="" && $apellido!="" && $descripcion!="" && $email!=""){

/*--
		
Procesar email.
        
--*/

$cadena="/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
if (preg_match($cadena,$email)) {
  if($_FILES['foto']['type']!="image/jpeg"){
  infoincorrecta();
  }
  else{
    if($_FILES['foto']['size']>143360){
    infoincorrecta();
    }
    else{
    $fichero=$foto=$_FILES['foto']['tmp_name'];
    $destino="../contactame/imagen/imagen.jpg";
    move_uploaded_file($fichero, $destino);
    
	//Eliminar el contenido de datos.html
    $manejador=fopen("../contactame/datos.html","w+");
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
			    header('Location: ../contactame/index.php');
                }
    }
  }	
}
else{
correoincorrecto();
}
}
else{
faltainformacion();
}
}

function correoincorrecto(){
echo ("
<script>
location.href='index.php?resultado=6';
</script>
     ");
}

function faltainformacion(){
echo ("
<script>
location.href='index.php?resultado=4';
</script>
     ");
}

function infoincorrecta(){
echo ("
<script>
location.href='index.php?resultado=5';
</script>
     ");
}
?>