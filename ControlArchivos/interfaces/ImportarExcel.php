<?php

    echo"<div class='Contenedor_auto2'>";
        
    $name_menu="FuncionExcel";
    $elemento_menu=array('Datos','Formulas');          
    $class=array(
        'Conte_princiapal'=>'',
        'Div_Opcion'=>'Alineacion_lateral',
        'Boton'=>'botonAjusteDiv',
        'img'=>'ImgAjusteDiv'
    );
    $otros_arrays=array(
        'img_activa'=> 'true',
        'img_defaul'=>'../img/defaul.jpg',
        'img'=>array("","",'',"",""),
        'memoria'=>array('Activa'=>true,'type'=>'hidden')

    );
    echo $libre_v5->menu($name_menu,$elemento_menu,$class,$otros_arrays);
    echo"</div>";
    #datos del archivo en proceso 
    echo"<div class='Contenedor_auto2'>";
        echo"<a>Archivo Selecionado: <label style='color: blue;'>".$_POST['archivos']."</label><a/>";
        if(empty($_POST['archivos']))$_POST['archivos']='';
        echo $libre_v5->input('hidden','archivos',$_POST['archivos'],'','','','','');
        echo"<br>";
        echo"<label>Importar En: </label>";
            $libre_v4->ListaDb();
            $ListaDatabase=$libre_v4->getListaDb();
            if(!empty($_POST['INdatabase'])){
                $libre_v4->ListaTB($_POST['INdatabase']);
                $ListaTablas=$libre_v4->getListaTB();        
            }    
            if(empty($ListaTablas))$ListaTablas='';
            $despieges_ListaDatabase=array(
                "name"=>'INdatabase',
                "Subtitulo"=>'Base De Datos',
                "Elementos"=>$ListaDatabase,
                "Excesiones"=>array('mysql','information_schema','phpmyadmin','performance_schema','excel','login'),
                "class"=>'Diseno_botones3',
                "libre"=>'onchange="envia_formulario();"'
            );
            $despieges_ListaTablas=array(
                "name"=>'INtabla',
                "Subtitulo"=>'Tabla',
                "Elementos"=>$ListaTablas,
                #"Excesiones"=>array('mysql','information_schema','phpmyadmin','performance_schema','excel','login'),
                "class"=>'Diseno_botones3',
                "libre"=>'onchange="envia_formulario();"'
            );
            $TipoDeImportacion=array(
                "name"=>'TipoDeImportacion',
                "Subtitulo"=>'Tipo De Importacion',
                "Elementos"=>array('Lista','Unica'),
                #"TextComplemento"=>array(),
                "class"=>'Diseno_botones3',
                #"Excesiones"=>array()
                "libre"=>'onchange="envia_formulario();"'
            );     
        echo"<br>";
        echo $libre_v5->despieges($despieges_ListaDatabase);    
        echo $libre_v5->despieges($despieges_ListaTablas);        
        echo"<br>";
        echo $libre_v5->despieges($TipoDeImportacion);        
        echo $libre_v5->input('submit','Operador','Auto Asignacio','','Diseno_botones3','','','');
        echo"<br>";
        echo $libre_v5->input('submit','Operador','Importar','','Diseno_botones3','','','');
    echo"</div>";
    echo"<div class='Contenedor_auto2'>";
        if(!empty($_POST['INdatabase']) and !empty($_POST['INtabla']) and ($_POST['INtabla']!='INtabla')){
            echo"<label>Configuracion De Importacion </label><br>";
            switch ($_POST['TipoDeImportacion']) {
                case 'Lista':
                    if(empty($_POST["Asignacion_RenglonInicioListado"]))$_POST["Asignacion_RenglonInicioListado"]='';
                    if(empty($_POST["Asignacion_RenglonFinalListado"]))$_POST["Asignacion_RenglonFinalListado"]='';
                    echo "<a class=''>";
                    
                    echo $libre_v5->input('radio','Asignacion','RenglonInicioListado','','none','','',''); 
                    echo $libre_v5->input('button','','Inicio de listado','','Diseno_botones2','','','');    
                    echo $libre_v5->input('text',"Asignacion_RenglonInicioListado",$_POST["Asignacion_RenglonInicioListado"],'','Diseno_botones3','','','');    

                    echo "</a><br>"; 
                    echo "<a class=''>";
                    echo $libre_v5->input('radio','Asignacion','RenglonFinalListado','','none','','',''); 
                    echo $libre_v5->input('button','','Final de listado','','Diseno_botones2','','','');    
                    echo $libre_v5->input('text',"Asignacion_RenglonFinalListado",$_POST["Asignacion_RenglonFinalListado"],'','Diseno_botones3','','','');    
                    echo "</a><br>"; 
                    
                    
                break;
                
            }
        
            $libre_v4->Columnas($_POST['INdatabase'],$_POST['INtabla']);
            $libre_v4->KeyColumnUsege($_POST['INdatabase'],$_POST['INtabla']);
            $columnas=$libre_v4->GetColumnas();
            $excesion=$libre_v4->getKeyColumnUsege();
            //checkbox
            #Diseno_botones3
            for ($x=0; $x < count($columnas); $x++) { 
                if($excesion!=$columnas[$x]){
                    echo "<a class=''>";
                        echo $libre_v5->input('radio','Asignacion',$columnas[$x],'','none','','','');    
                    if(empty($_POST["Asignacion_".$columnas[$x]]))$_POST["Asignacion_".$columnas[$x]]='';
                    echo $libre_v5->input('button','',$columnas[$x],'','Diseno_botones2','','','');    
                    echo $libre_v5->input('text',"Asignacion_".$columnas[$x],$_POST["Asignacion_".$columnas[$x]],'','Diseno_botones3','','','');    
                    echo "</a>";
                    echo "<br>";
                }
            }
            
        }else{
            echo"Seleccion el Destino De Importacion";
        }
    echo"</div>";

	echo"<div style='min-width: 500px;background: #343434;padding: 5px;box-shadow: 0px 0px 1px 1px blue;float: left;overflow: auto;max-height: 100%;'>";
        if($_POST['FuncionExcel']=="Datos" or $_POST['FuncionExcel']=='Defaul'){
            $datosExtraer ='values';
        }
        if($_POST['FuncionExcel']=="Formulas"){
            $datosExtraer ='formulas';
        }
        echo '<table border="0" class="TablaExcel">';
            if(!empty($datosExcel)){
                echo"<tr class='RenglonSuperior'>";
                    echo"<td></td>";	
                    for ($x=65; $x<=90; $x++) {
                        $letra=chr($x);
                        echo"<td>";
                        echo$libre_v5->input('submit','Columna',$letra,'','','','','');    
                        echo"</td>";		
                        if($letra==$datosExcel['Columnas'])break;
                    }	
                echo"</tr>"; 
                            
                for ($xonta = 1; $xonta <= $datosExcel['Renglones']; $xonta++) {		                        
                    echo '<tr>';
                    echo '<td>';
                        echo$libre_v5->input('submit','Renglon',$xonta,'','Diseno_boton_id','','','');    
                    echo'</td>';
                    for ($x=65; $x<=90; $x++) {
                        $letra=chr($x);	
                        echo"<td>";
                        echo"<button type='submit' name='CeldaAsigna' value='".$letra.$xonta."' class='Medio'>";
                            echo $datosExcel[$datosExtraer][$letra.$xonta];
                        echo"</button>";
                        //echo$libre_v5->input('submit','',$datosExcel[$datosExtraer][$letra.$xonta],'','','','','');    
                        echo"</td>";		
                    if($letra==$datosExcel['Columnas'])break;
                    }
                    echo '</tr>';
                }

            }
        echo '</table>';
    echo"</div>";



    
    //include_once($_SERVER["DOCUMENT_ROOT"].'/leer_excel/lectura_general.php');
    
?>