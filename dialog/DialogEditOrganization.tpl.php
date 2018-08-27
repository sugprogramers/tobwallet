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
        <div class="form-group row">
            <label class="col-sm-4 control-label">Name</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon wb-user" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtName->RenderWithError(); ?>
                </div>                     
            </div>

        </div>

        <div class="form-group row">
            <label class="col-sm-4 control-label">Phone </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-font" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtPhone->RenderWithError(); ?>
                </div>                     
            </div>



        </div>




        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Path Image Qrcode/Organization"); ?> </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon wb-map" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->$txtQrCode->RenderWithError(); ?>
                </div>                     
            </div>

            <div class="col-sm-4 unidos">
                <!-- <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-phone" aria-hidden="true"></i>
                    </span> -->
                <?php $_CONTROL->$txtImageOrganization->RenderWithError(); ?>
                <!-- </div> -->                    
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Latitude"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-phone" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtLatitude->RenderWithError(); ?>
                </div>                     
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Longitude"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-phone" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtLongitude->RenderWithError(); ?>
                </div>                     
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Country"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtCountry->RenderWithError(); ?>
                </div>                     
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("City"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtCity->RenderWithError(); ?>
                </div>                     
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Address"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtAddress->RenderWithError(); ?>
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
