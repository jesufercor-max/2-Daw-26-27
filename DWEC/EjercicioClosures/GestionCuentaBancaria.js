/*
Ejercicios de Closures: 

Ejercicio: Sistema de Gestión de Cuenta Bancaria PrivadaObjetivo
Implementar una función constructora/fábrica en JavaScript llamada crearCuentaBancaria que permita gestionar una cuenta de forma segura, protegiendo sus datos internos mediante el concepto de closures (clausuras) y evitando la manipulación externa del saldo o el historial.Descripción de requerimientos
Crea la función crearCuentaBancaria(titular, saldoInicial) que retorne un objeto con los métodos necesarios para interactuar con la cuenta.Estado privado:

    La cuenta debe almacenar de forma interna e inaccesible desde el exterior:
    El saldo actual de la cuenta.
    Un historial de transacciones (un arreglo vacío al inicio).

Debe existir una función interna privada registrarOperacion(tipo, monto) que guarde objetos con la estructura { tipo, monto, fecha }, donde fecha sea la hora actual formateada en texto.Interfaz pública (Métodos del objeto devuelto):

    obtenerTitular(): Devuelve el nombre del titular.
    verSaldo(): Devuelve un mensaje de texto con el saldo actual (ej. "Saldo disponible: $500").
    depositar(monto):
    Si el monto es menor o igual a 0, retorna el mensaje de error: "El monto debe ser mayor a 0".
    Si es válido, suma el monto al saldo, registra la operación como "Depósito" y confirma el nuevo saldo.

retirar(monto):

    Si el monto supera al saldo disponible, retorna "Fondos insuficientes".
    Si es válido, resta el monto, registra la operación como "Retiro" y confirma el saldo restante.

verHistorial(): Devuelve una copia del historial de movimientos para evitar que el arreglo original sea alterado desde fuera.


function crearCuentaBancaria(titular, saldoInicial) {
  
    let saldo = saldoInicial;
    const historial = [];

    function registrarOperacion(tipo, monto) {
        const fechaActual = new Date().toLocaleString(); 
        historial.push({
            tipo: tipo,
            monto: monto,
            fecha: fechaActual
        });
    }


    return {
        obtenerTitular: function() {
            return titular;
        },

        verSaldo: function() {
            return `Saldo disponible: $${saldo}`;
        },

        depositar: function(monto) {
            if (monto <= 0) {
                return "El monto debe ser mayor a 0";
            }
            saldo += monto; 
            registrarOperacion("Depósito", monto); 
            return `Depósito exitoso. Saldo actual: $${saldo}`;
        },

        retirar: function(monto) {
            try {
                if (monto === undefined || isNaN(Number(monto))) {
                    throw new Error(`El valor '${monto}' no es un numnero`);
                }

                if (monto > saldo) {
                return "Fondos insuficientes";
                }

                if (monto <= 0) {
                return "El monto debe ser mayor a 0";
                }

                saldo -= monto; 
                registrarOperacion("Retiro", monto); 
                return `Retiro exitoso. Saldo actual: $${saldo}`;
                
            } catch (error){
                console.error("Error" , error.message)                   
                
            }
        },
        verHistorial: function() {
            return [...historial];
        }
    };
}


const miCuenta = crearCuentaBancaria("Jesus", 500);

console.log(miCuenta.obtenerTitular()); 
console.log(miCuenta.verSaldo()); 


console.log(miCuenta.depositar(200));   
console.log(miCuenta.retirar(100));     
console.log(miCuenta.retirar(900));     
console.log(miCuenta.retirar('o'));     

console.log(miCuenta.verHistorial()); 


console.log(miCuenta.saldo);
*/

function crearCuentaBancaria(titular,saldoInicial){
    let saldo = saldoInicial
    historial = []

    function registrarOperacion(tipo, monto){
        const fecha = new Date ()
    }
}