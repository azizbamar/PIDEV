function initMap() {
    console.log('Initiating the map');

    const mapOptions = {
        center: { lat: 48.8566, lng: 2.3522 },
        zoom: 10,
    };

    const map = new google.maps.Map(document.getElementById('map'), mapOptions);
}

// Ensure that the initMap function is available globally for the Google Maps API callback
window.initMap = initMap;
