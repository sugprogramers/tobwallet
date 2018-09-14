function muestracamera() {
    $("#videoqr").show();
    vid = document.getElementById('v');
    let scanner = new Instascan.Scanner({video: vid});
    scanner.addListener('scan', function (content) {
//        alert('qr:' + content);
        $('#c8').val('qr:' + content);//input oculto
        $("#c6").click();//boton oculto 
        scanner.stop();
        $("#videoqr").hide();
    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[1]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });


}

function getLocation() {

    if ("geolocation" in navigator) { //check geolocation available 
        //try to get user current location using getCurrentPosition() method
        navigator.geolocation.getCurrentPosition(function (position) {
            console.log("Found your location nLat : " + position.coords.latitude + " nLang :" + position.coords.longitude);
            $('#c8').val('gps:' + position.coords.latitude + ';' + position.coords.longitude);
//            $("#c6").click();
            getAddressName(position.coords.latitude, position.coords.longitude);
        });
    } else {

        alert("Browser doesn't support geolocation!");
        console.log("Browser doesn't support geolocation!");
    }
}

function getAddressName(latitude, longitude) {
    console.log("results[1].formatted_address");
//    alert(latitude + "," + longitude);
    var geocoder = new google.maps.Geocoder;
    var latlng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};

    geocoder.geocode({
        'location': latlng
    }, function (results, status) {
        // si la solicitud fue exitosa
        if (status === google.maps.GeocoderStatus.OK) {
            // si encontró algún resultado.
            if (results[1]) {
                console.log(results[1].formatted_address);
                $('#c7').val(results[1].formatted_address);
            }
        }

    });
}


function ImagetoPrint(source) {
    return "<html><head><script>function step1(){\n" +
            "setTimeout('step2()', 10);}\n" +
            "function step2(){window.print();window.close()}\n" +
            "</scri" + "pt></head><body onload='step1()'>\n" +
            "<img src='" + source + "' /></body></html>";
}
function printQrImage(source) {
    Pagelink = "";
    var pwa = window.open(Pagelink, "_new");
    pwa.document.open();
    pwa.document.write(ImagetoPrint(source));
    pwa.document.close();
}

function downloadFile(nombre, ruta) {

    var source = ruta;
    var a = document.createElement('a');
    a.download = nombre;
    a.target = '_blank';
    a.href = source;

    a.click();

}


// PARA MANEJAR LA CAPTURA DE LA FOTO

function abrecamaramovil() {

    var $canvas = document.getElementById("canvasfoto"),
            $canvasoriginal = document.getElementById("canvasfotooriginal"),
            inputFileImage = document.getElementById('inputfileimagen');

    var resolucionMaxima = 300;
    inputFileImage.addEventListener('change', handleFiles);

    function handleFiles(e) {

        var _URL = window.URL || window.webkitURL;
        var ctx = $canvas.getContext('2d');
        var ctxorig = $canvasoriginal.getContext('2d');
        img = document.createElement("img");
        var imgwidth = 0;
        var imgheight = 0;
        img.src = _URL.createObjectURL(e.target.files[0]);
//        alert('This file size is: ' + e.target.files[0].size / 1024 / 1024 + "MB");

        img.onload = function () {

            imgwidth = this.width;
            imgheight = this.height;

//          REESCALANDO:
            var escala = 0;
            if (imgwidth > imgheight) {
                escala = imgwidth / resolucionMaxima;
            } else {
                escala = imgheight / resolucionMaxima;
            }

            var alturaEscala = imgheight / escala;
            var anchoEscala = imgwidth / escala;


            $canvas.height = alturaEscala;
            $canvas.width = anchoEscala;
            ctx.clearRect(0, 0, 300, 300);
            ctx.drawImage(img, 0, 0, Math.round(anchoEscala), Math.round(alturaEscala));

            console.log("ancho: " + imgwidth + " ; altura: " + imgheight);
            console.log("ancho escala: " + anchoEscala + " ; altura escala: " + alturaEscala);

            //GUARDAR IMAGEN ORIGINAL 
            $canvasoriginal.height = imgheight;
            $canvasoriginal.width = imgwidth;
            ctxorig.clearRect(0, 0, 10000, 10000);
            ctxorig.drawImage(img, 0, 0, imgwidth, imgheight);
        };
    }
}

function subirFoto() {

    var $canvas = document.getElementById("canvasfoto");
    var foto = $canvas.toDataURL(); //Esta es la foto, en base 64
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./guardar_foto.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(encodeURIComponent(foto)); //Codificar y enviar

    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {

            alert("se envio correctamente");
            console.log("La foto fue enviada correctamente");
            console.log(xhr);
        }
    };
}


function rotarcanvas() {

    var canvas = document.getElementById("canvasfoto");
    var canvasoriginal = document.getElementById("canvasfotooriginal");

    var $ctxcanvas = canvas.getContext('2d');
    var $ctxcanvasoriginal = canvasoriginal.getContext('2d');
    $ctxcanvas.rotate(90 * Math.PI / 180);
    $ctxcanvasoriginal.rotate(90 * Math.PI / 180);


    $ctxcanvas.clearRect(0, 0, canvas.width, canvas.height);

    // save the unrotated context of the canvas so we can restore it later
    // the alternative is to untranslate & unrotate after drawing
    $ctxcanvas.save();

    // move to the center of the canvas
    $ctxcanvas.translate(canvas.width / 2, canvas.height / 2);

    // rotate the canvas to the specified degrees
    $ctxcanvas.rotate(90 * Math.PI / 180);

    // draw the image
    // since the context is rotated, the image will be rotated also
    $ctxcanvas.drawImage(image, -image.width / 2, -image.width / 2);

    // we’re done with the rotating so restore the unrotated context
    $ctxcanvas.restore();


}
