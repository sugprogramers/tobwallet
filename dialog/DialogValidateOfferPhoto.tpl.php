<div class="dialog-content">  
    <table class="formTableDialog" cellspacing="10">
        <tr>
            <td>
                <span class="confirm-delete-message"><?php _p($_CONTROL->txtMessage); ?></span>

            </td>
        </tr>

        <tr>
            <td>
                <?php $_CONTROL->btnValidarQr->Render(); ?>
            </td>
        </tr>

        <tr>
            <td>
                <video id="video"></video>
                <br>
                <button id="boton">Tomar foto</button>
                <p id="estado"></p>
                <canvas id="canvas" style=""></canvas>
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


