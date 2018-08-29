<div class="dialog-content">  
    <table class="formTableDialog" cellspacing="10">
        <tr>
            <td>
                <span class="confirm-delete-message"><?php _p($_CONTROL->txtMessage); ?></span>

            </td>
        </tr>
    </table>

    <div class="col-md-12">
        <h2>QR Code</h2>
        <div id="reader" style="width:300px;height:250px">
        </div>
        <h6>Result</h6>
        <span id="read" class="center"></span>
        <br>
    </div>
</div>
<!-- start ui-dialog-footer -->
<div class="dialog-footer ui-helper-clearfix">
    <div class="dialog-buttons ui-dialog-buttonset">
        <?php $_CONTROL->btnYes->Render(); ?>
        &nbsp;&nbsp;
        <?php $_CONTROL->btnNo->Render(); ?>
    </div>
</div>


<script>

//    $('#reader').html5_qrcode(function (data) {
//        alert(data);
//    },
//            function (error) {
//                console.log(error);
//            }, function (videoError) {
//        console.log(videoError);
//    }
//    );
</script>

