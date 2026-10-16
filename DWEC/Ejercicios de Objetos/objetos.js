// 1. Crea un objeto con 3 propiedades
const coche = {
    marca: "Toyota",
    modelo: "Corolla",
    año: 2022
};

// 2. Accede y muestra su valor
console.log("2. Marca:", coche.marca);          // Notación de punto
console.log("2. Modelo:", coche["modelo"]);     // Notación de corchetes

// 3. Agrega una nueva propiedad
coche.color = "Rojo";
console.log("3. Objeto con nueva propiedad:", coche);

// 4. Elimina una de las 3 primeras propiedades
delete coche.año;
console.log("4. Objeto tras eliminar 'año':", coche);

// 5. Agrega una función e invócala
coche.arrancar = function() {
    return `El ${this.marca} ${this.modelo} está en marcha.`;
};
console.log("5. Invocando función agregada:", coche.arrancar());

// 6. Itera las propiedades del objeto
console.log("6. Iterando propiedades:");
for (const propiedad in coche) {
    // Filtramos para mostrar solo las propiedades fijas y no la función
    if (typeof coche[propiedad] !== "function") {
        console.log(`- ${propiedad}: ${coche[propiedad]}`);
    }
}

// 7. Crea un objeto anidado
const smartphone = {
    nombre: "iPhone 15",
    especificaciones: {
        ram: "6GB",
        almacenamiento: "128GB",
        pantalla: "OLED"
    }
};

// 8. Accede y muestra el valor de las propiedades anidadas
console.log("8. RAM:", smartphone.especificaciones.ram);
console.log("8. Pantalla:", smartphone["especificaciones"]["pantalla"]);

// 9. Comprueba si los dos objetos creados son iguales
// En JavaScript, comparar objetos con == o === compara su referencia en memoria, no su contenido.
const comparacionObjetos = coche === smartphone;
console.log("9. ¿El objeto 'coche' y 'smartphone' son iguales en memoria?:", comparacionObjetos); // false

// Bonus para comparar contenido real:
const cocheCopia = { marca: "Toyota", modelo: "Corolla", color: "Rojo" }; // Mismo contenido que 'coche' ahora mismo
console.log("9. Contenido idéntico pero diferente variable:", coche === cocheCopia); // false (siguen siendo distintas referencias)
console.log("9. Comparación real por JSON:", JSON.stringify(coche) === JSON.stringify(cocheCopia)); // true

// 10. Comprueba si dos propiedades diferentes son iguales
const producto1 = { precio: 29.99, categoria: "Libros" };
const producto2 = { precio: 29.99, categoria: "Ropa" };

const preciosIguales = producto1.precio === producto2.precio;
console.log("10. ¿El precio de ambos productos es idéntico?:", preciosIguales); // true