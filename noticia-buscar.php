<?php
require_once('panel@viat/conexion/conexion.php');
require_once("panel@viat/conexion/funciones.php");

$buscar=$_REQUEST["buscar"];

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
                                
                                <h2>Buscar: <?php echo $buscar; ?></h2>                                
                                
                                <!-- start:row -->
                                <div class="row bottom-margin">
                                    
                                    <script>
                                      (function() {
                                        var cx = '018282985496243368695:lv6ajvdadks';
                                        var gcse = document.createElement('script');
                                        gcse.type = 'text/javascript';
                                        gcse.async = true;
                                        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                                            '//www.google.com/cse/cse.js?cx=' + cx;
                                        var s = document.getElementsByTagName('script')[0];
                                        s.parentNode.insertBefore(gcse, s);
                                      })();
                                    </script>
                                    <gcse:searchresults-only></gcse:searchresults-only>          
                                
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