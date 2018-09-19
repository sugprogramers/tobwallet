<style>
    .editHidden{
        z-index:9999 !important;
    }
</style>
<div class="dialog-content">

    <div class="form-horizontal">
 <style>
       @media (min-width: 768px)
       {
           .unidos  {
               padding-left: 0 !important;
           } 
       }
       .form-group {
    margin-bottom: 10px;
}
       </style>
       <div id="alertDialogContent"></div>
       
        <div class="form-group row">
            <label class="col-sm-4 control-label">Actual/Additional </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="far fa-credit-card"></i>
                    </span>
                    <?php $_CONTROL->currentQtyCoins->RenderWithError(); ?>
                </div>                     
            </div>
            <div class="col-sm-4 unidos">
                <?php $_CONTROL->aditionalcoins->RenderWithError(); ?>
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
