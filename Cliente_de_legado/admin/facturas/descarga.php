<?php
include('libre_fact.php');
$conexion =login('localhost',root,anamaria100);
db (empresa,$conexion);
$id = $_GET['id'];
$qry = "SELECT * FROM archivos WHERE id='$id'";
$res        = mysql_query($qry)or die ("error al extraer los datos de la tabla");
$tipo       = mysql_result($res, 0, "tipo");
$contenido  = mysql_result($res, 0, "contenido");
$nombre     = mysql_result($res, 0, "nombre_archivo");
header("Content-type: $tipo");
header("Content-Disposition: attachment; filename=".$nombre);
echo $contenido;
function login($host,$user,$pass){
        $conexion=mysql_connect($host,$user,$pass)or die("Problema Para Iniciar Secion");
        return $conexion;
}
?>
