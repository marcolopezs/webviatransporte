<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");

//DECLARACION DE VARIABLES
$nombre=$_POST["nombre"];
$url=getUrlAmigable(eliminarTextoURL($nombre));

//MENU
if ($_POST["menu"]<>""){ $menu=$_POST["menu"]; }else{ $menu=0; }

//PUBLICAR
if ($_POST["publicar"]<>""){ $publicar=$_POST["publicar"]; }else{ $publicar=0; }

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_noticia_categoria (categoria, url, menu, publicar) VALUES('$nombre', '$url', $menu, $publicar);",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}