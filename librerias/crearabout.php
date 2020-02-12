<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Objeto que contiene la estructura de about (about/index.php).

--*/



class crearabout{

  function estilo(){
    $estilos="../css/estilos.html";
      $manejador=fopen("../about/index.php","a");
      $estructura="<!--

                   copyright © 2013 parablan - Hector Alejandro Parada Blanco

                   parablanNews es un sistema libre de articulos, el cual 
                   puede ser modificado y redistribuido como cita la GPL v2. 

                   Documento about.

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
      $manejador=fopen("../about/index.php","a");
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
                    <td align='center'><a href='../categorias/'>Categorias</a></td>
                    <td align='center'><a href='../contactame'>Contactame</a></td>
                    <td class='inicio' align='center'><a href='#' class='inicio'>Acerca de...</a></td>
                    </table>

	              </div><!--fin menu-->
				  
				  <div id='cuerpo'>
	
                  <div id='columnizq'>
                    
					<p>parablanNews 
					</br>
					  </br>
					Versi&oacute;n: 1.4.139
					</br>
					Autor: parablan (Hector Alejandro Parada Blanco) 
					</br>
					  </br>
					parablanNews es un software de c&oacute;digo abierto liberado bajo GPL v2. 
					Con parablanNews puedes organizar y publicar contenido en el ciberespacio. 
					Este proyecto pretende fomentar la colaboraci&oacute;n entre desarrolladores colombianos o de otras partes del mundo, de all&iacute; su algoritmo de f&aacute;cil entendimiento para que cualquiera pueda colaborar.</p>
					<center><img src='../imagenes/humanosunidos.png'></img></center>

			      </div><!--fin columnizq-->

                  ";
      fclose();
      if(@fwrite($manejador,$estructura)){
      header('Location: ../index.php');
      }

    }
	
	function contenidoadicional(){
      $manejador=fopen("../about/index.php","a");
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
