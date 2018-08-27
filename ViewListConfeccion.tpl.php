<?php
$strPageTitle = QApplication::Translate('Almacen') . ' - ' . QApplication::Translate('Ver Confecciones');
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
        <h1 class="page-title"> <i class="site-menu-icon fa-cubes" aria-hidden="true"></i> Almacen</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Table Add Row -->
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title">Confeccionar Producto </h3>
            </header>
            <div class="panel-body" style="min-height:260px;">

                <div class="row">

                    <div id="Found1" style="display:none;" class="vertical-align text-center" >
                        <div class="page-content vertical-align-middle">
                            <header>
                                <div class="animation-slide-top" style="font-size: 65px;margin-right:0px;padding: 0px;color:#ccc;"><i class="icon fa-cubes" aria-hidden="true"></i></div>
                                <p   style="font-size: 22px;color: #848484;">No se encontraron confecciones registrados</p>
                            </header>
                            <p class="error-advise animation-slide-left" style="font-size: 12px;">Usted debe registrar un nuevo confeccion.</p>
                            <br>
                        </div>
                    </div>

                    <!-- Example Basic Sort -->
                    <div id="Found2" style="display:none;"  class="example-wrap">
                        <style>
                            .hola1:after {
                                content: "Filtrar por Nombre";
                            }

                        </style>
                        <div class="example example-box hola1">
                            <div class="row">

                                <div class="col-sm-3 form-group">
                                    <?php $this->txtConfeccion->Render(); ?>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <?php $this->txtDateFrom->Render(); ?>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <?php $this->txtDateTo->Render(); ?>
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
                                <?php $this->dtgConfeccionproductos->Render(); ?>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="site-action" > <?php $this->btnNewConfeccion->Render(); ?></div>
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
<?php $this->dlgDialogEdiConfecciones->Render(); ?>
<?php $this->dlgDialogUseMateriaPrima->Render(); ?>
<?php $this->dlgConfirm->Render(); ?>

<?php $this->RenderEnd(); ?>


<script>
    (function (document, window, $) {
        'use strict';
        $('#vendedor').addClass('active open');
        $('#confeccion').addClass('active');
    })(document, window, jQuery);
</script>

<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>



</body>

</html>