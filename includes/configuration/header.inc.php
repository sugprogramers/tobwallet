<!DOCTYPE html>
<html class="no-js css-menubar" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="author" content="FIREHORSE">

        <title><?php _p($strPageTitle . " - Kcoin®"); ?></title>

        <link rel="shortcut icon" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/favicon.ico">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/css/site.min.css">
        <!-- Se agrega para cambiar color-->
        <!-- <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/skin/cyan.css"> -->
        <!-- <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/skin/purple.css"> -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/skin/green.css">

        <!-- Plugins -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/animsition/animsition.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/asscrollable/asScrollable.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/switchery/switchery.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/intro-js/introjs.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/slidepanel/slidePanel.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/flag-icon-css/flag-icon.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/icheck/icheck.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/jt-timepicker/jquery-timepicker.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/jquery-strength/jquery-strength.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/multi-select/multi-select.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/datatables-bootstrap/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/datatables-responsive/dataTables.responsive.min.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/web-icons/web-icons.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

        <!-- Inline -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/examples/css/dashboard/v2.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/examples/css/advanced/lightbox.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/examples/css/charts/flot.css">
        <link href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/tasklist/tasklist.min.css" rel="stylesheet" type="text/css"/>

        <!-- Plugins For This Page -->
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/chartist-js/chartist.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/jvectormap/jquery-jvectormap.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/jquery-wizard/jquery-wizard.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/formvalidation/formValidation.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/icheck/icheck.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/icheck/skins/square/blue.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/bootstrap-touchspin/bootstrap-touchspin.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/jquery-labelauty/jquery-labelauty.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/asscrollable/asScrollable.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/examples/css/charts/flot.css">
        <link rel="stylesheet" type="text/css" href="<?php _p(__VIRTUAL_DIRECTORY__ . __CSS_ASSETS__); ?>/style.css"  />
        <link rel="stylesheet" type="text/css" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/toastr/toastr.css" />
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/footable/footable.core.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/examples/css/tables/datatable.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/magnific-popup/magnific-popup.min.css">
        <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/bootstrap-select/bootstrap-select.min.css">
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

        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/instascan/instascan.min.js"></script>
        <script src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/js/qrcodegpssetting/app.js"></script>

        <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACJapLIVhm-uVWitwICh24232jYdkP1SQ&signed_in=true"></script>-->
