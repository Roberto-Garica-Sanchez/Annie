<!-- Forma en que el programa manda la informacion-->
<?php //inicio de codigo PHp
        $direcion_base="SistemaDeGPS/";
        echo"<LINK REL='STYLESHEET' HREF='".$direcion_base."estilo_gps.css' />";
        //----------------Comentarios
            //DB significa base de datos 
            //<div> permite crear contenedores 
        //--------- Oculta mensajes no deseados del desarollo del programa                         
            error_reporting(0);
            ini_set( 'display_errors', false );
            error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
        //--
            date_default_timezone_set("Mexico/General");                        //ajusta la hora del servido en vasea una region 

        include($direcion_base.'libre_v3.php');                                                //carga una libreriad


    echo"<div id='menu' class='menu'>";
            //control de menus                     
                $nombre_del_menu_princiapl="menu1";
                $nombre_de_submenu_Ajustes="subMenu_Ajustes";


            //se crea el menu princial del programa 
            $elemento_menu=array('limitaciones Area','Localizacion','Ajustes');                         //elemento que estaran en el menu
            libre_v3::menu( $nombre_del_menu_princiapl,$elemento_menu,'Boton_menu1');                   //ejecuta el creador de menus 
    
    echo"</div>";
    echo"<div id='menu_lateral' class='menu_lateral'></div>";
    echo"<div id='contenedor_pri' class='contenedor_pri'>";
        //establese la communicasion a MYSQL 
        include_once('login_tem.php');// cargar el archivo que genera la conexion a la base de datos

        //-----------------------Operaciones que el programa lleva a cabo (GUARDA,MODIFICAR,BORRAR )
        //todas las operaciones que modifican la vase de datos se consentran en este archivo 
        //con el fin de mantener un control limpio 
        include_once('Centro_de_procesos.php');

        //-----------------------Acciones que se yeva acabo se gun la selecion del menu princial 
        if($_POST[$nombre_del_menu_princiapl]=="Localizacion"){}
        if($_POST[$nombre_del_menu_princiapl]=="Ajustes"){                            
            
            $elemento_menu=array('Localizacion','Dispositivos','Usuarios');     //elementos para un submenu
            libre_v3::menu($nombre_de_submenu_Ajustes,$elemento_menu,'Boton_menu1');     //crea un sub menu 

            //---------Acciones para el submenu 
            if($_POST[$nombre_de_submenu_Ajustes]=="Localizacion"){
                echo  $direcion_base.'infaces/localizaciones_formu.php';
                include( $direcion_base.'infaces/localizaciones_formu.php');                          //carga la interface para registrar nuevas localizaciones
                include( $direcion_base.'infaces/localizaciones_list.php');                    //carga una lista de posiciones almacenas en la DB
                include( $direcion_base.'Consola_de_operaciones.php');
            }
            if($_POST[$nombre_de_submenu_Ajustes]=="Dispositivos"){
                include( $direcion_base.'infaces/Dispositivos_formu.php');                            //carga interface para registra nuevos dispositivos
                include( $direcion_base.'Consola_de_operaciones.php');
            }
            if($_POST[$nombre_de_submenu_Ajustes]=="Usuarios"){
                include( $direcion_base.'infaces/Usuarios_formu.php');                          
                include( $direcion_base.'infaces/Usuario_list.php');                         
                include( $direcion_base.'Consola_de_operaciones.php');                         
            }

            
        }
echo"</div>";
echo"<div></div>";
echo"<div></div>";

?>