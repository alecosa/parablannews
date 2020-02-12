<?php
/*--
		
copyright © 2013 parablan - Hector Alejandro Parada Blanco

parablanNews es un sistema libre de articulos, el cual 
puede ser modificado y redistribuido como cita la GPL v2. 

Exportación de articulo a PDF.

--*/


include('db/conectar.php');

/*--
		
Captura de ID articulo.
        
--*/

@$idarticulo=$_GET['noticia'];
$result=mysql_query('select DISTINCT * from noticias where id_noticia='.$idarticulo);

if($result){
include('fpdf/fpdf.php');
$pdf=new FPDF();
  while($row=mysql_fetch_array($result))
  {
  $page="ParablanNews - Modulo en desarrollo";
  $titulon=$row['titulo'];
  $datos=$row['autor']." - ".$row['fecha'];;
  $pdf->addpage();
  $pdf->SetFont("Arial", "B", 10);
  $pdf->SetTextColor(0, 0, 125);
  $pdf->cell(190, 10, $page);//$row['titulo']);
  $pdf->SetTextColor(55, 55, 55);
  $pdf->Ln(15);
  $pdf->SetFont("Arial", "B", 12);
  $pdf->cell(190, 10, $titulon, 1);
  $pdf->Ln(8);
  $pdf->SetFont("Arial", "B", 8);
  $pdf->cell(190, 10, $datos);
  $pdf->Ln(20);
  $pdf->SetTextColor(102, 102, 102);
  $pdf->SetFont("Arial", "B", 10);
  $pdf->Multicell(190, 10, $row['contenido'], 0, "J");
  $pdf->output();
  }
}
?>
