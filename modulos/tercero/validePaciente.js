document.addEventListener("DOMContentLoaded", function() {
    var checkbox = document.getElementById("flexSwitchCheckDefault");
    var apellidos = document.getElementById("apellidos");
    
    checkbox.addEventListener("change", function() {
        if (checkbox.checked) {
            apellidos.required = true;
        } else {
            apellidos.required = false;
        }
    });
});