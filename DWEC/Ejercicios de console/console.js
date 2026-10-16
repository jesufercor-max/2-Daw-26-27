// 1. Crea una función que utilice error correctamente
function conectarBaseDatos(url) {
    if (!url) {
        console.error("Error crítico: La URL de la base de datos no está definida.");
    }
}
conectarBaseDatos(""); // Lanza un mensaje rojo de error con el stack trace

// 2. Crea una función que utilice warn correctamente
function verificarDisponibilidadEspacio(porcentajeUsado) {
    if (porcentajeUsado > 85) {
        console.warn(`Advertencia: El almacenamiento está al ${porcentajeUsado}%. Casi lleno.`);
    }
}
verificarDisponibilidadEspacio(90); // Lanza un mensaje amarillo de advertencia

// 3. Crea una función que utilice info correctamente
function iniciarServicio() {
    console.info("Información: El servicio de mensajería se ha iniciado correctamente.");
}
iniciarServicio(); // Lanza un mensaje informativo (en algunos navegadores incluye un icono "i")

// 4. Utiliza table
const usuarios = [
    { id: 1, nombre: "Ana", rol: "Admin" },
    { id: 2, nombre: "Carlos", rol: "Usuario" },
    { id: 3, nombre: "Sofía", rol: "Editor" }
];
console.table(usuarios); // Muestra los objetos en una tabla estructurada y ordenada

// 5. Utiliza group
console.group("Reporte de Usuario");
console.log("Nombre: Alejandro");
console.log("Edad: 28 años");
console.groupEnd(); // Agrupa los mensajes anteriores dentro de un bloque colapsable

// 6. Utiliza time
console.time("Temporizador Bucle");
for (let i = 0; i < 1000000; i++) {
    // Simulando un proceso pesado
}
console.timeEnd("Temporizador Bucle"); // Mide y muestra el tiempo exacto que tardó en ejecutarse el bucle

// 7. Valida con assert si un número es positivo
function verificarPositivo(num) {
    console.assert(num > 0, `El número ${num} no es positivo.`);
}
verificarPositivo(-5); // Si falla la condición (es falsa), lanza un error en consola

// 8. Utiliza count
function registrarAcceso() {
    console.count("Accesos del usuario");
}
registrarAcceso(); // "Accesos del usuario: 1"
registrarAcceso(); // "Accesos del usuario: 2"

// 9. Utiliza trace
function funcionC() {
    console.trace("Rastreo de ejecución"); // Muestra la ruta exacta de funciones que nos trajo hasta aquí
}
function funcionB() { funcionC(); }
function funcionA() { funcionB(); }
funcionA(); 

// 10. Utiliza clear en js
// console.clear(); // Si descomentas esta línea, limpiará por completo la consola del navegador