<!--        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXfH16XT0bi2DuXuQRr7lIDEys3eKSxQM&signed_in=true"</script>-->


        <!-- Core  -->

        <script>
            Breakpoints();
        </script>

        <style>
            .classSelectedRow{
                background-color:  rgba(53,131,202,.05) !important;
            }
            span.warning{
                color: red;
                font-size: 0.8em;
            }
            .nav-tabs-solid>li.active>a, .nav-tabs-solid>li.active>a:focus, .nav-tabs-solid>li.active>a:hover{
                font-weight: 500;
            }






            /* QDateTimePicker */
            span.datetimepicker {}
            span.datetimepicker select {
                width: 100%;
                line-height: 1.57142857;
                color: #76838f;
                background-color: #fff;
                background-image: none;
                border: 1px solid #e4eaec;
                height: 32px;
                padding: 6px 2px;
                font-size: 12px;
                line-height: 1.5;
                border-radius: 2px; 
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;

            }
            span.datetimepicker select:focus { border-color: #62a8ea; outline: 0;}
            span.datetimepicker select.month { width: 60px; }
            span.datetimepicker select.day { width: 45px; margin-left: 8px; }
            span.datetimepicker select.year { width: 60px; margin-left: 8px; }
            span.datetimepicker select.hour { width: 65px; margin-left: 12px; margin-right: 2px; }
            span.datetimepicker select.minute { width: 45px; margin-left: 2px; margin-right: 2px; }
            span.datetimepicker select.second { width: 45px; margin-left: 2px; }


        </style>        
        <script>
            function selectRowTable(id, idtable) {
                var trele = document.getElementById(idtable).getElementsByTagName("tr");
                var classname;
                for (var i = 0; i < trele.length; i++)
                {
                    classname = trele[i].className;
                    trele[i].className = classname.replace("classSelectedRow", "");
                }
                //document.getElementById(id).style.background = "#c1ddf1"; 
                //document.getElementById(id).setAttribute('class','classselected');
                document.getElementById(id).className += " classSelectedRow";
            }
        </script>     

        <script>
            function selectColumnTable(numcol, idtable) {

                var tbl = document.getElementById(idtable);
                var rows = tbl.getElementsByTagName('tr');

                var tds = tbl.getElementsByTagName('td');
                for (var td = 0; td < tds.length; td++) {
                    classname = tds[td].className;
                    tds[td].className = classname.replace("classSelectedRow", "");
                }

                var ths = tbl.getElementsByTagName('th');
                for (var th = 0; th < ths.length; th++) {
                    classname = ths[th].className;
                    ths[th].className = classname.replace("classSelectedRow", "");
                }

                for (var row = 0; row < rows.length; row++) {
                    var cels = rows[row].getElementsByTagName('td');
                    if (cels.length == 0)
                        var cels = rows[row].getElementsByTagName('th');
                    cels[numcol].className += " classSelectedRow";

                }

            }

            function show_hide_column(numcol, idcheck, idtable) {
                var status = document.getElementById(idcheck).checked;
                //alert(status);
                var stl = 'none';
                if (status)
                    stl = 'block';
                var tbl = document.getElementById(idtable);
                var rows = tbl.getElementsByTagName('tr');

                for (var row = 0; row < rows.length; row++) {
                    var cels = rows[row].getElementsByTagName('td');
                    if (cels.length == 0)
                        var cels = rows[row].getElementsByTagName('th');

                    cels[numcol].style.display = stl;

                    if (stl == 'none') {
                        //cels[numcol].style.visibility = "collapse";
                    } else
                        //cels[numcol].style.visibility =  "visible";
                        cels[numcol].style.display = 'table-cell';

                }

            }
            function javarefresh(idfrom, idbutton, idwating) {
                qc.pA(idfrom, idbutton, 'QClickEvent', '', idwating);
            }
        </script>          


    </head>
    <body>
        <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega  navbar-inverse" role="navigation"> <!-- ADD navbar-inverse-->

            <div class="navbar-header">
                <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                        data-toggle="menubar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="hamburger-bar"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                        data-toggle="collapse">
                    <i class="icon wb-more-horizontal" aria-hidden="true"></i>
                </button>
                <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
                    <img class="navbar-brand-logo" src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/logo2_T.png" title="iGo Ads">
                    <span class="navbar-brand-text">TOB WALLET</span>
                </div>
                <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
                        data-toggle="collapse">
                    <span class="sr-only">Toggle Search</span>
                    <i class="icon wb-search" aria-hidden="true"></i>
                </button>
            </div>

            <div class="navbar-container container-fluid">
                <!-- Navbar Collapse -->
                <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                    <!-- Navbar Toolbar -->
                    <ul class="nav navbar-toolbar">
                        <li class="hidden-float" id="toggleMenubar">
                            <a data-toggle="menubar" href="#" role="button">
                                <i class="icon hamburger hamburger-arrow-left">
                                    <span class="sr-only">Toggle menubar</span>
                                    <span class="hamburger-bar"></span>
                                </i>
                            </a>
                        </li>
                        <li class="hidden-xs" id="toggleFullscreen">
                            <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                            </a>
                        </li>
                        <li class="hidden-float">
                            <a class="icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                               role="button">
                                <span class="sr-only">Toggle Search</span>
                            </a>
                        </li>

                    </ul>
                    <!-- End Navbar Toolbar -->

                    <!-- Navbar Toolbar Right -->
                    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                        <li class="dropdown" >
                            <style>
                                .noneHover:hover , .noneHover:visited , .noneHover:focus{background: transparent !important;background-color: transparent !important; }
                            </style>

                            <a class="noneHover" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
                               aria-expanded="false" role="button" style="padding-right: 1px;padding-left:  1px">
                                <div style=" font-size:14px;font-family: Roboto,sans-serif;color: #fff;box-sizing: border-box;font-weight: 500;padding-right: 1px;">
                                    <?php
                                    $admin = @unserialize($_SESSION['DatosAdministrador']);
                                    $usuario = @unserialize($_SESSION['DatosUsuario']);
                                    if ($usuario) {

                                        echo $usuario->Email;
                                    } else {
                                        if ($admin) {
                                            echo $admin->Email;
                                        } else {
                                            echo "email@gmail.com";
                                        }
                                    }
                                    ?> 
                                </div>

                            </a>
                        </li>
                        <li class="dropdown">

                            <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                               data-animation="scale-up" role="button">
                                <span class="avatar avatar-online">
                                    <?php
                                    $imgProfile = __SUBDIRECTORY__ . '/template/assets/images/ic_profile.png';
                                    ?>
                                    <img src="<?php _p($imgProfile); ?>" alt="...">
                                    <i></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation">
                                    <?php if ($usuario) { ?>
                                        <a href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/profileuser" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                                    <?php } else { ?>
                                        <a href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/profileadmin" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                                    <?php } ?>


                                </li>
                                <li role="presentation">
                                    <a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Configuration</a>
                                </li>
                                <li class="divider" role="presentation"></li>

                                <?php
                                if ($admin && $usuario) {
                                    _p('<li role="presentation">
                                  <a href="' . __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/logoutuser" role="menuitem"><i class="icon wb-arrow-left" aria-hidden="true"></i>Ir a Admin</a></li>', false);
                                }
                                ?>

                                <li role="presentation">
                                    <a data-target="#logOutModal" data-toggle="modal" href="#" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Log Out</a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                    <!-- End Navbar Toolbar Right -->
                </div>
                <!-- End Navbar Collapse -->

                <!-- Site Navbar Seach -->
                <div class="collapse navbar-search-overlap" id="site-navbar-search">
                    <form role="search">
                        <div class="form-group">
                            <div class="input-search">
                                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                        data-toggle="collapse" aria-label="Close"></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Site Navbar Seach -->
            </div>
        </nav>
        <div class="site-menubar  site-menubar-light"> <!-- ADD site-menubar-light -->
            <div class="site-menubar-body">
                <div>
                    <div>
                        <?php
                        if ($usuario) {

                            if ($usuario->UserType == 'C') {
                                ?>

                                <ul class="site-menu">
                                    <li class="site-menu-category"><span class="label label-primary">User</span></li>

                                    <!--  <li id="activeDashboardAdmin" class="site-menu-item">
                                             <a href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/dashboarduser" data-slug="dashboard"><i class="site-menu-icon wb-dashboard" aria-hidden="true"></i><span class="site-menu-title">Dashboard</span></a></li>
                                    -->


                                    <li id="activeProfile" class="site-menu-item has-sub">
                                        <a href="javascript:void(0)" data-slug="layout">
                                            <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                                            <span class="site-menu-title">Profile</span>
                                            <span class="site-menu-arrow"></span>
                                        </a>
                                        <ul class="site-menu-sub">
                                            <li id="activeViewProfile" class="site-menu-item">
                                                <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/profileuser" data-slug="layout-menu-collapsed">
                                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                                    <span class="site-menu-title">View Profile</span>
                                                </a>
                                            </li>

                                            <!-- <li id="activeMiningOptions" class="site-menu-item">
                                                <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/miningoptions" data-slug="layout-menu-collapsed">
                                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                                    <span class="site-menu-title">Mining Info</span>
                                                </a>
                                            </li> -->
                                        </ul>
                                    </li>

                                    <li id="activeProfile" class="site-menu-item has-sub">
                                        <a href="javascript:void(0)" data-slug="layout">
                                            <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                                            <span class="site-menu-title">Offers</span>
                                            <span class="site-menu-arrow"></span>
                                        </a>
                                        <ul class="site-menu-sub">
                                            <li id="activeViewProfile" class="site-menu-item">
                                                <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/availableoffer" data-slug="layout-menu-collapsed">
                                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                                    <span class="site-menu-title">View Offers</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li id="activeProfile" class="site-menu-item has-sub">
                                        <a href="javascript:void(0)" data-slug="layout">
                                            <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                                            <span class="site-menu-title">Balance</span>
                                            <span class="site-menu-arrow"></span>
                                        </a>
                                        <ul class="site-menu-sub">
                                            <li id="activeViewProfile" class="site-menu-item">
                                                <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/balance" data-slug="layout-menu-collapsed">
                                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                                    <span class="site-menu-title">My Balance</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>


                            <?php } else if ($usuario->UserType == 'O') {
                                ?>
                                <ul class="site-menu">
                                    <li class="site-menu-category"><span class="label label-primary">User</span></li>

                                    <!--  <li id="activeDashboardAdmin" class="site-menu-item">
                                             <a href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/dashboarduser" data-slug="dashboard"><i class="site-menu-icon wb-dashboard" aria-hidden="true"></i><span class="site-menu-title">Dashboard</span></a></li>
                                    -->


                                    <li id="activeProfile" class="site-menu-item has-sub">
                                        <a href="javascript:void(0)" data-slug="layout">
                                            <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                                            <span class="site-menu-title">Profile</span>
                                            <span class="site-menu-arrow"></span>
                                        </a>
                                        <ul class="site-menu-sub">
                                            <li id="activeViewProfile" class="site-menu-item">
                                                <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/profileuser" data-slug="layout-menu-collapsed">
                                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                                    <span class="site-menu-title">View Profile</span>
                                                </a>
                                            </li>

                                            <!-- <li id="activeMiningOptions" class="site-menu-item">
                                                <a class="animsition-link" href="<?php //_p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__);    ?>/miningoptions" data-slug="layout-menu-collapsed">
                                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                                    <span class="site-menu-title">Mining Info</span>
                                                </a>
                                            </li> -->
                                        </ul>


                                    </li>

                                    <li id="activeRestaurants" class="site-menu-item has-sub">
                                        <a href="javascript:void(0)" data-slug="layout">
                                            <i class="site-menu-icon fas fa-coffee" aria-hidden="true"></i>
                                            <span class="site-menu-title">Restaurants</span>
                                            <span class="site-menu-arrow"></span>
                                        </a>
                                        <ul class="site-menu-sub">
                                            <li id="activeViewRestaurants" class="site-menu-item">
                                                <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/ownerRestaurants" data-slug="layout-menu-collapsed">
                                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                                    <span class="site-menu-title">View Restaurants</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li id="activeProfile" class="site-menu-item has-sub">
                                        <a href="javascript:void(0)" data-slug="layout">
                                            <i class="site-menu-icon fas fa-gift" aria-hidden="true"></i>
                                            <span class="site-menu-title">Offers</span>
                                            <span class="site-menu-arrow"></span>
                                        </a>
                                        <ul class="site-menu-sub">
                                            <li id="activeViewProfile" class="site-menu-item">
                                                <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/OwnerOffers" data-slug="layout-menu-collapsed">
                                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                                    <span class="site-menu-title">View Offers</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>




                                <?php
                            }
                        } else if ($admin) {
                            ?>
                            <ul class="site-menu">
                                <li class="site-menu-category"><span class="label label-primary">Admin</span></li>

                                <!-- <li id="activeDashboardAdmin" class="site-menu-item">
                                      <a href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/dashboardadmin" data-slug="dashboard"><i class="site-menu-icon wb-dashboard" aria-hidden="true"></i><span class="site-menu-title">Dashboard</span></a></li>
                                -->

                                <li id="activeProfileAdmin" class="site-menu-item has-sub">
                                    <a href="javascript:void(0)" data-slug="layout">
                                        <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                                        <span class="site-menu-title">Profile</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li id="activeViewProfileAdmin" class="site-menu-item">
                                            <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/profileadmin" data-slug="layout-menu-collapsed">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">View Profile</span>
                                            </a>
                                        </li>
                                        <!--  <li id="activeKcoinVersion" class="site-menu-item">
                                             <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/kcoinversion" data-slug="layout-menu-collapsed">
                                                 <i class="site-menu-icon " aria-hidden="true"></i>
                                                 <span class="site-menu-title">Kcoin Versions</span>
                                             </a>
                                         </li> -->
                                    </ul>
                                </li>
                                <!--  <li id="activeShops" class="site-menu-item has-sub">
                                      <a href="javascript:void(0)" data-slug="layout">
                                          <i class="site-menu-icon fa-bank" aria-hidden="true"></i>
                                          <span class="site-menu-title">Tiendas</span>
                                          <span class="site-menu-arrow"></span>
                                      </a>
                                      <ul class="site-menu-sub">
                                          <li id="activeViewShops" class="site-menu-item">
                                              <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/shops" data-slug="layout-menu-collapsed">
                                                  <i class="site-menu-icon " aria-hidden="true"></i>
                                                  <span class="site-menu-title">Ver Tiendas</span>
                                              </a>
                                          </li>

                                      </ul>
                                  </li>
                                -->

                                <li id="activeUsers" class="site-menu-item has-sub">
                                    <a href="javascript:void(0)" data-slug="layout">
                                        <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                                        <span class="site-menu-title">Users</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li id="activeViewUsers" class="site-menu-item">
                                            <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/users" data-slug="layout-menu-collapsed">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">View Users</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li id="activeRestaurants" class="site-menu-item has-sub">
                                    <a href="javascript:void(0)" data-slug="layout">
                                        <i class="site-menu-icon fas fa-coffee" aria-hidden="true"></i>
                                        <span class="site-menu-title">Restaurants</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li id="activeViewRestaurants" class="site-menu-item">
                                            <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/restaurants" data-slug="layout-menu-collapsed">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">View Restaurants</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <!--
                                <li id="reportAdmin" class="site-menu-item has-sub">
                                    <a href="javascript:void(0)" data-slug="layout">
                                        <i class="site-menu-icon wb-stats-bars" aria-hidden="true"></i>
                                        <span class="site-menu-title">Reportes</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li id="ventadiaria" class="site-menu-item">
                                            <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/reporteventasdiariasadmin" data-slug="layout-menu-collapsed">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Ventas Diarias</span>
                                            </a>
                                        </li>
                                         <li id="ventamensual" class="site-menu-item">
                                            <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/reporteventasmensualesadmin" data-slug="layout-menu-collapsed">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Ventas Mensuales</span>
                                            </a>
                                        </li>
                                        
                                        <li id="ventaproducto" class="site-menu-item">
                                            <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/reporteventasprooductoadmin" data-slug="layout-menu-collapsed">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Ventas por Producto</span>
                                            </a>
                                        </li>
                                        
                                         <li id="ventaempleado" class="site-menu-item">
                                            <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/reporteventasempleadoadmin" data-slug="layout-menu-collapsed">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Ventas por Empleado</span>
                                            </a>
                                        </li>

                                         <li id="ventatienda" class="site-menu-item">
                                            <a class="animsition-link" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/reporteventastiendaadmin" data-slug="layout-menu-collapsed">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Ventas por Tienda</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                -->
                            </ul>
                            <?php
                        } else {
                            
                        }
                        ?>

                    </div>
                </div>
            </div>

            <div class="site-menubar-footer">
                <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
                   data-original-title="Settings">
                    <span class="icon wb-settings" aria-hidden="true"></span>
                </a>
                <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
                    <span class="icon wb-eye-close" aria-hidden="true"></span>
                </a>
                <a href="javascript: void(0);" data-target="#logOutModal" data-toggle="modal">
                    <span class="icon wb-power" aria-hidden="true"></span>
                </a>
            </div>
        </div>
