<?php
require('includes/configuration/prepend.inc.php');
$numero_error = 500;
if ($_GET['error']) {
    $numero_error = $_GET['error'];
}

$Datos1 = @unserialize($_SESSION['DatosAdministrador']);
$Datos2 = @unserialize($_SESSION['DatosUsuario']);
$Datos3 = @unserialize($_SESSION['DatosUsuarioNoVerificado']);


$isUSerActive = false;
if ($Datos1 || $Datos2 || $Datos3 ) {
    $isUSerActive = true;
}
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">

        <title>Error <?php echo $numero_error; ?> </title>

        <link rel="apple-touch-icon" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/apple-touch-icon.png">
        <link rel="icon" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/landing/images/favicon.ico" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/site.min.css">
        
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/skin/purple.css">

        <!-- Skin tools (demo site only) -->
        <!--<link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/skintools.css">
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/sections/skintools.min.js"></script> -->

        <!-- Plugins -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/animsition/animsition.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/asscrollable/asScrollable.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/switchery/switchery.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/intro-js/introjs.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/slidepanel/slidePanel.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/flag-icon-css/flag-icon.min.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/web-icons/web-icons.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        <!-- Inline -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/examples/css/pages/errors.css">

        <!--[if lt IE 9]>
          <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/html5shiv/html5shiv.min.js"></script>
          <![endif]-->

        <!--[if lt IE 10]>
          <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/media-match/media.match.min.js"></script>
          <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/respond/respond.min.js"></script>
          <![endif]-->

        <!-- Scripts -->
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/modernizr/modernizr.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/breakpoints/breakpoints.min.js"></script>
        <script>
            Breakpoints();
        </script>
    </head>
    <body class="page-error page-error-503 layout-full" style="background: #f1f4f5;">
        <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->


        <!-- Page -->
        <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
             data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle">
                <header>
                    <h1 class="animation-slide-top"> <?php echo $numero_error; ?></h1>
                    <p>Page Not Found !</p>
                </header>
                <p class="error-advise">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>


                <?php
                if ($isUSerActive) {
                    ?>
                    <a class="btn btn-primary btn-round" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/login">GO TO HOME PAGE</a>
                    <?php
                } else {
                    ?>
                    <a class="btn btn-primary btn-round" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/index.html">GO TO HOME PAGE</a>
                    <?php
                }
                ?>




                <footer class="page-copyright">
                    <p>WEBSITE BY SUG</p>
                    <p>© <?php echo date('Y', strtotime('NOW')); ?>. All RIGHT RESERVED.</p>
                    <div class="social">
                        <a href="javascript:void(0)">
                            <i class="icon bd-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="javascript:void(0)">
                            <i class="icon bd-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="javascript:void(0)">
                            <i class="icon bd-dribbble" aria-hidden="true"></i>
                        </a>
                    </div>
                </footer>
            </div>
        </div>
        <!-- End Page -->


        <!-- Core  -->
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/animsition/jquery.animsition.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/asscroll/jquery-asScroll.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/mousewheel/jquery.mousewheel.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/asscrollable/jquery.asScrollable.all.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/ashoverscroll/jquery-asHoverScroll.min.js"></script>

        <!-- Plugins -->
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/switchery/switchery.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/intro-js/intro.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/screenfull/screenfull.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/slidepanel/jquery-slidePanel.min.js"></script>

        <!-- Scripts -->
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/core.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/site.min.js"></script>

        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/sections/menu.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/sections/menubar.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/sections/gridmenu.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/sections/sidebar.min.js"></script>

        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/configs/config-colors.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/configs/config-tour.min.js"></script>

        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/components/asscrollable.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/components/animsition.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/components/slidepanel.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/components/switchery.min.js"></script>

        <!-- Scripts For This Page -->


        <script>
            (function (document, window, $) {
                'use strict';

                var Site = window.Site;
                $(document).ready(function () {
                    Site.run();
                });
            })(document, window, jQuery);
        </script>



</html>