<?php
$consu3=consulta(clientes,$conexion);
print"
    <div id='conte-dere' style='background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: 220px; left: -1px; color: white; width: 200px; height: 580px; overflow-y: scroll; overflow-x: hidden;'>";
    while($dato=mysql_fetch_array($consu3)){
        print input(submit,cliente,$dato[Nombre_Cl],'','width: 190px;').'<br>';
    }
print"</div>";
$y=5;
$x1=10;
$x2=340;
print"<div style='
overflow: scroll;       overflow-x:hidden; 
position: absolute;     left: 115px; height: 600px; 
width: 664px;            
background: rgba(43,58,176, 0.698) none repeat scroll 0% 0%
'>";
$pares=1;
$consu25=consulta(archivos,$conexion);
while($dato= mysql_fetch_array($consu25)){//---
    if($pares==1){$x=$x1;} else {$x=$x2;}
   print"
        <table id='viaticos' 
        style='
            //position: adso; 
            top: ".$y."px; 
            left: ".$x."px;
            background: rgba(135,135,135,0.93); 
            color: white; 
            width: 300px; 
        '>
            <tr>
                <td width='150'>Factura N°:  </td><td>$dato[id]</td>
            </tr>
            <tr>
                <td>Cliente:     </td><td> $dato[cliente]</td>
            </tr>
            <tr>
                <td>Documento:  </td><td> ".input(button,'',$dato[nombre_archivo],$dato[nombre_archivo])."</td>
            </tr>
            <tr>
                <td></td>
                <td><a href='facturas/descarga.php?id=$dato[id]'>Descargar</a></td>
<!-- problemas de compativilidad con el boton de descagas -->
            </tr>
            <!--<tr><td>Fecha sb.   </td><td></td></tr>
            <tr><td>Fecha em.   </td><td></td></tr>-->  
        </table>";
    if($pares==2)$y=$y+100;
    if($pares==1){$pares=2;} else {$pares=1;}

}
print"</div>";
?>
