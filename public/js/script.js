function iniciarMap(){
    var coord = {lat:15.0658652 ,lng: -90.2615128};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 15,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}