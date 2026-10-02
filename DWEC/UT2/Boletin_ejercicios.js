// ESTRUCTURA CONDICIONAL

// 1. Calcular el área y el volumen de la esfera cuyo radio se pide al usuario.

/*const pi = 3.14
let radio = prompt("Introduce el radio de la esfeta: ") 

function calcularAreaEsfera(){
    return alert("El area de la esfera es: " + (4*pi*(radio*radio)))
}

alert(calcularAreaEsfera())
*/

// 2. Diseñar un algoritmo para hallar el valor absoluto de un número leído de teclado y presentarlo en pantalla.

/*
let numero = parseFloat(prompt("Introduce un número: "));

function valorAbsoluto() {
    if (numero < 0) {
        numero = -numero;
    }

    return alert("El valor absoluto es: " + numero);
}

valorAbsoluto();
*/

// 3. Realiza un algoritmo que lea un dato de teclado y calcule e imprima su inverso. Considere el caso especial del valor 0 mostrando el mensaje de error correspondiente.

/*
let numero = prompt("Introduce un numero: ")

function calcularInverso() {
    if (numero > 0) {
        return alert("El inverso de " + numero + " es: " + (1 / numero))
    } else {
        return alert("El inverso de " + numero + " es: " + (-(1 / numero)))
    }
}

if (numero != 0) {
    alert(calcularInverso())
} else {
    alert("Error")
}
*/

/* 4. Escriba un algoritmo que lea un instante de tiempo dado en horas y minutos y escriba como respuesta los mensajes “Buenos días” “Buenas tardes” “Buenas noches”, de acuerdo con las siguientes reglas:
    a. Es de día desde las 7:30 hasta las 14:00 horas.
    b. Es tarde desde las 14:01 hasta las horas 20:30.
    c. Es noche desde las 20:31 hasta las horas 7:29.
*/

/*
let horas = parseInt(prompt("Introduce las horas en horario Meridiano (de 1 a 12 am o de 13 a 00 pm ): "))
let minutos = parseInt(prompt("Introduce los minutos. Ten en cuenta que una hora tiene 60 minutos: "))

function horario() {
    if ((horas === 7 && minutos >= 30) || (horas > 7 && horas < 14) || (horas === 14 && minutos === 0)) {
        return alert("Buenos días");
    }  else if ((horas === 14 && minutos >= 1) || (horas > 14 && horas < 20) || (horas === 20 && minutos <= 30)) {
        return alert("Buenas tardes");
    }else {
        return alert("Buenas noches");
    }
}

horario()
*/

// 5. Para comprobar si un año es o no bisiesto se usa la siguiente regla: “Un año es bisiesto si es divisible por 400, o bien es divisible por 4 pero no por 100”. Diseñar un programa que utilizando una variable lógica que tenga valor cierto si el año es bisiesto y falso si no lo es.

/*
let año = prompt("Introduce un año: ")

function añoBisiesto(){
    if ((año%400==0) || ((año%4==0) && (año%100!=0))){
        return alert("año bisiesto")
    } else {
        return alert("año no bisiesto")
    }
}

añoBisiesto()
*/

// 6. Diseñar un algoritmo que tomando las coordenadas cartesianas de un punto en el plano y calcule e imprima el cuadrante al que pertenece dicho punto. También debe detectar cuando está en el origen o sobre un eje.

/*
let x = parseFloat(prompt("Introduce la coordenada X: "));
let y = parseFloat(prompt("Introduce la coordenada Y: "));

function comprobarCuadrante() {

    if (x === 0 && y === 0) {
        alert("El punto está en el origen.");

    } else if (x === 0) {
        alert("El punto está sobre el eje Y.");

    } else if (y === 0) {
        alert("El punto está sobre el eje X.");

    } else if (x > 0 && y > 0) {
        alert("El punto está en el primer cuadrante.");

    } else if (x < 0 && y > 0) {
        alert("El punto está en el segundo cuadrante.");

    } else if (x < 0 && y < 0) {
        alert("El punto está en el tercer cuadrante.");

    } else {
        alert("El punto está en el cuarto cuadrante.");
    }
}

comprobarCuadrante();
*/


