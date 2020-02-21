<?php               //libreria iniciada el 10/12/2019 proceso de reinicio 
class libre_v5{ 
    private $memorias;   
    private $libre_v1;
    private $libre_v2;
    private $phpv;
    private $conexion;
    public function __construct($phpv,$conexion,$array){	
        $this->libre_v1	=new libre_v1();	
        $this->libre_v2	=new libre_v2($phpv,$conexion);	
        $this->phpv=$phpv;	
        $this->conexion=$conexion;	
    }    
    public function input($type,$name,$value,$id,$class,$title,$libre,$style){
        if (empty($class))		$class="buttonDefaul";           //class definida previamente para la pagina web			
        if ($class=='none')$class='';
        if(!empty($id))$id="id='$id'"; else $id='';
        $res="<input type='$type' style='$style' $id  class='$class' name='$name' value='$value' 	title='$title' $libre >";
        return $res;
    }	
    public function memorias($array){
        /*
            array(
                'name'=>$name,
            )
            */
        static $memo;
        if(empty($memo))$memo=array();
        //if(empty($array['name'])){echo"nombre para memorai no definido ";}
        if(!empty($array['name'])){
            $res=$this->libre_v2->busca_array($memo,$array['name']);
            if($res==0){
                $memo=$this->libre_v2->add_array($memo,'',$array['name']);
            }
        }
        
        for ($x=0; $x <count($memo) ; $x++) { 
            if(!empty($_POST[$memo[$x]]))$_SESSION[$memo[$x]]=$_POST[$memo[$x]];#eliminar este diseño es muycomplicado
            
        }
        
    }
    public function menu($name_menu,$elemento_menu,$class,$otros_arrays){
        /*
            $name_menu="";
            $elemento_menu=array('','','','');          
            $class=array(
                'Conte_princiapal'=>'Menu_central',
                'Div_Opcion'=>'Conte_Cuadrado_auto',
                'Boton'=>'boton_Cuadrado_auto_claro',
                'img'=>'img_Cuadrado_auto'
            );
            $otros_arrays=array(
                'img_activa'=> 'true',
                'img_defaul'=>'../img/defaul.jpg',
                'img'=>array("","",'',"",""),
                'memoria'=>array('Activa'=>false,'type'=>'')

            );
        */ 
        $conta=count($elemento_menu);
        if(empty($_POST[$name_menu])){//busca en la memoria $_SESSION
            if(!empty($_SESSION[$name_menu]))$_POST[$name_menu]=$_SESSION[$name_menu];
            else{
                $_POST[$name_menu]=$elemento_menu[0];
            }
        }
        if(empty($otros_arrays['img_activa']))          {$otros_arrays['img_activa']='true';}
        if(empty($otros_arrays['memoria']))             {$otros_arrays['memoria']=array('Activa'=>'true','type'=>'hidden');} //ajuste de memoria defaul        
        

        echo"<div id='' class='".$class['Conte_princiapal']."'>";
            if($otros_arrays['memoria']['Activa']==true){//memoria para el menu designado
                $array['name']=$name_menu;
                $this->memorias($array);
                
                echo $this::input($otros_arrays['memoria']['type'],$name_menu,$_POST[$name_menu],'Memoria_'.$name_menu,"","","","");
            }
            for($x=0; $x<$conta; $x++){//_menu_div
                if(!empty($otros_arrays['ocultar'][$elemento_menu[$x]])){#ocultarelemento 
                    #echo $otros_arrays['ocultar'][$elemento_menu[$x]];
                }else{
                    if($_POST[$name_menu]==$elemento_menu[$x]){$class_boton="select_".$class['Boton'];}     else{$class_boton=$class['Boton'];}
                    if($_POST[$name_menu]==$elemento_menu[$x]){$class_div="select_".$class['Div_Opcion'];}  else{$class_div=$class['Div_Opcion'];}
                    
                    echo"<div id='' class='".$class_div."'>";                    
                    
                        $src=$otros_arrays['img_defaul'];//='img\defaul.jpg';
                        if(!empty($otros_arrays['img'][$x])){$src=$otros_arrays['img'][$x];}
                        if($otros_arrays['img_activa']=='true'){
                            echo"<button type='submit' class='".$class['img']."' name='$name_menu' value='$elemento_menu[$x]'>";
                                //echo"<img src='$src' class='".$class['img']."' onclick='javascript:document.form.submit();'>";
                                echo"<img src='$src' style='width: 100%;height: 100%;'>";
                            echo"</button>";
                        }
                    
                        echo"<input type='submit' name='$name_menu' value='$elemento_menu[$x]' class='".$class_boton."'>";                   
                    
                    echo"</div>";
                }
            }                
        echo"</div>";
    }
    public function menu_movil($elemento_menu,$class_menu){
        //$menu_lateral = new libre_v5();   
        //$elemento_menu=array('boton1');
        //$class_menu="Menu_movil_lateral";
        //echo $menu_lateral->menu_movil($elemento_menu,$class_menu);
        ob_start();
            echo"<div id='menu_movil' class='menu_movil'>";
                echo"<div class='contenido_menu_movil'>";
                
                    echo"<div id='boton_menu_movil' class='boton_menu_movil'>";
                        echo"<div class='barras'></div>";
                        echo"<div class='barras'></div>";
                        echo"<div class='barras'></div>";
                    echo"</div>";
                    $name_menu="menu_movil";
                    $class_menu_botones='botones_menu_movil';
                    $this::menu($name_menu,$elemento_menu,$class_menu_botones);
                    
                echo"</div>";

            echo"</div>";   
        $res = ob_get_contents();
        ob_end_clean();
        return $res;
    }
    public function despieges($despieges){
        /*
            $despieges=array(
                "name"=>'',
                "Subtitulo"=>'',
                "Elementos"=>array(),
                "TextComplemento"=>array(),
                "class"=>'',
                "style"=>'',
                "Excesiones"=>array()
                "libre"=>''
            );
        */        
        if(!empty($despieges['name']))$name="name='".$despieges['name']."'";else $name='';
        if(!empty($despieges['id']))$id="id='".$despieges['id']."'";else $id='';
        if(!empty($despieges['style']))$style="style='".$despieges['style']."'";else $style='';
        if(empty($despieges['class']))$despieges['class']="Medio";
        if(empty($despieges['libre']))$despieges['libre']='';
        $res="<select ".$name." ".$id." class='".$despieges['class']."' ".$style." title='' ".$despieges['libre'].">";
            if(!empty($despieges['Subtitulo']))$res=$res."<option value='".$despieges['name']."'>".$despieges['Subtitulo']."</option>";
            if(!empty($despieges['Elementos']))
            for ($x=0; $x <count($despieges['Elementos']); $x++) { 
                $complemento='';
                $elemento=$despieges['Elementos'][$x];
                if(!empty($despieges['TextComplemento']) and gettype($despieges['TextComplemento'])=='array')
                for ($y=0; $y <count($despieges['TextComplemento']) ; $y++) { 
                    $complemento=$complemento." - ".$despieges['TextComplemento'][$y];
                }                
                if(!empty($despieges['name']) and !empty($_POST[$despieges['name']]) and $_POST[$despieges['name']]==$elemento){$set='selected';}else{$set='';}
                $Excesiones='false';
                if(!empty($despieges['Excesiones']) and gettype($despieges['Excesiones'])=='array'){
                    for ($y=0; $y < count($despieges['Excesiones']); $y++) { 
                        if($despieges['Excesiones'][$y]==$elemento){#omitir elemento
                            $Excesiones='true';
                        }
                    }
                }
                if($Excesiones=='false'){
                    $res=$res."<option value='".$elemento."' $set>".$elemento.$complemento."</option>";    
                }
            }else{
                $res=$res."<option >Ningun Dato</option>";    
            }      
        $res=$res.'</select>';
        return $res;
    }
    function formato_num($numero){
        $res=number_format($numero,2);
        return $res;
    }
}
class Consola{ 
    private $libre_v1;
    private $libre_v2;
    private $libre_v5;
    private $phpv;
    private $conexion;
    public function __construct($phpv,$conexion,$array){	
        $this->libre_v1	=new libre_v1();	
        $this->libre_v2	=new libre_v2($phpv,$conexion);	
        $this->libre_v5	=new libre_v5($phpv,$conexion,'');
        $this->phpv=$phpv;	
        $this->conexion=$conexion;	
        
    }    
    
}
class Excel{
    /*
        $Archivo_excel= new Excel();
        $Archivo_excel->cargar_excel($nombreArchivo);
        $Archivo_excel->setDatosExcel();
        $datos=$Archivo_excel->getDatosExcel();	
        echo count($datos['values']);
        echo $datos['values']["E14"];
        
        $this->Datos_excel=array(
            "Renglones"=>$numRows,
            "Columnas"=>$columnas,
            "volumen"=>$volumen,
            "values"=>array(),
            "formulas"=>array()
        );
        */
    private  $Datos_excel;	
    public function getDatosExcel(){
        return $this->Datos_excel;
    }	
    public function cargar_excel($nombreArchivo){	//alamcena la informacion del archivo de excel en una array
        $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);	
    
