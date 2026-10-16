// 1. Captura una excepción utilizando try-catch
try {
    const resultado = objetoInexistente.propiedad; // Esto fallará porque el objeto no existe
} catch (error) {
    console.error("1. Excepción capturada:", error.message);
}

// 2. Captura una excepción utilizando try-catch y finally
try {
    console.log("2. Intentando abrir conexión...");
    throw new Error("Error de red");
} catch (error) {
    console.error("2. Excepción capturada:", error.message);
} finally {
    console.log("2. Bloque finally: Este código se ejecuta SIEMPRE (ej. cerrar archivos/conexiones).");
}

// 3. Lanza una excepción genérica
function validarEdad(edad) {
    if (edad < 0) {
        throw new Error("La edad no puede ser un número negativo."); // Excepción genérica
    }
}
try { validarEdad(-5); } catch (e) { console.error("3.", e.message); }

// 4. Crea una excepción personalizada
class ValidationError extends Error {
    constructor(message) {
        super(message);
        this.name = "ValidationError"; // Nombre personalizado para identificar el tipo de error
    }
}

// 5. Lanza una excepción personalizada
function registrarUsuario(nombre) {
    if (!nombre) {
        throw new ValidationError("El nombre de usuario es obligatorio.");
    }
}
try { registrarUsuario(""); } catch (e) { console.error(`5. [${e.name}] ${e.message}`); }

// 6. Lanza varias excepciones según una lógica definida
function procesarPago(monto, tarjetaValida) {
    if (monto <= 0) {
        throw new RangeError("El monto debe ser mayor a cero.");
    }
    if (!tarjetaValida) {
        throw new TypeError("La tarjeta proporcionada no es válida.");
    }
}

// 7. Captura varias excepciones en un mismo try-catch
try {
    procesarPago(100, false); // Cambia a (-10, true) para ver el otro error
} catch (error) {
    // JavaScript no tiene "catch" múltiples nativos, se evalúa el tipo dentro del mismo catch:
    if (error instanceof RangeError) {
        console.error("7. Error de rango:", error.message);
    } else if (error instanceof TypeError) {
        console.error("7. Error de tipo:", error.message);
    } else {
        console.error("7. Error desconocido:", error.message);
    }
}

// 8. Crea un bucle que intente transformar a float cada valor y capture y muestre los errores
const valores = ["3.14", "125.50", "no-es-un-numero", "42.0", undefined];

valores.forEach((valor, indice) => {
    try {
        if (valor === undefined || isNaN(Number(valor))) {
            throw new Error(`El valor '${valor}' en el índice ${indice} no se puede transformar a float.`);
        }
        const numeroFloat = parseFloat(valor);
        console.log(`8. Éxito: Índice ${indice} transformado a float ->`, numeroFloat);
    } catch (error) {
        console.error(`8. Error en índice ${indice}:`, error.message);
    }
});

// 9. Crea una función que verifique si un objeto tiene una propiedad específica y lance una excepción personalizada
class MissingPropertyError extends Error {
    constructor(propiedad) {
        super(`Falta la propiedad requerida: "${propiedad}"`);
        this.name = "MissingPropertyError";
    }
}

function verificarPropiedad(objeto, propiedadRequerida) {
    if (!objeto || !objeto.hasOwnProperty(propiedadRequerida)) {
        throw new MissingPropertyError(propiedadRequerida);
    }
    console.log(`9. Validación correcta. El objeto tiene la propiedad "${propiedadRequerida}".`);
}
try { verificarPropiedad({ email: "test@test.com" }, "nombre"); } catch (e) { console.error("9.", e.message); }

// 10. Crea una función que realice reintentos en caso de error hasta un máximo de 10
function operacionInestable() {
    // Simula un fallo el 80% de las veces
    if (Math.random() > 0.2) {
        throw new Error("Fallo de conexión al servidor");
    }
    return "¡Datos descargados con éxito!";
}

function ejecutarConReintentos() {
    const MAX_REINTENTOS = 10;
    
    for (let intento = 1; intento <= MAX_REINTENTOS; intento++) {
        try {
            console.log(`10. Intento ${intento} de ${MAX_REINTENTOS}...`);
            const resultado = operacionInestable();
            console.log("10.", resultado);
            return; // Detiene la función si tiene éxito
        } catch (error) {
            console.warn(`10. Falló el intento ${intento}: ${error.message}`);
            if (intento === MAX_REINTENTOS) {
                console.error("10. Se alcanzaron los 10 intentos. Operación fallida permanentemente.");
            }
        }
    }
}
ejecutarConReintentos();