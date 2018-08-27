<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">

        <title>Forgot Password</title>


        <link rel="icon" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/favicon.ico">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/site.min.css">
        <!-- Se agrega para cambiar color-->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/skin/purple.css">
       
        <!-- Plugins -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/animsition/animsition.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/asscrollable/asScrollable.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/switchery/switchery.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/intro-js/introjs.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/slidepanel/slidePanel.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/flag-icon-css/flag-icon.min.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/web-icons/web-icons.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        <!-- Inline -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/examples/css/pages/login-v3.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/examples/css/pages/forgot-password.css">
        <link rel="stylesheet" type="text/css" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/toastr/toastr.css" />
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
    <body class=" layout-full" >


        <!-- Page -->
        <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
             data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle">
              <a href="login">   <img class="brand-img" src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/logo-blue%402x.png" alt="..."> </a>
               <br> <br> 
                <h3>Forgot Your Password ?</h3>
                <p>Input your registered email to reset your password</p>
                 <?php $this->RenderBegin(); ?>
                
                <div method="post" role="form">
                  <div class="form-group">
                     <?php $this->txtName->Render(); ?>
                  </div>
                    
                        
                    
                  <div class="form-group">
                     <?php $this->btnLogin->Render(); ?>
                  </div>
                </div>
                
                <?php $this->RenderEnd(); ?>
               <br>

                <footer class="page-copyright page-copyright-inverse">
                   <p style="color:#a3afb7">WEBSITE BY SUG</p>
                   <p style="color:#a3afb7">© <?php echo date('Y', strtotime('NOW')); ?>. All RIGHT RESERVED.</p>
                  
                    <div class="social">
                        <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                            <i class="icon bd-twitter" style="color:#a3afb7" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                            <i class="icon bd-facebook" style="color:#a3afb7" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                            <i class="icon bd-google-plus" style="color:#a3afb7" aria-hidden="true"></i>
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

        <!-- Plugins For This Page -->
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/jquery-placeholder/jquery.placeholder.min.js"></script>

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
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/components/material.min.js"></script>
        <script type="text/javascript" src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/toastr/toastr.js"></script>
        <script>
                    (function (document, window, $) {
                        'use strict';

                        var Site = window.Site;
                        $(document).ready(function () {
                            Site.run();
                        })
                    })(document, window, jQuery);
        </script>

        <script>

            function showWarning(val) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
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
                    "showDuration": "200",
                    "hideDuration": "500",
                    "timeOut": "800",
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