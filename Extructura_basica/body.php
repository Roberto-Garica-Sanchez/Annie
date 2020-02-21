<!-- Forma en que el programa manda la informacion-->
<?php //inicio de codigo PHP
        date_default_timezone_set("Mexico/General");                        //ajusta la hora del servido en vasea una region 
        if(include_once($_SERVER["DOCUMENT_ROOT"].'/CentroDeProcesos.php')){
            echo"<div id='menu' class='menu'>";//control de menus   
                include('menus/Principal.php');
            echo"</div>";
            echo"<div id='menu_lateral' class='menu_lateral'></div>";
            echo"<div id='contenedor_pri' class='contenedor_pri'>";
                //establese la communicasion a MYSQL 
                include_once($_SERVER["DOCUMENT_ROOT"].'/login_tem.php');// cargar el archivo que genera la conexion a la base de datos
                mysqli_select_db ($conexion ,'combustible');
                #en el sigiente archivo se procesan todas la peticione que se tiene que modificar antes de presentar el sigiente peticion
                #include_once('Centro_de_procesos.php');
                
                //-----------------------Acciones que se yeva acabo se gun la selecion del menu princial 
                /*
                switch ($_POST[$name_menu]) {
                    case $elemento_menu[0]: #Abastecimiento
                    
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
                                $tabla='Operadores';
                                $database='almacen';
                                $file=$_SERVER["DOCUMENT_ROOT"]."/combustible/infaces/".$elementos_ajustes[3].".php";
                                if(file_exists($file)==true){   
                                    include($file);
                                }else{echo" <br>Archivo no localizado";}
                                
                            break;
                            case $elementos_ajustes[4]:#Clientes
                                $tabla='Clientes';
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
                */
            echo"</div>";

            echo"<div></div>";
            echo"<div></div>";

        
        }else{
            echo"el programa no encuentra los archivos de configuracion";
        }                           
                
?>