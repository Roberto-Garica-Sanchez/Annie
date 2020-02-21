<!-- Forma en que el programa manda la informacion-->
<?php //inicio de codigo PHp
        
        //echo"<LINK REL='STYLESHEET' HREF='/combustible/estilo_gps.css' />";
        //----------------Comentarios
            //DB significa base de datos 
            //<div> permite crear contenedores 
        //--------- Oculta mensajes no deseados del desarollo del programa                         
            //error_reporting(0);
            //ini_set( 'display_errors', false );
            //error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
        //--
        date_default_timezone_set("Mexico/General");                        //ajusta la hora del servido en vasea una region 
        include_once($_SERVER["DOCUMENT_ROOT"].'/libre_v5.php');                  
        if(empty($libre_v5))$libre_v5= new libre_v5('php7',$conexion,'');
    
       echo"<div id='menu' class='menu'>";
                //control de menus                     
                $name_menu="menu1";
                $elemento_menu=array('Abastecimiento','Ajustes','Reportes');
                $name_menu_repostajes='submenuRepostaje';
                $elementos_menu_repostajes=array('Cargas Combustible','Compra Combustible');
                
                $name_menu_tanques='submenutanques';
                $elementos_ajustes=array(
                    'Tanques',
                    'Cargas - Compra',
                    'RdeC',
                    'Operadores',
                    'Clientes',
                    'Unidades'

                );
                $class=array(
                    'Conte_princiapal'=>'Lateral',
                    'Div_Opcion'=>'',
                    'Boton'=>'Boton_menu1',
                    'img'=>''
                );
                $otros_arrays=array(
                    'img_activa'=> 'false',
                    'img_defaul'=>'/img/defaul.jpg',
                    'img'=>array("","",'',"",""),
                    'memoria'=>array('Activa'=>true,'type'=>'hidden'),
                    'ocultar'=>array(
                        'Reportes'=>'true',
                        'Cargas - Compra'=>'true',
                        'RdeC'=>'true'
                    )
                );
                $libre_v5->menu($name_menu,$elemento_menu,$class,$otros_arrays);
        echo"</div>";
        echo"<div id='menu_lateral' class='menu_lateral'></div>";
        echo"<div id='contenedor_pri' class='contenedor_pri'>";
            //establese la communicasion a MYSQL 
            include_once($_SERVER["DOCUMENT_ROOT"].'/login_tem.php');// cargar el archivo que genera la conexion a la base de datos
            mysqli_select_db ($conexion ,'combustible');
            #en el sigiente archivo se procesan todas la peticione que se tiene que modificar antes de presentar el sigiente peticion
            include_once('Centro_de_procesos.php');
            
            //-----------------------Acciones que se yeva acabo se gun la selecion del menu princial 
            switch ($_POST[$name_menu]) {
                case $elemento_menu[0]: #Abastecimiento
                    $subMenu= new inface('combustible','',$phpv,$conexion);
                    $subMenu->menuHorizontal($name_menu_repostajes,$elementos_menu_repostajes,$otros_arrays);
                    if(!empty($_POST[$name_menu_repostajes]))
                    switch ($_POST[$name_menu_repostajes]) {
                        case $elementos_menu_repostajes[0]: #Carga De Combustible
                            $tabla='repostajes_unidades';
                            $database='combustible';
                                        
                            include_once('infaces/Repostaje_unidades_formu.php');
                            include_once('infaces/Repostaje_unidades_list.php');
                            //include_once('Consola_de_operaciones.php');
                        break;
                        case $elementos_menu_repostajes[1]:#Compra De Combustible
                            $tabla='repostajes_tanques';
                            $database='combustible';
                            include_once('infaces/Repostaje_tanques_formu.php');
                            include_once('infaces/Repostaje_tanques_list.php');
                        break;
                    }
                break;
                case $elemento_menu[1]: #Ajustes
                    $subMenu= new inface('combustible','',$phpv,$conexion);
                    $subMenu->menuHorizontal($name_menu_tanques,$elementos_ajustes,$otros_arrays);
                    switch ($_POST[$name_menu_tanques]) {
                        case $elementos_ajustes[0]:#tanques
                            $tabla='tanques';
                            $database='combustible';
                            mysqli_select_db ($conexion ,$database);      
                            if(empty($_POST['Fecha'])) include_once($_SERVER["DOCUMENT_ROOT"].'/combustible/limpiar_formulario/Tanques_lim.php'); 
                            include_once($_SERVER["DOCUMENT_ROOT"].'/combustible/infaces/Tanques_formu.php');
                            include_once($_SERVER["DOCUMENT_ROOT"].'/combustible/infaces/Tanques_list.php');
                            
                        break;
                        case $elementos_ajustes[1]:#Analisis Cargas - Compra
                            include_once($_SERVER["DOCUMENT_ROOT"].'/combustible/SubRutinas/CambioNivelDiesel.php');

                        break;
                        case $elementos_ajustes[3]:#Operadores
                            $tabla='operadores';
                            $database='almacen';
                            $file=$_SERVER["DOCUMENT_ROOT"]."/combustible/infaces/".$elementos_ajustes[3].".php";
                            if(file_exists($file)==true){   
                                include($file);
                            }else{echo" <br>Archivo no localizado";}
                            
                        break;
                        case $elementos_ajustes[4]:#Clientes
                            $tabla='clientes';
                            $database='almacen';
                            
                            $file=$_SERVER["DOCUMENT_ROOT"]."/combustible/infaces/".$elementos_ajustes[4].".php";
                            if(file_exists($file)==true){   
                                include($file);
                            }else{echo" <br>Archivo no localizado";}
                            
                        break;
                        case $elementos_ajustes[5]:#Unidades
                            $tabla='unidades';
                            $database='almacen';
                            $file=$_SERVER["DOCUMENT_ROOT"]."/combustible/infaces/".$elementos_ajustes[5].".php";             
                            if(file_exists($file)==true)    {include($file);}else{echo" <br>Archivo no localizado";}

                        break;
                    }
                break;
                case $elemento_menu[2]:
                    $database='serviciosbomberos';

                    $tabla='datosdelservicio';     
                    $title=" Datos Del Servicio.";
                    include($_SERVER["DOCUMENT_ROOT"].'/combustible/infaces/reportes.php');
                    $title="Personal De Servicio.";
                    $tabla='personaldeservicio';
                    include($_SERVER["DOCUMENT_ROOT"].'/combustible/infaces/reportes.php');


                    
                    $tabla='datosdelservicio';  
                    include($_SERVER["DOCUMENT_ROOT"].'/combustible/infaces/reportes_list.php');
                    $tabla='personaldeservicio';
                    include($_SERVER["DOCUMENT_ROOT"].'/combustible/infaces/reportes_list.php');
                break;
                
                
            }            
        echo"</div>";
   
        echo"<div></div>";
        echo"<div></div>";

?>