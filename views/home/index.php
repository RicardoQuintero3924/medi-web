<?php
	include 'plantilla.php';
	include '../../db/Conexion.php';
	
	if(!$result = mysqli_query($conection, "SELECT e.nombre_comercial, m.nombre_generico, m.precio FROM medicamentos")) die();
                
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'NOmbre',1,0,'C',1);
	$pdf->Cell(20,6,'NOmbre',1,0,'C',1);
	$pdf->Cell(70,6,'Precio',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = mysqli_fetch_array($result))
	{
		$pdf->Cell(70,6,utf8_decode($row['nombre_comercial']),1,0,'C');
		$pdf->Cell(20,6,$row['nombre_generico'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['precio']),1,1,'C');
	}
	$pdf->Output();
	echo "OK";
?>