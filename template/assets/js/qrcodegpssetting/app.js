function muestracamera() {
    let scanner = new Instascan.Scanner({video: document.getElementById('v')});
    scanner.addListener('scan', function (content) {
        alert('qr:'+content);
        $('#c8').val('qr:'+content);
        $("#c6").click();
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
              $('#c8').val('gps:'+position.coords.latitude+';'+position.coords.longitude);
              $("#c6").click();
        });
    } else {
        console.log("Browser doesn't support geolocation!");
    }
}