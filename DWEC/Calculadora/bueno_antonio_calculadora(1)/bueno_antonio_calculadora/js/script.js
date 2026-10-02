const pantalla = document.getElementById('pantalla');
let entradaActual = '';
let reiniciarSiguiente = false;

document.querySelectorAll('.boton').forEach(boton => {

    boton.addEventListener('click', () => {
    const valor = boton.dataset.valor;
    const accion = boton.dataset.accion;

    if (accion) {
      manejarAccion(accion);
    } else if (valor !== undefined) {
      if (reiniciarSiguiente) {
        entradaActual = '';
        reiniciarSiguiente = false;
      }
      entradaActual += valor;
      actualizarPantalla();
    }
  });

  boton.addEventListener('mouseenter', () => {
    const valor = boton.dataset.valor;
    const accion = boton.dataset.accion;

    if (accion || boton.classList.contains('operador')) {
      boton.style.backgroundColor = 'yellow';
    } else if (!isNaN(valor)) {
      const numero = parseInt(valor);
      if (numero % 2 === 0) {
        boton.style.backgroundColor = 'red';
      } else {
        boton.style.backgroundColor = 'green';
      }
    }
  });

  boton.addEventListener('mouseleave', () => {
    if (boton.classList.contains('igual')) {
      boton.style.backgroundColor = '#4caf50';
    } else {
      boton.style.backgroundColor = '#e0e0e0';
    }
  });
});

function manejarAccion(accion) {
  switch (accion) {
    case 'borrar':
      entradaActual = '';
      break;
    case 'calcular':
      try {
        entradaActual = eval(entradaActual).toString();
      } catch {
        entradaActual = 'Error';
      }
      reiniciarSiguiente = true;
      break;
    case 'raiz':
      try {
        entradaActual = Math.sqrt(eval(entradaActual)).toString();
      } catch {
        entradaActual = 'Error';
      }
      reiniciarSiguiente = true;
      break;
    case 'porcentaje':
      try {
        entradaActual = (eval(entradaActual) / 100).toString();
      } catch {
        entradaActual = 'Error';
      }
      reiniciarSiguiente = true;
      break;
    case 'cambiar-signo':
      if (entradaActual) {
        if (entradaActual.startsWith('-')) {
          entradaActual = entradaActual.substring(1);
        } else {
          entradaActual = '-' + entradaActual;
        }
      }
      break;
  }
  actualizarPantalla();
}

function actualizarPantalla() {
  pantalla.value = entradaActual;
}
