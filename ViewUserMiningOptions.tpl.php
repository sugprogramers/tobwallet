<?php
$strPageTitle = QApplication::Translate('Administrator') . ' - ' . QApplication::Translate('View Users');
require(__CONFIGURATION__ . '/header.inc.php');
?>

<?php $this->RenderBegin(); ?>
<?php $this->objDefaultWaitIcon->Render(); ?>





<!-- Page -->
<div class="page">
    <!-- <div class="page-header">
         <h1 class="page-title"> <i class="site-menu-icon wb-users" aria-hidden="true"></i> Users</h1>
     </div> -->
    <div class="page-content container-fluid">
        <!-- Panel Table Add Row -->
        <div class="panel">
            <!-- <header class="panel-heading">
                <h3 class="panel-title">View Users</h3>
            </header> -->
            <div class="panel-body" style="min-height:260px;">

                <div class="row">

                    <div class="col-lg-12 form-group">
                        <blockquote class="blockquote blockquote-success" style="margin-bottom: 0px;">
                            <p>Start Mining From your own PC.</p>
                        </blockquote>
                    </div>

                    <div class="col-lg-12 form-group">
                        <label class="control-label" for="txtLastName"><?php _p("Download Kcoin"); ?></label>
                        <div class="input-group input-group-icon">
                            <?php $this->lblDownload->Render(); ?>            
                        </div>
                    </div>

                    
                    <?php if($this->organization->MiningOption != 0){ ?>  
                     <div class="col-lg-12 form-group">
                     <blockquote class="blockquote blockquote-success" style="margin-bottom: 0px;">
                        <p>Mining within the KcoinPool.</p>
                    </blockquote>
                    </div>
                             
                    <?php  } ?>       
                    
                    <?php if($this->organization->MiningOption == 0){ ?>  
                    <div class="col-lg-12 form-group">
                     <blockquote class="blockquote blockquote-danger" style="margin-bottom: 0px;">
                        <p>Mining within the KcoinPool (Select one to start).</p>
                    </blockquote>
                        <p></p>
                        <p><b>*Note:</b> This is a non-revenue project. The entire purpose of having pool mining is to spread server nodes around the world so we can make our block chain decentralized, faster and more stable. People that support this initiative will be rewarded with kcoins earned by Master nodes.</p>
                    </div>
                     <?php  } ?>   

                    <div class="col-lg-12 form-group">
                        <label class="control-label" for="txtLastName"><?php _p("Wallet Address"); ?></label>

                        <div class="form-inline" >
                            <div class="form-group" style="margin-right: 2px;">
                                <?php $this->txtWalletAddress->Render(); ?>  
                            </div>
                            <div class="form-group" >
                                <?php $this->btnSave->Render(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div class="input-group input-group-icon">
                            <?php $this->lblPlan->Render(); ?>            
                        </div>
                    </div>


                    
                    <?php $this->RenderEnd(); ?>

                    
                    
                    
                    
                    
                    
                    
                     <?php if($this->organization->MiningOption == 0){ ?>  
                               
                     <div class="col-lg-12 form-group">
                         <div style="font-size: 16px;"> Kcoin mining pool is a way for miners to pool their resources together and share their hashing power while splitting the reward equally according to the amount of shares they contributed to solving a block. </div>
                          <?php $usuarioNV = @unserialize($_SESSION['DatosUsuario']); ?>
                         <div class="example-wrap">
                                <div class="example">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="pricing-list text-left">
                                                <div class="pricing-header bg-pink-700">
                                                    <div class="pricing-title">Amateur Miner <!--Light --> </div>
                                                    <div class="pricing-price" style="padding: 0px 30px;">
                                                        <span class="pricing-currency">$</span>
                                                        <span class="pricing-amount">75</span>
                                                        <span class="pricing-period">/ mo</span>
                                                    </div>
                                                   <!-- <p class="padding-horizontal-30 padding-bottom-25">Vestibulum lacinia arcu eget nulla. Class aptent taciti</p>-->
                                                </div>
                                                <ul class="pricing-features">
                                                    <li style="font-size: 16px;">
                                                        If you buy $75 of hashpower and the total haspower in the pool is $500 then you would own 15% of the pool</li>
                                                    <!-- <li>
                                                         <strong>200MB</strong> Max File Size</li>
                                                     <li>
                                                         <strong>2GHZ</strong> CPU</li>
                                                    -->
                                                    <li>
                                                        <strong>*</strong> The distribution of the kcoins will be done daily </li> 
                                                </ul>
                                                <div class="pricing-footer text-center bg-blue-grey-100">
                                                 <!-- <a class="btn btn-primary btn-lg"><i class="icon wb-arrow-right font-size-16 margin-right-15" aria-hidden="true"></i> Add to card</a> -->

                                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                        <input type="hidden" name="cmd" value="_s-xclick">
                                                        <input type='hidden' name='notify_url' value='http://www.kcoinblockchain.com/ipn?iduser=<?php echo $usuarioNV->Email; ?>&plan=1' >
                                                        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
                                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pricing-list text-left">
                                                <div class="pricing-header bg-blue-700">
                                                    <div class="pricing-title">Featherweight Miner <!--Standard--> </div>
                                                    <div class="pricing-price" style="padding: 0px 30px;">
                                                        <span class="pricing-currency">$</span>
                                                        <span class="pricing-amount">100</span>
                                                        <span class="pricing-period">/ mo</span>
                                                    </div>
                                                    <!--<p class="padding-horizontal-30 padding-bottom-25">Vestibulum lacinia arcu eget nulla. Class aptent taciti</p> -->
                                                </div>
                                                <ul class="pricing-features">
                                                    <li style="font-size: 16px;">
                                                        If you buy $100 of hashpower and the total haspower in the pool is $500 then you would own 20% of the pool</li>
                                                    <!-- <li>
                                                         <strong>200MB</strong> Max File Size</li>
                                                     <li>
                                                         <strong>2GHZ</strong> CPU</li>
 
                                                    -->
                                                    <li>
                                                        <strong>*</strong> The distribution of the kcoins will be done daily </li> 
                                                </ul>
                                                <div class="pricing-footer text-center bg-blue-grey-100">

    <!--<a class="btn btn-primary btn-lg"><i class="icon wb-arrow-right font-size-16 margin-right-15" aria-hidden="true"></i> Add to card</a> -->
                                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                        <input type="hidden" name="cmd" value="_s-xclick">
                                                        <input type='hidden' name='notify_url' value='http://www.kcoinblockchain.com/ipn?iduser=<?php echo $usuarioNV->Email; ?>&plan=2' >
                                                        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
                                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pricing-list text-left">
                                                <div class="pricing-header bg-teal-700">
                                                    <div class="pricing-title">Lightweight Miner <!--Power--> </div>
                                                    <div class="pricing-price" style="padding: 0px 30px;">
                                                        <span class="pricing-currency">$</span>
                                                        <span class="pricing-amount">135</span>
                                                        <span class="pricing-period">/ mo</span>
                                                    </div>
                                                    <!--<p class="padding-horizontal-30 padding-bottom-25">Vestibulum lacinia arcu eget nulla. Class aptent taciti</p>-->
                                                </div>
                                                <ul class="pricing-features">
                                                    <li style="font-size: 16px;">
                                                        If you buy $135 of hashpower and the total haspower in the pool is $500 then you would own 27% of the pool</li>
                                                    <!-- <li>
                                                         <strong>200MB</strong> Max File Size</li>
                                                     <li>
                                                         <strong>2GHZ</strong> CPU</li>
 
                                                    -->
                                                    <li>
                                                        <strong>*</strong> The distribution of the kcoins will be done daily </li> 
                                                </ul>
                                                <div class="pricing-footer text-center bg-blue-grey-100">
                                                  <!-- <a class="btn btn-primary btn-lg"><i class="icon wb-arrow-right font-size-16 margin-right-15" aria-hidden="true"></i> Add to card</a> -->
                                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                        <input type="hidden" name="cmd" value="_s-xclick">
                                                        <input type='hidden' name='notify_url' value='http://www.kcoinblockchain.com/ipn?iduser=<?php echo $usuarioNV->Email; ?>&plan=3' >
                                                        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
                                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <div class="pricing-list text-left">
                                                <div class="pricing-header bg-orange-700">
                                                    <div class="pricing-title">Middleweight Miner <!--Super Power--> </div>
                                                    <div class="pricing-price" style="padding: 0px 30px;">
                                                        <span class="pricing-currency">$</span>
                                                        <span class="pricing-amount">170</span>
                                                        <span class="pricing-period">/ mo</span>
                                                    </div>
                                                    <!--<p class="padding-horizontal-30 padding-bottom-25">Vestibulum lacinia arcu eget nulla. Class aptent taciti</p>-->
                                                </div>
                                                <ul class="pricing-features">
                                                    <li style="font-size: 16px;">
                                                        If you buy $170 of hashpower and the total haspower in the pool is $500 then you would own 34% of the pool</li>
                                                    <!-- <li>
                                                         <strong>200MB</strong> Max File Size</li>
                                                     <li>
                                                         <strong>2GHZ</strong> CPU</li>
 
                                                    -->
                                                    <li>
                                                        <strong>*</strong> The distribution of the kcoins will be done daily </li> 
                                                </ul>
                                                <div class="pricing-footer text-center bg-blue-grey-100">
                                                  <!-- <a class="btn btn-primary btn-lg"><i class="icon wb-arrow-right font-size-16 margin-right-15" aria-hidden="true"></i> Add to card</a> -->
                                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                        <input type="hidden" name="cmd" value="_s-xclick">
                                                        <input type='hidden' name='notify_url' value='http://www.kcoinblockchain.com/ipn?iduser=<?php echo $usuarioNV->Email; ?>&plan=4' >
                                                        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
                                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="pricing-list text-left">
                                                <div class="pricing-header bg-cyan-700">
                                                    <div class="pricing-title">Heavyweight Miner <!--Pro Plus--> </div>
                                                    <div class="pricing-price" style="padding: 0px 30px;">
                                                        <span class="pricing-currency">$</span>
                                                        <span class="pricing-amount">310</span>
                                                        <span class="pricing-period">/ mo</span>
                                                    </div>
                                                    <!--<p class="padding-horizontal-30 padding-bottom-25">Vestibulum lacinia arcu eget nulla. Class aptent taciti</p>-->
                                                </div>
                                                <ul class="pricing-features">
                                                    <li style="font-size: 16px;">
                                                        If you buy $310 of hashpower and the total haspower in the pool is $500 then you would own 62% of the pool</li>
                                                    <!-- <li>
                                                         <strong>200MB</strong> Max File Size</li>
                                                     <li>
                                                         <strong>2GHZ</strong> CPU</li>
 
                                                    -->
                                                    <li>
                                                        <strong>*</strong> The distribution of the kcoins will be done daily </li> 
                                                </ul>
                                                <div class="pricing-footer text-center bg-blue-grey-100">
                                                 <!-- <a class="btn btn-primary btn-lg"><i class="icon wb-arrow-right font-size-16 margin-right-15" aria-hidden="true"></i> Add to card</a> -->
                                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                        <input type="hidden" name="cmd" value="_s-xclick">
                                                        <input type='hidden' name='notify_url' value='http://www.kcoinblockchain.com/ipn?iduser=<?php echo $usuarioNV->Email; ?>&plan=5' >
                                                        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
                                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                     </div>
                     <?php  } ?>   
                    
                    
                    
                    
                    
                    
                    
                    




                </div>

                <!-- End Example Basic Sort -->
            </div>
            <!-- End Panel Body -->
        </div>
        <!-- End Panel -->
    </div>
    <!-- End Container -->
</div>
<!-- End Page -->




<script>
    (function (document, window, $) {
        'use strict';
        $('body').addClass('page-profile');
        $('#activeProfile').addClass('active open');
        $('#activeMiningOptions').addClass('active');


    })(document, window, jQuery);
</script>


<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>



</body>

</html>