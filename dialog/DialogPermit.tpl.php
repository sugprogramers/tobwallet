<div class="dialog-content">

    <div class="form-horizontal">

        <div class="form-group row">
            <label class="col-sm-8 control-label">Permiso Cajero</label>
            <div class="col-sm-4">
                    <?php $_CONTROL->chkPermisoCajero->Render(); ?>
            </div>
        </div>
        
         <div class="form-group row">
            <label class="col-sm-8 control-label">Permiso Vendedor</label>
            <div class="col-sm-4">
                    <?php $_CONTROL->chkPermisoVendedor->Render(); ?>
            </div>
        </div>
        
         <div class="form-group row">
            <label class="col-sm-8 control-label">Permiso Almacen</label>
            <div class="col-sm-4">
                    <?php $_CONTROL->chkPermisoAlmacen->Render(); ?>
            </div>
        </div>
        
         <div class="form-group row">
            <label class="col-sm-8 control-label">Permiso Despacho</label>
            <div class="col-sm-4">
                    <?php $_CONTROL->chkPermisoDespacho->Render(); ?>
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
