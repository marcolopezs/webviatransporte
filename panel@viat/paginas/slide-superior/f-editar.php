<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");

//VARIABLES
$id_url=$_REQUEST["id"];

//EDITAR
$rst_nota=mysql_query("SELECT * FROM ".$tabla_suf."_slide_superior WHERE id=$id_url;", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$nota_titulo=$fila_nota["titulo"];
$nota_contenido=$fila_nota["contenido"];
$nota_edicion=$fila_nota["edicion"];
$nota_edicion_pagina=$fila_nota["edicion_pagina"];
$nota_imagen=$fila_nota["imagen"];
$nota_imagen_carpeta=$fila_nota["imagen_carpeta"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Administrador</title>

<?php require_once("../../w-scripts.php"); ?>

</head>

<body>

<!-- Top line begins -->
<?php require_once("../../w-topline.php"); ?>
<!-- Top line ends -->


<!-- Sidebar begins -->
<div id="sidebar">
    
    <?php require_once("../../w-sidebarmenu.php"); ?>
    
</div>
<!-- Sidebar ends -->    
	
    
<!-- Content begins -->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Slide Superior</span>

    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

        <form id="submit-form" class="main" method="POST" action="s-editar.php?id=<?php echo $id_url; ?>">

            <fieldset>
                <div class="widget fluid">
                    
                    <div class="whead"><h6>Editar</h6></div>

                    <div class="formRow">
                        <div class="grid3"><label>Titulo:</label></div>
                        <div class="grid9"><input type="text" name="titulo" value="<?php echo $nota_titulo; ?>"/></div>
                    </div>

                    <div class="widget">
                        <div class="whead"><h6>Descripcion</h6></div>
                        <textarea class="" name="contenido" ><?php echo $nota_contenido; ?></textarea>
                        <p>Agregar 3 guiones (---) para salto de linea.</p>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Número de Edición:</label></div>
                        <div class="grid9"><input type="text" name="edicion" value="<?php echo $nota_edicion; ?>"/></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Número de página:</label></div>
                        <div class="grid9"><input type="text" name="edicion_pagina" value="<?php echo $nota_edicion_pagina; ?>"/></div>
                    </div>
                    
                    <div class="formRow">
                        <div class="grid3"><label>Imagen:</label> </div>
                        <div class="grid9">
                            <div class="without floatL">
                                <a href="/imagenes/slide/<?php echo $nota_imagen_carpeta."".$nota_imagen; ?>" class="lightbox">
                                    <img src="/imagenes/slide/<?php echo $nota_imagen_carpeta."thumb/".$nota_imagen; ?>" width="100" >
                                </a>
                            </div>
                            <div class="widget floarL width60 margin1020">    
                                <div id="uploader_slide">Tu navegador no soporta HTML5.</div>
                                <input type="hidden" name="imagen_actual" value="<?php echo $nota_imagen; ?>">
                                <input type="hidden" name="imagen_carpeta" value="<?php echo $nota_imagen_carpeta; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="body" align="center">
                            <a href="lista.php" class="buttonL bBlack">Cancelar</a>
                            <input type="submit" class="buttonL bGreen" name="btn-guardar" value="Guardar datos">
                        </div>
                    </div>
                    
                </div>
            </fieldset>

        </form>

    </div>
  <!-- Main content ends -->
    
</div>
<!-- Content ends -->    
   
        
</body>
</html>