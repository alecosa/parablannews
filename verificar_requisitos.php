<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Este fichero verifica los requisitos necesarios para 
continuar con la instalación.

--*/

	
conectar();

function conectar(){
$requerimientosdb=0;
$requerimientophp=0;
        
/*--
		
Establecer conexión al motor MySQL.
        
--*/
				
  if (@include("librerias/db/conectar.php"))
  {

  /*--
		
  Seleccionar la base de datos parablannews.
        
  --*/
		
    if(@!mysql_select_db("parablannews")){
    echo("<p><img src='imagenes/incorrecto.png'></img> Conexi&oacute;n fallida a la base de datos parablannews</p>");
	version($requerimientosdb, $requerimientophp);
    }
    else{
    echo("<p><img src='imagenes/correcto.png'></img> Conexi&oacute;n exitosa a la base de datos</p>");
    $requerimientosdb++;
	version($requerimientosdb, $requerimientophp);
    }		
  }
  else
  {
  echo("<p><img src='imagenes/incorrecto.png'></img> Conexi&oacute;n fallida a la base de datos parablannews</p>");
  version($requerimientosdb, $requerimientophp);
  }
}
		
function version($requerimientosdb, $requerimientophp){

/*--
		
Verificar la versión correcta de PHP, 5.3 o superior.
        
--*/
	
  if(phpversion()>5.3){
  echo("<p><img src='imagenes/correcto.png'></img> Tu versi&oacute;n de PHP es la indicada</p>");
  $requerimientophp++;
  comp($requerimientosdb, $requerimientophp);
  }
  else{
  echo("<p><img src='imagenes/incorrecto.png'></img> No cuentas con la versi&oacute;n indicada de PHP</p>");
  comp($requerimientosdb, $requerimientophp);
  }
  echo("</br></br>");
}
		
function comp($requerimientosdb, $requerimientophp){
  if($requerimientosdb==1 && $requerimientophp==1){
  echo("
       <table border=0>
       <td>
       <input id='ayuda_disabled' name='ayuda_disabled' type='submit' value='Ayuda' witch='80' onclick='ayuda()' disabled='true'></input>
       <td>
       <input id='boton_continuar' name='boton_continuar' type='submit' value='Continuar' witch='80' onclick='continuar()'></input>
       </table>"
      );
  }
  elseif ($requerimientosdb==0  && $requerimientophp==0){
  echo("
	   <table border=0>
       <td>
       <input id='boton_ayuda' name='boton_ayuda' type='submit' value='Ayuda' witch='80' onclick='ayuda()'></input>
	   <td>
	   <input id='continuar_disabled' name='continuar_disabled' type='submit' value='Continuar' witch='80' onclick='continuar()' disabled='true'></input>
	   </table>
	   <h6>Se requiere una versi&oacute;n de PHP superior a 5.3, actualiza tu versi&oacute;n he intentalo de nuevo.</h6>"
	  );
  }
  elseif ($requerimientosdb==0  && $requerimientophp==1){
  echo("
	   <table border=0>
       <td>
       <input id='boton_ayuda' name='boton_ayuda' type='submit' value='Ayuda' witch='80' onclick='ayuda()'></input>
	   <td>
	   <input id='continuar_disabled' name='continuar_disabled' type='submit' value='Continuar' witch='80' onclick='continuar()' disabled='true'></input>
	   </table>"
	  );
  }
  elseif ($requerimientosdb==1  && $requerimientophp==0){
  echo("
	   <h6>Se requiere una versi&oacute;n de PHP superior a 5.3, actualiza tu versi&oacute;n he intentalo de nuevo.</h6>
	   <table border=0>
       <td>
       <input id='ayuda_disabled' name='ayuda_disabled' type='submit' value='Ayuda' witch='80' onclick='ayuda()' disabled='true'></input>
	   <td>
	   <input id='continuar_disabled' name='continuar_disabled' type='submit' value='Continuar' witch='80' onclick='continuar()' disabled='true'></input>
	   </table>"
	  );
  }
}
?>
