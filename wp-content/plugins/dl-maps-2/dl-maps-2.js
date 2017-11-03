var map;
console.log(dlObj);
function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(dlObj.cords1, dlObj.cords2),
        zoom: +dlObj.zoom,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);