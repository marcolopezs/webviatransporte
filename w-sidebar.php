<?php
$rst_SidNot=mysql_query("SELECT * FROM vtr_noticia WHERE publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY contador DESC LIMIT 4", $conexion);
?>
<!-- start:sidebar -->
<div id="sidebar">
    
    <!-- start:advertising -->
    <div class="ad">

        <header>
            <h2>Revista digital</h2>
        </header>

        <a href="http://issuu.com/revistatransp/docs/revista_transporte___turismo_octubr" target="_blank">
            <img src="imagenes/upload/portada.jpg" width="300" alt="">
        </a>
    </div>
    <!-- end:advertising -->
    
    <!-- start:section-module-news -->
    <section class="module-news top-margin">
        <!-- start:header -->
        <header>
            <h2>Lo más leído</h2>
            <span class="borderline"></span>
        </header>
        <!-- end:header -->
        
        <!-- start:article-container -->
        <div class="article-container">
            
            <?php while($fila_SidNot=mysql_fetch_array($rst_SidNot)){
                    //VARIABLES
                    $SidNot_id=$fila_SidNot["id"];
                    $SidNot_url=$fila_SidNot["url"];
                    $SidNot_titulo=$fila_SidNot["titulo"];
                    $SidNot_contenido=primerParrafo($fila_SidNot["contenido"]);
                    $SidNot_imagen=$fila_SidNot["imagen"];
                    $SidNot_imagen_carpeta=$fila_SidNot["imagen_carpeta"];
                    $SidNot_fechaPub=$fila_SidNot["fecha_publicacion"];

                    //SEPARACION DE FECHA
                    $fechaPubSep=explode(" ", $SidNot_fechaPub);
                    $fechaSep=explode("-", $fechaPubSep[0]);
                    $FechaDia=$fechaSep[2];
                    $FechaMes=mesCorto($fechaSep[1]);
                    $FechaAnio=$fechaSep[0];

                    $SidNot_UrlWeb=$web."noticia/".$SidNot_id."-".$SidNot_url;
                    $SidNot_UrlImg=$web."imagenes/upload/".$SidNot_imagen_carpeta."thumbhmini/".$SidNot_imagen;
            ?>
            <!-- start:article -->
            <article class="clearfix">
                <a href="<?php echo $SidNot_UrlWeb; ?>">
                    <img src="<?php echo $SidNot_UrlImg; ?>" alt="<?php echo $SidNot_titulo; ?>" />
                </a>
                <span class="published"><?php echo $FechaMes." ".$FechaDia.", ".$FechaAnio; ?></span>
                <h3><a href="<?php echo $SidNot_UrlWeb; ?>"><?php echo $SidNot_titulo; ?></a></h3>
            </article>
            <!-- end:article -->
            <?php } ?>

        </div>
        <!-- end:article-container -->
    </section>
    <!-- end:section-module-news -->
    
    <!-- start:section-module-photos -->
    <section class="module-photos">
        <!-- start:header -->
        <header>
            <h2>Galería de Fotos</h2>
            <span class="borderline"></span>
        </header>
        <!-- end:header -->
        <!-- start:article-container -->
        <div id="weekly-gallery" class="article-container">
            <!-- start:row -->
            <div class="row">
                <!-- start:article -->
                <article class="clearfix">
                    <p>Aliquam sollicitudin, enim sit amet hendrerit consequat, velit orci posuere elit, eu facilisis lacus odio ac nunc. </p>
                    <a href="images/dummy/photo-big.jpg">
                        <img src="images/dummy/300x200.jpg" width="300" height="200" alt="Responsive image" class="img-responsive" />
                    </a>
                </article>
                <!-- end:article -->
            </div>
            <!-- end:row -->
            
            <!-- start:row -->
            <div class="row">
                <!-- start:col -->
                <div class="col-xs-4">
                    <!-- start:article -->
                    <article class="clearfix">
                        <a href="images/dummy/photo-big.jpg"><img src="images/dummy/100x80_2.jpg" width="100" height="80" alt="Responsive image" class="img-responsive" /></a>
                    </article>
                    <!-- end:article -->
                </div>
                <!-- end:col -->
                <!-- start:col -->
                <div class="col-xs-4">
                    <!-- start:article -->
                    <article class="clearfix">
                        <a href="images/dummy/photo-big.jpg"><img src="images/dummy/100x80_2.jpg" width="100" height="80" alt="Responsive image" class="img-responsive" /></a>
                    </article>
                    <!-- end:article -->
                </div>
                <!-- end:col -->
                <!-- start:col -->
                <div class="col-xs-4">
                    <!-- start:article -->
                    <article class="clearfix">
                        <a href="images/dummy/photo-big.jpg"><img src="images/dummy/100x80_2.jpg" width="100" height="80" alt="Responsive image" class="img-responsive" /></a>
                    </article>
                    <!-- end:article -->
                </div>
                <!-- end:col -->
            </div>
            <!-- end:row -->
        </div>
        <!-- end:article-container -->
    </section>
    <!-- end:section-module-photos -->

    
</div>
<!-- end:sidebar -->