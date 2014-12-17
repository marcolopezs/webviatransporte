<?php
require_once("panel@viat/conexion/conexion.php");
require_once("panel@viat/conexion/funciones.php");

//VARIABLES DE URL
$Req_Id=$_REQUEST["id"];
$Req_Url=$_REQUEST["url"];

##################################################################################################################
//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM vtr_eventos WHERE id=$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES DE NOTICIA
$Noticia_id=$fila_noticia["id"];
$Noticia_url=$fila_noticia["url"];
$Noticia_titulo=$fila_noticia["titulo"];
$Noticia_contenido=$fila_noticia["contenido"];
$Noticia_fechaPub=$fila_noticia["fecha_publicacion"];
$Noticia_imagen=$fila_noticia["imagen"];
$Noticia_imagen_carpeta=$fila_noticia["imagen_carpeta"];

//SEPARACION FECHA
$Noticia_fechaPubSep=explode(" ", $Noticia_fechaPub);
$Noticia_fecha=explode("-", $Noticia_fechaPubSep[0]);
$NoticiaFecha=nombreFechaTotal($Noticia_fecha[0], $Noticia_fecha[1], $Noticia_fecha[2]);

##################################################################################################################
//NOTICIAS RELACIONADAS
$rst_NotRel=mysql_query("SELECT * FROM vtr_eventos WHERE id<>$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 3;", $conexion);

##################################################################################################################
//URLS
$Noticia_UrlWeb=$web."evento/".$Req_Id."-".$Req_Url;
$Noticia_UrlImg=$web."imagenes/upload/".$Noticia_imagen_carpeta."".$Noticia_imagen;
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
                        <article id="article-post" class="cat-sports">
                            
                            <div class="head-image thumb-wrap relative">
                                <img src="<?php echo $Noticia_UrlImg; ?>" alt="Responsive image" class="img-responsive" />
                                <a href="eventos" class="theme">
                                    Eventos
                                </a>
                            </div>
                            
                            <header>
                                <h1><?php echo $Noticia_titulo; ?></h1>
                            </header>
                            
                            <p class="lead">
                                <?php echo soloDescripcion(cortarTextoRH($Noticia_contenido,1,0,150)); ?>
                            </p>

                            <?php echo cortarTextoRH($Noticia_contenido,0,1,0); ?>

                            <!-- start:article footer -->
                            <footer>
                                <h3>Comparte esta noticia</h3>
                                
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_native_toolbox"></div>

                            </footer>
                            <!-- end:article footer -->                            
                        </article>
                        <!-- end:article-post -->
                        
                                                <!-- start:related-posts -->
                        <section class="news-lay-3">
                                            
                            <header>
                                <h2><a href="#">Eventos</a></h2>
                                <span class="borderline"></span>
                            </header>
                        
                            <!-- start:row -->
                            <div class="row">

                                <?php while($fila_NotRel=mysql_fetch_array($rst_NotRel)){
                                        $NotRel_id=$fila_NotRel["id"];
                                        $NotRel_url=$fila_NotRel["url"];
                                        $NotRel_titulo=$fila_NotRel["titulo"];
                                        $NotRel_imagen=$fila_NotRel["imagen"];
                                        $NotRel_imagen_carpeta=$fila_NotRel["imagen_carpeta"];
                                        $NotRel_fechaPub=$fila_NotRel["fecha_publicacion"];

                                        //SEPARACION DE FECHA
                                        $fechaPubSep=explode(" ", $NotRel_fechaPub);
                                        $fechaSep=explode("-", $fechaPubSep[0]);
                                        $FechaDia=$fechaSep[2];
                                        $FechaMes=mesCorto($fechaSep[1]);
                                        $FechaAnio=$fechaSep[0];

                                        //URL
                                        $NotRel_UrlWeb=$web."evento/".$NotRel_id."-".$NotRel_url;
                                        $NotRel_UrlImg=$web."imagenes/upload/".$NotRel_imagen_carpeta."thumb/".$NotRel_imagen;
                                ?>
                                    
                                <!-- start:article -->
                                <article class="col-md-4 cat-sports">
                                   
                                    <div class="thumb-wrap relative">
                                        <a href="<?php echo $NotRel_UrlWeb; ?>">
                                            <img src="<?php echo $NotRel_UrlImg; ?>" width="265" height="160" alt="Responsive image" class="img-responsive">
                                        </a>
                                    </div>
                                    <span class="published"><?php echo $FechaMes." ".$FechaDia.", ".$FechaAnio; ?></span>
                                    <h3><a href="<?php echo $NotRel_UrlWeb; ?>"><?php echo $NotRel_titulo; ?></a></h3>
                                    
                                </article>
                                <!-- end:article -->
                                <?php } ?>
                            
                            </div>
                            <!-- end:row -->

                        </section>
                        <!-- end:related-posts -->                        
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