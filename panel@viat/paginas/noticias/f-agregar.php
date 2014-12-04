<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");

//VARIABLES
$pub_fecha=date("Y-m-d");
$pub_hora=date("H:i:s");

//CATEGORIA
$rst_cat=mysql_query("SELECT * FROM ".$tabla_suf."_noticia_categoria WHERE publicar=1 ORDER BY categoria ASC;", $conexion);

//ETIQUETAS
$rst_tags=mysql_query("SELECT * FROM ".$tabla_suf."_noticia_tags ORDER BY nombre ASC;", $conexion);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Administrador</title>

<?php require_once("../../w-scripts.php"); ?>

    <!-- AGREGANDO NUEVO TAG -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="/js/modernizr.custom.js"></script>
    <script type="text/javascript">
        var jMulSl = jQuery.noConflict();

        jMulSl(document).on("ready", function(){

            jMulSl("#refreshAdd").on("click", function() {

                var $select = jMulSl("select.selectMultiple"),
                    $input = jMulSl("#refreshInput"),
                    value = jMulSl.trim($input.val());

                jMulSl.ajax({
                    type: "POST",
                    url: "s-guardar-tag.php",
                    data: {"input": $input.val()},
                    success:function(response){
                        if (!value) {
                            $input.focus();
                            return;
                        }

                        var data = jMulSl.parseJSON(response)

                        var $opt = jMulSl("<option />", {
                            value: data.id,
                            text: data.titulo
                        });

                        $input.val("");
                        $select.append($opt);
                    }
                });
            });



            jMulSl("#cambiar-imagen").on("click", function(){

                jMulSl("#cambiar-imagen-container").html('<div id="uploader">Tu navegador no soporta HTML5.</div>');

                Modernizr.load([{
                    load: ['<?php if(isset($url_admin)){ echo $url_admin; }  ?>js/plugins/uploader/plupload.js','<?php if(isset($url_admin)){ echo $url_admin; }  ?>js/plugins/uploader/plupload.html4.js','<?php if(isset($url_admin)){ echo $url_admin; }  ?>js/plugins/uploader/plupload.html5.js','<?php if(isset($url_admin)){ echo $url_admin; }  ?>js/plugins/uploader/jquery.plupload.queue.js'],
                    complete: function () {
                        jMulSl("#uploader").pluploadQueue({
                            runtimes : 'html5,html4',
                            url : '/panel@viat/php/upload.php',
                            max_file_size : '100mb',
                            chunk_size : '1mb',
                            unique_names : true,
                            dragdrop: false,
                            resize: {width: 800, height: 500, quality: 80},
                            filters : [
                                {title : "Imagenes", extensions : "jpg,gif"}
                            ]
                        });
                    }
                }]);
            });
        });
    </script>

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
        <span class="pageTitle"><span class="icon-screen"></span>Noticias</span>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

        <form id="validate" class="main" method="POST" action="s-guardar.php">

            <fieldset>
                <div class="widget fluid">
                    
                    <div class="whead"><h6>Agregar</h6></div>
                    
                    <div class="formRow">
                        <div class="grid3"><label>Titulo:</label></div>
                        <div class="grid9"><input type="text" name="nombre" class="validate[required]" /></div>
                    </div>

                    <div class="widget">
                        <div class="whead"><h6>Contenido</h6></div>
                        <textarea class="validate[required] ckeditor" name="contenido"></textarea>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Imagen:</label> </div>
                        <div class="grid9">
                            <a id="cambiar-imagen" href="javascript:;">Cambiar imagen</a>
                            <div id="cambiar-imagen-container" class="widget nomargin">
                                <div id="uploader">Tu navegador no soporta HTML5.</div>
                            </div>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Video (Youtube):</label> </div>
                        <div class="grid9">http://www.youtube.com/watch?v=
                            <input type="text" name="video_youtube" value="" style="width: 300px;">
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Audio (Soundcloud):</label></div>
                        <div class="grid9"><textarea name="audio"></textarea>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Categoria:</label></div>
                        <div class="grid9">
                            <select name="categoria" class="validate[required] styled">
                                <option>Selecciona</option>
                                <?php while($fila_cat=mysql_fetch_array($rst_cat)){
                                        $notCat_id=$fila_cat["id"];
                                        $notCat_nombre=$fila_cat["categoria"];
                                ?>
                                <option value="<?php echo $notCat_id; ?>"><?php echo $notCat_nombre; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Tipo de noticia: </label></div>
                        <div class="grid9 yes_no">
                            <div class="floatL mr10">Destacada
                                <input type="radio" name="tipo_noticia" value="not_destacada" /></div>
                            <div class="floatL mr10">Normal
                                <input type="radio" name="tipo_noticia" value="not_normal" checked="checked" /></div>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3">
                            <label>Etiquetas:</label>
                        </div>
                        <div class="grid9">

                            <span class="grid5" style="margin-bottom: 10px;margin-right: 10px;">
                                <input id="refreshInput" type="text" />

                            </span>
                            <span class="gri5" style="font-weight: bold;font-size: 14px;">
                                <a id="refreshAdd" href="javascript:;">Agregar nueva Etiqueta</a>
                            </span>

                            <select class="selectMultiple" multiple="multiple" tabindex="6" name="tags[]">
                                <option></option>
                                <?php while($fila_tags=mysql_fetch_array($rst_tags)){
                                        $notTag_id=$fila_tags["id"];
                                        $notTag_nombre=$fila_tags["nombre"];
                                ?>
                                <option value="<?php echo $notTag_id; ?>"><?php echo $notTag_nombre; ?></option>
                                <?php } ?>
                            </select>  
                        </div>             
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Fecha de publicación:</label></div>
                        <div class="grid4"><input type="text" class="datepicker" name="pub_fecha" value="<?php echo $pub_fecha; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Hora de publicación:</label></div>
                        <div class="grid4"><input type="text" class="timepicker" name="pub_hora" size="10" value="<?php echo $pub_hora; ?>" />
                            <span class="ui-datepicker-append">Utilice la rueda del ratón y el teclado</span></div>
                    </div>

                    <div class="formRow">
                        <div class="body" align="center">
                            <input formtarget="_blank" type="submit" class="buttonL bBlue" name="btn-previa" value="Vista previa" onclick="this.form.action='/noticia-preview.php'; this.form.submit();">
                        </div>
                        <div class="body" align="center">
                            <a href="lista.php" class="buttonL bBlack">Cancelar</a>
                            <input type="submit" class="buttonL bGreen" name="btn-guardar" value="Guardar datos" onclick="this.form.action='s-guardar.php'; this.form.submit();">
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
