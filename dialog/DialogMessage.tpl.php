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
            <label class="col-sm-4 control-label">Type</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon wb-user" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->lstType->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
       
        <div class="form-group row">
            <label class="col-sm-4 control-label">Body</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-font" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtBody->RenderWithError(); ?>
                </div>                     
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
