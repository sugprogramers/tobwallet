<?php
    $strPageTitle = QApplication::Translate('Administrator') . ' - ' . QApplication::Translate('View Users');
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
        <h1 class="page-title"> <i class="site-menu-icon wb-users" aria-hidden="true"></i> Users</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Table Add Row -->
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title">View Users</h3>
            </header>
            <div class="panel-body" style="min-height:260px;">

                <div class="row">

                    <div id="Found1" style="display:none;" class="vertical-align text-center" >
                        <div class="page-content vertical-align-middle">
                            <header>
                                <div class="animation-slide-top" style="font-size: 65px;margin-right:0px;padding: 0px;color:#ccc;"><i class="icon wb-users" aria-hidden="true"></i></div>
                                <p   style="font-size: 22px;color: #848484;">No registered users were found.</p>
                            </header>
                            <p class="error-advise animation-slide-left" style="font-size: 12px;">You must register a new user.</p>
                            <br>
                        </div> 
                    </div>

                    <!-- Example Basic Sort -->
                    <div id="Found2" style="display:none;"  class="example-wrap">
                        <div class="example">
                            <div class="table-responsive">
                                <?php $this->dtgOrganizations->Render(); ?>
                                
                            </div>

                        </div>
                    </div>

                </div>
                <div class="site-action" > <?php $this->btnNewOrganization->Render(); ?></div>
                <!-- End Example Basic Sort -->
            </div>
            <!-- End Panel Body -->
        </div>
        <!-- End Panel -->
    </div>
    <!-- End Container -->
</div>
<!-- End Page -->

<?php $this->dlgDialogEditOrganization->Render(); ?>
<?php //$this->dlgDialogPermit->Render(); ?>
<?php $this->dlgConfirm->Render(); ?>
<?php $this->RenderEnd(); ?>



<script>
    (function (document, window, $) {
        'use strict';
        $('#activeProfileAdmin').addClass('active open');
        $('#activeKcoinVersion').addClass('active');
    })(document, window, jQuery);
</script>

<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>



</body>

</html>