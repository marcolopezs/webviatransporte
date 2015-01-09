<?php
//LO MAS VISTO
$rst_SidNot=mysql_query("SELECT * FROM vtr_noticia WHERE publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY contador DESC LIMIT 4", $conexion);

//REVISTA
$rst_revista=mysql_query("SELECT * FROM vtr_edicion WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 1;", $conexion);
$num_revista=mysql_num_rows($rst_revista);
$fila_revista=mysql_fetch_array($rst_revista);

//VARIABLES
$Revista_id=$fila_revista["id"];
$Revista_url=$fila_revista["url"];
$Revista_titulo=$fila_revista["titulo"];
$Revista_imagen=$fila_revista["imagen"];

$Revista_UrlImg=$we."imagenes/revista/".$fila_revista["imagen"];
?>
<!-- start:sidebar -->
<div id="sidebar">
    
    <?php if($num_revista<>0){ ?>
    <!-- start:advertising -->
    <div class="ad">

        <header>
            <h2>Revista digital</h2>
        </header>

        <a href="<?php echo $Revista_url; ?>" target="_blank">
            <img src="<?php echo $Revista_UrlImg; ?>" width="300" alt="<?php echo $Revista_titulo; ?>">
        </a>
    </div>
    <!-- end:advertising -->
    <?php } ?>
    
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
    
</div>
<!-- end:sidebar -->