        $objPHPExcel->setActiveSheetIndex(0);	//Asigno la hoja de calculo activa
        $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Obtengo el numero de filas del archivo
        $columnas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();   //Obtengo el numero de columnas del archivo
        $volumen = $objPHPExcel->setActiveSheetIndex(0)->calculateWorksheetDimension();   //Obtengo el numero de columnas del archivo
        
        //$Datos_excel=array(
        $this->Datos_excel=array(
            "Renglones"=>$numRows,
            "Columnas"=>$columnas,
            "volumen"=>$volumen,
            "values"=>array(),
            "formulas"=>array()
        );
        
        for ($xonta = 1; $xonta <= $numRows; $xonta++) {//almacena la informacion en arrays 		
            for ($x=65; $x<=90; $x++) { //falta amplar la pacasidad de cactura de datos lla que este solo puede procesar de A hasta Z
                $letra=chr($x);	//a to Z
                $cell = $objPHPExcel->getActiveSheet()->getCell($letra.$xonta); #obtengo la celda 
                $InvDate= $cell->getValue();                                    #obtengo el valor de la celda
                //$InvDate = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($InvDate)); 
                

                if(PHPExcel_Shared_Date::isDateTime($cell)){
                    $fecha = date($format="Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($InvDate)); 
                    $this->Datos_excel['values'][$letra.$xonta]=$fecha;
                }else{
                    #echo $objPHPExcel->getActiveSheet()->getStyle($letra.$xonta)->getNumberFormat();#->setFormatCode('YY-MM-DD'); 
                    $valor=$objPHPExcel->getActiveSheet()->getCell($letra.$xonta)->getCalculatedValue();
                    $this->Datos_excel['values'][$letra.$xonta]=$valor;
                }
                

                $this->Datos_excel['formulas'][$letra.$xonta]=$objPHPExcel->getActiveSheet()->getCell($letra.$xonta)->getValue();
                if($letra==$columnas)break;
            }	
        }
    }
    public function setDatosExcel(){            
        echo '<br><table border=1>';
            echo"<tr>";
                echo"<td></td>";	
                for ($x=65; $x<=90; $x++) {
                    $letra=chr($x);		

                        echo"<td>$letra</td>";		
                    if($letra==$this->Datos_excel['Columnas'])break;
                }	
            echo"</tr>";                
            for ($xonta = 1; $xonta <= $this->Datos_excel['Renglones']; $xonta++) {		                        
                echo '<tr>';
                echo '<td>'. $xonta.'</td>';
                for ($x=65; $x<=90; $x++) {
                    $letra=chr($x);	
                    echo '<td>'. $this->Datos_excel['values'][$letra.$xonta].'</td>';
                if($letra==$this->Datos_excel['Columnas'])break;
                }
                echo '</tr>';
                //$sql = "INSERT INTO productos (nombre, precio, existencia) VALUES('$nombre','$precio','$existencia')";
                //$result = $mysqli->query($sql);
            }
        echo '</table>';
    }
}
class Archivos{  
    private $libre_v1;
    private $libre_v2;
    private $libre_v4;
    private $libre_v5;
    private $phpv;
    private $conexion;
    public function __construct($phpv,$conexion,$array){	
        $this->libre_v1	=new libre_v1();	
        $this->libre_v2	=new libre_v2($phpv,$conexion);	
        $this->libre_v4= new libre_v4($phpv,$conexion); 
        $this->libre_v5= new libre_v5($phpv,$conexion,'');
        $this->folders=array();
        $this->archivos=array();
        $this->phpv=$phpv;	
        $this->conexion=$conexion;	
    }   
    function BarraExplorador($array){
        echo"<div>";
            #$this->libre_v5->input($type,$name,$value,$id,$class,$title,$libre,$style);
            echo"<i class='fas fa-folder'></i>";
            echo $this->libre_v5->input('submit','Operadores','Back','','','','','');
        echo"</div>";
    }
    function Explorador($array){ 
        /*
            $array=array(
                "URL_RELATIVA"=>$URL_RELATIVA
            );
        */
        
        
        $URL=$_SERVER["DOCUMENT_ROOT"].$array['URL_RELATIVA']; 
        if(empty($_POST['URL_RELATIVA']))$_POST['URL_RELATIVA']='';
        echo $this->libre_v5->input('text','URL_RELATIVA',$_POST['URL_RELATIVA'],'','','','','');
        $dire_open = opendir($URL); #Abre la ruta solicitada
        $temp_folders=array();
        $temp_archivos=array();
        while ($archivo = readdir($dire_open)){#extrae los archivo
            echo$archivo;
            echo"<br>";
            #almacena los datos dependiendo si es archivo o un folder 
            /*
            #folders
                
                #if (is_dir($archivo) and ($archivo!="." and $archivo!="..")){
                if (is_dir($archivo)){
                    $temp_folders[]=$archivo;
                }
            #Archivos
                elseif($archivo!="." and $archivo!=".."){
                    $temp_archivos[]=$archivo;
                }else{
                    echo$archivo;
                }
            */
        }     

    }
    function Explorar($array){
        static $RUTA=array();
        #control de acesos a carpetas 
            if(!$this->libre_v2->busca_array($RUTA,$_POST['Carpeta'])){
                    echo"agregar Carpeta";
                    $RUTA=$this->libre_v2->add_array($RUTA,'',$_POST['Carpeta']);
             }
            

        /*
            $array=array(
                "URL_RELATIVA"=>$URL_RELATIVA
            );
        */
        $URL=$_SERVER["DOCUMENT_ROOT"].$array['URL_RELATIVA'];
        #chdir (string $directory)#camvia a un directorio 
        echo"<br> actual:".getcwd(); #ruta actual
        echo"<br>";
        /*
        $partes_ruta = pathinfo($URL);
        echo"<br>dirname: ".$partes_ruta['dirname'];
        echo"<br>base name: ".$partes_ruta['basename'];
        echo"<br>file: ".$partes_ruta['extension'], "\n";
        echo"<br>filemane: ".$partes_ruta['filename']; // desde PHP 5.2.0
        echo"<br>";
        */
        #mueve entre las carpetas
        /*
        if(!empty($_POST['Carpeta'])){
            chdir($_POST['Carpeta']);#cambia el directorio
            if(!empty($_POST['Operadores']))
            switch ($_POST['Operadores']) {
                case 'Back': #regresa a la carpeta anterior 
                    chdir('.');
                break;
            }

        }*/
        echo"<br>";
        #$archivos = scandir($URL, 0);  # 0 desendente, 1 acendente, SCANDIR_SORT_NONE sin ordenanr 
        #print_r($archivos);            #imprime los datos obteneidos  

        $dire_open = opendir($URL); #Abre la ruta solicitada
        $temp_folders=array();
        $temp_archivos=array();
            while ($archivo = readdir($dire_open)){#extrae los archivo
                #almacena los datos dependiendo si es archivo o un folder 
                #folders
                    
                    #if (is_dir($archivo) and ($archivo!="." and $archivo!="..")){
                    if (is_dir($archivo)){
                       $temp_folders[]=$archivo;
                    }
                #Archivos
                    elseif($archivo!="." and $archivo!=".."){
                        $temp_archivos[]=$archivo;
                    }else{
                        echo$archivo;
                    }
            }                        
            
        if(!empty($array['URL_RELATIVA'])){
            $this->folders[$array['URL_RELATIVA']]=$temp_folders;        
            $this->archivos[$array['URL_RELATIVA']]=$temp_archivos;
        }
        return array(
            "Carpetas"=>$temp_folders,
            "Archivos"=>$temp_archivos
        );
    }
    function viewExplorar($array){
        /*
        $array=array(
            "class"=>array(
                "Contenedor"=>$Conte
            ),
            "Archivos"=>$archivos
        );
        */
        if(!empty($array['class']['Contenedor']))$classDiv="class='".$array['class']['Contenedor']."'";else$classDiv='';
        echo"<div ".$classDiv.">";
        
            #Carpetas
            /*
                $class=array(
                    'Conte_princiapal'=>'',
                    'Div_Opcion'=>'',
                    'Boton'=>'',
                    'img'=>''
                );
            */
            #lista 
            $name_menu='Carpeta';
            $elemento_menu=$array['Archivos']['Carpetas'];
            $class=array(
                'Conte_princiapal'=>'',
                'Div_Opcion'=>'opcion_lista',
                'Boton'=>'boton_lista',
                'img'=>'img_lista'
            );
            $otros_arrays=array(
                'img_activa'=> 'true',
                'img_defaul'=>'../img/folder3.png',

                'img'=>array(),
                'memoria'=>array('Activa'=>true,'type'=>'hidden')
            );
            $this->libre_v5->menu($name_menu,$elemento_menu,$class,$otros_arrays);
            $name_menu='Archivos';
            $elemento_menu=$array['Archivos']['Archivos'];
            $class=array(
                'Conte_princiapal'=>'',
                'Div_Opcion'=>'opcion_lista',
                'Boton'=>'boton_lista',
                'img'=>'img_lista'
            );
            $otros_arrays=array(
                'img_activa'=> 'true',
                'img_defaul'=>'../img/excel.png',

                'img'=>array(),
                'memoria'=>array('Activa'=>true,'type'=>'hidden')
            );
            $this->libre_v5->menu($name_menu,$elemento_menu,$class,$otros_arrays);
        echo"</div>";
    }
    function print_array($array){ 
        $res=false;
        for($x=0; $x<count($array); $x++){
            echo $array[$x];
            echo "<br>";
        }
    }
}
?>
