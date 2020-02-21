<?php //php7

/*
------------Include  requeridos[Nombre]
-->"tablero.php"
-->"libre_uni.php"
------------function en esta librerria
-->sub_menu			(... formato ...);
-->liinputli		($type,$name,$id,$value,$libre);
....."libre_uni.php"
-->db				($base,$conexion)
*/
db('almacen',$conexion,$phpv);
$consu5=consulta('folio',$conexion,'','',ID_G,1,$phpv);
$consu1=consulta('proveedores',$conexion,'','',ID_G,1,$phpv);
function liinputli($type,$name,$id,$value,$libre,$phpv){
    if ($type=='')$type=submit;
    echo"<li><input type='$type' name='$name' value='$value' id='$id' $libre></li>";
}
function sub_menu(
    $style
    ,$n1,$n2    ,$de
    ,$v1,$b1    ,$v2,$b2
    ,$v3,$b3    ,$v4,$b4
    ,$v5,$b5    ,$v6,$b6
    ,$v7,$b7    ,$v8,$b8
    ,$v9,$b9    ,$v10,$b10
    ,$v11,$b11    ,$v12,$b12
    ,$v13,$b13
){
    $id=idI;
    $li_b="style=' border-color: blue;'";
    $li_r="style=' border-color: red;'";
    if($_POST[$n1]==''){$_POST[$n2]=$de;$_POST[$n1]=$de;}
    if($_POST[$n1]<>''){$_POST[$n2]=$_POST[$n1];}
    if($_POST[$n1]==$v1){$id1=id_I;}else{$id1=$id;    if($b1<>''){$li1=$li_r;$type1=button;}else{$li1=$li_b;}}
    if($_POST[$n1]==$v2){$id2=id_I;}else{$id2=$id;    if($b2<>''){$li2=$li_r;$type2=button;}else{$li2=$li_b;}}
    if($_POST[$n1]==$v3){$id3=id_I;}else{$id3=$id;    if($b3<>''){$li3=$li_r;$type3=button;}else{$li3=$li_b;}}
    if($_POST[$n1]==$v4){$id4=id_I;}else{$id4=$id;    if($b4<>''){$li4=$li_r;$type4=button;}else{$li4=$li_b;}}
    if($_POST[$n1]==$v5){$id5=id_I;}else{$id5=$id;    if($b5<>''){$li5=$li_r;$type5=button;}else{$li5=$li_b;}}
    if($_POST[$n1]==$v6){$id6=id_I;}else{$id6=$id;    if($b6<>''){$li6=$li_r;$type6=button;}else{$li6=$li_b;}}
    if($_POST[$n1]==$v7){$id7=id_I;}else{$id7=$id;    if($b7<>''){$li7=$li_r;$type7=button;}else{$li7=$li_b;}}
    if($_POST[$n1]==$v8){$id8=id_I;}else{$id8=$id;    if($b8<>''){$li8=$li_r;$type8=button;}else{$li8=$li_b;}}
    if($_POST[$n1]==$v9){$id9=id_I;}else{$id9=$id;    if($b9<>''){$li9=$li_r;$type9=button;}else{$li9=$li_b;}}
    if($_POST[$n1]==$v10){$id10=id_I;}else{$id10=$id; if($b10<>''){$li10=$li_r;$type10=button;}else{$li10=$li_b;}}
    if($_POST[$n1]==$v11){$id11=id_I;}else{$id11=$id; if($b11<>''){$li11=$li_r;$type11=button;}else{$li11=$li_b;}}
    
    echo"
    <div id='conte-isqu' style='".$style."'>
        <div id='sub_menu'>
        <input type='hidden' class='Medio' name='".$n1."' value='".$_POST[$n1]."'>
        <input type='hidden' class='Medio' name='".$n2."' value='".$_POST[$n2]."'>
            <ul id='smenu-botones'>";
                liinputli($type1,$n1,$id1,$v1,$li1);
                liinputli($type2,$n1,$id2,$v2,$li2);
                liinputli($type3,$n1,$id3,$v3,$li3);
                liinputli($type4,$n1,$id4,$v4,$li4);
                liinputli($type5,$n1,$id5,$v5,$li5);
                liinputli($type6,$n1,$id6,$v6,$li6);
                liinputli($type7,$n1,$id7,$v7,$li7);
                liinputli($type8,$n1,$id8,$v8,$li8);
                liinputli($type9,$n1,$id9,$v9,$li9);
                liinputli($type10,$n1,$id10,$v10,$li10);
                liinputli($type11,$n1,$id11,$v11,$li11);

    echo"		</ul >
        </div >
    </div >
    ";
}
$libre_alm=1;
?>