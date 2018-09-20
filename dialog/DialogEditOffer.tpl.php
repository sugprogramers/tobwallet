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
       <div class="alertDialogContent"></div>
       
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Restaurant"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->lstRestaurants->RenderWithError(); ?>
                </div>       
            </div>
        </div>
       
       
       
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Description"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtDescription->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
       
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Coins per Person"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtOfferedCoins->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
        
       
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Total Offers"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtMaxOffers->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
       
        <!-- <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Description"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php //$_CONTROL->txtAppliedOfferes->RenderWithError(); ?>
                </div>                     
            </div>
        </div> -->
       
       
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Valid From"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-calendar" aria-hidden="true"></i>
                    </span>
                    <!-- <input type="date" id="txtStartDate" class="form-control input-sm" /> -->
                    <?php $_CONTROL->txtStartDate->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Valid To"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-calendar" aria-hidden="true"></i>
                    </span>
                    <!-- <input type="date" id="txtEndDate" class="form-control input-sm" /> -->
                    <?php $_CONTROL->txtEndDate->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
       
        <!-- <div class="form-group row">
            <label class="col-sm-4 control-label"><?php //_p("Valid From/Valid To"); ?> </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-calendar" aria-hidden="true"></i>
                    </span>
                    <input type="date" id="txtStartDate" class="form-control input-sm" />
                    
                    <?php //$_CONTROL->txtStartDate->RenderWithError(); ?>
                </div>                     
            </div>
             <div class="col-sm-4 unidos">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-phone" aria-hidden="true"></i>
                    </span>
                <input type="date" id="txtEndDate" class="form-control input-sm" />
                    <?php //$_CONTROL->txtEndDate->RenderWithError(); ?>
                </div>               
            </div>-->
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
