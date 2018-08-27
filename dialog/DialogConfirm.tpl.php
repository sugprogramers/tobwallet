<div class="dialog-content">  
    <table class="formTableDialog" cellspacing="10">
        <tr>
            <td>
                <span class="confirm-delete-message"><?php _p($_CONTROL->txtMessage); ?></span>
            </td>
        </tr>
    </table>
</div>
<!-- start ui-dialog-footer -->
<div class="dialog-footer ui-helper-clearfix">
    <div class="dialog-buttons ui-dialog-buttonset">
        <?php $_CONTROL->btnYes->Render(); ?>
        &nbsp;&nbsp;
        <?php $_CONTROL->btnNo->Render(); ?>
    </div>
</div>