// 7. Elabora un programa que dado un precio y una cantidad pagada, obtengamos el cambio con el mínimo número de elementos (monedas o billetes). Para devolver el cambio disponemos de una cantidad ilimitada de monedas y de billetes.

/*
let precio = parseFloat(prompt("Introduce el precio: "));
let pagado = parseFloat(prompt("Introduce la cantidad pagada: "));

function calcularCambio() {

    if (pagado < precio) {
        alert("Error: la cantidad pagada es menor que el precio.");
        return;
    }

    let cambio = Math.round((pagado - precio) * 100);
    let resultado = "";

    let valores = [50000, 20000, 10000, 5000, 2000, 1000, 500, 200, 100];

    for (let i = 0; i < valores.length; i++) {

        let cantidad = Math.floor(cambio / valores[i]);

        if (cantidad > 0) {
            resultado += "Monedas/billetes de " + (valores[i] / 100) + " €: " + cantidad + "\n";
            cambio = cambio % valores[i];
        }
    }

    alert("Cambio:\n" + resultado);
}

calcularCambio();
*/


// ESTRUCTURAS ITERATIVAS Y SELECCIÓN MÚLTIPLE

// 8. Diseñar un algoritmo para escribir en pantalla los n primeros números naturales, sus cuadrados, sus cubos y la suma de todos ellos.

/*
let n = parseInt(prompt("¿Cuántos números naturales quieres mostrar? "));

function numerosNaturales() {

    let suma = 0;
    let resultado = "";

    for (let i = 1; i <= n; i++) {

        let cuadrado = i * i;
        let cubo = i * i * i;

        suma += i;

        resultado += "Número: " + i +
            " | Cuadrado: " + cuadrado +
            " | Cubo: " + cubo + "\n";
    }

    resultado += "\nSuma de todos los números: " + suma;

    alert(resultado);
}

numerosNaturales();
*/

// 9. Hallar el menor, el mayor y la media de un conjunto de números positivos leídos de teclado.

/*
let numero;
let mayor = null;
let menor = null;
let suma = 0;
let cantidad = 0;

do {

    numero = parseFloat(prompt("Introduce un número positivo. Introduce 0 para terminar: "));

    if (numero < 0) {
        alert("Error: debes introducir un número positivo.");
    } else if (numero > 0) {

        if (mayor === null || numero > mayor) {
            mayor = numero;
        }

        if (menor === null || numero < menor) {
            menor = numero;
        }

        suma += numero;
        cantidad++;
    }

} while (numero !== 0);

if (cantidad > 0) {

    let media = suma / cantidad;

    alert(
        "Mayor: " + mayor +
        "\nMenor: " + menor +
        "\nMedia: " + media
    );

} else {
    alert("No se introdujeron números.");
}
*/

// 10. Realizar un programa que proporcione el cambio de Euros a Dólares, Libras, Yenes, Franco Suizo, Corona Noruega, según opción. El programa debe controlar todas las entradas y ofrecer al usuario la posibilidad de repetir o salir.

