<style>
    .editHidden {
        z-index: 9999 !important;
    }
</style>
<div class="dialog-content">
    <div class="form-horizontal">

        <div class="form-group row">
            <label class="col-sm-4 control-label">Nombre </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-font" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtNombre->RenderWithError(); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 control-label">Productos por defecto </label>
            <div class="col-sm-8">
                <?php $_CONTROL->chkProductoDefecto->Render(); ?>
            </div>
        </div>

    </div>
</div>
<!-- start ui-dialog-footer -->
<div class="dialog-footer ui-helper-clearfix">
    <div class="dialog-buttons ui-dialog-buttonset">
        <?php $_CONTROL->btnSave->Render(); ?>
        &nbsp;&nbsp;
        <?php $_CONTROL->btnCancel->Render(); ?>
    </div>
</div>
