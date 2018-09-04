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

//    alert("esperando...");
//
//    scanner.stop();
}

function getLocation() {

    if ("geolocation" in navigator) { //check geolocation available 
        //try to get user current location using getCurrentPosition() method
        navigator.geolocation.getCurrentPosition(function (position) {
            console.log("Found your location nLat : " + position.coords.latitude + " nLang :" + position.coords.longitude);
            alert("Found your location nLat : " + position.coords.latitude + " nLang :" + position.coords.longitude);
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