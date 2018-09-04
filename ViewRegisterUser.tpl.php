<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">

        <title>Registrar</title>


        <link rel="icon" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/favicon.ico">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/site.min.css">
        <!-- Se agrega para cambiar color-->
        <!-- <link rel="stylesheet" href="<?php //_p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/skin/purple.css"> -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/skin/green.css">

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

        <style>
            /* QDateTimePicker */
            span.datetimepicker { text-align: left !important;border:1px;}
            span.datetimepicker select {
                background: #fff url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAFCAYAAABB9hwOAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA4RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpiNWZkMzNlMC0zNTcxLTI4NDgtYjA3NC01ZTRhN2RjMWVmNjEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RTUxRUI3MDdEQjk4MTFFNUI1NDA5QTcyNTlFQzRERTYiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RTUxRUI3MDZEQjk4MTFFNUI1NDA5QTcyNTlFQzRERTYiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6ZWNiNjQzMjYtNDc1Yi01OTQxLWIxYjItNDVkZjU5YjZlODA2IiBzdFJlZjpkb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6N2RlYzI2YWMtZGI5OC0xMWU1LWIwMjgtY2ZhNDhhOGNjNWY1Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+AXTIGgAAAFRJREFUeNpidI1KSWFgYDBlwASngXjOrqWzGcgBTEC8DIjfo4m/h4qTDUAGfwPi+UD8Hyr2H8r/RqnBIHATiPdC2XuhfIoACxJ7PRDzQmmKAUCAAQDxOxHyb4DjOAAAAABJRU5ErkJggg==) no-repeat center right;
                -webkit-appearance: none;
                -moz-appearance: none;
                text-indent: 1px;
                text-overflow: '';

                padding-top: 0;
                padding-bottom: 0;
                height: 46px;
                line-height: 46px;
                border-color: #e4eaec;
                color: #76838f;
                padding: 10px 18px;
                font-size: 14px;
                line-height: 1.3333333;
                border-radius: 4px;

                color: #76838f;
                background-color: #fff;
                border: 1px solid #e4eaec;

                /*-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);*/
                transition: box-shadow .25s linear,border .25s linear,color .25s linear,background-color .25s linear;
                width: 100%;

            }
            span.datetimepicker select:focus { border-color: #9463f7 !important;    -webkit-box-shadow: none;    box-shadow: none;}
            span.datetimepicker select:active { border-color: #9463f7 !important;    -webkit-box-shadow: none;    box-shadow: none;}
            span.datetimepicker select.month { width: 90px; }
            span.datetimepicker select.day { width: 80px; margin-left: 8px; }
            span.datetimepicker select.year { width: 90px; margin-left: 8px; }
            span.datetimepicker select.hour { width: 65px; margin-left: 12px; margin-right: 2px; }
            span.datetimepicker select.minute { width: 45px; margin-left: 2px; margin-right: 2px; }
            span.datetimepicker select.second { width: 45px; margin-left: 2px; }


        </style>

    </head>
    <body class="layout-full"  > <!--page-login-v3--> 
        <style>
            .form-group {
                margin-bottom: 10px;
            }
        </style>

        <!-- Page -->
        <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
             data-animsition-out="fade-out">
            
            <div class="page-content vertical-align-middle"  style="width: 100%!important;">
                
                <a href="login"> <img class="brand-img" src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/logo2_T.png" alt="..."></a>

                <br><br><div style="font-size: 18px;color:#273746;">Registration</div><br>
                
                <!--<p>Complete the information needed to create a new user.</p>-->
                <?php $this->RenderBegin(); ?>

                <div method="post" role="form">

                    <div class="row" >
                        <div class="col-sm-4">

                            <div class="form-group">
                                <?php $this->txtFirstName->RenderWithError(); ?>
                            </div>

                            <div class="form-group">
                                <?php $this->txtMiddleName->RenderWithError(); ?>
                            </div>        
                            <div class="form-group">
                                <?php $this->txtLastName->RenderWithError(); ?>
                            </div>

                            <div class="form-group">
                                <?php $this->lstCountry->RenderWithError(); ?>
                            </div>  

                            <div class="form-group">
                                <?php $this->txtCity->RenderWithError(); ?>
                            </div>  


                        </div>

                        <div class="col-sm-4">

                            <div class="form-group">
                                <?php $this->txtEmail->RenderWithError(); ?>
                            </div>

                            <div class="form-group">
                                <?php $this->txtPassword->RenderWithError(); ?>
                            </div>

                            <div class="form-group">
                                <?php $this->txtRePassword->RenderWithError(); ?>
                            </div>

                            <div class="form-group">
                                <?php $this->txtPhone->RenderWithError(); ?>
                            </div>  

                            
                            
                            

                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php //$this->lstYear->RenderWithError(); ?>
                            </div>
                            <div class="form-group">
                                <?php //$this->lstCohort->RenderWithError(); ?>
                            </div>
                             <div class="form-group">
                                <?php $this->txtOtherCohort->RenderWithError(); ?>
                            </div>
                            
                            <div class="form-group text-left">
                              <?php $this->txtBirth->RenderWithError(); ?>  Date of Birth 
                            </div>
                            
                            <div class="form-group text-left">
                                User Type 
                                <?php $this->lstusertype->RenderWithError() ?>
                            </div>

                           

                            <div class="form-group  text-left">
                                <div style="position:relative;">
                                    <a class='btn btn-default btn-outline'  href='javascript:;'>
                                        Upload Photo
                                        <?php $this->txtUploadPhoto->RenderWithError(); ?>      
                                    </a>
                                    <span class='label label-default label-outline' id="upload-file-info2"></span>
                                </div>
                            </div>
                            
                            <!-- <div class="form-group  text-left">
                                <div style="position:relative;">
                                    <a class='btn btn-default btn-outline '  href='javascript:;'>
                                        Upload Student ID
                                        <?php //$this->txtUploadDriver->RenderWithError(); ?>      
                                    </a>
                                    <span class='label label-default label-outline' id="upload-file-info1"></span>
                                </div>
                            </div> -->


                        </div>
                    </div>   
                    <br>
                    <div class="row" >
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group text-center">

                               <!-- <label for="chkVendor" ><?php // _p("I agree to the terms and conditions"); ?></label>
                                <?php //$this->chkVendor->Render(); ?> -->
                            </div>

                        </div>
                        <div class="col-sm-4">

                        </div>

                    </div>


                    <div class="row" >
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <?php $this->btnLogin->RenderWithError(); ?>
                        </div>
                        <div class="col-sm-4">

                        </div>
                    </div>
                </div>
                
                
                
    <div class="modal fade modal-3d-slit in" id="ventaModal" aria-hidden="true" aria-labelledby="examplePositionCenter"
     role="dialog" tabindex="-1"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-center">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"  aria-label="Close" > <!--data-dismiss="modal"-->
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"><?php _p("Register Success"); ?></h4>
            </div>
            <div class="modal-body">
                <h5><?php _p("You have registered correctly, wait for the administrator to approve, Please check your email and wait to be approved."); ?></h5>

                 
                
                
            </div>
            <div class="modal-footer">
               
                <?php $this->btnFinalizar->Render(); ?>  
                
                <!--<button type="button" class="btn btn-raised btn-primary" ><i class="icon fa-check" aria-hidden="true"></i> Si</button>
                <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal"><i class="icon fa-close" aria-hidden="true"></i> No</button>
                -->
            </div>
        </div>
    </div>
</div>
                
                
                
                
                
                
                
                
                

                <?php $this->RenderEnd(); ?>

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
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "5000",
                    "hideDuration": "5000",
                    "timeOut": "5000",
                    "extendedTimeOut": "5000",
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