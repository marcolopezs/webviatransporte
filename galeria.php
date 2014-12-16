<?php
require_once('panel@viat/conexion/conexion.php');
require_once("panel@viat/conexion/funciones.php");

//VARIABLES
$Req_UrlWeb=$web."galerias";

################################################################
//PAGINACION DE NOTICIAS
require("libs/pagination/class_pagination.php");

//INICIO DE PAGINACION
$page           = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$rst_noticias   = mysql_query("SELECT COUNT(*) as count FROM vtr_galeria WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC;", $conexion);
$row            = mysql_fetch_assoc($rst_noticias);
$generated      = intval($row['count']);
$pagination     = new Pagination("8", $generated, $page, $Req_UrlWeb."&page", 1, 0);
$start          = $pagination->prePagination();
$rst_noticias   = mysql_query("SELECT * FROM vtr_galeria WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT $start, 8", $conexion);

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
    <title><?php echo $web_nombre; ?></title>
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

                                <header>
                                    <h2><a href="#">Galería de Fotos</a></h2>
                                    <span class="borderline"></span>
                                </header>
                                
                                <!-- start:row -->
                                <div class="row">

                                    <?php while($fila_noticias=mysql_fetch_array($rst_noticias)){
                                        $noticia_id=$fila_noticias["id"];
                                        $noticia_url=$fila_noticias["url"];
                                        $noticia_titulo=stripslashes($fila_noticias["titulo"]);
                                        $noticia_fechaPub=$fila_noticias["fecha_publicacion"];

                                        //FOTOS
                                        $rst_fotos=mysql_query("SELECT * FROM vtr_galeria_slide WHERE noticia=$noticia_id AND orden=0", $conexion);
                                        $fila_fotos=mysql_fetch_array($rst_fotos);

                                        $noticia_imagen=$fila_fotos["imagen"];
                                        $noticia_imagen_carpeta=$fila_fotos["imagen_carpeta"];

                                        //URLS
                                        $noticia_UrlWeb=$web."galeria/".$noticia_id."-".$noticia_url;
                                        $noticia_UrlImg=$web."imagenes/galeria/".$noticia_imagen_carpeta."thumb/".$noticia_imagen;
                                    ?>
                                    
                                    <!-- start:col -->
                                    <div class="col-sm-6">
                                        <!-- start:article.linkbox -->
                                        <article class="linkbox cat-showtime">
                                            <a href="<?php echo $noticia_UrlWeb; ?>">
                                                <img src="<?php echo $noticia_UrlImg; ?>" width="265" height="160" alt="<?php echo $noticia_titulo; ?>" class="img-responsive" />
                                                <div class="overlay">
                                                    <h3><?php echo $noticia_titulo; ?></h3>
                                                </div>
                                            </a>
                                        </article>
                                        <!-- end:article.linkbox -->
                                    </div>
                                    <!-- end:col -->

                                    <?php } ?>

                                </div>
                                <!-- end:row -->
                                
                            </div>
                            <!-- end:col -->
                            
                        </div>
                        <!-- end:row -->        
                        
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