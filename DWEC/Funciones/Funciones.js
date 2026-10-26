

// 1. Crea una función que reciba dos números y devuelva su suma


function sumar(a, b){
    return a+b
}

console.log (sumar(3,4))


// 2. Crea una función que reciba un array de números y devuelva el mayor de ellos


let numeros = [1,2,3,4,5,6,54,8,9,10]
function devolverMayor (numeros){
    return Math.max(...numeros)
}

console.log(devolverMayor(numeros))


// 3. Crea una función que reciba un string y devuelva el número de vocales que contiene

function vocales(frase){
    let vocales = "aeiouAEIOU"
    let contador=0
    for (let x=0 ; x<frase.length; x++){
        if (vocales.includes(frase[x])){
            contador++;
        }
    }
    return contador
}
console.log(vocales("Antonio lobato"))


// 4. Crea una función que reciba un array de strings y devuelva un nuevo array con las strings en mayúsculas


function devolverMayusculas(frases){
    return frases.map(frase => frase.toUpperCase())
}

let misFrases = ["españa es la", "hostia"]

console.log(devolverMayor(misFrases))

// 5. Crea una función que reciba un número y devuelva true si es primo, y false en caso contrario

let numero = prompt("Introduce un numero para saber si es primo o no ")

function verificarSiEsPrimo(numero){
    // Corrección 1: Usar === para comparar y validar también el 1
    if (numero <= 1){
        return "No existe numero primo que sea 1 o inferior";
    }
    
    let divisor = 2;
    while (divisor < numero) {
        if (numero % divisor === 0) {
            return false; // Si encuentra otro divisor, NO es primo
        }
        divisor++;
    }
    
    return true; // Si no encontró ningún divisor, SÍ es primo
}

console.log(verificarSiEsPrimo(numero));

// 6. Crea una función que reciba dos arrays y devuelva un nuevo array que contenga los elementos comunes entre ambos

let nombresGatos = ['Cris', 'Nancy', 'Pelota'];
let nombresPerros = ['Kissi', 'Nancy', 'Toby', 'cris'];

let nombresGatosMayus = nombresGatos.map(nombre => nombre.toUpperCase())

function comprobarElementosComunes(nombresGatosMayus,nombresPerros){
    return nombresPerros.filter(elemento => nombresGatosMayus.includes(elemento.toUpperCase()))
}

console.log(comprobarElementosComunes(nombresGatosMayus,nombresPerros))


// 7. Crea una función que reciba un array de números y devuelva la suma de todos los números pares

let arrayNumeros  = [1,2,23,4,5,6,7,12,8,9,20]

function sumarPares(arrayNumeros, sumar=0){
    for (i=0;i<arrayNumeros.length;i++){
        if (arrayNumeros[i]%2==0){
            sumar+=arrayNumeros[i]
        }
    }
    
    return sumar
}

console.log (sumarPares(arrayNumeros))



// 8. Crea una función que reciba un array de números y devuelva un nuevo array con cada número elevado al cuadrado

let arrayNumeros2  = [1,2,23,4,5,6,7,12,8,9,20]
console.log (arrayNumeros2)

function elevarAlCuadrado(arrayNumeros2){
    let numeroselevados=[]

    for (i=0;i<arrayNumeros2.length;i++){
        elevado=Math.pow(arrayNumeros2[i],2)
        numeroselevados.push(elevado)
    }
    
    return numeroselevados
}

console.log (elevarAlCuadrado(arrayNumeros2))


// 9. Crea una función que reciba una cadena de texto y devuelva la misma cadena con las palabras en orden inverso

function cadenaInversa(frase){
    return frase.split("").reverse("").join("")
}

console.log(cadenaInversa("El betis el mejor"))


// 10. Crea una función que calcule el factorial de un número dado

let numerodado= parseInt(prompt("Introduce un número"))

function calcularFactorial(numero){
    for (i=numero;i>0;i--){
        factorial = i*
    }
}