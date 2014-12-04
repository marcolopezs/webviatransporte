<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$id=$_REQUEST["id"];
$titulo=$_POST["titulo"];
$url=$_POST["url"];
$contenido=stripslashes($_POST["contenido"]);

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_slide_superior SET titulo='$titulo', url='$url', contenido='$contenido' WHERE id=$id;", $conexion);

echo "Listo";