// Seleccionamos la pantalla de la calculadora
const elementoPantalla = document.getElementById('pantalla');

// Variables para guardar los datos de la calculadora
let textoActual = '';
let limpiarAlEscribir = false;

// Seleccionamos todos los botones que tienen la clase css
const listaBotones = document.getElementsByClassName('boton');

// Recorremos los botones con un bucle for 
for (let i = 0; i < listaBotones.length; i++) {
  const botonIndividual = listaBotones[i];

  // 1. EVENTO CLICK: Detectar qué botón se pulsa
  botonIndividual.addEventListener('click', function() {
    const valorBoton = botonIndividual.getAttribute('data-valor');
    const accionBoton = botonIndividual.getAttribute('data-accion');

    // Si el botón tiene una acción asignada (borrar, calcular, etc.)
    if (accionBoton) {
      ejecutarOperacion(accionBoton);
    } 
    // Si es un número o un operador (+, -, *, /)
    else if (valorBoton !== null) {
      if (limpiarAlEscribir) {
        textoActual = '';
        limpiarAlEscribir = false;
      }
      textoActual = textoActual + valorBoton;
      elementoPantalla.value = textoActual;
    }
  });

  // 2. EVENTO MOUSEENTER: Cambiar colores al pasar el ratón por encima
  botonIndividual.addEventListener('mouseenter', function() {
    const valorBoton = botonIndividual.getAttribute('data-valor');
    const accionBoton = botonIndividual.getAttribute('data-accion');

    // Si es una acción o tiene la clase operador, se pinta de amarillo
    if (accionBoton || botonIndividual.classList.contains('operador')) {
      botonIndividual.style.backgroundColor = 'yellow';
    } 
    // Si es un número, comprobamos si es par o impar
    else if (valorBoton && !isNaN(valorBoton)) {
      const numeroConvertido = Number(valorBoton);
      if (numeroConvertido % 2 === 0) {
        botonIndividual.style.backgroundColor = 'red'; // Par -> Rojo
      } else {
        botonIndividual.style.backgroundColor = 'green'; // Impar -> Verde
      }
    }
  });

  // 3. EVENTO MOUSELEAVE: Restaurar el color original al quitar el ratón
  botonIndividual.addEventListener('mouseleave', function() {
    if (botonIndividual.classList.contains('igual')) {
      botonIndividual.style.backgroundColor = '#4caf50'; // Color verde original del botón igual
    } else if (botonIndividual.classList.contains('borrar')) {
      botonIndividual.style.backgroundColor = '#FF0000'; // Color rojo para el botón C (borrar)
    } else {
      botonIndividual.style.backgroundColor = '#e0e0e0'; // Color gris por defecto
    }
  });
}

// Función secundaria para procesar las operaciones matemáticas
function ejecutarOperacion(accionMatematica) {
  // Ponemos un bloque try-catch para capturar fallos lógicos (por ejemplo, si escriben "++")
  try {
    if (accionMatematica === 'borrar') {
      textoActual = '';
    } 
    else if (accionMatematica === 'calcular') {
      // Truco limpio de documentación para evitar el uso del peligroso eval()
      textoActual = String(new Function('return ' + textoActual)());
      limpiarAlEscribir = true;
    } 
    else if (accionMatematica === 'raiz') {
      const operacionEvaluada = new Function('return ' + textoActual)();
      textoActual = String(Math.sqrt(operacionEvaluada));
      limpiarAlEscribir = true;
    } 
    else if (accionMatematica === 'porcentaje') {
      const operacionEvaluada = new Function('return ' + textoActual)();
      textoActual = String(operacionEvaluada / 100);
      limpiarAlEscribir = true;
    } 
    else if (accionMatematica === 'cambiar-signo') {
      if (textoActual) {
        if (textoActual.indexOf('-') === 0) {
          textoActual = textoActual.substring(1); // Quitamos el signo menos si ya lo tiene
        } else {
          textoActual = '-' + textoActual; // Le añadimos el signo menos delante
        }
      }
    }
  } catch (errorOperacion) {
    textoActual = 'Error';
    limpiarAlEscribir = true;
  }

  // Actualizamos la pantalla con el resultado final de la operación
  elementoPantalla.value = textoActual;
}
