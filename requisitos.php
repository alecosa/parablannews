<!--

copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Página de requisitos.

-->


<!doctype html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
  <link rel="stylesheet" type="text/css" href="css/estilodwelcome.css">
  <link rel="stylesheet" type="text/css" href="css/estilologoparablan.css">
  <link rel="stylesheet" type="text/css" href="css/estilobloqueizqparablan.css">
  <link rel="stylesheet" type="text/css" href="css/estilopie.css">
  <link rel="stylesheet" type="text/css" href="css/estilopie.css">
  <link href="imagenes/parablannews.ico" type="image/x-icon" rel="shortcut icon" />
<title>parablannews</title>

<script language="javascript">
function ayuda(){
location.href="ayudainstall.php"
}
function continuar(){
location.href="banner/crearbanner.html"
}
</script>

</head>
<body>

<div id="wrapper">

  <div id="header">
  
    <table border=0 width=100%>
    <td>  
    <img src="imagenes/parablannews.png" align="left" width="10%"></img><h1>parablanNews <br/><small>compartiendo conocimiento</small></h1>
    </table>
	
  </div>

    <div id="cuerpo">

      <div id="interior">
		  
	    <p>Requisitos:</p></br>
		
        <?php
        include ('verificar_requisitos.php');
        ?>

          </div>

        </div>

  <div id="footer">
  
  <h1><p><small>Copyright &copy; 2013  parablan - Hector Alejandro Parada Blanco</small></p></h1>
  
  </div>
  
</body>
</html>
