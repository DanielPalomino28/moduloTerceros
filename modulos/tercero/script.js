function confirmacion(evento){
    if (confirm("¿Está seguro que desea eliminar al tercero?")){
        return true;
    }
    else{
        evento.preventDefault();
    }
}
let enlaceEliminar = document.querySelectorAll("#eliminar");

for(var i = 0; i<enlaceEliminar.length;i++){
    enlaceEliminar[i].addEventListener('click',confirmacion)
}