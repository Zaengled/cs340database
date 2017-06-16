$(document).ready(function () {
    var myCity;

    $('#current_loc').click(function() {
        if (navigator.geolocation) {
            var input = navigator.geolocation.getCurrentPosition();
            var latlng = {lat: input.coords.latitude, lng: input.coords.longitude};
            geocoder.geocode({'location': latlng}, function (results, status) {
                if (status === 'OK') {
                    if (results[1]) {
                        grabResults(results[1].split(',')[0]);
                    }
                }
            })
        } else {
            document.getElementById('current_loc').setAttribute('disabled', 'disabled');
        }
    });

    $('#location_search').submit( function grabResults(city) {

        if (!city) {
            myCity = document.getElementById("city").value;
        }
        myCity = myCity.replace(/[^0-9a-z]/gi, '');
        //document.getElementById("enterC").innerHTML = "In " + myCity+"!";

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("gyms").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "cityreturn.php?q=" + myCity + "&t=1", true);
        xhttp.send();

        var xhttp2 = new XMLHttpRequest();
        xhttp2.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("stores").innerHTML = this.responseText;
            }
        };
        xhttp2.open("GET", "cityreturn.php?q=" + myCity + "&t=2", true);
        xhttp2.send();

        var xhttp3 = new XMLHttpRequest();
        xhttp3.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("outdoor").innerHTML = this.responseText;
            }
        };
        xhttp3.open("GET", "cityreturn.php?q=" + myCity + "&t=3", true);
        xhttp3.send();

        return false;
    });
})