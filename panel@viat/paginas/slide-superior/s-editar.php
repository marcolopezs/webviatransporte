<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$id=$_REQUEST["id"];
$titulo=$_POST["titulo"];
$contenido=$_POST["contenido"];
$edicion=$_POST["edicion"];
$edicion_pagina=$_POST["edicion_pagina"];
$noticia=$_POST["not"];

//IMAGEN
if($_POST['uploader_slide_0_tmpname']==""){
	$imagen=$_POST["imagen_actual"];
	$imagen_carpeta=$_POST["imagen_carpeta"];
}else{
	$imagen_carpeta=fechaCarpeta()."/";
	$imagen=$_POST['uploader_slide_0_tmpname'];
	$thumb=PhpThumbFactory::create("../../../imagenes/slide/".$imagen_carpeta."".$imagen."");
	$thumb->adaptiveResize(110,110);
	$thumb->save("../../../imagenes/slide/".$imagen_carpeta."thumb/".$imagen."", "jpg");
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_slide_superior SET titulo='".htmlspecialchars($titulo)."',
	contenido='".htmlspecialchars($contenido)."',
	edicion='$edicion',
	edicion_pagina='$edicion_pagina',
	imagen='$imagen', 
	imagen_carpeta='$imagen_carpeta' WHERE id=$id;", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>