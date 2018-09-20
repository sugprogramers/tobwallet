<div class="dialog-content">  

    <div id="alertDialogContent"></div>

    <table class="formTableDialog" cellspacing="0">
<!--        <tr>
            <td>
                <span class="confirm-delete-message"><?php // _p($_CONTROL->txtMessage);                                                 ?></span>

            </td>
        </tr>-->

        <tr>
            <td>

                <!--                <div class="row">
                
                                    <div class="col-md-4 col-sm-4">
                                        <button type="button"  onclick="abrecamaramovil();$('#inputfileimagen').click();" class="btn btn-raised btn-secondary"> 
                                            <i class="fas fa-camera" aria-hidden="true"></i> Take Photo </button>
                                    </div>
                
                                    <div class="col-md-3 col-sm-4">
                <?php // $_CONTROL->btnSubeFoto->Render(); ?>
                                    </div>
                
                                    <div class="col-md-2 col-sm-4">
                                        <button type="button"  onclick="rotarcanvas2();" class="btn btn-raised btn-secondary"> 
                                            <i class="fa fa-rotate-left" aria-hidden="true"></i></button>
                                    </div>
                
                
                
                
                
                                </div>-->

                <!--                <div class="dialog-buttons ">
                                    <button type="button"  onclick="abrecamaramovil();$('#inputfileimagen').click();" class="btn btn-raised btn-secondary"> 
                                        <i class="fas fa-camera" aria-hidden="true"></i> Take Photo </button>
                
                                    &nbsp;&nbsp;
                
                <?php // $_CONTROL->btnSubeFoto->Render(); ?>
                                    &nbsp;&nbsp;
                                    <button type="button"  onclick="rotarcanvas2();" class="btn btn-raised btn-secondary"> 
                                        <i class="fa fa-rotate-left" aria-hidden="true"></i></button>
                                </div>-->


                <div>
                    <button id="clickme" type="button"  onclick="abrecamaramovil();$('#inputfileimagen').click();" class="btn btn-raised btn-secondary"> 
                        <i class="fas fa-camera" aria-hidden="true"></i> Take Photo </button>
                    &nbsp;&nbsp;
                    <button  
                        onclick="drawRotated2()" type="button" class="btn btn-raised btn-secondary"> 
                        <i class="fa fa-rotate-left" aria-hidden="true"></i></button> 
                    &nbsp;&nbsp;
                    <?php $_CONTROL->btnSubeFoto->Render(); ?>
                </div>


            </td>
        </tr>

        <tr>
            <td>
                <canvas id="canvasfoto" width="300" height="300" style="display: none"></canvas>

                <img  id="imgphotodefault" src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/photoclientoffer/default.png') ?>" width="300" height="300">

                <canvas id="canvasfotooriginal" width="100%" height="100%" style="display: none"></canvas>
                <input id="inputfileimagen" type="file"  accept="image/*" capture="camera"  style="display: none" >
            </td>
        </tr>

        <tr>
            <td>
                <?php $_CONTROL->btnValidarUbicacion->Render(); ?>
            </td>
        </tr>

        <tr>
            <td>
                <?php $_CONTROL->txtCurrentAddress->Render(); ?>
            </td>
        </tr>

        <tr>
            <td>
                <?php $_CONTROL->txtHideText->Render(); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php $_CONTROL->btnHideClick->Render(); ?>
                <?php $_CONTROL->btnHideClickLoadDefault->Render(); ?>
            </td>
        </tr>
    </table>

    <!--<button  type="button" onclick="muestracamera()">Capturaraaa</button>-->

    <?php // $_CONTROL->btnMostrarCamera->Render(); ?>




</div>


<!-- start ui-dialog-footer -->
<div class="dialog-footer ui-helper-clearfix">
    <div class="dialog-buttons ui-dialog-buttonset">
        <?php $_CONTROL->btnYes->Render(); ?>

        &nbsp;&nbsp;
        <?php $_CONTROL->btnNo->Render(); ?>
    </div>
</div>


