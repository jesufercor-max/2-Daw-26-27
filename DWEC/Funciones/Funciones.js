

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





// 6. Crea una función que reciba dos arrays y devuelva un nuevo array que contenga los elementos comunes entre ambos





// 7. Crea una función que reciba un array de números y devuelva la suma de todos los números pares





// 8. Crea una función que reciba un array de números y devuelva un nuevo array con cada número elevado al cuadrado





// 9. Crea una función que reciba una cadena de texto y devuelva la misma cadena con las palabras en orden inverso





// 10. Crea una función que calcule el factorial de un número dado