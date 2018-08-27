<style>
    .editHidden{
        z-index:9999 !important;
    }
</style>
<div class="dialog-content">
    <div class="form-horizontal">

        <div class="row  form-group">



            <style>
                .hola1:after {                   
                    content: "Agregar Materia Prima";

                }
               
            </style>
            
            
            <div class="col-sm-12"> 
            <div class="example example-box hola1" >

                <div class="row">

                    <div class="col-sm-6 ">
                        
                        <?php $_CONTROL->lstMateria->Render(); ?>
                    </div>
                    <div class="col-sm-4 ">
                        
                        <?php $_CONTROL->txtCantidad->Render(); ?>
                    </div>
                    <div class="col-sm-2 ">
                        &nbsp;
                       <?php $_CONTROL->btnAdd->Render(); ?>                   
                    </div>
                </div>
            
                
            </div>
            </div>

            <div class="col-sm-12" style="min-height:260px;max-height:260px;overflow-y: auto;">              
                <?php $_CONTROL->dtgMateriaprimausadas->Render(); ?>
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
