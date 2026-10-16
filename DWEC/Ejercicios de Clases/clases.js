// 1. Crea una clase que reciba dos propiedades
class Persona {
    constructor(nombre, edad) {
        this.nombre = nombre;
        this.edad = edad;
    }

    // 2. Añade un método a la clase que utilice las propiedades
    saludar() {
        return `Hola, mi nombre es ${this.nombre} y tengo ${this.edad} años.`;
    }

    // 4. Añade un método estático a la primera clase
    static esMayorDeEdad(edad) {
        return edad >= 18;
    }
}

// 3. Muestra los valores de las propiedades e invoca a la función
const persona1 = new Persona("Alejandro", 28);
console.log("3. Propiedad Nombre:", persona1.nombre);
console.log("3. Propiedad Edad:", persona1.edad);
console.log("3. Invocación método:", persona1.saludar());

// 5. Haz uso del método estático
// Los métodos estáticos se llaman directamente desde la clase, no desde la instancia
const validacionEdad = Persona.esMayorDeEdad(20);
console.log("5. ¿Es mayor de edad? (20):", validacionEdad);


// 6. Crea una clase que haga uso de herencia
class Empleado extends Persona {
    constructor(nombre, edad, puesto) {
        super(nombre, edad); // Llama al constructor de la clase padre (Persona)
        this.puesto = puesto;
    }

    // 10. Sobrescribe un método de una clase que utilice herencia
    saludar() {
        // Modificamos el comportamiento original e incluso podemos reutilizar el del padre con super
        return `${super.saludar()} Y trabajo como ${this.puesto}.`;
    }
}

const empleado1 = new Empleado("Sofía", 32, "Desarrolladora Web");
console.log("10. Método sobrescrito en herencia:", empleado1.saludar());


// 7. Crea una clase que haga uso de getters y setters
// 8. Modifica la clase con getters y setters para que use propiedades privadas
class CuentaBancaria {
    // Las propiedades privadas se declaran anteponiendo el símbolo '#'
    #saldo; 

    constructor(titular, saldoInicial) {
        this.titular = titular;
        this.#saldo = saldoInicial; // Propiedad privada protegida desde fuera de la clase
    }

    // Getter para obtener el saldo de forma controlada
    get saldo() {
        return `$${this.#saldo.toFixed(2)}`;
    }

    // Setter para modificar el saldo con validaciones de seguridad
    set saldo(nuevoSaldo) {
        if (nuevoSaldo < 0) {
            console.warn("¡Error! El saldo no puede ser negativo.");
        } else {
            this.#saldo = nuevoSaldo;
        }
    }
}

// 9. Utiliza los get y set y muestra sus valores
const miCuenta = new CuentaBancaria("Carlos", 1000);

// Usamos el GETTER (se accede como una propiedad normal, sin paréntesis)
console.log("9. Saldo inicial (get):", miCuenta.saldo); 

// Usamos el SETTER (se asigna un valor con el operador '=')
miCuenta.saldo = 1500; 
console.log("9. Nuevo saldo tras set:", miCuenta.saldo);

// Intento fallido de burlar el setter
miCuenta.saldo = -500; // Mostrará la advertencia y no cambiará el valor

// Intento de acceder directamente a la propiedad privada (Lanzará un SyntaxError)
// console.log(miCuenta.#saldo); 