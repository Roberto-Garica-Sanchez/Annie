<?php
    //PHPExcel_1_8\Classes\PHPExcel.php                      
    //error_reporting(0);
    //ini_set( 'display_errors', false );
    //error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
    //if(!include("C:/xampp/htdocs/PHPExcel_1_8/Classes/PHPExcel.php")){
    if(!include("C:/xampp/htdocs/PHPExcel/Classes/PHPExcel.php")){
        echo"Archivo no encontrado ";
    }
    if(!include("C:/xampp/htdocs/combustible/login_tem.php")){
        echo"Archivo no encontrado ";
    }
    //$consulta="SELECT * FROM repostajes WHERE ID_G='".$_POST['Descargar']."'";
    
    mysqli_select_db ($conexion ,'combustible');
    $consulta="SELECT * FROM repostajes ";
    $resu=mysqli_query($conexion,$consulta)or die("Error".mysqli_error($conexion));
    mysqli_data_seek($resu,0);
    
    $objPHPExcel= new PHPExcel();
    $objPHPExcel->getProperties()->setCreator('Tansporte De Carga Garcia E Hijos S.A. DE C.V.');
    //->setTitle('Reportes De Combustible');
    
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle('hojas aaass');
    //$objPHPExcel->getActiveSheet()->setCellValue('A1','Prueba de excel');
    
    $objPHPExcel->getActiveSheet()->setCellValue('A1','ID');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','Fecha');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','Placas');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','Cliente');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','Operador');
    $objPHPExcel->getActiveSheet()->setCellValue('F1','Contador Inicio');
    $objPHPExcel->getActiveSheet()->setCellValue('G1','Contador Final');
    $objPHPExcel->getActiveSheet()->setCellValue('H1','Total Despachado');
    //$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('C')->setWidth('10'); 
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(true); 
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('B')->setAutoSize(true); 
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('C')->setAutoSize(true); 
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('D')->setAutoSize(true); 
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('E')->setAutoSize(true); 
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('F')->setAutoSize(true); 
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('G')->setAutoSize(true); 
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('H')->setAutoSize(true); 

    $x=2;
    while ($resultado=mysqli_fetch_array($resu)) {
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$x,$resultado['ID_G']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$x,$resultado['Fecha']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$x,$resultado['Placas']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$x,$resultado['Cliente']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$x,$resultado['Operador']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$x,$resultado['Contador Inicio']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$x,$resultado['Contador Final']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$x,$resultado['Total Despachado']);
        $x++;
    }

	//header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Type: application/vnd.ms-excel");
	header('Content-Disposition: attachment;filename="ReportesDeCombustible.xls"');
    header('Cache-Control: max-age=0');
    
    $objWrite = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWrite->save('php://output');
    //$descarga= new PhpExcel_Write_Excel2007($excel);
    //$descarga->save('php://output');
?>

