<?php
//NOTICIA SUPERIOR DESTACADA
$rst_SupDest=mysql_query("SELECT * FROM vtr_noticia WHERE superior=1 AND destacada=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC", $conexion);
$fila_SupDest=mysql_fetch_array($rst_SupDest);

//VARIABLES
$SupDest_id=$fila_SupDest["id"];
$SupDest_url=$fila_SupDest["url"];
$SupDest_titulo=$fila_SupDest["titulo"];
$SupDest_contenido=primerParrafo($fila_SupDest["contenido"]);
$SupDest_imagen=$fila_SupDest["imagen"];
$SupDest_imagen_carpeta=$fila_SupDest["imagen_carpeta"];

$SupDest_UrlWeb=$web."noticia/".$SupDest_id."-".$SupDest_url;
$SupDest_UrlImg=$web."imagenes/upload/".$SupDest_imagen_carpeta."thumbhdest/".$SupDest_imagen;

//NOTICIA SUPERIOR NORMAL
$rst_SupNor=mysql_query("SELECT * FROM vtr_noticia WHERE superior=1 AND destacada=0 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 3", $conexion);
?>
<!-- start:page slider -->
<div id="page-slider" class="clearfix">
    
    <!-- start:container -->
    <div class="container">
        
        <!-- start:carousel -->
        <div id="slider-carousel">
            
            <!-- start:row -->
            <div class="row">
                
                <!-- start:col -->
                <div class="col-sm-8">
                    
                    <article class="linkbox large cat-sports">
                        <a href="<?php echo $SupDest_UrlWeb; ?>">
                            <img src="<?php echo $SupDest_UrlImg; ?>" alt="Responsive image" class="img-responsive" />
                            <div class="overlay">
                                <h2><?php echo $SupDest_titulo; ?></h2>
                                <?php echo $SupDest_contenido; ?>
                            </div>
                        </a>
                    </article>

                </div>
                <!-- end:col -->
                
                <!-- start:col -->
                <div class="col-sm-4">

                    <?php while($fila_SupNor=mysql_fetch_array($rst_SupNor)){
                            //VARIABLES
                            $SupNor_id=$fila_SupNor["id"];
                            $SupNor_url=$fila_SupNor["url"];
                            $SupNor_titulo=$fila_SupNor["titulo"];
                            $SupNor_contenido=primerParrafo($fila_SupNor["contenido"]);
                            $SupNor_imagen=$fila_SupNor["imagen"];
                            $SupNor_imagen_carpeta=$fila_SupNor["imagen_carpeta"];

                            $SupNor_UrlWeb=$web."noticia/".$SupNor_id."-".$SupNor_url;
                            $SupNor_UrlImg=$web."imagenes/upload/".$SupNor_imagen_carpeta."thumbhdestri/".$SupNor_imagen;
                    ?>
                    
                    <article class="linkbox cat-sports">
                        <a href="<?php echo $SupNor_UrlWeb; ?>">
                            <img src="<?php echo $SupNor_UrlImg; ?>" alt="Responsive image" class="img-responsive" />
                            <div class="overlay">
                                <h3><?php echo $SupNor_titulo; ?></h3>
                            </div>
                        </a>
                    </article>

                    <?php } ?>                    

                </div>
                <!-- end:col -->

            </div>
            <!-- end:row -->            
            
        </div>
        <!-- end:slider-carousel -->
        
    </div>
    <!-- end:container -->
    
</div>
<!-- end:page slider -->