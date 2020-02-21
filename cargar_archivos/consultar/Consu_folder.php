<?php 
    include_once($_SERVER["DOCUMENT_ROOT"]."/libre_v2.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/libre_v5.php");
    if(empty($libre_v2))$libre_v2= new libre_v2('php7',$conexion);
   
    if(empty($_POST['Directorios'])){$_POST['Directorios']="";} //elimina error de aranque de programa 
    $directorios=despliega_de_folder($_SERVER["DOCUMENT_ROOT"]."/archivos_subidos");
    
    $class=array(
        'Conte_princiapal'=>'Contenedor_auto2',//Menu_central
        'Div_Opcion'=>'Alineacion_lateral',//Conte_Cuadrado_auto
        'Boton'=>'botonAjusteDiv',//boton_Cuadrado_auto_claro
        'img'=>'ImgAjusteDiv'//img_Cuadrado_auto
    );
    $otros_arrays=array(
        'img_defaul'=>'/img/defaul.jpg',
        'img'=>array("","","","",""),
        'memoria'=>array('Activa'=>true,'type'=>'hidden')
    );
    $libre_v5_obj->menu("archivos",$directorios["archivos"],$class,$otros_arrays);
    $class=array(
        'Conte_princiapal'=>'',
        'Div_Opcion'=>'',
        'Boton'=>'buttonDefaulClaro'
    );
    include_once($_SERVER["DOCUMENT_ROOT"].'/leer_excel/lectura_general.php');
    //include_once($_SERVER["DOCUMENT_ROOT"]."/combustible/Consola_de_operaciones.php");
    
    function mapeo_de_folder(){}
    function  despliega_de_folder($direcion){
        $directorio = opendir($direcion); //ruta actual
        $folders=array();
        $archivos=array();
        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (is_dir($archivo))//verificamos si es o no un directorio-folder
            {
                $folders[]=$archivo;
                //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
                //$libre_v5_obj->input();
                //$libre_v5_obj->input("submit","",$archivo,'','','','','');

            }
            else
            {
                $archivos[]=$archivo;
                //echo $archivo . "<br />";
            }
        }
        $datos=array("folder"=>$folders,"archivos"=>$archivos);
        return $datos;
    }
    function print_array($array){
        $res=false;
        for($x=0; $x<count($array); $x++){
            echo $array[$x];
            echo "<br>";
        }

    }
?>