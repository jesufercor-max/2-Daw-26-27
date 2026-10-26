


// 1. Exporta una función

export function soyLaExportada(a,b,suma){
    suma=a+b
}


// 2. Exporta una constante

export const pi=3.14


// 3. Exporta una clase

export class vehiculo{
    constructor (nombre){
        this.nombre=nombre
    }
}


// 7. Exporta una función, una constante y una clase por defecto (en caso de que lo permita)

function vivaElBetis(){
    return "Viva el betis"
}

class Betis{
    constructor (saludar){
        this.saludar="Saludos desde el Villamarin"
    }
}

const partidosJugadosPorElSevillaEnChampions=0

export default{
    vivaElBetis,
    Betis,
    partidosJugadosPorElSevillaEnChampions
}

// 9. Exporta una función, una constante y una clase desde una carpeta



