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
$categoria=$_POST["categoria"];
$tipo_noticia=$_POST["tipo_noticia"];
$tags=$_POST["tags"];

//FECHA Y HORA
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha_publicacion=$pub_fecha." ".$pub_hora;

//TAGS
$tags=$_POST["tags"];
if($tags==""){ $union_tags=0; }
elseif($tags<>""){ $union_tags=implode(",", $tags);}

//PUBLICAR
if ($_POST["publicar"]<>""){ $publicar=$_POST["publicar"]; }else{ $publicar=0; }

//VIDEO
$video_youtube=$_POST["video_youtube"];

//AUDIO
$audio=$_POST["audio"];

//IMAGEN
if ($tipo_noticia=="not_destacada") {
	$destacada=1; 
	if($_POST['uploader_0_tmpname']<>""){
		$imagenTmp=$_POST["uploader_0_tmpname"];
		$upload_imagenName=$_POST["uploader_0_name"];
		
		$imagen_carpeta=fechaCarpeta()."/";	
		$mostrar_imagen=1;

        $imagen = guardarImagen($imagenTmp, $imagen_carpeta, $upload_imagenName);

	}else{
		$imagen=$_POST["imagen"];
		$imagen_carpeta=$_POST["imagen_carpeta"];
	}
}elseif($tipo_noticia=="not_normal"){
	$destacada=0;
	if($_POST['uploader_0_tmpname']<>""){
		$imagenTmp=$_POST["uploader_0_tmpname"];
		$upload_imagenName=$_POST["uploader_0_name"];
		
		$imagen_carpeta=fechaCarpeta()."/";	
		$mostrar_imagen=1;

        $imagen = guardarImagen($imagenTmp, $imagen_carpeta, $upload_imagenName);

	}else{
		$imagen=$_POST["imagen"];
		$imagen_carpeta=$_POST["imagen_carpeta"];
	}
}

//VIDEO YOUTUBE
if($video_youtube<>""){
	$mostrar_video=1;
	$tipo_video="youtube";
	$video=$video_youtube;
	$video_carpeta="";
}elseif($video_youtube==""){
	$mostrar_video=0;
	$tipo_video="";
	$video="";
	$video_carpeta="";
}

//AUDIO SOUNDCLOUD
if($audio<>""){
    $audio=$audio;
}elseif($audio==""){
    $audio="";
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_noticia SET url='$url', titulo='".htmlspecialchars($nombre)."', 
	contenido='$contenido', 
	imagen='$imagen', 
	imagen_carpeta='$imagen_carpeta', 
	fecha_publicacion='$fecha_publicacion', 
	publicar=$publicar, 
	destacada=$destacada, 
	categoria=$categoria, 
	tags='0,$union_tags,0', 
	video='$video', 
	tipo_video='$tipo_video', 
	mostrar_video=$mostrar_video,
	audio='$audio' WHERE id=$nota_id;", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>