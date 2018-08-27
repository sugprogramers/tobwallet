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
            <label class="col-sm-4 control-label">Email / Password</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon wb-user" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtName->RenderWithError(); ?>
                </div>                     
            </div>
            <div class="col-sm-4 unidos">
                <?php $_CONTROL->txtPassword->RenderWithError(); ?>
            </div>
        </div>


      <!--  <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Password"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-key" aria-hidden="true"></i>
                    </span>
                    
                </div>                     
            </div>
        </div> -->

       
        <div class="form-group row">
            <label class="col-sm-4 control-label">First/Middle/Last Name </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-font" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtFirstname->RenderWithError(); ?>
                </div>                     
            </div>
            
            
            <div class="col-sm-2 unidos">
                 <!-- <div class="input-group">
                  <span class="input-group-addon">
                        <i class="icon wb-text" aria-hidden="true"></i>
                    </span> -->
                    <?php $_CONTROL->txtMiddlename->RenderWithError(); ?>
                <!--</div>  -->                   
            </div>
            
            
             <div class="col-sm-2 unidos" >
                <!-- <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon wb-text" aria-hidden="true"></i>
                    </span>-->
                    <?php $_CONTROL->txtLastname->RenderWithError(); ?>
                <!-- </div> -->                   
            </div>
        </div>




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
            <label class="col-sm-4 control-label"><?php _p("Phone"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-phone" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtPhone->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
        
         <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Year Graduation /Your Cohort"); ?> </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-calendar-check-o" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtYearGraduation->RenderWithError(); ?>
                </div>                     
            </div>
            <div class="col-sm-4 unidos">
                <?php $_CONTROL->txtCohort->RenderWithError(); ?>
            </div>
        </div>
        
        <!--<div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Your Cohort"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-book" aria-hidden="true"></i>
                    </span>
                    
                </div>                     
            </div>
        </div> -->
       
        
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Birthday"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-calendar" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtBirthday->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
        
        
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Status"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->lstStatus->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
       
       <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Plan"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->lstMiningOption->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Wallet Address"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtWalletAddress->RenderWithError(); ?>
                </div>                     
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-4 control-label"><?php _p("Number Master Node"); ?> </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="icon fa-list" aria-hidden="true"></i>
                    </span>
                    <?php $_CONTROL->txtNumberMasterNode->RenderWithError(); ?>
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
