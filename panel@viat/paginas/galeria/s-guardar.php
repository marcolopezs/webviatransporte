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
$upload_imagen=$_POST["uploader_galeria_0_tmpname"];

//IMAGEN
$cont=0;
while($_POST['uploader_galeria_'.$cont.'_tmpname']<>""){
	$imagen_fechaPub=$fechaActual;
	$imagen_carpeta=fechaCarpeta()."/";
	$imagen=$_POST['uploader_galeria_'.$cont.'_tmpname'];
	$thumb{$cont}=PhpThumbFactory::create("../../../imagenes/galeria/".$imagen_carpeta."".$imagen."");
	$thumb{$cont}->adaptiveResize(290,210);
	$thumb{$cont}->save("../../../imagenes/galeria/".$imagen_carpeta."thumb/".$imagen."", "jpg");
	mysql_query("INSERT INTO ".$tabla_suf."_galeria_slide(imagen, imagen_carpeta, orden, noticia, fecha_publicacion) 
		VALUES ('$imagen', '$imagen_carpeta', $cont, $noticia, '$imagen_fechaPub')",$conexion);
	$cont++;
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_galeria (url, titulo, contenido, fecha_publicacion, publicar) 
	VALUES('$url', '".htmlspecialchars($nombre)."', '$contenido', '$fecha_publicacion', $publicar);",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>