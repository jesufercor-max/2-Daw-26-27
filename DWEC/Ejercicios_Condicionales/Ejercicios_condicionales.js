// 1. Imprime por consola tu nombre si una variable toma su valor

let nombre = "Jesus";

if (nombre === "Jesus") {
    console.log("Jesus");
}

// 2. Usuario y contraseña

let usuario = prompt("Introduce el usuario: ");
let contraseña = prompt("Introduce la contraseña: ");

if (usuario === "admin" && contraseña === "1234") {
    console.log("Usuario y contraseña correctos");
} else {
    console.log("Usuario o contraseña incorrectos");
} 

// 3. Número positivo, negativo o cero

let numero = Number(prompt("Introduce un número: "));

if (numero > 0) {
    console.log("El número es positivo");
} else if (numero < 0) {
    console.log("El número es negativo");
} else {
    console.log("El número es cero");
}

// 4. Comprobar si puede votar y cuántos años le faltan

let edad = Number(prompt("¿Cuántos años tienes?: "));

if (edad >= 18) {
    console.log("Puedes votar");
} else {
    console.log("No puedes votar");
    console.log("Te faltan " + (18 - edad) + " años");
}


// 5. Operador ternario: adulto o menor

let edad = Number(prompt("¿Cuántos años tienes?: "));

let resultado = edad >= 18 ? "adulto" : "menor";

console.log(resultado);

// 6. Estación del año dependiendo del mes


let mes = Number(prompt("Introduce el número del mes: "));

if (mes === 12 || mes === 1 || mes === 2) {
    console.log("Invierno");
} else if (mes === 3 || mes === 4 || mes === 5) {
    console.log("Primavera");
} else if (mes === 6 || mes === 7 || mes === 8) {
    console.log("Verano");
} else if (mes === 9 || mes === 10 || mes === 11) {
    console.log("Otoño");
} else {
    console.log("Mes incorrecto");
}

// 7. Número de días que tiene un mes

let mes = Number(prompt("Introduce el número del mes: "));

if (mes === 2) {
    console.log("El mes tiene 28 días");
} else if (mes === 4 || mes === 6 || mes === 9 || mes === 11) {
    console.log("El mes tiene 30 días");
} else if (mes >= 1 && mes <= 12) {
    console.log("El mes tiene 31 días");
} else {
    console.log("Mes incorrecto");
}
SWITCH

// 8. Saludo dependiendo del idioma

let idioma = prompt("Introduce un idioma: español, inglés o francés");

switch (idioma) {

    case "español":
        console.log("Hola");
        break;

    case "inglés":
        console.log("Hello");
        break;

    case "francés":
        console.log("Bonjour");
        break;

    default:
        console.log("Idioma no disponible");
}

// 9. Estación del año usando switch

let mes = Number(prompt("Introduce el número del mes: "));

switch (mes) {

    case 12:
    case 1:
    case 2:
        console.log("Invierno");
        break;

    case 3:
    case 4:
    case 5:
        console.log("Primavera");
        break;

    case 6:
    case 7:
    case 8:
        console.log("Verano");
        break;

    case 9:
    case 10:
    case 11:
        console.log("Otoño");
        break;

    default:
        console.log("Mes incorrecto");
}

// 10. Número de días usando switch
let mes = Number(prompt("Introduce el número del mes: "));

switch (mes) {

    case 2:
        console.log("El mes tiene 28 días");
        break;

    case 4:
    case 6:
    case 9:
    case 11:
        console.log("El mes tiene 30 días");
        break;

    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        console.log("El mes tiene 31 días");
        break;

    default:
        console.log("Mes incorrecto");
}