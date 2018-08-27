<?php
$strPageTitle = QApplication::Translate('Administrador') . ' - ' . QApplication::Translate('Ver Tiendas');
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

 <link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/vendor/bootstrap-table/bootstrap-table.min.css">
<!-- Page -->
<div class="page">
    <div class="page-header">
        <h1 class="page-title"> <i class="site-menu-icon fa-bank" aria-hidden="true"></i> Tiendas</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Table Add Row -->
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title">Ver Tiendas</h3>
            </header>
            <div class="panel-body" style="min-height:260px;">

                <div class="row">

                    <div id="Found1" style="display:none;" class="vertical-align text-center" >
                        <div class="page-content vertical-align-middle">
                            <header>
                                <div class="animation-slide-top" style="font-size: 65px;margin-right:0px;padding: 0px;color:#ccc;"><i class="icon fa-bank" aria-hidden="true"></i></div>
                                <p   style="font-size: 22px;color: #848484;">No se encontraron tiendas registrados</p>
                            </header>
                            <p class="error-advise animation-slide-left" style="font-size: 12px;">Usted debe registrar un nuevo tienda.</p>
                            <br>
                        </div> 
                    </div>

                    <!-- Example Basic Sort -->
                    <div id="Found2" style="display:none;"  class="example-wrap">
                        <div class="example">
                            <div class="table-responsive">
                                <?php $this->dtgSucursals->Render(); ?>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="site-action" > <?php $this->btnNewSucursal->Render(); ?></div>
                <!-- End Example Basic Sort -->
            </div>
            <!-- End Panel Body -->
        </div>
        <!-- End Panel -->
    </div>
    <!-- End Container -->
</div>
<!-- End Page -->

<?php $this->dlgDialogEditSucursal->Render(); ?>
<?php $this->dlgConfirm->Render(); ?>
<?php $this->RenderEnd(); ?>

<script>
    (function (document, window, $) {
        'use strict';
        $('#activeShops').addClass('active open');
        $('#activeViewShops').addClass('active');
    })(document, window, jQuery);
</script>

<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>



</body>

</html>