<?php
require_once('panel@viat/conexion/conexion.php');
require_once("panel@viat/conexion/funciones.php");

//VARIABLES
$header="interno";
$Req_UrlWeb=$web."ediciones-anteriores";

################################################################
//PAGINACION DE NOTICIAS
require("libs/pagination/class_pagination.php");

//INICIO DE PAGINACION
$page           = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$rst_noticias   = mysql_query("SELECT COUNT(*) as count FROM vtr_edicion WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC;", $conexion);
$row            = mysql_fetch_assoc($rst_noticias);
$generated      = intval($row['count']);
$pagination     = new Pagination("7", $generated, $page, $Req_UrlWeb."&page", 1, 0);
$start          = $pagination->prePagination();
$rst_noticias   = mysql_query("SELECT * FROM vtr_edicion WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT $start, 7", $conexion);

?>
<!DOCTYPE html >
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="es"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="es"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="es"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 oldie" lang="es"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es-ES"> <!--<![endif]-->
<head>
    <!-- start:global -->
    <meta charset="utf-8">
    <!-- end:global -->

    <!-- start:page title -->
    <title>Ediciones Anteriores | <?php echo $web_nombre; ?></title>
    <!-- end:page title -->
    
    <!-- start:meta info -->
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <!-- end:meta info -->

    <?php require_once('w-header-script.php') ?>

</head>
<body>
    
    <!-- start:page outer wrap -->
    <div id="page-outer-wrap">
        <!-- start:page inner wrap -->
        <div id="page-inner-wrap">    
            
            <?php require_once('w-header.php') ?>
            
            <!-- start:container -->
            <div class="container">
                
                <!-- start:page content -->
                <div id="page-content" class="clearfix">
                    
                    <!-- start:main -->
                    <div id="main">
                        
                        <!-- start:row -->
                        <div class="row">
                            
                            <!-- start:col -->
                            <div class="col-md-12">
                                
                                <h2>Ediciones Anteriores</h2>

                                <?php while($fila_noticias=mysql_fetch_array($rst_noticias)){
                                    $noticia_id=$fila_noticias["id"];
                                    $noticia_url=$fila_noticias["url"];
                                    $noticia_titulo=stripslashes($fila_noticias["nombre_edicion"]);
                                    $noticia_imagen=$fila_noticias["imagen"];
                                    $noticia_pdf=$fila_noticias["pdf"];

                                    //URLS
                                    $noticia_UrlPdf=$web."revista/".$noticia_pdf;
                                    $noticia_UrlImg=$web."imagenes/revista/".$noticia_imagen;
                                ?>
                                
                                <!-- start:row -->
                                <div class="row bottom-margin col-sm-4 edanterior-item">
                                    
                                    <!-- start:article.thumb -->
                                    <article class="thumb cat-sports">
                                        <!-- start:col -->
                                        <div class="col-sm-12">
                                            <div class="thumb-wrap relative">
                                                <a href="<?php echo $noticia_UrlWeb; ?>">
                                                    <img src="<?php echo $noticia_UrlImg; ?>" height="150" class="img-responsive" />
                                                </a>
                                            </div>
                                        </div>
                                        <!-- end:col -->
                                        <!-- start:col -->
                                        <div class="col-sm-12">
                                            <a class="enlaces" target="_blank" href="<?php echo $noticia_UrlPdf; ?>">Descargar PDF</a>
                                            <a class="enlaces" target="_blank" href="<?php echo $noticia_url; ?>">Leer en Issuu</a>
                                        </div>
                                        <!-- end:col -->
                                    </article>
                                    <!-- end:article.thumb -->          
                                
                                </div>
                                <!-- end:row -->

                                <?php } ?>

                                <!-- start:load-more -->
                                <div class="text-center">
                                    <?php $pagination->pagination(); ?>
                                </div>
                                <!-- end:load-more -->
                                
                            </div>
                            <!-- end:col -->
                            
                        </div>
                        <!-- end:row -->
        
                        
                    </div>
                    <!-- end:main -->
                    
                    <?php require_once('w-sidebar.php'); ?>

                </div>
                <!-- end:page content -->
            
            </div>
            <!-- end:container -->    

            <?php require_once('w-footer.php'); ?>
        
        </div>
        <!-- end:page inner wrap -->
    </div>
    <!-- end:page outer wrap -->    
    
    <?php require_once('w-footer-script.php'); ?>
    
</body>
</html>