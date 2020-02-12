<!--

copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Página de ayuda para crear base de datos y la conexión 
necesaria.

-->


<!doctype html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
  <link rel="stylesheet" type="text/css" href="css/estilodwelcome.css">
  <link rel="stylesheet" type="text/css" href="css/estilologoparablan.css">
  <link rel="stylesheet" type="text/css" href="css/estilobloqueizqparablan.css">
  <link rel="stylesheet" type="text/css" href="css/estilopie.css">
  <link href="imagenes/parablannews.ico" type="image/x-icon" rel="shortcut icon" />
<title>parablannews</title>
</head>
<body>

<div id="wrapper">

  <div id="header">
  
  <table border=0 width=100%>
  <td>  
  <img src="imagenes/parablannews.png" align="left" width="10%"></img><h1>parablanNews <br/><small>compartiendo conocimiento</small></h1>
  <td align="right">
  </table>
  
  </div>

    <div id="cuerpo">

      <div id="interior">
		
	    <p>
		Para continuar con la instalaci&oacute;n debes completar la siguiente informaci&oacute;n:
		</br>
		  </br>
		Crear usuario y contrase&ntilde;a para la base de datos.
		</br>
		<form action="creardb.php" method="post">
		<input type="textbox" id="usuariodb" name="usuariodb" placeholder='User name' maxlength="15"><small>
		</br>
		<li>Debe contar con almenos 5 caracteres.
		</small></input>
		</br>
		  </br>
		<input type="password" id="clavedb" name="clavedb" placeholder='Clave' maxlength="15"><small>
		</br>
		La contrase&ntilde;a debe cumplir las siguientes caracteristicas:
		</br>
		<li>Contenga al menos una letra may&uacute;scula.
        <li>Contenga al menos una letra min&uacute;scula.
        <li>Contenga al menos un n&uacute;mero o caracter especial.
        <li>Longitud sea como m&iacute;nimo 8 caracteres.
		</small></input>
        </br>
          </br>
		  
        <div id="notificacion">
		
          <img src="imagenes/alerta.png" align="left"></img>
		  <p>Si el super usuario root tiene contrase&ntilde;a, por favor indiquela a continuaci&oacute;n: </p>
          <input type="password" id="claveroot" name="claveroot">

		</div>

          </br>
		    </br>
		  Que categor&iacute;as tendr&aacute; tu sitio.
		  </br>
		    </br>
		  <input type="textbox" placeholder="Categoria 1" id="c0" name="c0" maxlength="15"></input></br>
		  <input type="textbox" placeholder="Categoria 2" id="c1" name="c1" maxlength="15"></input></br>
		  <input type="textbox" placeholder="Categoria 3" id="c2" name="c2" maxlength="15"></input></br>
		  <input type="textbox" placeholder="Categoria 4" id="c3" name="c3" maxlength="15"></input></br>
		  <input type="textbox" placeholder="Categoria 5" id="c4" name="c4" maxlength="15"></input></br>
		  <font size='1' color='#A4A4A4'>Cada categor&iacute;a tiene un m&aacute;ximo de 15 caracteres</font>
		  </br>
		  <table border=0>
		  <td>
	      <input id='boton_continuar' name='boton_continuar' type='submit' value='Continuar' witch='80' onclick='aceptar()'></input>
		  </td>
	      </table>
	      </form>

          </div>

        </div>

  <div id="footer">
  
  <h1><p><small>Copyright &copy; 2013  parablan - Hector Alejandro Parada Blanco</small></p></h1>
  
  </div>
  
</body>
</html>
