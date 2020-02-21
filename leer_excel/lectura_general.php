<?php //leer.php
    //require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
	
	
	echo"<div style='min-width: 500px;background: #343434;padding: 5px;box-shadow: 0px 0px 1px 1px blue;float: left;max-width: 50%;overflow: auto;max-height: 100%;'>";	
		if(!empty($_POST['archivos']) and ($_POST['archivos']!='Defaul')){
			$nombreArchivo=$_SERVER["DOCUMENT_ROOT"]."/archivos_subidos/".$_POST['archivos'];			
			$Archivo_excel= new Excel();	
			if(!empty($nombreArchivo))$Archivo_excel->cargar_excel($nombreArchivo);else echo"ningun archivo selecionado";
			$Archivo_excel->setDatosExcel();
			$datos=$Archivo_excel->getDatosExcel();	
		}else{ echo"ningun archivo selecionado";}
	echo"</div>";
?>