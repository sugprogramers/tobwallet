
<?php
$strPageTitle = QApplication::Translate('User') . ' - ' . QApplication::Translate('View Profile');
require(__CONFIGURATION__ . '/header.inc.php');
?>
<?php $this->RenderBegin(); ?>
<?php $this->objDefaultWaitIcon->Render(); ?>
<!-- Inline -->
<link rel="stylesheet" href="<?php _p(__VIRTUAL_DIRECTORY__); ?>template/assets/examples/css/pages/profile.css">
<!-- Page -->
<div class="page animsition">
    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-md-3">
                <!-- Page Widget -->
                <div class="widget widget-shadow text-center">
                    <div class="widget-header">
                        <div class="widget-header-content">
                            <a class="avatar avatar-lg" href="javascript:void(0)">
                                <img src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__); ?>/template/assets/images/ic_profile.png" alt="...">
                            </a>
                            <h4 class="profile-user"><?php echo $this->user->FirstName . " " . $this->user->LastName; ?></h4>
                            <p class="profile-job">User</p>
                            <p>You are a user that has the necessary permissions as assigned by the administrator.</p>
                            <div class="profile-social">
                                <a class="icon bd-twitter" href="javascript:void(0)"></a>
                                <a class="icon bd-facebook" href="javascript:void(0)"></a>
                                <a class="icon bd-dribbble" href="javascript:void(0)"></a>
                                <a class="icon bd-github" href="javascript:void(0)"></a>
                            </div>
                            <button type="button" class="btn btn-primary">Profile</button>
                        </div>
                    </div>
                    <div class="widget-footer">
                        <div class="row no-space">
                            <div class="col-xs-4">
                                <strong class="profile-stat-count">260</strong>
                                <span>Follower</span>
                            </div>
                            <div class="col-xs-4">
                                <strong class="profile-stat-count">180</strong>
                                <span>Following</span>
                            </div>
                            <div class="col-xs-4">
                                <strong class="profile-stat-count">2000</strong>
                                <span>Tweets</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Widget -->
            </div>

            <div class="col-md-9">    


                <!-- Panel -->
                <div class="panel">
                    <div class="panel-body nav-tabs-animate">
                        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation"><a data-toggle="tab" href="#personal-info" aria-controls="personal-info" role="tab"><?php _p("Personal Information"); ?></a></li>
                            <li role="presentation"><a data-toggle="tab" href="#user-info" aria-controls="user-info" role="tab"><?php _p("Change Password"); ?></a></li>
                            <!-- <li role="presentation"><a data-toggle="tab" href="#more-info" aria-controls="user-info" role="tab"><?php _p("Token Mining"); ?></a></li>
                           -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active  animation-slide-left" id="personal-info" role="tabpanel">
                                <div class="row margin-top-20">
                                    <div class="col-lg-8 form-group">
                                        <label class="control-label" for="txtEmail">Email</label>
                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon wb-user" aria-hidden="true"></span>
                                            </span>
                                            <?php $this->txtEmail->Render(); ?>    
                                        </div>
                                    </div>
                                    <div class="col-sm-8 form-group ">
                                        <label class="control-label" for="txtFirstName">First Name</label>


                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon fa-font" aria-hidden="true"></span>
                                            </span>
                                            <?php $this->txtFirstName->Render(); ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 form-group">
                                        <label class="control-label" for="txtAddress"><?php _p("Middle Name"); ?></label>

                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon fa-text-width" aria-hidden="true"></span>
                                            </span>
                                            <?php $this->txtMiddleName->Render(); ?>
                                        </div>

                                    </div>


                                    <div class="col-lg-8 form-group">
                                        <label class="control-label" for="txtLastName">Last Name</label>



                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon wb-text" aria-hidden="true"></span>
                                            </span>
                                            <?php $this->txtLastName->Render(); ?>
                                        </div>

                                    </div>


                                    <div class="col-lg-8 form-group">
                                        <label class="control-label" for="txtPhone"><?php _p("Phone"); ?></label>

                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon fa-phone" aria-hidden="true"></span>
                                            </span>
                                            <?php $this->txtPhone->Render(); ?>
                                        </div>


                                    </div>




                                    <div class="col-lg-12 form-group pull-right">
                                        <?php $this->btnSave->Render(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane animation-slide-left" id="user-info" role="tabpanel">
                                <div class="row margin-top-20">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 form-group">
                                                <label class="control-label" for="txtLastName"><?php _p("Old Password"); ?></label>

                                                <div class="input-group input-group-icon">
                                                    <span class="input-group-addon">
                                                        <span class="icon wb-lock" aria-hidden="true"></span>
                                                    </span>
                                                    <?php $this->txtPassword->Render(); ?>  
                                                </div>


                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <label class="control-label" for="txtLastName"><?php _p("New Password"); ?></label>
                                                <div class="input-group input-group-icon">
                                                    <span class="input-group-addon">
                                                        <span class="icon fa-key" aria-hidden="true"></span>
                                                    </span>
                                                    <?php $this->txtNewPassword->Render(); ?>  
                                                </div>

                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <label class="control-label" for="txtLastName"><?php _p("Repeat Password"); ?></label>

                                                <div class="input-group input-group-icon">
                                                    <span class="input-group-addon">
                                                        <span class="icon fa-key" aria-hidden="true"></span>
                                                    </span>
                                                    <?php $this->txtRepeatPassword->Render(); ?>  
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 form-group pull-right">
                                        <?php $this->btnSavePass->Render(); ?>
                                    </div>
                                </div>
                            </div>



<!--

                            <div class="tab-pane active  animation-slide-left" id="more-info" role="tabpanel">
                                <div class="row margin-top-20">
                                    <div class="col-lg-8">
                                        <div class="row">

                                            <div class="col-lg-12 form-group">
                                                <label class="control-label" for="txtLastName"><?php _p("Mac"); ?></label>

                                                <div class="input-group input-group-icon">
                                                    <span class="input-group-addon">
                                                        <span class="icon fa-laptop" aria-hidden="true"></span>
                                                    </span>
                                                    <?php //$this->txtMac->Render(); ?>  
                                                </div>

                                            </div>

                                            <div class="col-lg-12 form-group">
                                                <label class="control-label" for="txtLastName"><?php _p("Token for Mac"); ?></label>

                                                <div class="input-group input-group-icon">
                                                    <span class="input-group-addon">
                                                        <span class="icon fa-key" aria-hidden="true"></span>
                                                    </span>

                                                    <?php //$this->txtTokenMac->Render(); ?>  
                                                </div>

                                            </div>

                                            <div class="col-lg-12 form-group">
                                                <label class="control-label" for="txtLastName"><?php _p("Status Token"); ?></label>
                                                <div class="input-group input-group-icon">
                                                    <?php //$this->lblStatusTokenMac->Render(); ?>  
                                                </div>


                                            </div>




                                        </div>
                                    </div>

                                </div>

                            </div>

                           -->

                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<?php $this->RenderEnd(); ?>
<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>


<script>
    (function (document, window, $) {
        'use strict';
        $('body').addClass('page-profile');
        $('#activeProfile').addClass('active open');
        $('#activeViewProfile').addClass('active');


    })(document, window, jQuery);
</script>


</body>

</html>