/*
let repetir = true;

while (repetir) {

    let euros = parseFloat(prompt("Introduce la cantidad de euros: "));

    if (isNaN(euros) || euros < 0) {

        alert("Error. Introduce una cantidad válida.");

    } else {

        let opcion = prompt(
            "Elige una opción:\n" +
            "1. Dólares\n" +
            "2. Libras\n" +
            "3. Yenes\n" +
            "4. Franco Suizo\n" +
            "5. Corona Noruega"
        );

        let resultado;

        switch (opcion) {

            case "1":
                resultado = euros * 1.17;
                alert(euros + " € = " + resultado.toFixed(2) + " dólares");
                break;

            case "2":
                resultado = euros * 0.87;
                alert(euros + " € = " + resultado.toFixed(2) + " libras");
                break;

            case "3":
                resultado = euros * 172;
                alert(euros + " € = " + resultado.toFixed(2) + " yenes");
                break;

            case "4":
                resultado = euros * 0.93;
                alert(euros + " € = " + resultado.toFixed(2) + " francos suizos");
                break;

            case "5":
                resultado = euros * 11.7;
                alert(euros + " € = " + resultado.toFixed(2) + " coronas noruegas");
                break;

            default:
                alert("Opción incorrecta.");
        }
    }

    let continuar = prompt("¿Quieres realizar otra conversión? Escribe S para continuar o N para salir.");

    if (continuar.toUpperCase() === "N") {
        repetir = false;
    }
}

alert("Programa terminado.");
*/

// 11. Hacer un algoritmo que lea el número correspondiente a un mes del calendario y presente en pantalla su nombre usando una estructura de control adecuada.

/*
let mes = parseInt(prompt("Introduce el número del mes (1-12): "));

function mostrarMes() {

    switch (mes) {

        case 1:
            alert("Enero");
            break;

        case 2:
            alert("Febrero");
            break;

        case 3:
            alert("Marzo");
            break;

        case 4:
            alert("Abril");
            break;

        case 5:
            alert("Mayo");
            break;

        case 6:
            alert("Junio");
            break;

        case 7:
            alert("Julio");
            break;

        case 8:
            alert("Agosto");
            break;

        case 9:
            alert("Septiembre");
            break;

        case 10:
            alert("Octubre");
            break;

        case 11:
            alert("Noviembre");
            break;

        case 12:
            alert("Diciembre");
            break;

        default:
            alert("Error: el mes debe estar entre 1 y 12.");
    }
}

mostrarMes();
*/


/* 12. Realizar un algoritmo que permita introducir la nota de una asignatura por teclado, la valide para que esté comprendida entre 0 y 10 y se escriba en letras de la siguiente manera:
    SUSPENSO si es menor que 5
    APROBADO mayor que 5 y menor que 6
    BIEN entre 6 y 7
    NOTABLE entre 7 y 8
    SOBRESALIENTE entre 9 y 10
*/

/*
let nota = parseFloat(prompt("Introduce una nota entre 0 y 10: "));

function comprobarNota() {

    if (isNaN(nota) || nota < 0 || nota > 10) {

        alert("Error: la nota debe estar entre 0 y 10.");

    } else if (nota < 5) {

        alert("SUSPENSO");

    } else if (nota < 6) {

        alert("APROBADO");

    } else if (nota < 7) {

        alert("BIEN");

    } else if (nota < 9) {

        alert("NOTABLE");

    } else {

        alert("SOBRESALIENTE");
    }
}

comprobarNota();
*/

// 13. Realizar un programa que lea una fecha de nacimiento de la forma día, mes, año, y dé como resultado el número de Tarot. El programa verificará si la fecha es correcta. El número de Tarot se calcula sumando los números de la fecha de nacimiento y reduciéndolos a un único dígito. Por ejemplo, si su fecha de nacimiento es 20 de julio de 1984, el número de Tarot sería: 20 + 7+ 1984 = 2011⇒ 2 + 0 + 1 + 1 = 4

/*
let dia = parseInt(prompt("Introduce el día de nacimiento: "));
let mes = parseInt(prompt("Introduce el mes de nacimiento: "));
let año = parseInt(prompt("Introduce el año de nacimiento: "));

function esFechaCorrecta() {

    let fecha = new Date(año, mes - 1, dia);

    return (
        fecha.getFullYear() === año &&
        fecha.getMonth() === mes - 1 &&
        fecha.getDate() === dia
    );
}

function calcularTarot() {

    if (!esFechaCorrecta()) {

        alert("La fecha introducida no es correcta.");
        return;
    }

    let suma = dia + mes + año;

    while (suma >= 10) {

        let texto = suma.toString();
        suma = 0;

        for (let i = 0; i < texto.length; i++) {
            suma += parseInt(texto[i]);
        }
    }

    alert("Tu número de Tarot es: " + suma);
}

calcularTarot();
*/

