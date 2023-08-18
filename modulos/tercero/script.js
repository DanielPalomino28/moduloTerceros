function confirmacion(evento){
    if (confirm("¿Está seguro que desea eliminar al tercero?")){
        return true;
    }
    else{
        evento.preventDefault();
    }
}
// Seleccionar todos los elementos con el ID "eliminar" y almacenarlos en la variable enlaceEliminar
let enlaceEliminar = document.querySelectorAll("#eliminar");

// Iterar a través de la colección de elementos enlaceEliminar y agregar un evento de clic a cada uno
for (var i = 0; i < enlaceEliminar.length; i++) {
    // Agregar un evento de clic a cada elemento enlaceEliminar y llamar a la función confirmacion
    enlaceEliminar[i].addEventListener('click', confirmacion);
}