<style>
    .editHidden{
        z-index:9999 !important;
    }
</style>
<div class="dialog-content">
    <div class="form-horizontal">

        <div class="row  form-group">


            <div class="col-sm-12" style="min-height:260px;max-height:260px;overflow-y: auto;">              
                <?php $_CONTROL->dtgVentaproductos->Render(); ?>
            </div>  



        </div>

    </div>
</div>
<!-- start ui-dialog-footer -->
<div class="dialog-footer ui-helper-clearfix">
    <div class="dialog-buttons ui-dialog-buttonset">
        <?php //$_CONTROL->btnSave->Render(); ?>
        &nbsp;&nbsp;
        <?php $_CONTROL->btnCancel->Render(); ?>
    </div>
</div>
