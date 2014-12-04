<?php
require_once("panel@viat/conexion/conexion.php");
require_once("panel@viat/conexion/funciones.php");

//VARIABLES DE URL
$Req_Id=$_REQUEST["id"];
$Req_Url=$_REQUEST["url"];

//VARIABLES
$header="interno";

##################################################################################################################
//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM vtr_noticia WHERE id=$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES DE NOTICIA
$Noticia_id=$fila_noticia["id"];
$Noticia_url=$fila_noticia["url"];
$Noticia_titulo=$fila_noticia["titulo"];
$Noticia_contenido=$fila_noticia["contenido"];
$Noticia_categoria=$fila_noticia["categoria"];
$Noticia_tags=$fila_noticia["tags"];
$Noticia_fechaPub=$fila_noticia["fecha_publicacion"];
$Noticia_imagen=$fila_noticia["imagen"];
$Noticia_imagen_carpeta=$fila_noticia["imagen_carpeta"];
$Noticia_video=$fila_noticia["video"];
$Noticia_audio=$fila_noticia["audio"];
$Noticia_contador=$fila_noticia["contador"]+1;

//SEPARACION FECHA
$Noticia_fechaPubSep=explode(" ", $Noticia_fechaPub);
$Noticia_fecha=explode("-", $Noticia_fechaPubSep[0]);
$NoticiaFecha=nombreFechaTotal($Noticia_fecha[0], $Noticia_fecha[1], $Noticia_fecha[2]);

##################################################################################################################
//SUMAR A CONTADOR
$rst_noticiaCont=mysql_query("UPDATE vtr_noticia SET contador=$Noticia_contador WHERE id=$Req_Id;", $conexion);

##################################################################################################################
//NOTICIA - GALERIA DE FOTOS
$rst_notFotos=mysql_query("SELECT * FROM vtr_noticia_slide WHERE noticia=$Noticia_id ORDER BY orden DESC", $conexion);
$num_notFotos=mysql_num_rows($rst_notFotos);

##################################################################################################################
//NOTICIA - TAGS
$tags=explode(",", $Noticia_tags);    //SEPARACION DE ARRAY CON COMAS
$rst_tags=mysql_query("SELECT * FROM vtr_noticia_tags ORDER BY nombre ASC;", $conexion);

##################################################################################################################
//NOTICIA - CATEGORIA
$rst_notCat=mysql_query("SELECT * FROM vtr_noticia_categoria WHERE id=$Noticia_categoria;", $conexion);
$fila_notCat=mysql_fetch_array($rst_notCat);

//VARIABLES DE NOTICIA - CATEGORIA
$NotCat_id=$fila_notCat["id"];
$NotCat_url=$fila_notCat["url"];
$NotCat_titulo=$fila_notCat["categoria"];

##################################################################################################################
//NOTICIAS RELACIONADAS
$rst_NotRel=mysql_query("SELECT * FROM vtr_noticia WHERE id<>$Req_Id AND categoria=$Noticia_categoria AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 6;", $conexion);

##################################################################################################################
//URLS
$Noticia_UrlWeb=$web."noticia/".$Req_Id."-".$Req_Url;
$Noticia_UrlImg=$web."imagenes/upload/".$Noticia_imagen_carpeta."".$Noticia_imagen;
$Noticia_UrlCat=$web."categoria/".$NotCat_id."/".$NotCat_url;
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
    <title><?php echo $Noticia_titulo; ?> | Vialidad y Transporte Latinoamericano</title>
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
                            </div>
                            
                            <header>
                                <h1><?php echo $Noticia_titulo; ?></h1>
                            </header>
                            
                            <p class="lead">
                                
                            </p>

                            <?php echo $Noticia_contenido; ?>
                            
                            <!-- start:article footer -->
                            <footer>
                                <h3>Comparte esta noticia</h3>
                                
                                <a href=""><i class="fa fa-twitter fa-lg"></i></a>
                                <a href=""><i class="fa fa-facebook-square fa-lg"></i></a>
                                <a href=""><i class="fa fa-linkedin-square fa-lg"></i></a>
                                <a href=""><i class="fa fa-google-plus-square fa-lg"></i></a>
                                <a href=""><i class="fa fa-vimeo-square fa-lg"></i></a>
                                <a href=""><i class="fa fa-youtube fa-lg"></i></a>
                            </footer>
                            <!-- end:article footer -->                            
                        </article>
                        <!-- end:article-post -->
                        
                                                <!-- start:related-posts -->
                        <section class="news-lay-3 bottom-margin">
                                            
                            <header>
                                <h2><a href="#">Noticias relacionadas</a></h2>
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
                                        $NotRel_categoria=$fila_NotRel["categoria"];
                                        $NotRel_fechaPub=$fila_NotRel["fecha_publicacion"];

                                        //SEPARACION DE FECHA
                                        $fechaPubSep=explode(" ", $NotRel_fechaPub);
                                        $fechaSep=explode("-", $fechaPubSep[0]);
                                        $FechaDia=$fechaSep[2];
                                        $FechaMes=mesCorto($fechaSep[1]);
                                        $FechaAnio=$fechaSep[0];

                                        //URL
                                        $NotRel_UrlWeb=$web."noticia/".$NotRel_id."-".$NotRel_url;
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
    
</body>
</html>