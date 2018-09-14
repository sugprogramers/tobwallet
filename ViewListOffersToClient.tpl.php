<?php
$strPageTitle = QApplication::Translate('Available Offers') . ' - ' . QApplication::Translate('Customer');
require(__CONFIGURATION__ . '/header.inc.php');
?>

<?php $this->RenderBegin(); ?>
<?php $this->objDefaultWaitIcon->Render(); ?>


<script>
    function itemsFound(value) {

        if (value == 1) // 1 = no found
        {
            showFound1();
        } else { //2 = yeah data
            showFound2();
        }

    }

    function showFound1() {
        var pnl = document.getElementById('Found2');
        pnl.style.visibility = "hidden";
        pnl.style.display = "none";

        var pnl = document.getElementById('Found1');
        pnl.style.visibility = "visible";
        pnl.style.display = "block";

    }

    function showFound2() {
        var pnl = document.getElementById('Found1');
        pnl.style.visibility = "hidden";
        pnl.style.display = "none";

        var pnl = document.getElementById('Found2');
        pnl.style.visibility = "visible";
        pnl.style.display = "block";

    }
</script>
<!-- Page -->
<div class="page">
    <div class="page-header">
        <h1 class="page-title"><i class="site-menu-icon fa-cubes" aria-hidden="true"></i> Offers</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Table Add Row -->
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title">Available Offers</h3>
            </header>
            <div class="panel-body" style="min-height:260px;">


                <div class="row">

                    <div id="Found1" style="display:none;" class="vertical-align text-center">
                        <div class="page-content vertical-align-middle">
                            <header>
                                <div class="animation-slide-top"
                                     style="font-size: 65px;margin-right:0px;padding: 0px;color:#ccc;"><i
                                        class="icon fa-cubes" aria-hidden="true"></i></div>
                                <p style="font-size: 22px;color: #848484;">No se encontraron ofertas</p>
                            </header>
                            <p class="error-advise animation-slide-left" style="font-size: 12px;">Usted debe registrar
                                una nueva ofertita</p>
                            <br>
                        </div>
                    </div>

                    <!-- Example Basic Sort -->
                    <div id="Found2" style="display:none;" class="example-wrap">

                        <style>
                            .hola1:after {
                                content: "FILTERS";
                            }
                        </style>
                        
                        <div id="alertContent"></div>
                        
                        <div class="example example-box hola1">
                            <div class="row">

                                <div class="col-sm-3 form-group">
                                    <?php $this->txtModelo->Render(); ?>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <?php $this->btnFilter->Render(); ?>
                                </div>
                                <div class="col-sm-3 form-group">

                                </div>
                                <div class="col-sm-2 form-group">

                                </div>


                            </div>
                        </div>


                        <div class="example">
                            <div class="table-responsive">
                                <?php $this->dtgOffersToClient->Render(); ?>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="site-action">
                    <?php // $this->btnNewModelo->Render(); ?>
                </div>


                <!-- End Example Basic Sort -->
            </div>
            <!-- End Panel Body -->
        </div>
        <!-- End Panel -->
    </div>
    <!-- End Container -->
</div>
<!-- End Page -->
<!-- es necesario para mostrar el dialog-->
<?php $this->dlgDialogEditModelo->Render(); ?>
<?php $this->dlgValidateOfferPhoto->Render(); ?>
<!-- es nxxxxxxxxxxxxg-->
<?php $this->dlgConfirm->Render(); ?>
<?php $this->RenderEnd(); ?>

<script>
    (function (document, window, $) {
        'use strict';
        $('#vendedor').addClass('active open');
        $('#productodefecto').addClass('active');

    })(document, window, jQuery);
</script>


<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>



<script>


//    $(document).ready(function () {
//
//        var _URL = window.URL || window.webkitURL;
//
//        alert("1");
//        console.log($('#inputfileimagen'));
//        $('#inputfileimagen').on('change', function () {
//            var file = $(this)[0].files[0];
//
//            alert("1");
//
//            img = new Image();
//            var imgwidth = 0;
//            var imgheight = 0;
//            var maxwidth = 640;
//            var maxheight = 640;
//
//            alert("2");
//
//            console.log("ancho: " + imgwidth + " ; altura: " + imgheight);
//
//            img.src = _URL.createObjectURL(file);
//            img.onload = function () {
//                imgwidth = this.width;
//                imgheight = this.height;
//
////                $("#width").text(imgwidth);
////                $("#height").text(imgheight);
//                console.log("ancho: " + imgwidth + " ; altura: " + imgheight);
//
//
////                if (imgwidth <= maxwidth && imgheight <= maxheight) {
////
////                    var formData = new FormData();
////                    formData.append('fileToUpload', $('#file')[0].files[0]);
////
////                    $.ajax({
////                        url: 'upload_image.php',
////                        type: 'POST',
////                        data: formData,
////                        processData: false,
////                        contentType: false,
////                        dataType: 'json',
////                        success: function (response) {
////                            if (response.status == 1) {
////                                $("#prev_img").attr("src", "upload/" + response.returnText);
////                                $("#prev_img").show();
////                                $("#response").text("Upload successfully");
////                            } else {
////                                $("#response").text(response.returnText);
////                            }
////                        }
////                    });
////                } else {
////                    $("#response").text("Image size must be " + maxwidth + "X" + maxheight);
////                }
//            };
//            img.onerror = function () {
//
//                $("#response").text("not a valid file: " + file.type);
//            };
//
//        });
//    });

</script>
</body>

</html>