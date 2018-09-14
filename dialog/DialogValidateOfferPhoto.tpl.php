<div class="dialog-content">  
    <table class="formTableDialog" cellspacing="5">
<!--        <tr>
            <td>
                <span class="confirm-delete-message"><?php // _p($_CONTROL->txtMessage);                      ?></span>

            </td>
        </tr>-->

        <tr>
            <td>

                <div class="row">

                    <div class="col-md-4">
                        <span id="c12_ctl"><button type="button"  onclick="abrecamaramovil();$('#inputfileimagen').click();" class="btn btn-raised btn-secondary"> 
                                <i class="fas fa-camera" aria-hidden="true"></i> Take Photo </button></span>
                    </div>

                    <div class="col-md-3">
                        <?php $_CONTROL->btnSubeFoto->Render(); ?>
                    </div>

                    <div class="col-md-2">
                        <span id="c14_ctl"><button type="button"  onclick="rotarcanvas();" class="btn btn-raised btn-secondary"> 
                                <i class="fa fa-rotate-left" aria-hidden="true"></i></button></span>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <canvas id="canvasfoto" width="300" height="300"></canvas>

                <canvas id="canvasfotooriginal" width="100%" height="100%" style="display: none"></canvas>

                <input id="inputfileimagen" type="file"  accept="image/*" capture="camera"  style="visibility:hidden" >
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


