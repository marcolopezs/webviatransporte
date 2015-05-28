<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");

//DECLARACION DE VARIABLES
$edicion_nombre=$_POST["edicion_nombre"];
$edicion_numero=$_POST["edicion_numero"];
$url=$_POST["url"];

//FECHA Y HORA
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha_publicacion=$pub_fecha." ".$pub_hora;

//SUBIR PORTADA
if(is_uploaded_file($_FILES['fileInput']['tmp_name'])){ 
	$fileName=$_FILES['fileInput']['name'];
	$uploadDir="../../../imagenes/revista/";
	$uploadFile=$uploadDir.$fileName;
	$num = 0;
	$name = $fileName;
	$extension = explode('.',$fileName);
	$onlyName = substr($fileName,0,strlen($fileName)-(strlen($extension[1])+1));
	while(file_exists($uploadDir.$name))
	{
		$num++;         
		$name = $onlyName."".$num.".".$extension[1]; 
	}
	$uploadFile = $uploadDir.$name; 
	move_uploaded_file($_FILES['fileInput']['tmp_name'], $uploadFile);
	$carpeta_imagen=fechaCarpeta()."/";
}

//SUBIR PDF
if(is_uploaded_file($_FILES['pdfInput']['tmp_name'])){ 
	$PDFfileName=$_FILES['pdfInput']['name'];
	$PDFuploadDir="../../../revista/";
	$PDFuploadFile=$PDFuploadDir.$PDFfileName;
	$PDFnum = 0;
	$PDFname = $PDFfileName;
	$PDFextension = explode('.',$PDFfileName);
	$PDFonlyName = substr($PDFfileName,0,strlen($PDFfileName)-(strlen($PDFextension[1])+1));
	while(file_exists($PDFuploadDir.$PDFname))
	{
		$PDFnum++;         
		$PDFname = $PDFonlyName."".$PDFnum.".".$PDFextension[1]; 
	}
	$PDFuploadFile = $PDFuploadDir.$PDFname; 
	move_uploaded_file($_FILES['pdfInput']['tmp_name'], $PDFuploadFile);
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_edicion (url, titulo, nombre_edicion, imagen, pdf, fecha_publicacion)
	VALUES('$url', '$edicion_numero', '$edicion_nombre', '$name', '$PDFname', '$fecha_publicacion');",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>