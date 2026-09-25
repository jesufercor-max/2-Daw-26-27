// 1. Concatena dos cadenas de texto

/*var nombre = prompt("Introduce tu nombre")
    alert("Hola " + nombre + ", bienvenido a este curso")
*/

// 2. Muestra la longitud de una cadena de texto

/*
function MostrarLongitudCadena(){
    let cadena = prompt("Introduce una frase");
    const textoSinEspacios = cadena.replace(/\s/g, '');
    return textoSinEspacios.length;
}

alert ("La frase introducida tiene " + MostrarLongitudCadena() + " palabras.")
*/

// 3. Muestra el primer y último carácter de un string

/*
function MostrarPrimerayUltimaLetra() {
    let frase = prompt("Introduce la frase: ");
    let primera = frase[0];
    let ultima = frase[frase.length - 1];
    return "La primera letra de la frase es: " + primera + " y la ultima es: " + ultima + "." ;
}

alert(MostrarPrimerayUltimaLetra())
*/

// 4. Convierte a mayúsculas y minúsculas un string

/*
function Elegir(){
    
    let palabra = prompt("Escribe la palabra o frase: ");
    let eleccion = prompt("Elige 1 para mayusculas y 2 para minusculas");
  
    switch (eleccion) {
        case "1":
            alert ("la palabra en mayusculas es: " + palabra.toUpperCase() + ".");
            break;
        case "2":
            alert ("la palabra en minusculas es: " + palabra.toLowerCase() + ".");

            break;
        default:
            alert("Introduce valores validos.")
    
    }

    return (eleccion);
}

Elegir();
*/

// 5. Crea una cadena de texto en varias líneas



// 6. Interpola el valor de una variable en un string



// 7. Reemplaza todos los espacios en blanco de un string por guiones

function EspacioEnBlancosPorGuiones(){
    let frase = prompt("Introduce una frase: ");
    return frase.replace(/ /g , '-');
}
alert(EspacioEnBlancosPorGuiones());

// 8. Comprueba si una cadena de texto contiene una palabra concreta

function BuscarPlabara(){
    let frase = prompt("frase: ")
    let palabra = prompt("que palabra buscamos? : ")
    for (palabra, x=frase.length, x++)[
        
    ]
    return palabra
}

// 9. Comprueba si dos strings son iguales



// 10. Comprueba si dos strings tienen la misma longitud
