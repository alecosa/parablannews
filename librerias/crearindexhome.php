<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Objeto que contiene la estructura de indexhome.php

--*/



class crearindexhome{

  function estilo(){
  $estilos="../css/estilos.html";
      $manejador=fopen("../inicio/index.php","a");
      $estructura="<!--

                   copyright © 2013 parablan - Hector Alejandro Parada Blanco

                   parablanNews es un sistema libre de articulos, el cual 
                   puede ser modificado y redistribuido como cita la GPL v2. 

                   Indice principal.

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
      $manejador=fopen("../inicio/index.php","a");
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
						
						<form name='buscar' method='post' action='buscar_noticia.php'><input type='text' id='palabra' name='palabra' maxlength=16  placeholder='Articulo'><input type='submit' name='submit' id='botonbuscar' name='botonbuscar' value='Buscar'></input></input></form>
						
						</div><!--fin buscar-->
                       
					</div><!--fin header-->

                  <div id='menu'>
    
	                <table border='0' width='100%'>
                    <td class='inicio' align='center'><a href='index.php' class='inicio'>Inicio</a></td>
                    <td align='center'><a href='../categorias/'>Categorias</a></td>
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
                    \$result=mysql_query('select DISTINCT * from noticias order by fecha Desc');

                    \$resultregistros=mysql_query('select count(*) from noticias');

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
                    \$fragmentocontenido=substr(\$row['contenido'],0,800);
                    \$filas++;
                    \$numero=\$row['id_noticia'];
                    echo(\"<td><h2><a href='examinar.php?noticia=\".\$numero.\"'>\".\$fragmento.\"</a></h2>
                    <tr>
	                <td><h3>por: \".\$row['autor'].\"</h3></td>
	                <tr>
	                <td><h3>\".\$row['fecha'].\"</h3></td>
	                <tr><td><p>\".\$fragmentocontenido.\" . . .<a href='examinar.php?noticia=\".\$numero.\"'> [Continua leyendo] </a></p></td><tr>\");
                    \$contador++;
                      if (\$contador==5)
                      {
                      //Ya mostramos los 5 articulos mas recientes.
                      break;
                      }
                    }
                    echo('</table>');
                    ?>
                    
			      </div><!--fin columnizq-->

                  ";
      fclose();
      if(@fwrite($manejador,$estructura)){
      header('Location: ../index.php');
      }

    }
	
	function contenidoadicional(){
      $manejador=fopen("../inicio/index.php","a");
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
