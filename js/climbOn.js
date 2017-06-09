function Momentify(){
    var elements = document.getElementsByClassName("timestamp");
    for(var i=0; i < elements.length; i++){
        elements[i].innerHTML = moment(elements[i].innerHTML).fromNow()
    }
}

$(document).ready(
    function(){
        Momentify();
    }
);