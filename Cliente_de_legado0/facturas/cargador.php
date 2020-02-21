<div id="Conte-pri">
<?php
if($libre_fact<>1)include('libre_fact.php');
$listn2=Cargar;    
$listn3=Folder;
$menu='menu-list';
$style='top: 220px;';
include('lista.php');
db(empresa,$conexion);//---
$consu3=consu("clientes",$conexion);//---
$consu25=consu(archivos,$conexion);//-----
$archivo        =$_FILES["archivo"]["tmp_name"];
$tamano         =$_FILES["archivo"]["size"];
$tipo           =$_FILES["archivo"]["type"];
$nombre_archivo =$_FILES["archivo"]["name"];


$fp         =fopen($archivo,"rb");    
$contenido  =fread($fp,$tamano);
$contenido  =addslashes($contenido);
fclose($fp);
if($tamano<1048576){     $tamano=tipo_tamano($tamano);}
    
if($_POST['menu-list']==$listn2){
    if($_POST[clear]<>''){
        $_POST[n_factu]='';
        $_POST[titulo]='';
        $_POST[descri]='';
        $_POST[cliente]=Cliente;
    }
    $size=0;
    $title1='Carga de archivo al Servidor';
    $style='position: absolute; top:50px; left: 500px; width: 500px; color: white; background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%;';
    $i1='N° Factura';
    $i2='Titulo';
    $i3='Descripcion';
    $i4='Cliente';
    $i5='Archivo';
    $ic1=$ic2=$ic3=$ic4=$ic5='#343434';
    $d1=input(text,n_factu,$_POST[n_factu],"Numero de factura relacionado a contabilidad");//---
    $d2=input(text,titulo,$_POST[titulo]);//---
    $d3=input(text,descri,$_POST[descri],'Pequeña descripcion o anotacion del contenido del archivo o referencias a la factura');
    $d4=des_mysql(cliente,Cliente,$_POST[cliente],Nombre_Cl,$consu3,$conexion,'Cliente al que sera Asignado la factura para que solo el Pueda verlo');
    $d5='<input type="file" name="archivo" title="Archivo que el ciente podra descargar cuando el asi lo requiera[Preferntemente tipo PDF]">';
    $d6=input(submit,grava,enviar);//---

    $com=compro($_POST[n_factu],$consu25,id,$conexion);//---
    if($com==0){$tc1=red;$d1=$d1.'  Esta factura ya a sido guardad';}
    if(($archivo<>'')&&($_POST[grava]<>'')&&($_POST[n_factu]<>'')&&($com==1)&&($_POST[cliente]<>Cliente)){
        $grava=insert(archivos,$_POST[titulo],$_POST[n_factu],$_POST[cliente],$nombre_archivo,$_POST[descri],$contenido,$tamano[0],$tamano[1],$tipo);
        mysql_query($grava) or die("Query: $grava <br />Error: ".mysql_error());//---
        $com=compro($_POST[n_factu],$consu225,id,$conexion);
        if($com1==0){
            $d6="Guardando";
            $tc6=yellowgreen;$df6='green';
            $d7=input(submit,clear,'Subir otro');//---
        }
    }else{
        if($_POST[n_factu]<>''){
            $com=compro($_POST[n_factu],$consu25,id,$conexion);//---
            if($archivo=='')$tc5=red;
            if($com==1)$tc5=red;
            if($_POST[cliente]==Cliente){$tc4=red;$d4=$d4." Ningún cliente selecionado";}
            $tc6=orange;
            $d6="Algo Salio Mal Al Guardar";
            $d7=input(submit,grava,'Reintentar');//---
        }
    }
    tablero (
    $size,$style,$title1
    ,$i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9,$i10,$i11,$i12,$i13,$i14,$i15,$i16,$i17,$i18//texto derecho
    ,$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16,$d17,$d18//color fondo dual
    ,$tc1,$tc2,$tc3,$tc4,$tc5,$tc6,$tc7,$tc8,$tc9,$tc10,$tc11,$tc12,$tc13,$tc14,$tc15,$tc16,$tc17,$tc18//color fondo dual
    ,$ic1,$ic2,$ic3,$ic4,$ic5,$ic6,$ic7,$ic8,$ic9,$ic10,$ic11,$ic12,$ic13,$ic14,$ic15,$ic16,$ic17,$ic18//color simple fondo isquierdo
    ,$dc1,$dc2,$dc3,$dc4,$dc5,$dc6,$dc7,$dc8,$dc9,$dc10,$dc11,$dc12,$dc13,$dc14,$dc15,$dc16,$dc17,$dc18//color simple fondo derecha
    ,$if1,$if2,$if3,$if4,$if5,$if6,$if7,$if8,$if9,$if10,$if11,$if12,$if13,$if14,$if15,$if16,$if17,$if18//color letras isquierda
    ,$df1,$df2,$df3,$df4,$df5,$df6,$df7,$df8,$df9,$df10,$df11,$df12,$df13,$df14,$df15,$df16,$df17,$df18//color letras derecha
    );
}
    
if($_POST['menu-list']==$listn3)include("ver.php");
?>
</div>