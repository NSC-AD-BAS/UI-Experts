
function newFunction() {    /* Map Object */

       
var mapObj = new GMaps({
  el: '#map',
  lat: 48.857,
  lng: 2.295,
});
  


GMaps.geocode({
  
  address: document.getElementById("address").value,
  callback: function(results, status) {
    if (status == 'OK') {
      latlng = results[0].geometry.location;
      mapObj.setCenter(latlng.lat(), latlng.lng());
    } else if (status == 'ZERO_RESULTS') {
      alert('Sorry, no results found');
    }
  }
});
};
