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
            $('#c8').val('gps:' + position.coords.latitude + ';' + position.coords.longitude);//validate dialog qr
            $('#c17').val('gps:' + position.coords.latitude + ';' + position.coords.longitude);// validate dialog photo
            getAddressName(position.coords.latitude, position.coords.longitude);
        });
    } else {
        alert("Browser doesn't support geolocation!");
        console.log("Browser doesn't support geolocation!");
    }
}

function getAddressName(latitude, longitude) {
    console.log("results[1].formatted_address");
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
                $('#c7').val(results[1].formatted_address);//validate dialog qr
                $('#c16').val(results[1].formatted_address);// validate dialog photo
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


var image = document.createElement("img");
var imageoriginal = document.createElement("img");
var img = document.createElement("img");
var altura = 0;
var ancho = 0;
var orientacionBeta = 0;
var orientacionGamma = 0;
function abrecamaramovil() {

    var $canvas = document.getElementById("canvasfoto"),
            $canvasoriginal = document.getElementById("canvasfotooriginal"),
            inputFileImage = document.getElementById('inputfileimagen'),
            imgDefault = document.getElementById('imgphotodefault');


    var resolucionMaxima = 300;
    inputFileImage.addEventListener('change', handleFiles);

    function handleFiles(e) {

//        if (orientacionBeta > orientacionGamma) {
//            alert("parado");
//        } else {
//            alert("hechadito");
//        }

        $canvas.style.display = "block";
        imgDefault.style.display = "none";
        hideDialogAlert();

        var _URL = window.URL || window.webkitURL;
        var ctx = $canvas.getContext('2d');
        var ctxorig = $canvasoriginal.getContext('2d');
//        img = document.createElement("img");
        var imgwidth = 0;
        var imgheight = 0;
        img.src = _URL.createObjectURL(e.target.files[0]);

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

            //GUARDAR IMAGEN ORIGINAL 
            $canvasoriginal.height = imgheight / 2;
            $canvasoriginal.width = imgwidth / 2;
            ctxorig.clearRect(0, 0, 10000, 10000);
            ctxorig.drawImage(img, 0, 0, imgwidth / 2, imgheight / 2);

//          BOTON QUE RESETEA EL ESTILO DE LOS BOTONES  DESDE EL CONTROLADOR
            $('#c15').click();

//            alert(orientacionBeta);
//            alert(orientacionGamma);

            resetValues();
            image.src = $canvas.toDataURL();
            imageoriginal.src = $canvasoriginal.toDataURL();
            alert("acca");
        };

        setTimeout(function () {
//                alert('holasssssssssssssss');
            if (orientacionBeta > orientacionGamma) {
                alert("parado");
            } else {
                alert("hechadito");
            }
        }, 500);
    }



}

function subirFotoAjax() {

    var $canvas = document.getElementById("canvasfotooriginal");
    var $canvaspreview = document.getElementById("canvasfoto");
    var foto = $canvas.toDataURL(); //Esta es la foto, en base 64

    if ($canvaspreview.style.display === "none") {
        showDialogAlert('alert-warning', 'You have not taken any pictures yet!');
    } else {
        showDialogAlert('alert-warning', 'Uploading photo, please wait ...');
        $.ajax({
            url: './guardar_foto.php',
            type: 'POST',
            data: encodeURIComponent(foto),
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function (data) {
                setTimeout(function () {
                    showDialogAlert('alert-success', 'Photo uploaded correctly ... 1/2 !');
                    //para aplicar los estilos al boton desde el controlador
                    $('#c17').val('photo:yes');
                    $('#c14').click();
                    getLocation();
                }, 500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //para aplicar los estilos al boton desde el controlador
                alert(errorThrown);
                $('#c17').val('photo:no');
                $('#c14').click();
                showDialogAlert('alert-danger', 'ERROR! The photo can not be uploaded');
            }
        });
    }
}

function resetValues() {
    degrees = 0;
    primeraves = true;
}

//PARA GIRAR LA IMAGEN
var canvita, contextito, canvaori, contextori, primeraves = true;
var cw, ch, cwori, chori, degrees = 0;

function drawRotated2() {

    if (primeraves) {
        canvita = document.getElementById("canvasfoto");
        contextito = canvita.getContext("2d");
        canvaori = document.getElementById("canvasfotooriginal");
        contextori = canvaori.getContext("2d");
        cw = canvita.width;
        ch = canvita.height;
        cwori = canvaori.width;
        chori = canvaori.height;
        primeraves = false;
    }

    if (degrees === 360) {
        degrees = 0;
    }

    var myImage = new Image();
    var myImageOrigin = new Image();

    if (degrees === 0) {
        myImage.src = image.src;
        myImageOrigin.src = imageoriginal.src;
    } else {
        myImage.src = canvita.toDataURL();
        myImageOrigin.src = canvaori.toDataURL();
    }

    degrees += 90;

    myImage.onload = function () {
// girando imagen preview
        canvita.width = ch;
        canvita.height = cw;
        cw = canvita.width;
        ch = canvita.height;
        contextito.save();
        contextito.translate(cw, ch / cw);
        contextito.rotate(Math.PI / 2);
        contextito.drawImage(myImage, 0, 0);
        contextito.restore();

        myImage = null;
    };

    myImageOrigin.onload = function () {
        // girando imagen original
        canvaori.width = chori;
        canvaori.height = cwori;
        cwori = canvaori.width;
        chori = canvaori.height;
        contextori.save();
        contextori.translate(cwori, chori / cwori);
        contextori.rotate(Math.PI / 2);
        contextori.drawImage(myImageOrigin, 0, 0);
        contextori.restore();

        myImageOrigin = null;
    };
}


// PARA MANIPULAR LA ORIENTACION DEL MOVIL
contador = 0;
$(document).ready(function () {

    if (window.DeviceOrientationEvent) {
        alert('si se puede');
        window.addEventListener("deviceorientation", deviceOrientationListener);
    } else {
        alert('nicagando');
    }

    function deviceOrientationListener(event) {

        contador++;
//        alert(event.alpha);

//        alert(contador);

        orientacionBeta = (event.beta < 0) ? event.beta * -1 : event.beta;
        orientacionGamma = (event.gamma < 0) ? event.gamma * -1 : event.gamma;

        if (contador < 5) {
//            alert(orientacionBeta);

        }



        $('#divmuestra').html(orientacionBeta + "::" + orientacionGamma);



    }

});