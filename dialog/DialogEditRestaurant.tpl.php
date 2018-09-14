<style>
    .editHidden{
        z-index:9999 !important;
    }
    
    #map{
        /*position: relative;*/
        width:100%;
        height: 300px;
    }
    
</style>
<div class="dialog-content">

    <div class="form-horizontal">
 <style>
       @media (min-width: 768px)
       {
           .unidos  {
               padding-left: 0 !important;
           } 
       }
       .form-group {
    margin-bottom: 10px;
}
</style>
<div id="alertDialogContent"></div>
    
        <div class="example-wrap">
            <div class="nav-tabs-vertical">
                <ul class="nav nav-tabs margin-right-25" data-plugin="nav-tabs" role="tablist">
                    <li class="active" role="presentation"><a data-toggle="tab" href="#exampleTabsLeftOne" aria-controls="exampleTabsLeftOne"
                      role="tab">General</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#exampleTabsLeftTwo" aria-controls="exampleTabsLeftTwo"
                      role="tab">Location</a></li>
                      
                    <?php if($_CONTROL->hasQR == TRUE){ ?>
                    <li role="presentation"><a data-toggle="tab" href="#exampleTabsLeftThree" aria-controls="exampleTabsLeftThree"
                      role="tab">QR Code</a></li>
                    <?php }?>
                    
                    <?php if($_CONTROL->txtUploadPhoto != ''){ ?>
                    <li role="presentation"><a data-toggle="tab" href="#exampleTabsLeftFour" aria-controls="exampleTabsLeftFour"
                      role="tab">Logo</a></li>
                    <?php }?>
                    
                </ul>
                  <div class="tab-content padding-vertical-15">
                    <div class="tab-pane active" id="exampleTabsLeftOne" role="tabpanel">
                        <?php if($_CONTROL->fromAdmin){ ?>
       
                        <div class="form-group row">
                             <label class="col-sm-4 control-label"><?php _p("Owner"); ?> </label>
                             <div class="col-sm-8">
                                 <div class="input-group">
                                     <span class="input-group-addon">
                                         <i class="icon fa-list" aria-hidden="true"></i>
                                     </span>
                                     <?php $_CONTROL->lstOwners->RenderWithError(); ?>
                                 </div>                     
                             </div>
                        </div>

                        <?php } ?>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 control-label"><?php _p("Country/City"); ?> </label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon wb-map" aria-hidden="true"></i>
                                    </span>
                                    <?php $_CONTROL->txtCountry->RenderWithError(); ?>
                                </div>                     
                            </div>

                             <div class="col-sm-4 unidos">
                                <!-- <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon fa-phone" aria-hidden="true"></i>
                                    </span> -->
                                    <?php $_CONTROL->txtCity->RenderWithError(); ?>
                                <!-- </div> -->                    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label"><?php _p("Restaurant Name"); ?> </label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon fa-list" aria-hidden="true"></i>
                                    </span>
                                    <?php $_CONTROL->txtRestaurantName->RenderWithError(); ?>
                                </div>                     
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label"><?php _p("Address"); ?> </label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon fa-list" aria-hidden="true"></i>
                                    </span>
                                    <?php $_CONTROL->txtAddress->RenderWithError(); ?>
                                </div>                     
                            </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <div class="col-sm-4">
                                <div style="position:relative;">
                                    <a class='btn btn-default btn-outline'  href='javascript:;'>
                                        Upload Photo
                                        <?php $_CONTROL->txtUploadPhoto->RenderWithError(); ?>
                                        <div style="display: none">
                                            <?php $_CONTROL->txtUpload->RenderWithError() ?>
                                        </div>
                                    </a>
                                    <span class='label label-default label-outline' id="upload-file-info2"></span>
                                </div>
                            </div>
                                
                        </div>
                        
                    </div>
                    <div class="tab-pane" id="exampleTabsLeftTwo" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-4 control-label"><?php _p("Latitude/Longitude"); ?> </label>
                            <div class="col-sm-4 unidos">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-globe" aria-hidden="true"></i>
                                    </span>
                                    <?php $_CONTROL->txtLatitude->RenderWithError(); ?>
                                </div>                     
                            </div>

                             <div class="col-sm-4">
                                <!-- <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon fa-phone" aria-hidden="true"></i>
                                    </span> -->
                                    <?php $_CONTROL->txtLongitude->RenderWithError(); ?>
                                <!-- </div> -->                    
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div id="map"></div>
                            </div>
                        </div>
                        
                        <div class="form-group row" style="display: none">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-4">
                                <input type="hidden" id="txthidlat"/>
                            </div>

                             <div class="col-sm-4 unidos">
                                 <input type="hidden" id="txthidlng"/>
                            </div>
                        </div>

                       
                    </div>
                      
                    <?php if($_CONTROL->hasQR == TRUE){?>
                    <div class="tab-pane" id="exampleTabsLeftThree" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-4 control-label"><?php _p("QR Code"); ?> </label>
                            <div class="col-sm-8">
                                <img src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/qrimages/' . $_CONTROL->mctRestaurant->objRestaurant->IdRestaurant . '-xs.png')?>" />
                            </div>
                        </div>
                    </div>
                    <?php }?>
                      
                    <?php if( $_CONTROL->txtUploadPhoto != ''){?>
                    <div class="tab-pane" id="exampleTabsLeftFour" role="tabpanel">
                        <div class="form-group row">
                            <div class="col-sm-12" style="height: 250px">
                                <img src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/upload/' . $_CONTROL->mctRestaurant->objRestaurant->Logo)?>" style="max-height: 100%;max-width: 100%" />
                            </div>
                        </div>
                    </div>
                    <?php }?>
                  </div>
                </div>
              </div>
    </div>

