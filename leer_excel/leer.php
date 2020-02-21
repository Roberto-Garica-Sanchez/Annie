<?php //leer.php
    //require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
    require $_SERVER["DOCUMENT_ROOT"].'/PHPExcel/Classes/PHPExcel/IOFactory.php';
	require 'conexion.php'; //Agregamos la conexión
	
	//Variable con el nombre del archivo
	$nombreArchivo = 'ejemplo.xlsx';
	// Cargo la hoja de cálculo
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	
	
	$objPHPExcel->setActiveSheetIndex(0);	//Asigno la hoja de calculo activa
	echo$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Obtengo el numero de filas del archivo
	
	echo '<table border=1><tr><td>Producto</td><td>Precio</td><td>Existencia</td></tr>';
	
	for ($i = 1; $i <= $numRows; $i++) {
		
		$nombre = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$precio = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$existencia = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        
		echo '<tr>';
		echo '<td>'. $nombre.'</td>';
		echo '<td>'. $precio.'</td>';
		echo '<td>'. $existencia.'</td>';
		echo '</tr>';
		
		$sql = "INSERT INTO productos (nombre, precio, existencia) VALUES('$nombre','$precio','$existencia')";
		$result = $mysqli->query($sql);
	}
	
	echo '<table>';
?>