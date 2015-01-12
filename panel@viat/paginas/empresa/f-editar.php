<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");

//VARIABLES
$id_url=$_REQUEST["id"];

//EDITAR
$rst_nota=mysql_query("SELECT * FROM ".$tabla_suf."_empresa WHERE id=$id_url;", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$nota_nombre=$fila_nota["nombre"];
$nota_web=$fila_nota["web"];
$nota_correo_contacto=$fila_nota["correo_contacto"];
$nota_facebook=$fila_nota["facebook"];
$nota_twitter=$fila_nota["twitter"];
$nota_youtube=$fila_nota["youtube"];

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
    
</div><!-- Sidebar ends -->    
	
    
<!-- Content begins -->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Empresa</span>
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
                        <div class="grid3"><label>Nombre de página:</label></div>
                        <div class="grid9"><input type="text" name="nombre" value="<?php echo $nota_nombre; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Url de página:</label></div>
                        <div class="grid9"><input type="text" name="web" value="<?php echo $nota_web; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Correo de Contacto:</label></div>
                        <div class="grid9"><input type="text" name="correo" value="<?php echo $nota_correo_contacto; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Facebook:</label></div>
                        <div class="grid9"><input type="text" name="facebook" value="<?php echo $nota_facebook; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Twitter:</label></div>
                        <div class="grid9"><input type="text" name="twitter" value="<?php echo $nota_twitter; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Youtube:</label></div>
                        <div class="grid9"><input type="text" name="youtube" value="<?php echo $nota_youtube; ?>" /></div>
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