<?php
echo"<div id='lista_localizaciones' class='lista_localizaciones'>";        
        echo"<div>";            
            echo"<input type='button'class='Diseno_boton_id' name='' value='ID'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='Nombre'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='Apellidos'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='Edad'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='Nota'>";
        echo"</div>";

        $consulta="SELECT * FROM usuario ";                                            //genera una consulta para obtener informacion de la BD 
        $resu=mysqli_query($conexion,$consulta)or die("Error".mysqli_error($conexion));     //Solicita los datos 
        mysqli_data_seek($resu,0);                                                          //inicia revisar lso datos desde la parte superior 
        while ($fila = mysqli_fetch_array($resu)) {                                         //ciclo para parentar todos los datos obtenido en la consulta 
            
            echo"<input type='submit'class='Diseno_boton_id' name='Descargar' value='".$fila[ID_G]."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['nombre']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['apellido']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['edad']."'>";
            echo"<input type='button'class='Diseno_botones1' name='' value='".$fila['nota']."'>";
            echo"<br>";
        }
        
echo"</div>";
?>