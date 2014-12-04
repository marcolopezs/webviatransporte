<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$titulo=$_POST["input"];
$url=getUrlAmigable(eliminarTextoURL($titulo));

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_noticia_tags (url, nombre) VALUES('$url', '$titulo')", $conexion);

//CONSULTAR
$rst=mysql_query("SELECT * FROM ".$tabla_suf."_noticia_tags ORDER BY id DESC LIMIT 1", $conexion);
$fila=mysql_fetch_array($rst);
$id=$fila["id"];

$res=array('id' => $id, 'titulo' => $titulo);

echo json_encode($res);