// Initialize the map
var map = L.map("map", {
    zoomControl: false,
}).setView([-1.241659, 116.853412], 13);

// Create the tile layer with your preferred map provider
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "&copy; OpenStreetMap contributors",
}).addTo(map);

// Create a marker with a draggable option
var marker = L.marker([-1.241659, 116.853412], { draggable: true }).addTo(map);

// Function to update the latitude and longitude inputs
function updateLatLng() {
    var latLng = marker.getLatLng();
    document.getElementById("latitude").value = latLng.lat.toFixed(6);
    document.getElementById("longitude").value = latLng.lng.toFixed(6);
}

// Update the inputs when the marker is dragged
marker.on("drag", updateLatLng);

// Initialize the geocoder control
var geocoder = L.Control.geocoder({
    collapsed: false,
    placeholder: "Cari lokasi...",
}).addTo(map);

// Function to handle the geocode result
function handleResult(result) {
    if (result || result.length > 0) {
        var location = result.center;
        marker.setLatLng(location);
        map.setView(location, 13);
        console.log(result);
        updateLatLng();
    }
}

// Listen for geocode result event
geocoder.on("markgeocode", function (e) {
    handleResult(e.geocode);
});
