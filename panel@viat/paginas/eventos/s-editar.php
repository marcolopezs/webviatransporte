<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$nota_id=$_REQUEST["id"];
$nombre=$_POST["nombre"];
$url=getUrlAmigable(eliminarTextoURL($nombre));
$contenido=$_POST["contenido"];

//PUBLICAR
if ($_POST["publicar"]<>""){ $publicar=$_POST["publicar"]; }else{ $publicar=0; }

//FECHA Y HORA
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha_publicacion=$pub_fecha." ".$pub_hora;

//SUBIR IMAGEN
$upload_imagenTmp=$_POST["uploader_0_tmpname"];
$upload_imagenName=$_POST["uploader_0_name"];

if($upload_imagenTmp<>""){
	$imagen_carpeta = fechaCarpeta()."/";
	$imagen=guardarImagen($upload_imagenTmp, $imagen_carpeta, $upload_imagenName);	
}else{
	$imagen=$_POST["imagen"];
	$imagen_carpeta=$_POST["imagen_carpeta"];
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_eventos SET url='$url', titulo='".htmlspecialchars($nombre)."', 
	contenido='$contenido', 
	imagen='$imagen', 
	imagen_carpeta='$imagen_carpeta', 
	fecha_publicacion='$fecha_publicacion', 
	publicar=$publicar WHERE id=$nota_id;", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>