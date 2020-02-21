<?php
echo"<div id='lista_localizaciones' class='lista_localizaciones'>";        
        echo"<div>";            
            echo"<input type='button'class='Diseno_boton_id' name='' value='ID'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='Latitud'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='Longitud'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='Fecha'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='Hora'>";
        echo"</div>";

        $consulta="SELECT * FROM localizacion ";                                            //genera una consulta para obtener informacion de la BD 
        $resu=mysqli_query($conexion,$consulta)or die("Error".mysqli_error($conexion));     //Solicita los datos 
        mysqli_data_seek($resu,0);                                                          //inicia revisar lso datos desde la parte superior 
        while ($fila = mysqli_fetch_array($resu)) {                                         //ciclo para parentar todos los datos obtenido en la consulta 
            
            echo"<input type='submit'class='Diseno_boton_id' name='Descargar' value='".$fila[ID_G]."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['latitud']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['longitud']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['fecha']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['hora']."'>";
            echo"<br>";
        }
        
echo"</div>";
?>