


//1	Declaración e Inicialización	Crea un array meses con los nombres de los 12 meses. Imprime el mes en la posición 5 (recuerda que empiezan en 0).														

/*
let meses = ["Enero", "Febrero" , "Marzo" , "Abril" , "Mayo" , 
    "Junio" , "Julio", "Agosto" , "Septiembre" , 
    "Octubre" , "Noviembre" , "Diciembre"
]

console.log("El mes 5 es: " + meses[4])
*/

//2	Manipulación Extrema	Añade 'Diciembre Bis' al final de meses y elimina 'Enero' del principio. Muestra el array final.														

/*
meses.shift(meses) // "Shift" Quita el primer elemento
meses.push("Dicimbre bis") // "Push" añade un elemento al final 
console.log(meses)
*/

//3	Búsqueda y Posición	Dado un array ciudades = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla']. Pide al usuario que introduzca una ciudad y usa indexOf() para indicar su posición. Si no está, informa de ello.														

let ciudadElegida = prompt("Introduce una Ciudad: ")
let ciudades = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla']
let posicion = ciudades.indexOf(ciudadElegida)

if (posicion !== -1) {
    alert("Tu ciudad está en el array y está en la posición " + (posicion+1));
} else {
    alert("No está");
}

//4	Transformación con map()	Dado un array productos = [{nombre: 'Portátil', precio: 1200}, {nombre: 'Ratón', precio: 25}, {nombre: 'Monitor', precio: 300}]. Usa map() para crear un nuevo array llamado nombresProductos que contenga solo los nombres.														

productos = [{nombre: 'Portátil', precio: 1200}, 
    {nombre: 'Ratón', precio: 25}, 
    {nombre: 'Monitor', precio: 300}
]

const nombresProductos = new Map(productos.nombre)

console.log(nombresProductos)

//5	Filtrado con filter()	Basándote en el array productos anterior, usa filter() para crear un array productosCaros que solo contenga los productos con un precio superior a 100.														



//6	Composición con reduce()	Usa reduce() para calcular la suma total de los precios de todos los productos en el array productos.														



//7	Concatenación y Ordenación	Crea dos arrays, frontend = ['HTML', 'CSS'] y backend = ['Node', 'SQL']. Concaténalos usando el operador spread (...) en un array stackCompleto. Añade 'JavaScript' y luego ordena alfabéticamente el array final.														



//8	Matrices 2D y Desestructuración	Crea una matriz (array de arrays) tablero = [['x', 'o', 'x'], ['o', 'x', 'o'], ['x', 'o', 'x']]. Imprime el elemento central ('x'). Desestructura el primer array para obtener solo los dos primeros elementos en variables separadas.														



//9	find() y Objetos Complejos	En el array productos, usa find() para localizar y mostrar el objeto completo del producto con el nombre 'Portátil'.														



//10	Creación de una Función Universal	Escribe una función procesarNotas(listaNotas) que reciba un array de notas (números) y devuelva un objeto con tres propiedades: media (usando reduce), aprobados (usando filter) y notas10 (usando includes para verificar si alguien tiene un 10).														