// TODAS LAS ESTRUCTURAS DE CONTROL

// NOTA: Validar las entradas oportunas y construir los algoritmos de manera que se ejecuten cuantas veces deseemos con el fin de depurar el código sin salir del programa.


// 14. Estamos interesados en calcular los ingresos medios de un conjunto de hombres y mujeres. Para ello disponemos de un documento donde se recoge si se trata de un hombre (H) o una mujer (M) y su sueldo correspondiente. La entrada de datos termina cuando se lee un * como sexo. Se validarán todas las entradas, el sexo será H o M y el sueldo entre los 1000 y 2000 euros independientemente de que el trabajador sea hombre o mujer.

/*
let sexo;
let sueldo;

let sumaHombres = 0;
let cantidadHombres = 0;

let sumaMujeres = 0;
let cantidadMujeres = 0;

do {

    sexo = prompt("Introduce el sexo (H/M). Escribe * para terminar:");

    if (sexo === "*") {
        break;
    }

    sexo = sexo.toUpperCase();

    if (sexo !== "H" && sexo !== "M") {

        alert("Error: el sexo debe ser H o M.");

    } else {

        sueldo = parseFloat(prompt("Introduce el sueldo entre 1000 y 2000 €:"));

        if (isNaN(sueldo) || sueldo < 1000 || sueldo > 2000) {

            alert("Error: el sueldo debe estar entre 1000 y 2000 €.");

        } else {

            if (sexo === "H") {
                sumaHombres += sueldo;
                cantidadHombres++;
            } else {
                sumaMujeres += sueldo;
                cantidadMujeres++;
            }
        }
    }

} while (sexo !== "*");

let resultado = "";

if (cantidadHombres > 0) {
    resultado += "Media de los hombres: " +
        (sumaHombres / cantidadHombres).toFixed(2) + " €\n";
} else {
    resultado += "No hay hombres.\n";
}

if (cantidadMujeres > 0) {
    resultado += "Media de las mujeres: " +
        (sumaMujeres / cantidadMujeres).toFixed(2) + " €";
} else {
    resultado += "No hay mujeres.";
}

alert(resultado);
*/

// 15. Diseñar un programa que, dada una cierta cantidad de dinero que se leerá desde la entrada estándar, calcule cuál es el número mínimo de monedas de curso legal que equivalen a dicha cantidad de dinero.

/*
let cantidad = parseFloat(prompt("Introduce una cantidad de dinero en euros: "));

function calcularMonedas() {

    if (isNaN(cantidad) || cantidad < 0) {
        alert("Cantidad no válida.");
        return;
    }

    let centimos = Math.round(cantidad * 100);

    let monedas = [200, 100, 50, 20, 10, 5, 2, 1];

    let resultado = "";

    for (let i = 0; i < monedas.length; i++) {

        let numeroMonedas = Math.floor(centimos / monedas[i]);

        if (numeroMonedas > 0) {

            resultado +=
                "Monedas de " + (monedas[i] / 100) +
                " €: " + numeroMonedas + "\n";

            centimos = centimos % monedas[i];
        }
    }

    alert(resultado);
}

calcularMonedas();
*/

// 16. Diseñar un programa que lea de teclado un número entero positivo en base 10 y escriba su correspondiente representación binaria usando la técnica de divisiones sucesivas. 

