<?php
require_once("panel@viat/conexion/conexion.php");
require_once("panel@viat/conexion/funciones.php");

//VARIABLES DE URL
$Req_Url=$_REQUEST["url"];

##################################################################################################################
//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM vtr_paginas WHERE url='$Req_Url' AND publicar=1 AND fecha_publicacion<='$fechaActual';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES DE NOTICIA
$Noticia_id=$fila_noticia["id"];
$Noticia_url=$fila_noticia["url"];
$Noticia_titulo=$fila_noticia["titulo"];
$Noticia_contenido=$fila_noticia["contenido"];
$Noticia_fechaPub=$fila_noticia["fecha_publicacion"];

##################################################################################################################
//URLS
$Noticia_UrlWeb=$web.$Req_Url."/";

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
                        
                        <!-- start:article-post -->
                        <article id="article-post" class="cat-sports paginas">
                                                        
                            <header>
                                <h1><?php echo $Noticia_titulo; ?></h1>
                            </header>

                            <?php echo $Noticia_contenido; ?>

                            <!-- start:article footer -->
                            <footer>
                                <h3>Comparte esta noticia</h3>
                                
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_native_toolbox"></div>
                                
                            </footer>
                            <!-- end:article footer -->

                        </article>
                        <!-- end:article-post -->
                        
                   
                        <!-- start:article-comments -->
                        <section style="display:none;" id="article-comments">
                                            
                            <header>
                                <h2><a href="#">5 comments</a></h2>
                                <span class="borderline"></span>
                            </header>

                        </section>
                        <!-- end:article-comments -->

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

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5491a855121580bc" async="async"></script>
    ​<script type="text/javascript">
        var addthis_config = addthis_config||{};
        addthis_config.data_track_clickback = false;
    </script>
    
</body>
</html>