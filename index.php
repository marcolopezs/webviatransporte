<?php
require_once('panel@viat/conexion/conexion.php');
require_once('panel@viat/conexion/funciones.php');

//NOTICIA INFERIOR DESTACADA
$rst_InfDest=mysql_query("SELECT * FROM vtr_noticia WHERE superior=0 AND destacada=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC", $conexion);
$fila_InfDest=mysql_fetch_array($rst_InfDest);

//VARIABLES
$InfDest_id=$fila_InfDest["id"];
$InfDest_url=$fila_InfDest["url"];
$InfDest_titulo=$fila_InfDest["titulo"];
$InfDest_contenido=primerParrafo($fila_InfDest["contenido"]);
$InfDest_imagen=$fila_InfDest["imagen"];
$InfDest_imagen_carpeta=$fila_InfDest["imagen_carpeta"];

$InfDest_UrlWeb=$web."noticia/".$InfDest_id."-".$InfDest_url;
$InfDest_UrlImg=$web."imagenes/upload/".$InfDest_imagen_carpeta."thumbhdest/".$InfDest_imagen;

//NOTICIA INFERIOR NORMAL
$rst_InfNor=mysql_query("SELECT * FROM vtr_noticia WHERE superior=0 AND destacada=0 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 6", $conexion);

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
    <title>Vialidad y Transporte Latinoamericano</title>
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
            
            <?php require_once('w-slider.php') ?>

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
                                
                                <article class="linkbox large cat-sports">
                                    <a href="<?php echo $InfDest_UrlWeb; ?>">
                                        <img src="<?php echo $InfDest_UrlImg; ?>" alt="Responsive image" class="img-responsive" />
                                        <div class="overlay">
                                            <h3><?php echo $InfDest_titulo; ?></h3>
                                        </div>
                                    </a>
                                </article>
                                
                                <!-- start:row -->
                                <div class="row">

                                    <?php while($fila_InfNor=mysql_fetch_array($rst_InfNor)){
                                            //VARIABLES
                                            $InfNor_id=$fila_InfNor["id"];
                                            $InfNor_url=$fila_InfNor["url"];
                                            $InfNor_titulo=$fila_InfNor["titulo"];
                                            $InfNor_contenido=primerParrafo($fila_InfNor["contenido"]);
                                            $InfNor_imagen=$fila_InfNor["imagen"];
                                            $InfNor_imagen_carpeta=$fila_InfNor["imagen_carpeta"];

                                            $InfNor_UrlWeb=$web."noticia/".$InfNor_id."-".$InfNor_url;
                                            $InfNor_UrlImg=$web."imagenes/upload/".$InfNor_imagen_carpeta."thumbhinf/".$InfNor_imagen;
                                    ?>
                                    
                                    <!-- start:col -->
                                    <div class="col-sm-6">
                                        <!-- start:article.linkbox -->
                                        <article class="linkbox cat-sports">
                                            <a href="<?php echo $InfNor_UrlWeb; ?>">
                                                <img src="<?php echo $InfNor_UrlImg; ?>" alt="Responsive image" class="img-responsive" />
                                                <div class="overlay">
                                                    <h3><?php echo $InfNor_titulo; ?></h3>
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