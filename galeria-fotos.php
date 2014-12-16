<?php
require_once("panel@viat/conexion/conexion.php");
require_once("panel@viat/conexion/funciones.php");

//VARIABLES DE URL
$Req_Id=$_REQUEST["id"];
$Req_Url=$_REQUEST["url"];

##################################################################################################################
//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM vtr_galeria WHERE id=$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES DE NOTICIA
$Noticia_id=$fila_noticia["id"];
$Noticia_url=$fila_noticia["url"];
$Noticia_titulo=$fila_noticia["titulo"];
$Noticia_contenido=$fila_noticia["contenido"];
$Noticia_fechaPub=$fila_noticia["fecha_publicacion"];

##################################################################################################################
//NOTICIA - GALERIA DE FOTOS
$rst_notFotos=mysql_query("SELECT * FROM vtr_galeria_slide WHERE noticia=$Noticia_id ORDER BY orden DESC", $conexion);

##################################################################################################################
//URLS
$Noticia_UrlWeb=$web."noticia/".$Req_Id."-".$Req_Url;

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
    <title><?php echo $Noticia_titulo; ?> | <?php echo $web_nombre; ?></title>
    <!-- end:page title -->
    
    <!-- start:meta info -->
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <!-- end:meta info -->

    <?php require_once('w-header-script.php') ?>

    <!-- LIGHTBOX -->
    <link rel="stylesheet" href="/libs/lightbox/css/lightbox.css">

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
                    <div id="main" class="article">
                        
                        <!-- start:article -->
                        <article>
                            
                            <header>
                                <h2><a href="#"><?php echo $Noticia_titulo; ?></a></h2>
                                <span class="borderline"></span>
                            </header>
                            
                            <!-- start:gallery section -->
                            <section>
                                
                                <div id="article-gallery" class="row">

                                    <?php while($fila_notFotos=mysql_fetch_array($rst_notFotos)){
                                            $noticia_imagen=$fila_notFotos["imagen"];
                                            $noticia_imagen_carpeta=$fila_notFotos["imagen_carpeta"];

                                            $Noticia_UrlImg=$web."imagenes/galeria/".$noticia_imagen_carpeta."".$noticia_imagen;
                                            $Noticia_UrlImgTh=$web."imagenes/galeria/".$noticia_imagen_carpeta."thumb/".$noticia_imagen;
                                    ?>
                                    
                                    <div class="col-xs-6 col-sm-3">
                                        <article class="clearfix">
                                            <a href="<?php echo $Noticia_UrlImg; ?>" data-lightbox="galeria">
                                                <img src="<?php echo $Noticia_UrlImgTh; ?>" width="300" height="200" alt="<?php echo $Noticia_titulo; ?>" class="img-responsive" />
                                                <div class="zoomix"><i class="fa fa-search"></i></div>
                                            </a>
                                        </article>
                                    </div>

                                    <?php } ?>
                                    
                                    
                                </div>                                
                                
                            </section>
                            <!-- end:gallery section -->

                        </article>
                        <!-- end:article -->
                        
                    </div>
                    <!-- end:main -->
                    
                    
                    <?php require_once('w-sidebar.php') ?>     
                                  
                </div>
                <!-- end:page content -->
            
            </div>
            <!-- end:container -->    

            <?php require_once('w-footer.php') ?>
        
        </div>
        <!-- end:page inner wrap -->
    </div>
    <!-- end:page outer wrap -->
    
    <?php require_once('w-footer-script.php') ?>

    <!-- LIGHTBOX -->
    <script src="/libs/lightbox/js/jquery-1.11.0.min.js"></script>
    <script src="/libs/lightbox/js/lightbox.js"></script>
    
</body>
</html>