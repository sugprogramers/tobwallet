<?php
$strPageTitle = QApplication::Translate('Almacen') . ' - ' . QApplication::Translate('Ver Modelos');
require(__CONFIGURATION__ . '/header.inc.php');
?>

<?php $this->RenderBegin(); ?>

<?php $this->objDefaultWaitIcon->Render(); ?>
<!-- Page -->
<div class="page">
    <div class="page-header">
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Table Add Row -->
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title"> Reportes Ventas por Productos</h3>
            </header>
            <div class="panel-body">
                <style>
                    .hola1:after {
                        content: "Filtrar";
                    }

                    .hola2:after {
                        content: "Reporte";
                    }
                </style>
                <div class="example example-box hola1">
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <?php $this->txtDateFrom->Render(); ?>
                        </div>
                        <div class="col-sm-3 form-group">
                            <?php $this->txtDateEnd->Render(); ?>
                        </div>
                        <div class="col-sm-2 form-group">
                            <?php $this->btnFilter->Render(); ?>
                        </div>
                    </div>
                </div>
                <!-- Example Basic Sort -->
                <div class="example-wrap">
                    <!--  <h4 class="example-title">Basic Sort</h4>
                      <p>se <code>sortName</code>, <code>sortOrder</code>, <code>sortable</code>                  options, and <code>sortable</code>, <code>order</code> column options to set the basic sort of bootstrap table.</p>-->
                    <div class="example">
                        <div class="table-responsive">
                            <div id="table-container">
                                <?php $this->dtgReports->Render(); ?>
                                <div style="float: right;"> <?php $this->lblTotal->Render(); ?>  </div>
                                <div id="bottom_anchor"></div>
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

<?php $this->RenderEnd(); ?>


<script>
    (function (document, window, $) {
        'use strict';
        $('#reportUser').addClass('active open');
        $('#ventaproducto').addClass('active');
    })(document, window, jQuery);
</script>

<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>


</body>

</html>