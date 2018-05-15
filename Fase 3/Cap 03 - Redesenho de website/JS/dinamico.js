//Inicio modal
// Get the modal
var modal = document.getElementById('bem-vindo');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
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
document.getElementById("hora").innerHTML = " Hora: " + date.getHours() + ":" + date.getMinutes();
//Fim Data e Hora