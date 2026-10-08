

// 1. Crea un array que almacene cinco animales

let animales = ["perro", "gato", "leon", "tortuga" , "conejo"]
console.log(animales)

// 2. Añade dos más. Uno al principio y otro al final

animales.unshift("tigre")
animales.push("pajaro")
console.log(animales)

// 3. Elimina el que se encuentra en tercera posición

animales.splice(2, 1) // 2, desde donde empieza a eliminar. 1 el numero de elemetos que se eliminan
console.log(animales)

// 4. Crea un set que almacene cinco libros

let libros = new Set (["Don Quijote de la Mancha" ,"Cien años de soledad", "1984", "Orgullo y prejuicio", "Crimen y castigo" ])
console.log(libros)

// 5. Añade dos más. Uno de ellos repetido

libros.add("Peto")
libros.add("1984")
console.log(libros)

// 6. Elimina uno concreto a tu elección

libros.delete("Cien años de soledad")
console.log(libros)

// 7. Crea un mapa que asocie el número del mes a su nombre

const map = {1:'Enero' , 2:'Febrero', 3:'Marzo' , 4:'Abril' , 5:'Mayo' ,
    6:'Junio' , 7:'Julio', 8:'Agosto' , 9:'Septiembre' , 10:'Octubre',
    11:'Noviembre' , 12: 'Diciembre'
}

// 8. Comprueba si el mes número 5 existe en el map e imprime su valor

if (5 in map){
    console.log(map[5])    
}

// 9. Añade al mapa una clave con un array que almacene los meses de verano

map.verano = [map[6] ,map[7], map[8]]

// 10. Crea un Array, transfórmalo a un Set y almacénalo en un Map

let array = ["Jesus" , "pepe" , "Manoli"]

let libros2 = new Set(array)

const map2 = new Map()
map2.set('nombres', libros2)

console.log(map2.get('nombres'))