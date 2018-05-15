//Inicio modal
var modal = document.getElementById('bem-vindo');

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
    modal.style.display = "none";
};

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    };
};
//Fim Modal

//Data e Hora
var date = new Date();
document.getElementById("data").innerHTML = "Data: " + date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
//Hora
function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
};

document.getElementById("hora").innerHTML = " Hora: " + addZero(date.getHours()) + ":" + addZero(date.getMinutes());
//Fim Data e Hora