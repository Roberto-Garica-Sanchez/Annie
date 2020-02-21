<?php 
include('libre_usr.php');
$style="";
$n1=menu2;      $n2=name2set;   $de=Nuevo;
$v1='';         $v2='Nuevo';
$v3='Informe';  $v4='';
$v5='';         $v6='';
$v7='';
sub_menu(
    $style
    ,$n1,$n2    ,$de
    ,$v1,$b1    ,$v2,$b2
    ,$v3,$b3    ,$v4,$b4
    ,$v5,$b5    ,$v6,$b6
    ,$v7,$b7    ,$v8,$b8
    ,$v9,$b9    ,$v10,$b10
    ,$v11,$b11    ,$v12,$b12
    ,$v13,$b13
);
echo"<div id='Conte-pri'>";
    if($_POST[$n1]==$v2)include('Nuevo_usr.php');
    //include('Informe_usr.php');
echo"</div>";
?>