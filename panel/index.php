<!--

copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Panel de control.

-->


<!doctype html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
  <link rel="stylesheet" type="text/css" href="../css/estilodwelcome.css">
  <link rel="stylesheet" type="text/css" href="../css/estilologoparablan.css">
  <link rel="stylesheet" type="text/css" href="../css/estilobloqueizqparablan.css">
  <link rel="stylesheet" type="text/css" href="../css/estilopie.css">
  <link rel="stylesheet" type="text/css" href="../librerias/modalparablan/skins/estilomodal.css">
  <link href="../imagenes/parablannews.ico" type="image/x-icon" rel="shortcut icon" />

  <title>parablannews</title>


<script type="text/javascript" src="../librerias/hideandshow/hideandshow.js"></script>
<script type="text/javascript" src="../librerias/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../librerias/modalparablan/modalparablan.js"></script>

<script>
tinymce.init({
mode : "specific_textareas",
					editor_selector: "noticia",
					plugins: [
						"advlist autolink lists link image charmap print preview anchor"
					],
					toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
					autosave_ask_before_unload: false,
					max_height: 400,
					min_height: 200,
					height : 350,
					width : 700
				});
</script>

</head>

<?php
error_reporting(0);
$resultado=$_GET['resultado'];
echo("<p style='display:none'>.</p>"); // Obligatorio para mostrar los mensajes en IE
if($resultado==1){
$titulo="Alguno de los campos est&aacute;n vac&iacute;os";
$contenido="Los siguientes campos son obligatorios: </br></br><li>T&iacute;tulo<li>Autor<li>Categoria<li>Noticia";
echo("<label><script>createDiv('$titulo','$contenido');</script></label>");
$resultado==null;
}
elseif($resultado==2){
$titulo="T&iacute;tulo o autor no son validos";
$contenido="<li>T&iacute;tulo y autor deben iniciar con letras<li>Deben contar con m&iacute;nimo 5 caracteres<li>Pueden contar con n&uacute;meros";
echo("<label><script>createDiv('$titulo','$contenido');</script></label>");
$resultado==null;
}
elseif($resultado==3){
$titulo="Alguno de los campos est&aacute;n vac&iacute;os";
$contenido="<table width=100% border=0><td align=center><img src=../imagenes/ejemploslogan.jpg><tr><td>Los campos t&iacute;tulo y slogan son obligatorios.</table>";
echo("<label><script>createDiv('$titulo','$contenido');</script></label>");
$resultado==null;
}
elseif($resultado==4){
$titulo="Alguno de los campos est&aacute;n vac&iacute;os";
$contenido="Todos los campos en este formulario son obligatorios.";
echo("<label><script>createDiv('$titulo','$contenido');</script></label>");
$resultado==null;
}
elseif($resultado==5){
$titulo="Criterios de imagen";
$contenido="<table width=100% border=0><td><li>Formato jpg<li>Peso no mayor a los 140 KB<td><img src=../imagenes/ejemplosimagen.jpg></table>";
echo("<label><script>createDiv('$titulo','$contenido');</script></label>");
$resultado==null;
}
elseif($resultado==6){
$titulo="Criterios de correo";
$contenido="El correo electr&oacute;nico suministrado no es correcto.</br></br><small>Ejemplos: </small></br></br><li>alejo1_3@hotmail.com<li>correoparablan@gmail.com<li>tema_blue04@yahoo.com";
echo("<label><script>createDiv('$titulo','$contenido');</script></label>");
$resultado==null;
}
elseif($resultado==7){
$titulo="Alguno de los campos est&aacute;n vac&iacute;os";
$contenido="Almenos uno de los tres contenidos debe tener informaci&oacute;n.";
echo("<label><script>createDiv('$titulo','$contenido');</script></label>");
$resultado==null;
}
elseif($resultado==8){
$titulo="Criterios de imagen";
$contenido="<table width=100% border=0><td><li>Formato png<li>Peso no mayor a los 8 KB<td><img src=../imagenes/ejemplosimagen.jpg></table>";
echo("<label><script>createDiv('$titulo','$contenido');</script></label>");
$resultado==null;
}
elseif($resultado==9){
$titulo="Error";
$contenido="<table width=100% border=0><td>Se ha presentado un error, posiblemente generado </br>por una de las siguientes razones: </br></br><li>Debe seleccionar una de las tres opciones.<li>En el caso de que quiera cambiar el nombre <br/> a una categor&iacute;a, ingrese un nuevo nombre.<li>Si desea crear una nueva categor&iacute;a, ingrese </br>un nombre de categor&iacute;a que no exista.</table>";
echo("<label><script>createDiv('$titulo','$contenido');</script></label>");
$resultado==null;
}
else{
echo("<label></label>");
}
?>

