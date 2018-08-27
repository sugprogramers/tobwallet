<?php
$strPageTitle = QApplication::Translate('Ventas') . ' - ' . QApplication::Translate('Ver Mis Ventas');
require(__CONFIGURATION__ . '/header.inc.php');
?>
<script>
function printContent(el){
	/*var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;*/
        
        var myWindow=window.open('','','');
        myWindow.document.title = 'Imprimir';
        myWindow.document.write(document.getElementById(el).innerHTML);    
        myWindow.document.close();
        myWindow.focus();
        myWindow.print();
        myWindow.close();

}
</script>

<?php $this->RenderBegin(); ?>
<?php $this->objDefaultWaitIcon->Render(); ?>
<div style="display:none;">
<?php $this->lblTextImprimir->Render(); ?>  
</div>
 

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
        <h1 class="page-title"> <i class="site-menu-icon fa-calculator" aria-hidden="true"></i> Caja</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Table Add Row -->
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title">Ver Mis Cancelaciones</h3>
            </header>
            <div class="panel-body" style="min-height:260px;">
                <div class="row">
                    <div id="Found1" style="display:none;" class="vertical-align text-center" >
                        <div class="page-content vertical-align-middle">
                            <header>
                                <div class="animation-slide-top" style="font-size: 65px;margin-right:0px;padding: 0px;color:#ccc;"><i class="icon fa-calculator" aria-hidden="true"></i></div>
                                <p   style="font-size: 22px;color: #848484;">No se encontraron sus Cancelaciones</p>
                            </header>
                            <p class="error-advise animation-slide-left" style="font-size: 12px;">Usted debe Cancelar una venta.</p>
                            <br>
                        </div>
                    </div>
                    <!-- Example Basic Sort -->
                    <div id="Found2" style="display:none;"  class="example-wrap">
                        <style>
                            .hola1:after {
                                content: "Filtrar";
                            }

                        </style>
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
                                <div class="col-sm-3 form-group">

                                </div>


                            </div>
                        </div>
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
        $('#miscancelaciones').addClass('active');
    })(document, window, jQuery);
</script>

<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>



</body>

</html>