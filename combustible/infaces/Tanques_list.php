<?php
echo"<div class='Contenedor_auto2'>";                                     
        echo"<div>";       
            $columnas   = $libre_v4->Columnas($database,$tabla);     //obtiene las columnas de la tabla tanque
            $libre_v4->ExtraColumns($database,$tabla);               //busca si existe una columna auto incremental
            $Incrementales  = $libre_v4->getExtraColumns();                     //obtiene los resultados de la busqueda 
            for ($x=0; $x < count($columnas); $x++) { 
                $class='Diseno_botones1';
                for ($z=0; $z < count($Incrementales) ; $z++) { 
                    if($Incrementales[$z]==$columnas[$x]){$class='Diseno_boton_id';break;}
                }
                echo $libre_v5->input('submit','',$columnas[$x],'',$class,'','','');
            }
        echo"</div>";
        //$tabla="repostajes";
        $getColumnas        = array('*') ;
        $BuscaColumnas      = array();
        $BuscaDatos         = array();
        
        $array=array(
            "tabla"=>$tabla,
            "Operacion"=>
            array(  'INSERT'=>array(
                    "Activar"    =>'false'
                ),      'SELECT'=>array(
                    "Activar"	=>'true',//'false'
                    "LIKE"		=>'true',//'false'
                    "getColumnas"    =>$getColumnas,//array()
                    "BuscaColumnas"  =>$BuscaColumnas,//array()
                    "BuscaDatos"     =>$BuscaDatos//array()
                ),      'UPDATE'=>array(
                    "Activar"	=>'false'
                ),      'DELETE'=>array(
                    "Activar"	=>'false'
                )
            )
        );
        $Ares_v1-> GeneraSql($array);
        $sql=$Ares_v1-> getSql($array);        
        $libre_v2->db('combustible',$conexion,$phpv);

        $resu=mysqli_query($conexion,$sql)or die("Error".mysqli_error($conexion));     //Solicita los datos 
        while ($fila = mysqli_fetch_array($resu)) {                                         //ciclo para parentar todos los datos obtenido en la consulta 
            $class='Diseno_botones1';
            /*
            */
            for ($y=0; $y < count($columnas); $y++) {                            
                $name='';
                for ($z=0; $z < count($Incrementales) ; $z++) {//recorre la columnas que tiene 
                    $class='Diseno_botones1';
                    if($Incrementales[$z]==$columnas[$y]){
                        
                        $class='Diseno_boton_id';
                        $name='Descargar';
                        break;
                    }
                }
                echo $libre_v5->input('submit',$name,$fila[$columnas[$y]],'',$class,'','','');
                
            }
            echo"<br>";
            //echo $libre_v5->input('submit','',$fila[$x],'',$class,'','','');
            $x++;
        }

/*
        $consulta="SELECT * FROM repostajes ";                                            //genera una consulta para obtener informacion de la BD 
        $resu=mysqli_query($conexion,$consulta)or die("Error".mysqli_error($conexion));     //Solicita los datos 
        mysqli_data_seek($resu,0);                                                          //inicia revisar lso datos desde la parte superior 
        while ($fila = mysqli_fetch_array($resu)) {                                         //ciclo para parentar todos los datos obtenido en la consulta 
            
            echo"<input type='submit'class='Diseno_boton_id' name='Descargar' value='".$fila['ID_G']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['Fecha']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['Placas']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['Cliente']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['Operador']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['Contador_Inicio']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['Contador_Final']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['Total_Despachado']."'>";
            
            echo"<br>";
        }
  */      
echo"</div>";
?>