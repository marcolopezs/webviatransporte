<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$nota_id=$_REQUEST["id"];
$nombre=$_POST["nombre"];
$web=$_POST["web"];
$correo_contacto=$_POST["correo"];
$facebook=$_POST["facebook"];
$twitter=$_POST["twitter"];
$youtube=$_POST["youtube"];

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_empresa SET nombre='$nombre', 
	web='$web', 
	correo_contacto='$correo_contacto', 
	facebook='$facebook',
	twitter='$twitter',
	youtube='$youtube' WHERE id=$nota_id;", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:f-editar.php?id=1&msj=er");
} else {
	mysql_close($conexion);
	header("Location:f-editar.php?id=1&msj=ok");
}

?>