/*
let numero = parseInt(prompt("Introduce un número entero positivo: "));

function convertirBinario() {

    if (isNaN(numero) || numero < 0 || !Number.isInteger(numero)) {

        alert("Error: introduce un número entero positivo.");
        return;
    }

    if (numero === 0) {
        alert("El número binario es: 0");
        return;
    }

    let binario = "";

    while (numero > 0) {

        let resto = numero % 2;

        binario = resto + binario;

        numero = Math.floor(numero / 2);
    }

    alert("El número en binario es: " + binario);
}

convertirBinario();
*/

// 17. Escribe un algoritmo que lea desde la entrada estándar dos fechas dadas por día, mes y año y calcule cuál de ellas es anterior a la otra. 

/*
let dia1 = parseInt(prompt("Introduce el día de la primera fecha: "));
let mes1 = parseInt(prompt("Introduce el mes de la primera fecha: "));
let año1 = parseInt(prompt("Introduce el año de la primera fecha: "));

let dia2 = parseInt(prompt("Introduce el día de la segunda fecha: "));
let mes2 = parseInt(prompt("Introduce el mes de la segunda fecha: "));
let año2 = parseInt(prompt("Introduce el año de la segunda fecha: "));

function fechaCorrecta(dia, mes, año) {

    let fecha = new Date(año, mes - 1, dia);

    return (
        fecha.getFullYear() === año &&
        fecha.getMonth() === mes - 1 &&
        fecha.getDate() === dia
    );
}

function compararFechas() {

    if (
        !fechaCorrecta(dia1, mes1, año1) ||
        !fechaCorrecta(dia2, mes2, año2)
    ) {
        alert("Una de las fechas no es correcta.");
        return;
    }

    let fecha1 = new Date(año1, mes1 - 1, dia1);
    let fecha2 = new Date(año2, mes2 - 1, dia2);

    if (fecha1 < fecha2) {

        alert("La primera fecha es anterior.");

    } else if (fecha1 > fecha2) {

        alert("La segunda fecha es anterior.");

    } else {

        alert("Las dos fechas son iguales.");
    }
}

compararFechas();
*/

// 18. Realiza un algoritmo que solicite del usuario un tiempo dado en segundos y calcule y presente en pantalla dicho tiempo pero expresado en horas, minutos y segundos.

/*
let segundos = parseInt(prompt("Introduce una cantidad de segundos: "));

function convertirTiempo() {

    if (isNaN(segundos) || segundos < 0) {
        alert("Introduce una cantidad válida de segundos.");
        return;
    }

    let horas = Math.floor(segundos / 3600);

    segundos = segundos % 3600;

    let minutos = Math.floor(segundos / 60);

    segundos = segundos % 60;

    alert(
        "Horas: " + horas +
        "\nMinutos: " + minutos +
        "\nSegundos: " + segundos
    );
}

convertirTiempo();
*/

// 19. Diseña un algoritmo para simular el juego de ¿dónde está la bolita? (trileros), famoso timo practicado por los llamados trileros .En nuestro caso el ordenador será un honrado trilero que no engañará al usuario que juegue con él.

/*
let jugar = true;

while (jugar) {

    let posicionBolita = Math.floor(Math.random() * 3) + 1;

    let eleccion = parseInt(
        prompt(
            "¿Dónde está la bolita?\n\n" +
            "1. Vaso izquierdo\n" +
            "2. Vaso central\n" +
            "3. Vaso derecho"
        )
    );

    if (eleccion < 1 || eleccion > 3 || isNaN(eleccion)) {

        alert("Error: debes elegir 1, 2 o 3.");

    } else if (eleccion === posicionBolita) {

        alert("¡Has acertado! La bolita estaba en el vaso " + posicionBolita);

    } else {

        alert(
            "Has fallado \n" +
            "La bolita estaba en el vaso " + posicionBolita
        );
    }

    let continuar = prompt(
        "¿Quieres volver a jugar?\n" +
        "Escribe S para continuar o N para salir."
    );

    if (continuar.toUpperCase() === "N") {
        jugar = false;
    }
}

alert("Fin del juego.");
*/