<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Esta clase crea el archivo de conexión a la base de datos.

--*/


class conect{
var $cn;
var $cl;

function libconect($usuariodb, $clavedb){
$this->cn=$usuariodb;
$this->cl=$clavedb;

$manejador=fopen("librerias/db/conectar.php","a");
$estructura="
             <?php
             /*--
			 
             copyright © 2013 parablan - Hector Alejandro Parada Blanco

             parablanNews es un sistema libre de articulos, el cual 
             puede ser modificado y redistribuido como cita la GPL v2. 
			 
			 Establecer conexión a la base de datos.
             
			 --*/
			 
	         //Nos conectamos a la base de datos.
             mysql_connect('localhost','$this->cn','$this->cl');
             //Seleccionamos la DB
             mysql_select_db('parablannews');
             ?>
			 ";

			 if(@fwrite($manejador,$estructura)){
			 fclose($manejador);
			 header('Location: ../index.php');
			 }
    }
}
?>
