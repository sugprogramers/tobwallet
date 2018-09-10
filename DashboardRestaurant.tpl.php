<?php
    $strPageTitle = QApplication::Translate('Administrator') . ' - ' . QApplication::Translate('View Restaurants');
    require(__CONFIGURATION__ . '/header.inc.php');
?>

<?php $this->RenderBegin(); ?>
<?php $this->objDefaultWaitIcon->Render(); ?>


<script>
    function itemsFound(value) {

        if (value == 1) // 1 = no found
        {
            showFound1();
        } else {
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
        <h1 class="page-title"> <i class="site-menu-icon fas fa-coffee" aria-hidden="true"></i> Restaurants</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Table Add Row -->
        <div class="panel">
            <header class="panel-heading">
            </header>
            <div class="panel-body" style="min-height:260px;">

                <div class="row">

                    <div id="Found1" class="vertical-align text-center" style="display:none">
                        <div class="page-content vertical-align-middle">
                            <header>
                                <div class="animation-slide-top" style="font-size: 65px;margin-right:0px;padding: 0px;color:#ccc;"><i class="fas fa-coffee" aria-hidden="true"></i></div>
                                <p   style="font-size: 22px;color: #848484;">No registered restaurants were found.</p>
                            </header>
                            <p class="error-advise animation-slide-left" style="font-size: 12px;">You must register a new restaurant.</p>
                            <br>
                        </div> 
                    </div>

                    <!-- Example Basic Sort -->
                    <div id="Found2" class="example-wrap" style="display:none">
                        <div class="example">
                            <?php $this->dtgRestaurants->Paginator->Render(); ?>
                        </div>
                        <div class="example">
                            <div class="table-responsive">
                                <?php $this->dtgRestaurants->Render(); ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="site-action" > <?php //$this->btnNewRestaurant->Render(); ?></div>
                <!-- End Example Basic Sort -->
            </div>
            <!-- End Panel Body -->
        </div>
        <!-- End Panel -->
    </div>
    <!-- End Container -->
</div>
<!-- End Page -->

<div class="modal fade modal-3d-slit in" id="ventaModal" aria-hidden="true" aria-labelledby="examplePositionCenter"
     role="dialog" tabindex="-1"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-center">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"  aria-label="Close" data-dismiss="modal" > 
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"><?php _p("Wallet Address"); ?></h4>
            </div>
            <div class="modal-body">
                <h5><?php $this->lblWallet->Render(); ?></h5>
      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal"><i class="icon fa-close" aria-hidden="true"></i> Close </button>
            </div>
        </div>
    </div>
</div>

<?php $this->RenderEnd(); ?>

<script>
    (function (document, window, $) {
        'use strict';
        $('#activeUsers').addClass('active open');
        $('#activeViewUsers').addClass('active');
    })(document, window, jQuery);
</script>

<script>
    function loadoffers(id){
        window.location.href = "<?php _p(__SUBDIRECTORY__) ?>/availableoffer?value="+id;
    }
</script>

<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>

</body>

</html>