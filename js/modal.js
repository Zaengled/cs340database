// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
//var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
/*btn.onclick = function() {
 modal.style.display = "block";
 }*/

// When the user clicks on <span> (x), close the modal
if (modal) {
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

//Modify the modal to include the review the user clicked
    function reviewModal(user) {
        modal.style.display = "block";
        document.getElementById("mh1").innerHTML = user["userName"];
        document.getElementById("cont").innerHTML = user["body"];
        document.getElementById("mh2").innerHTML = "Stars: " + user["stars"];
    }

//Modify the modal to include the route the user clicked
    function routeModal(route) {
        modal.style.display = "block";
        document.getElementById("mh1").innerHTML = "Route ID: " + route["routeID"];
        document.getElementById("cont").innerHTML = route["bio"];
        document.getElementById("mh2").innerHTML = "Difficulty: " + route["difficulty"];
    }
}