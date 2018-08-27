<div class="dialog-content">
    <table class="formTableDialog" cellspacing="10">
        <tr>
            <td>
            <td><center><?php $_CONTROL->UploadFile->RenderWithError(); ?></center>   </td>
            </td>
        </tr>
    </table>
</div>
<!-- start ui-dialog-footer -->
<div class="dialog-footer ui-helper-clearfix">
    <div class="dialog-buttons ui-dialog-buttonset">
        <?php $_CONTROL->btnUploadFile->Render(); ?>
        &nbsp;&nbsp;
        <?php $_CONTROL->btnCancelUpload->Render(); ?>
    </div>
</div>