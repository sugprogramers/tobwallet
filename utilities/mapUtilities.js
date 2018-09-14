function initMap2(){
    var objectMap = this;
    
    this.mapContent;
    this.objMap;
    this.objMarker;
    
    this.setMapContent = function(content){
        this.mapContent = content;
    };
    
    this.Latitude;
    this.Longitude;
    this.zoom = 15;
    
    this.successMap = function(position){
        console.log('Success');
        this.Latitude = position.coords.latitude;
        this.Longitude = position.coords.longitude;
    };
    
    this.errorMap = function(error){
        console.log('Error');
    };
    
    this.currentMap = function(){
        
        if(navigator.geolocation){
            console.log('Geolocation is supported!');
            /* if geolocation, get current location */
            navigator.geolocation.getCurrentPosition(this.successMap, this.errorMap);
            
        }else{
            console.log('Geolocation is not supported for this Browser/OS.');
        }
        
    };
    
    this.createMap = function(){
        var myLatLng = {lat:this.Latitude, lng: this.Longitude};
        this.objMap = new google.maps.Map(this.mapContent, {
            zoom: this.zoom,
            center: myLatLng
        })
        
    };
    
    this.createMarker = function(){
        var markerconfig = {
            map: this.objMap,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: this.Latitude, lng: this.Longitude}
            
        };
        this.objMarker = new google.maps.Marker(markerconfig);
    };
    
    google.maps.event.addListener(this.objMarker, 'drag', function(ev){
        this.Latitude = ev.latLng.lat();
        this.Longitude = ev.latLng.lng();
    });
    
    google.maps.event.addListener(this.objMap, 'click', function(ev){
        this.Latitude = ev.latLng.lat();
        this.Longitude = ev.latLng.lng();
        
        this.createMarker();
    });
}



/*functions*/

function createMap(objContent, objLatLng){
    
    
    
    
    
    this.createMap = function(){
        var myLatLng = {lat:this.Latitude, lng: this.Longitude};
        this.objMap = new google.maps.Map(this.mapContent, {
            zoom: this.zoom,
            center: myLatLng
        })
        
    };
    
}


function createMarker(objMap, objLatLng){
    var objConfig = {
        map: objMap,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: {lat: objLatLng.Latitude, lng: objLatLng.Longitude}
    };
    
    var objMarker = new google.maps.Marker(objConfig);
    
    return objMarker;
}


function addClickEvent(objMap){
    var objLatLng;
    google.maps.event.addListener(objMap, 'click', function(ev){
        objLatLng = {
            Latitude: ev.latLng.lat(),
            Longitude: ev.latLng.lng()
        };
    });
    return objLatLng;
}

function addDragEvent(objMarker){
    var objLatLng;
    google.maps.event.addListener(objMarker, 'drag', function(ev){
        objLatLng = {
            Latitude: ev.latLng.lat(),
            Longitude: ev.latLng.lng()
        };
    });
    return objLatLng;
}

