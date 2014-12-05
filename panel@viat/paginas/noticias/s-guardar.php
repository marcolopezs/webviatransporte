<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$nombre=$_POST["nombre"];
$url=getUrlAmigable(eliminarTextoURL($nombre));
$contenido=$_POST["contenido"];
$categoria=$_POST["categoria"];
$tipo_noticia=$_POST["tipo_noticia"];
$tipo_posicion=$_POST["tipo_posicion"];

//FECHA Y HORA
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha_publicacion=$pub_fecha." ".$pub_hora;
$publicar=1;

//TAGS
$tags=$_POST["tags"];
if($tags==""){ $union_tags=0; }elseif($tags<>""){ $union_tags=implode(",", $tags);}

//SUBIR IMAGEN
$upload_imagenTmp=$_POST["uploader_0_tmpname"];
$upload_imagenName=$_POST["uploader_0_name"];

//SUBIR VIDEO
$video_youtube=$_POST["video_youtube"];

//AUDIO
$audio=$_POST["audio"];

//IMAGEN
if ($tipo_noticia=="not_destacada") {
	$destacada=1; 
	if($upload_imagenTmp<>""){
		$imagenTmp=$upload_imagenTmp;
		$imagen_carpeta=fechaCarpeta()."/";	
		$mostrar_imagen=1;

        $imagen = guardarImagen($imagenTmp, $imagen_carpeta, $upload_imagenName);

    }else{
		$imagen=""; $imagen_carpeta="";
	}
}elseif($tipo_noticia=="not_normal"){
    $destacada=0;
	if($upload_imagenTmp<>""){
		$imagenTmp=$upload_imagenTmp;
		$imagen_carpeta=fechaCarpeta()."/";	
		$mostrar_imagen=1;

        $imagen = guardarImagen($imagenTmp, $imagen_carpeta, $upload_imagenName);

	}else{
		$imagen=""; $imagen_carpeta="";
	}
}

//POSICION
if($tipo_posicion=="not_superior"){ $superior=1; }elseif($tipo_posicion=="not_inferior"){ $superior=0; }

//VIDEO YOUTUBE
if($video_youtube<>""){	$video=$video_youtube;}elseif($video_youtube==""){	$video=""; }

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_noticia (url, titulo, contenido, imagen, imagen_carpeta, fecha_publicacion, publicar, destacada, superior, categoria, tags, video) VALUES('$url', '".htmlspecialchars($nombre)."', '$contenido', '$imagen', '$imagen_carpeta', '$fecha_publicacion', $publicar, $destacada, $superior, $categoria, '0,$union_tags,0', '$video');",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>