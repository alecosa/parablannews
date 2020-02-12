<?php
/*

copyright © 2013 parablan - Hector Alejandro Parada Blanco
parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

panelSESSION se encarga de generar una sesion unica para el 
administrador del sitio. Proporsionando un ingreso al panel 
más seguro.

*/


error_reporting(0);
session_start();
//Almacenamos el token generado desde el formulario en la variable token
$token = isset($_GET["token"]) ? $_GET["token"] : (isset($_POST["token"]) ? $_POST["token"] : null);

/*

Si el valor del token es igual al mismo generado por el sistema 
interno de PHP ingresamos a login o logout segun sea el caso

*/


if ($token == $_SESSION["token"]) {
    switch($_GET["accion"]) {
        case "login":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $usuario = (isset($_POST["usuario"]) && $_POST["usuario"]) ? $_POST["usuario"] : null;
                $clave = (isset($_POST["clave"])) ? $_POST["clave"] : null;
                $salt = '#l0S.p4Nd4s.Pr0T3g3N.3sT4.cL4v3#';       
                if($usuario!="" && $clave!=""){
                  if(@mysql_connect('localhost',$usuario,$clave)){
                  mysql_select_db('parablannews');
                    if (isset($usuario, $clave) && (crypt($usuario . $clave, $salt) == crypt($usuario.$clave, $salt))) {
                    $_SESSION["usuario"] = $_POST["usuario"];
                    }
				  }
				  else{
				  break;
				  }
                }				
            }
            break;
         
        case "logout":
            $_SESSION = array();
            session_destroy();
            break;
    }
}
header("Location: index.php");
?>