<?php
$strPageTitle = QApplication::Translate('Ventas') . ' - ' . QApplication::Translate('Ver Mis Ventas');
require(__CONFIGURATION__ . '/header.inc.php');
?>

<?php $this->RenderBegin(); ?>
<?php $this->objDefaultWaitIcon->Render(); ?>

<!-- Page -->
<div class="page">
    <div class="page-header">
        <h1 class="page-title"> <i class="site-menu-icon fa-calculator" aria-hidden="true"></i> Caja</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Table Add Row -->
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title">Cancelar Producto</h3>
            </header>
            <div class="panel-body" style="min-height:260px;">
                <div class="row">
                    <div id="Found1" style="display:none;" class="vertical-align text-center" >
                        <div class="page-content vertical-align-middle">
                            <header>
                                <div class="animation-slide-top" style="font-size: 65px;margin-right:0px;padding: 0px;color:#ccc;"><i class="icon fa-calculator" aria-hidden="true"></i></div>
                                <p   style="font-size: 22px;color: #848484;">No se encontraron Ventas</p>
                            </header>
                            <p class="error-advise animation-slide-left" style="font-size: 12px;">Usted debe actualizar ventas.</p>
                            <br>
                        </div>
                    </div>
                    <!-- Example Basic Sort -->
                    <div id="Found2" style="display:block;"  class="example-wrap">
                        
                        
                        <div class="example">
                            <div class="table-responsive">
                                <?php $this->dtgVentas->Render(); ?>
                            </div>

                        </div>
                    </div>

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
<?php $this->dlgDialogViewDetalleVenta->Render(); ?>
<?php $this->RenderEnd(); ?>


<script>
    (function (document, window, $) {
        'use strict';
        $('#caja').addClass('active open');
        $('#cancelarproducto').addClass('active');
    })(document, window, jQuery);
</script>

<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>



</body>

</html>