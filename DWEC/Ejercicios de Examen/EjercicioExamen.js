/* 4. Arrays y Mapas: Manipulación de Datos (2.5 Puntos)
Se requiere gestionar una lista de empleados. La siguiente información se ha guardado en un Map:
JavaScript
let empleados = new Map([
    ["A001", { nombre: "Aritz", salario: 3000 }],
    ["B002", { nombre: "Antonio", salario: 2500 }],
    ["C003", { nombre: "Juan", salario: 3200 }]
]);
Tarea:Use el método forEach del Map para iterar sobre todos los empleados.Dentro del forEach, si el salario del empleado es superior a $3000$, debe actualizar su salario con un aumento del 10%.Después del forEach, utilice el método entries() para obtener un nuevo array con las parejas clave-valor actualizadas.Imprima el array final de entradas ([clave, valor]).
*/

let empleados = new Map([
    ["A001", { nombre: "Aritz", salario: 3000 }],
    ["B002", { nombre: "Antonio", salario: 2500 }],
    ["C003", { nombre: "Juan", salario: 3200 }],
]);

empleados.forEach((empleados) => {
    if (empleados.salario>3000){
        empleados.salario += empleados.salario *0.10;
    } 
});

//Mostrar los elementos de forma automatica con for
for (const [codigo, datos] of empleados.entries()){
    console.log(datos);
    // Para mostrar el codigo de cada uno "A001" console.log (codigo);
}

/*
let mapa = empleados.entries();

console.log(mapa.next().value);
console.log(mapa.next().value);
console.log(mapa.next().value);
*/