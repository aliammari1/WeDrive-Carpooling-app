let google

function init () {
  // Basic options for a simple Google Map
  // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
  // var myLatlng = new google.maps.LatLng(40.71751, -73.990922);
  const myLatlng = new google.maps.LatLng(40.69847032728747, -73.9514422416687)
  // 39.399872
  // -8.224454

  const mapOptions = {
    // How zoomed in you want the map to start at (always required)
    zoom: 7,

    // The latitude and longitude to center the map (always required)
    center: myLatlng,

    // How you would like to style the map.
    scrollwheel: false,
    styles: [
      {
        featureType: 'administrative.country',
        elementType: 'geometry',
        stylers: [
          {
            visibility: 'simplified'
          },
          {
            hue: '#ff0000'
          }
        ]
      }
    ]
  }

  // Get the HTML DOM element that will contain your map
  // We are using a div with id="map" seen below in the <body>
  const mapElement = document.getElementById('map')

  // Create the Google Map using out element and options defined above
  const map = new google.maps.Map(mapElement, mapOptions)

  const addresses = ['New York']

  for (let x = 0; x < addresses.length; x++) {
    $.getJSON(
      'http://maps.googleapis.com/maps/api/geocode/json?address=' +
        addresses[x] +
        '&sensor=false',
      null,
      function (data) {
        const p = data.results[0].geometry.location
        const latlng = new google.maps.LatLng(p.lat, p.lng)
      }
    )
  }
}
google.maps.event.addDomListener(window, 'load', init)
