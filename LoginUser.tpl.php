<html class="no-js css-menubar" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php _p("Login TOB WALLET"); ?></title>

        
        <link rel="shortcut icon" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/favicon.ico">

        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/site.min.css">
        <!-- Se agrega para cambiar color-->
         <!-- <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/skin/cyan.css"> -->
        <!-- <link rel="stylesheet" href="<?php //_p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/skin/purple.css"> -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/skin/green.css">
        <!-- Este para cambiar el tranparente login -->
         <style>
             .page-login-v2.page-dark.layout-full:after {
                background-color: rgba(234,250,246, 0.1) !important;
            }
        </style>
        
        <!-- Plugins -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/animsition/animsition.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/asscrollable/asScrollable.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/switchery/switchery.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/intro-js/introjs.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/slidepanel/slidePanel.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/flag-icon-css/flag-icon.min.css">

        <!-- Plugins For This Page -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/toastr/toastr.min.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/web-icons/web-icons.min.css">        
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

        <!-- Inline -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/examples/css/pages/login-v2.css">

        <!-- Styles -->
        <!--<link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/assets/css/styles.css">-->

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
    <body class="page-login-v2 layout-full page-dark">
        <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->


        <!-- Page -->
        <div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <div class="page-content">
                <div class="page-brand-info">
                    <div class="brand">
                       <!-- <a href="index.php"><img class="brand-img" src="<?php //_p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/logo%402x.png" alt="..."></a> -->
                        <h2 class="brand-text font-size-40">TOB WALLET</h2>
                    </div>
                    <!-- <p class="font-size-18" style="color:#fff;" >The KCoin Crypto Community is an eco-system powered by Blockchain infrastructure, where new and existing ventures inspired by Kellogg students and alumni.</p> -->
                </div>

                <div class="page-login-main">
                    <div class="brand visible-xs">
                        <center>
                        <img class="brand-img" src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/logo-blue%402x.png" alt="...">
                        <h3 class="brand-text font-size-30 " style="color:#502684;">KCOIN</h3>
                        </center>
                    </div>
                    <h3 class="font-size-24" ><?php _p("Log in"); ?></h3>
                    <p><?php _p("Welcome, log in to access the system."); ?></p>

                    <?= $this->RenderBegin(); ?>
                    <div class="form-group">
                       
                        
                   <div class="input-group input-group-icon">
                    <span class="input-group-addon">
                      <span class="icon wb-user" aria-hidden="true"></span>
                    </span>
                   <?= $this->txtEmail->Render(); ?>    
                  </div>
                        
                        
                    </div>
                    <div class="form-group">
                         
                  <div class="input-group input-group-icon">
                    <span class="input-group-addon">
                       <span class="icon fa-key" aria-hidden="true"></span>
                    </span>
                    <?= $this->txtPassword->Render(); ?>  
                  </div>
                        
                        
                       
                        <!--<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password"> -->
                    </div>
                    <div class="form-group clearfix">
                        <div class="pull-left">
                            
                         <!--<div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
                            
                           <input type="checkbox" id="inputCheckbox" name="inputCheckbox">
                            <label for="inputCheckbox">Remember </label>
                            -->
                            
                            <!--<input type="checkbox" id="chkVendor" data-plugin="switchery" data-color="#3aa99e" />-->
                            <?php $this->chkVendor->Render(); ?>
                            <label for="chkVendor"><?php _p("Are you admin?"); ?></label>
                            
                        </div>
                        <a class="pull-right" href="forgot" style="font-size:13px;"><?php _p("Forgot your password?"); ?></a>
                    </div> 
                    <?= $this->btnLogin->Render(); ?>
                    <!--<button type="submit" class="btn btn-primary btn-block">Sign in</button>-->
                    <?= $this->RenderEnd(); ?>

                    <center><p>Still no account? Please go to <a href="register">Register</a></p></center> 
                   
                   <!-- <center><p>Desea iniciar session como admin? <a href="loginadmin">Login Admin</a></p></center> -->
                     
                    <footer class="page-copyright">
                        <p>WEBSITE BY SUG</p>
                        <p>© <?php echo date('Y', strtotime('NOW')); ?>. All RIGHT RESERVED.</p>

                    </footer>
                </div>

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

        <!-- Plugins For This Page -->
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/jquery-placeholder/jquery.placeholder.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/toastr/toastr.min.js"></script>

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
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/components/jquery-placeholder.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/components/toastr.min.js"></script>

        <script>
            (function (document, window, $) {
                'use strict';

                var Site = window.Site;
                $(document).ready(function () {
                    Site.run();
                });
            })(document, window, jQuery);
        </script>
        <script type="text/javascript">
            function showWarning(val) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["warning"](val, "Warning");

            }

            function showSuccess(val) {


                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["success"](val, "Success");
            }

        </script>


    </body>

</html>





















