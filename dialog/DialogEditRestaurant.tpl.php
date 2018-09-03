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
       
       <?php if($_CONTROL->fromAdmin){ ?>
       
       <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Owner"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->lstOwners->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
       
       <?php } ?>
       
       

        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Country/City"); ?> </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon wb-map" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtCountry->RenderWithError(); ?>
                </div>                     
            </div>
            
             <div class="col-sm-4 unidos">
                <!-- <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-phone" aria-hidden="true"></i>
                    </span> -->
                    <?php $_CONTROL->txtCity->RenderWithError(); ?>
                <!-- </div> -->                    
            </div>
        </div>
         
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Restaurant Name"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtRestaurantName->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
         
         
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Longitude/Latitude"); ?> </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-globe" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtLongitude->RenderWithError(); ?>
                </div>                     
            </div>
            
             <div class="col-sm-4 unidos">
                <!-- <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-phone" aria-hidden="true"></i>
                    </span> -->
                    <?php $_CONTROL->txtLatitude->RenderWithError(); ?>
                <!-- </div> -->                    
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
        
        <?php if($_CONTROL->hasQR == TRUE){?> 
       <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("QR Code"); ?> </label>
            <div class="col-sm-8">
                <img src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/qrimages/' . $_CONTROL->mctRestaurant->objRestaurant->IdRestaurant . '-xs.png')?>" />
            </div>
        </div>
        <?php }?>
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
