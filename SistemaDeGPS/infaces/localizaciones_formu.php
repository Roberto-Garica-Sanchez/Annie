<?php
echo"<div class='formularios'>";
    echo"<div class='titulos'>Gestor de Datos</div>";
    //echo"<input type='button' value='Dispositivo' class='Diseno_botones2'>    <input type='text' id='ID_dispositivo'name='dispositivo'value='".$_POST['dispositivo']."' class='Diseno_botones3'>";
    //echo"<br><input type='button' value='Longitud' class='Diseno_botones2'>              <input type='text' id='longitud'    name='longitud'     value='".$_POST['longitud']."'    class='Diseno_botones3'>";
    //echo"<br><input type='button' value='Latitud' class='Diseno_botones2'>               <input type='text' id='latitud'     name='latitud'      value='".$_POST['latitud']."'     class='Diseno_botones3'>";
    //echo"<br><input type='button' value='fecha' class='Diseno_botones2'>                 <input type='text' id='fecha'       name='fecha'        value='".$_POST['fecha']."'       class='Diseno_botones3'>";
    //echo"<br><input type='button' value='hora' class='Diseno_botones2'>                  <input type='text' id='hora'        name='hora'         value='".$_POST['hora']."'        class='Diseno_botones3'>";
    //echo"<br><input type='button' value='Carga de al bateria' class='Diseno_botones2'>   <input type='text' id='level_baterry'        name='level_baterry'         value='".$_POST['level_baterry']."'        class='Diseno_botones3'>";
    //echo"<br><input type='button' value='Nivel de señal' class='Diseno_botones2'>        <input type='text' id='level_signal'        name='level_signal'         value='".$_POST['level_signal']."'        class='Diseno_botones3'>";
    

    echo libre_v3::input('button','','ID Registro','','','Diseno_botones2','','');
    echo libre_v3::input('text','ID',$_POST['ID'],'','','Diseno_botones3','readonly="readonly"','');
    
    echo libre_v3::input('button','','Dispositivo','','','Diseno_botones2','','');
    echo libre_v3::input('text','Dispositivo',$_POST['Dispositivo'],'','','Diseno_botones3','','');
    
    echo libre_v3::input('button','','Longitud','','','Diseno_botones2','','');
    echo libre_v3::input('text','Longitud',$_POST['Longitud'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','Latitud','','','Diseno_botones2','','');
    echo libre_v3::input('text','Latitud',$_POST['Latitud'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','Fecha','','','Diseno_botones2','','');
    echo libre_v3::input('text','Fecha',$_POST['Fecha'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','Hora','','','Diseno_botones2','','');
    echo libre_v3::input('text','Hora',$_POST['Hora'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','Carga','','','Diseno_botones2','','');
    echo libre_v3::input('text','bateria',$_POST['bateria'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','Nivel de señal','','','Diseno_botones2','','');
    echo libre_v3::input('text','senal',$_POST['senal'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','Pulso','','','Diseno_botones2','','');
    echo libre_v3::input('text','pulso',$_POST['pulso'],'','','Diseno_botones3','','');


echo"</div>";
?>