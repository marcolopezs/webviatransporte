<?php
require_once('panel@viat/conexion/conexion.php');
require_once('panel@viat/conexion/funciones.php');
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
<body class="contacto">
    
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
                                <h2><a href="#">Contactenos</a></h2>
                                <span class="borderline"></span>
                            </header>
                        
                            <br>
                            <!-- start:form section -->
                            <section>
                                
                                <!-- start:form -->
                                <form role="form" id="smart-form" action="libs/smartform/php/smartprocess.php" method="post">
                            
                                    <!-- start:row -->
                                    <div class="row bottom-margin">
                                        
                                        <div class="section col-sm-6">
                                            <label class="field">
                                                <input type="text" name="sendername" id="sendername" class="form-control gui-input" placeholder="Nombre y apellidos" required>
                                            </label>
                                        </div><!-- end section -->

                                        <div class="section col-sm-6">
                                            <label class="field">
                                                <input type="text" name="senderemail" id="senderemail" class="form-control gui-input" placeholder="E-mail" required>
                                            </label>
                                        </div><!-- end section -->
                                    
                                    </div>
                                    <!-- end:row -->
                                    
                                    <!-- start:row -->
                                    <div class="row bottom-margin">
                                        
                                        <div class="section col-md-12">
                                            <label class="field prepend-icon">
                                                <textarea class="gui-textarea form-control" rows="5" id="sendermessage" name="sendermessage" placeholder="Mensaje..." required></textarea>
                                                <span class="input-hint"> <strong>Sugerencia:</strong> Por favor introduce entre 80 a 300 caracteres.</span>   
                                            </label>
                                        </div><!-- end section -->
    
                                    </div>
                                    <!-- end:row -->

                                    <div class="result"></div><!-- end .result  section -->
                                    
                                    <!-- start:load-more -->
                                    <div>
                                        <button type="submit" class="show-more">Enviar mensaje</button>
                                    </div>
                                    <!-- end:load-more -->
                            
                                </form>
                                <!-- end:form -->
                            
                            </section>
                            <!-- end:form section -->
                            
                        </article>
                        <!-- end:article -->
                        
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

    <script type="text/javascript" src="libs/smartform/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="libs/smartform/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="libs/smartform/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="libs/smartform/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="libs/smartform/js/smart-form.js"></script>

</body>
</html>