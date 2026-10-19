function crearContador() {
    var contador = 0;
    return {
        incrementar: function () { contador++; },
        mostrarInformacion: function () { alert(contador); }
    };
}


var pulsarBoton = crearContador();