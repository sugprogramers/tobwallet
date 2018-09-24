<div class="dialog-content">  
    <div class="alertDialogContent"></div>

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
                <div id="videoqr" style="display: none">
                    <video id="v" height="120" width="160" autoplay></video>
                </div>
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

<div class="dialog-content">  

    <!--<video id="preview"></video>-->
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
//    function showCamerax() {
//        
//        alert("que pasa");
//        let scanner = new Instascan.Scanner({video: document.getElementById('v')});
//        scanner.addListener('scan', function (content) {
//            alert(content);
//        });
//        Instascan.Camera.getCameras().then(function (cameras) {
//            if (cameras.length > 0) {
//                scanner.start(cameras[0]);
//                alert("iniciando camara");
//            } else {
//                console.error('No cameras found.');
//            }
//        }).catch(function (e) {
//            console.error(e);
//        });
//
//
//    }
</script>


<script type="text/javascript">


//    function hasGetUserMedia() {
//        // Note: Opera builds are unprefixed.
//        return !!(navigator.getUserMedia || navigator.webkitGetUserMedia ||
//                navigator.mozGetUserMedia || navigator.msGetUserMedia);
//    }
//
//    if (hasGetUserMedia()) {
//        // Good to go!
//    } else {
//        alert('getUserMedia() is not supported in your browser');
//    }

//    var player = document.getElementById('preview');
//
//    var handleSuccess = function (stream) {
//        player.srcObject = stream;
//    };
//
//    navigator.webkitGetUserMedia({video: true})
//            .then(handleSuccess);

//    Instascan.Camera.getCameras().then(function (cameras) {
//        if (cameras.length > 0) {
//            scanner.start(cameras[1]);
//        } else {
//            console.error('No cameras found.');
//        }
//    }).catch(function (e) {
//        console.error(e);
//    });


//    let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
//    scanner.addListener('scan', function (content) {
//        alert(content);
//    });
//    Instascan.Camera.getCameras().then(function (cameras) {
//        if (cameras.length > 0) {
//            scanner.start(cameras[1]);
//        } else {
//            console.error('No cameras found.');
//        }
//    }).catch(function (e) {
//        console.error(e);
//    });
</script>

<script>

//if ("geolocation" in navigator){ //check geolocation available 
//    //try to get user current location using getCurrentPosition() method
//    navigator.geolocation.getCurrentPosition(function(position){ 
//            console.log("Found your location nLat : "+position.coords.latitude+" nLang :"+ position.coords.longitude);
//        });
//}else{
//    console.log("Browser doesn't support geolocation!");
//    }
</script>

