<!--

copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2.

Esta páguina lista los estilos encontrados

-->


<!doctype html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
  <link rel="stylesheet" type="text/css" href="estilodwelcome.css">
  <link rel="stylesheet" type="text/css" href="estilologoparablan.css">
  <link rel="stylesheet" type="text/css" href="estilobloqueizqparablan.css">
  <link rel="stylesheet" type="text/css" href="estilopie.css">
  <link href="../imagenes/parablannews.ico" type="image/x-icon" rel="shortcut icon" />
<title>parablanNews</title>
</head>
<body>

<div id="wrapper">

  <div id="header">
  
  <table border=0 width=100%>
  <td>  
  <img src="../imagenes/parablannews.png" align="left" width="10%"></img><h1>parablanNews <br/><small>compartiendo conocimiento</small></h1>
  </table>
  
  </div>

        <div id="cuerpo">

          <div id="interior">
		  
		  <p>
		  Selecciona el estilo que m&aacute;s te guste.
		  </br>
		   </br>
          <?php
          include("listarestiloinstalacion.php");
          ?>
		  
          </div>

        </div>

  <div id="footer">
  
  <h1><p><small>Copyright &copy; 2013  parablan - Hector Alejandro Parada Blanco</small></p></h1>
  
  </div>
</body>
</html>
