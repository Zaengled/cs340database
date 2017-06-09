function Momentify(){
    var elements = document.getElementsByClassName("timestamp");
    for(var i=0; i < elements.length; i++){
        console.log('Changing element containing '+elements[i].innerHTML);
        elements[i].innerHTML = moment(new Date(elements[i].innerHTML)).fromNow();
    }
}

$(document).ready(
    function(){
        console.log("Running climbOn.js");
        Momentify();
    }
);