<body>
<!--Mover div generado por modalparablan-->
<SCRIPT type="text/javascript">
var el = document.getElementById("mensajemodal");
if (el.addEventListener){
el.addEventListener("mousedown", ratonPulsado, false);
el.addEventListener("mouseup", ratonSoltado, false);
document.addEventListener("mousemove", ratonMovido, false);
  //Desactivar seleccion de texto
  el.onselectstart = function()
  {
  return false;
  } 
  // Firefox
  el.onmousedown = function()
  {
  return false;
  }
} else { //Para IE
el.attachEvent('onmousedown', ratonPulsado);
el.attachEvent('onmouseup', ratonSoltado);
document.attachEvent('onmousemove', ratonMovido);
}           
</SCRIPT> 

<?php
error_reporting(0);
session_start();

if (isset($_SESSION["usuario"])) {
    // Generando ID único
    $_SESSION["token"] = md5(uniqid(mt_rand(), true));	
	echo("
<div id='wrapper'>

  <div id='header'>  
  
    <table border=0 width=100%>
    <td>  
    <img src='../imagenes/parablannews.png' align='left' width='10%'></img><h1>parablanNews <br/><small>compartiendo conocimiento</small></h1>
    </table>
  
  </div>

        <div id='cuerpo'>

          <div id='interior'>
		  
		  <center><h2>Panel de control</h2></center>
		  <h6><small><i>Sesi&oacute;n iniciada</i></small></h6>
		  <input type='button' id='boton_menu_nuevo' value='' onclick='javascript:mostrar(\"panelnuevoarticulo\")'>
		  <input type='button' id='boton_menu_editar' value='' onclick='javascript:mostrar(\"panelmodificar\")'>
		  <input type='button' id='boton_menu_tema' value='' onclick='javascript:mostrar(\"panelnuevoestilo\")'>
		  <a href=\"panelSESSION.php?accion=logout&token=$_SESSION[token]\"><input type='button' id='cerrarsesion' value=''></a>
		  		  
		  <div id='panelnuevoarticulo' style='display:block'>
		  
<h3>Agregar nuevo articulo</h3>
<form name='form1' method='post' action='panelnuevoarticulo.php'>
<table border=0>
<tr>
<td>
  <label>
         <p>Titulo:</p>
  </label>
<td></br>
	<input name='titulo' type='text' id='titulo' maxlength='50' size='50'>
	</br>
	<font size='1' color='#A4A4A4'>M&iacute;nimo 5 caracteres, m&aacute;ximo 50 caracteres</font>
<tr>
<td>
  <label>
	     <p>Autor:</p>
  </label>
<td></br>
	<input name='autor' type='text' id='autor' maxlength='15' size='50'>
	</br>
	<font size='1' color='#A4A4A4'>M&iacute;nimo 5 caracteres, m&aacute;ximo 15 caracteres</font>
<tr>
<td>
  <label>
	Categoria: 
  </label>
<td></br>
<select id='categoria' name='categoria'>
");

include('../librerias/db/conectar.php');
$result=mysql_query('select DISTINCT nombrecat from categorias order by nombrecat Desc');
  while($row=mysql_fetch_array($result))
  {
  echo('<option value="'.$row['nombrecat'].'">'.$row['nombrecat']);
  }

echo("
</select>
	<br/>
	  <br/>
<tr>
<td>
  <label>
         <p>Noticia:</p>
  </label>
<td></br>
	<textarea name='contenido' id='noticia' class='noticia'></textarea>
<tr>
<td></br>
	<input type='submit' name='Submit' id='boton_continuar' name='boton_continuar' witch='80'>
</td>
</table>

</form>
		  
		  </div>
		  
		  <div id='panelmodificar' style='display:none'>
		  <h3>Editar</h3>
		  <hr>
		  <table border='0' width='100%'>
		  <td><a href='javascript:mostrar_coneditar(\"editar_banner\")'>| Banner |</a></td>
		  <td><a href='javascript:mostrar_coneditar(\"editar_contactame\")'>| Contactame |</a></td>
		  <td><a href='javascript:mostrar_coneditar(\"editarcontenidoadd\")'>| Contenido adicional |</a></td>
		  <td><a href='javascript:mostrar_coneditar(\"editarcategorias\")'>| Categor&iacute;as |</a></td>
		  </table>
		  <hr>
		  </br>
		  </br>
		  	<div id='editar_banner' style='display:block'>
		    <p>
		    Dale un toque personal
		    </p>
		    <form method='post' action='paneleditarbanner.php'>
		    <input type='textbox' id='titulo' name='titulo' placeholder='Titulo' maxlength='15'></input>
			</br><small>M&aacute;ximo 15 caracteres.</small>
		    </br></br>
		    <input type='textbox' id='slogan' name='slogan' placeholder='Slogan' size='50' maxlength='50'></input>
		    </br>
			<small>M&aacute;ximo 50 caracteres.</small>
		    </br></br>
		    <input type='submit' id='boton_continuar' name='boton_continuar' witch='80'></input>
		    </form>
		    </div>
		    <div id='editar_contactame' style='display:none'>
		    <p>
		    Ingresa tus datos para ser contactado por cibernautas 
		    </p>
		    <form method='post' action='paneleditarcontactame.php' enctype='multipart/form-data'>
		    <input type='textbox' id='nombre' name='nombre' placeholder='Nombres' maxlength='15'></input></br>
		    </br>
		    <input type='textbox' id='apellido' name='apellido' placeholder='Apellidos' maxlength='15'></input></br>
		    </br>
		    <input type='textbox' id='email' name='email' placeholder='email' maxlength='25'></input></br>
		    </br>
		    <textarea rows='4' cols='26' id='descripcion' name='descripcion' placeholder='Breve descripci&oacute;n ...' maxlength='200'></textarea></br>
		    <small>M&aacute;ximo 200 caracteres.</small>
		    </br>
		    </br>
		    Sube t&uacute; foto o alguna imagen: </br></br>
		    <small>La imagen debe estar en formato jpg y su peso <br>no debe ser mayor a los 140 KB.</small><br>
		    <input type='file' id='foto' name='foto'></input>
		    </br>
		    </br>
		    <input type='submit' id='boton_continuar' name='boton_continuar' witch='80'></input>
		    </form>
			
		    </div><!--fin div editar_contactame-->

			<div id='editarcontenidoadd' style='display:none'>
<form method='POST' action='paneleditarcontenidoadd.php' enctype='multipart/form-data'>
			<table>
			<td>Contenido horizontal: <td><input type='checkbox' id='hori' name='hori'></input>
			<tr>
			<td>Incluir linea superior: <td><input type='checkbox' id='hr' name='hr'></input>
			<tr>
			<td>Incluir linea inferior: <td><input type='checkbox' id='hr2' name='hr2'></input>
			</table>
			</br>
		    <h4>Primer contenido.</h4>
			link: <input type='checkbox' onclick='javascript:habilitarcontenido1(\"url1\",\"titulo1\",\"descripcion1\",\"imagen1\")' id='link1' name='link1'></input><input type='textbox' id='url1' name='url1' placeholder='URL' disabled></input><input type='textbox' id='titulo1' name='titulo1' placeholder='Titulo' maxlength='15' disabled></input></br>
		    </br>
		    <textarea rows='4' cols='43' id='descripcion1' name='descripcion1' placeholder='Contenido opcional' maxlength='150' disabled></textarea></br>
		    <small>M&aacute;ximo 150 caracteres.</small>
		    </br>
		    </br>
		    <small>La imagen es <i>opcional</i>, debe estar en formato png y su peso <br>no debe ser mayor a los 8 KB.</small><br>
		    <input type='file' id='imagen1' name='imagen1' disabled></input>
		    </br>
		    </br>
			<h4>Segundo contenido.</h4>
			link: <input type='checkbox' onclick='javascript:habilitarcontenido2(\"url2\",\"titulo2\",\"descripcion2\",\"imagen2\")' id='link2' name='link2'></input><input type='textbox' id='url2' name='url2' placeholder='URL' disabled></input><input type='textbox' id='titulo2' name='titulo2' placeholder='Titulo' maxlength='15' disabled></input></br>
		    </br>
		    <textarea rows='4' cols='43' id='descripcion2' name='descripcion2' placeholder='Contenido' maxlength='150' disabled></textarea></br>
		    <small>M&aacute;ximo 150 caracteres.</small>
		    </br>
		    </br>
		    <small>La imagen es <i>opcional</i>, debe estar en formato png y su peso <br>no debe ser mayor a los 8 KB.</small><br>
		    <input type='file' id='imagen2' name='imagen2' disabled></input>
		    </br>
		    </br>
			<h4>Tercer contenido.</h4>
			link: <input type='checkbox' onclick='javascript:habilitarcontenido3(\"url3\",\"titulo3\",\"descripcion3\",\"imagen3\")' id='link3' name='link3'></input><input type='textbox' id='url3' name='url3' placeholder='URL' disabled></input><input type='textbox' id='titulo3' name='titulo3' placeholder='Titulo' maxlength='15' disabled></input></br>
		    </br>
		    <textarea rows='4' cols='43' id='descripcion3' name='descripcion3' placeholder='Contenido' maxlength='150' disabled></textarea></br>
		    <small>M&aacute;ximo 150 caracteres.</small>
		    </br>
		    </br>
		    <small>La imagen es <i>opcional</i>, debe estar en formato png y su peso <br>no debe ser mayor a los 8 KB.</small><br>
		    <input type='file' id='imagen3' name='imagen3' disabled></input>
		    </br>
		    </br>
		    <input type='submit' id='boton_continuar' name='boton_continuar' witch='80'></input>
		    </form>
		    </div><!--fin div editarcontenidoadd-->

			
			<div id='editarcategorias' style='display:none'>
		    <p>
		    En este apartado puede modificar o crear categor&iacute;as.
		    </p>
			<form method='post' action='paneleditarcategoria.php'>
			<small>Seleccione la categor&iacute;a a modificar</small>
			<table border=0>
			<td><p>Categor&iacute;a:</p>
			<td><select id='categoria' name='categoria'>
");

$result=mysql_query('select DISTINCT nombrecat from categorias order by nombrecat Desc');
  while($row=mysql_fetch_array($result))
  {
  echo('<option value="'.$row['nombrecat'].'">'.$row['nombrecat']);
  }

echo("
</select>
</table>
<h4>Opciones</h4>
<h5>Modificar:</h5>
<table border=0>
<td><input type='radio' id='cambiacon' name='cambiacon' onclick='javascript:habilitarcamcat(\"nombrecon\",\"textdelete\",\"nomnewcon\")'>
<td><input type='text' id='nombrecon' name='nombrecon' placeholder='Nombre' maxlength='15' disabled>
<tr><td><td><small>Cambiar nombre de categor&iacute;a</small>
</table>
<hr width=48% align=left>
<h5>Nueva:</h5>
<table border=0>
<td><input type='radio' id='nuevocon' name='nuevocon' onclick='javascript:habilitarnewcat(\"nombrecon\",\"textdelete\",\"nomnewcon\")'>
<td><input type='text' id='nomnewcon' name='nomnewcon' placeholder='Nueva categor&iacute;a' maxlength='15' disabled>
<tr><td><td><small>Escriba un nombre para la nueva categor&iacute;a</small>
</table>
<hr width=48% align=left>
<h5>Eliminar:</h5>
<table border=0>
<tr>
<td><input type='radio' id='eliminarcon' name='eliminarcon' onclick='javascript:habilitarelimicat(\"nombrecon\",\"textdelete\",\"nomnewcon\")'>
<input type='text' id='textdelete' name='textdelete' placeholder='Eliminar' maxlength='15' disabled>
<td id='tdalerta' name='tdalerta' rowspan=2><p id='alertcon' name='alertcon'><img src='../imagenes/alerta.png' width=18px align=left></img><small>Este proceso eliminara los articulos <br/>relacionados a la categor&iacute;a</small></p>
<tr><td><small>Para eliminar la categor&iacute;a escriba</br> la palabra DELETE</small>
<tr>
<td>
<input type='submit' id='boton_continuar' name='boton_continuar' witch='80' value='Actualizar'></input>
</table>
		    </form>
		    </div><!--fin div editarcategorias-->
			
		  </div><!--fin div panelmodificar-->
		  
		  <div id='panelnuevoestilo' style='display:none'>
		  
		  <p>
		  <h3>Selecciona el estilo que m&aacute;s te guste.</h3>
		  </br>
		  </br>");
		  include('../css/listarestilo.php');
		  echo("
		  </div>

        </div>

  <div id='footer'>
  
  <h1><p><small>Copyright &copy; 2013  parablan - Hector Alejandro Parada Blanco</small></p></h1>
  
  </div>
	");

}
else {
?>
<div id="wrapper">

  <div id="header">  
  
    <table border=0 width=100%>
    <td>  
    <img src="../imagenes/parablannews.png" align="left" width="10%"></img><h1>parablanNews <br/><small>compartiendo conocimiento</small></h1>
    </table>
  
  </div>

        <div id="cuerpo">

          <div id="interior">
		  <h2>Bienvenido al panel de control.</h2>
		  <form method="post" action="panelSESSION.php?accion=login">
		  <p>Usuario:</p>
          <input type="textbox" id="usuario" name="usuario"></input>
          <p>Clave:</p>
          <input type="password" id="clave" name="clave"></input>
          </br>
            </br>
          <input id='boton_continuar' name='boton_continuar'  type="submit" value="Ingresar" witch='80'></input>
		  <input type="hidden" value="<?php echo $_SESSION['token']; ?>">
          </form>

		  </div>

        </div>

  <div id="footer">
  
  <h1><p><small>Copyright &copy; 2013  parablan - Hector Alejandro Parada Blanco</small></p></h1>
  
  </div>
<?php
}
?>
 </body>
</html>