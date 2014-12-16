<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$nombre=$_POST["nombre"];
$url=getUrlAmigable(eliminarTextoURL($nombre));
$contenido=$_POST["contenido"];

//FECHA Y HORA
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha_publicacion=$pub_fecha." ".$pub_hora;
$publicar=1;

//SUBIR IMAGEN
$upload_imagenTmp=$_POST["uploader_0_tmpname"];
$upload_imagenName=$_POST["uploader_0_name"];

//IMAGEN
$imagen_carpeta = fechaCarpeta()."/";
$imagen=guardarImagen($upload_imagenTmp, $imagen_carpeta, $upload_imagenName);

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_eventos (url, titulo, contenido, imagen, imagen_carpeta, fecha_publicacion, publicar) VALUES('$url', '".htmlspecialchars($nombre)."', '$contenido', '$imagen', '$imagen_carpeta', '$fecha_publicacion', $publicar);",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>