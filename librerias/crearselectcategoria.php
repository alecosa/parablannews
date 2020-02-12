<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Objeto que contiene la estructura de categoria.php

--*/



class crearselectcategoria{

  function estilo(){
    $estilos="../css/estilos.html";
      $manejador=fopen("../categorias/selectcategoria.php","a");
      $estructura="<!--

                   copyright © 2013 parablan - Hector Alejandro Parada Blanco

                   parablanNews es un sistema libre de articulos, el cual 
                   puede ser modificado y redistribuido como cita la GPL v2. 

                   Este documento muestra las categorias suministradas en la instalación
				   del producto.

                   -->
				   
				   
                   <!doctype html>
				   <?php
				   error_reporting(0);
				   ?>
                   <html>
                   <head>
                   <meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'/>
                   <?php
                   include('$estilos');
                   ?>
                   <title>ParablanNews</title>
                   </head>
                  ";
      fclose();
      if(@fwrite($manejador,$estructura)){
      header('Location: ../index.php');
      }
  }
  
  function cuerpo(){
      $manejador=fopen("../categorias/selectcategoria.php","a");
      $estructura="
                   <body>

                   <div id='wrapper'>

                     <div id='header'>
                     
					    <div id='banner'>
						
						  <?php
                          include('../banner/banner.html');
                          ?>
						
						</div><!--fin banner-->
						
						<div id='buscar'>
						
						<form name='buscar' method='post' action='../inicio/buscar_noticia.php'><input type='text' id='palabra' name='palabra' maxlength=16  placeholder='Articulo'><input type='submit' name='submit' id='botonbuscar' name='botonbuscar' value='Buscar'></input></input></form>
						
						</div><!--fin buscar-->
                       
					</div><!--fin header-->

                  <div id='menu'>
    
	                <table border='0' width='100%'>
                    <td align='center'><a href='../'>Inicio</a></td>
                    <td class='inicio' align='center'><a href='index.php' class='inicio'>Categorias</a></td>
                    <td align='center'><a href='../contactame'>Contactame</a></td>
                    <td align='center'><a href='../about/index.php'>Acerca de...</a></td>
                    </table>
    
	              </div><!--fin menu-->
	              
				  <div id='cuerpo'>
				  
                  <div id='columnizq'>

				    <?php
					include('../librerias/db/conectar.php');
					?>

					<?php
					\$palabra=\$_GET['noticia'];
					echo('<h2>Categoria: '.\$palabra.'<h2>');
					\$cadena=\"/^([a-z ñáéíóú]{2,15})$/i\";
					if(preg_match(\$cadena, \$palabra)){
                    \$idcategoria=mysql_query(\"SELECT id FROM categorias WHERE nombrecat='\$palabra'\");
                    \$count = mysql_result(\$idcategoria, 0, 0);
                    settype(\$count, 'Integer');
					
					\$result=mysql_query(\"select DISTINCT * from noticias where id=\".\$count.\" order by fecha Desc\");

                    /*--
		
                    Creamos tabla para mostrar los datos.
        
                    --*/

                    echo('<table border=0 width=100%>');
                    \$contador=0;
                    \$filas=0;
                    \$caracteres=100;

                    while(\$row=mysql_fetch_array(\$result))
                    {
					\$fragmento=substr(\$row['titulo'],0,\$caracteres);
                    \$fragmentocontenido=substr(\$row['contenido'],0,500);
                    \$filas++;
                    \$numero=\$row['id_noticia'];
                    echo(\"<td><h2><a href='../inicio/examinar.php?noticia=\".\$numero.\"'>\".\$fragmento.\"</a></h2>
                    <tr>
	                <td><h3>por: \".\$row['autor'].\"</h3></td>
	                <tr>
	                <td><h3>\".\$row['fecha'].\"</h3></td>
	                <tr><td><p>\".\$fragmentocontenido.\" . . .<a href='../inicio/examinar.php?noticia=\".\$numero.\"'> [Continua leyendo] </a></p></td><tr>\");
                    }
                    echo('</table>');
					}
					else
					{
					echo('</br></br>No se encontraron resultados.');
					}
                    ?>
                    
			      </div><!--fin columnizq-->

                  ";
      fclose();
      if(@fwrite($manejador,$estructura)){
      header('Location: ../index.php');
      }

    }
	
	function contenidoadicional(){
      $manejador=fopen("../categorias/selectcategoria.php","a");
      $estructura="
	               <div id='columnder'>

				  <?php
				  include('../contenidoadd/add.php');
				  ?>

                </div><!--fin columnder-->
                
				</div><!--fin cuerpo-->
                
				<div id='footer'>
  
                <h1><p><small>Copyright &copy; 2013  parablan - Hector Alejandro Parada Blanco</small></p></h1>
				
	            </div><!--fin footer-->

		      </div><!--fin wrapper-->
</body>
</html>
                  ";
      fclose();
      if(@fwrite($manejador,$estructura)){
      header('Location: ../index.php');
      }
  }
}
?>