</div>
<!-- start ui-dialog-footer -->
<div class="dialog-footer ui-helper-clearfix">
    <div class="dialog-buttons ui-dialog-buttonset">
        <?php $_CONTROL->btnSave->RenderWithError(); ?>
        &nbsp;&nbsp;
        <?php $_CONTROL->btnCancel->Render(); ?>
    </div>
</div>


<script>
    function initLatLng(){
        if (navigator.geolocation) {
            console.log('Geolocation is supported!');
            navigator.geolocation.getCurrentPosition(function(position){
                document.getElementById('txthidlat').value = position.coords.latitude;
                document.getElementById('txthidlng').value = position.coords.longitude;

                document.getElementById('c8').value = position.coords.latitude;
                document.getElementById('c7').value = position.coords.longitude;
                
            }, function(error){
                alert("no es posible obtener su ubicacion");
            });
        }else {
            console.log('Geolocation is not supported for this Browser/OS.');
        }
    }
    
    function geoSuccess(position){
        console.log("ubicacion exitosa");
            startPos = position;
            
            document.getElementById('txthidlat').value = startPos.coords.latitude;
            document.getElementById('txthidlng').value = startPos.coords.longitude;
            
            document.getElementById('c8').value = startPos.coords.latitude;
            document.getElementById('c7').value = startPos.coords.longitude;
            
            console.log('posicion inicial');
            console.log(document.getElementById('txthidlat').value);
            console.log(document.getElementById('txthidlng').value);
            
            updateMap();
    }
    function geoError(error){
        alert("no es posible obtener su ubicacion");
    }
    
    function createMap() {
        /* prueba: clases js */
        var content = document.getElementById('map');
        
        var ownerMap = initMap2();
        ownerMap.setMapContent(content);
        ownerMap.currentMap();
        
        if(ownerMap){
            alert('ok');
        }else{
            alert('error');
        }
        
        return;
        
        
        if (navigator.geolocation) {
            console.log('Geolocation is supported!');
            navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
        }else {
            console.log('Geolocation is not supported for this Browser/OS.');
        }
        updateMap();
    }
    function loadMap(lat,lng) {
        document.getElementById('txthidlat').value = lat;
        document.getElementById('txthidlng').value = lng;
        updateMap();
    }
    
    function updateMap(){
        
        var latitude= Number(document.getElementById('txthidlat').value);
        var longitude= Number(document.getElementById('txthidlng').value);
        
        console.log('se va a actualizar el mapa');
        console.log(latitude);
        console.log(longitude);
        
        var divmap = document.getElementById('map')
        var myLatLng = {lat:latitude, lng: longitude};
        var map = new google.maps.Map(divmap, {
            zoom: 15,
            center: myLatLng
        });
        
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: latitude, lng: longitude}
          });
          
        google.maps.event.addListener(marker, 'drag', function(evet){
            //console.log(evet.latLng.lat() + ' ' + evet.latLng.lng());
            document.getElementById('c8').value = evet.latLng.lat();
            document.getElementById('c7').value = evet.latLng.lng();
        });
        
        google.maps.event.addListener(map, 'click', function(evet){
            //alert('click');
            //console.log(evet.latLng.lat() + ' ' + evet.latLng.lng());
            document.getElementById('c8').value = evet.latLng.lat();
            document.getElementById('c7').value = evet.latLng.lng();
            
            marker.setPosition({lat: Number(document.getElementById('c8').value), lng: Number(document.getElementById('c7').value)});
        });
        
    }
    
    function initMap(){
        
        initLatLng();
        
        setTimeout(function(){},30000);
        
        var latitude= Number(document.getElementById('txthidlat').value);
        var longitude= Number(document.getElementById('txthidlng').value);
        
        console.log('se va a crear el mapa');
        console.log(latitude);
        console.log(longitude);
        
        var divmap = document.getElementById('map')
        var myLatLng = {lat:latitude, lng: longitude};
        map = new google.maps.Map(divmap, {
            zoom: 15,
            center: myLatLng
        });
        
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: latitude, lng: longitude}
          });
          
        google.maps.event.addListener(marker, 'drag', function(evet){
            //console.log(evet.latLng.lat() + ' ' + evet.latLng.lng());
            document.getElementById('c8').value = evet.latLng.lat();
            document.getElementById('c7').value = evet.latLng.lng();
        });
        
        google.maps.event.addListener(map, 'click', function(evet){
            //console.log(evet.latLng.lat() + ' ' + evet.latLng.lng());
            document.getElementById('c8').value = evet.latLng.lat();
            document.getElementById('c7').value = evet.latLng.lng();
        });
    }
    
    function btnSave_Click(){
        alert('otro click?');
    }

</script>