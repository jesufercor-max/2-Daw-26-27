# BOLETÍN EJERCICIOS PYTHON
# 1. Imprime &quot;Hola, mundo!&quot; en la pantalla.

"""
print("Hola mundo")
"""

# 2. Calcula la suma de dos números ingresados por el usuario.

"""
n1= int(input("Inreoduce el numero 1: "))
n2= int(input("Introduce el 2: "))
suma = n1 + n2
print("la suma de " + str(n1) + " y " + str(n2) + ", es igual a " + str(suma) + ".")
"""

# 3. Calcula el área de un triángulo con la fórmula: Área = (base * altura) / 2.

"""
base =int(input("Dime la base: "))
altura =int(input("Dime la altura: "))
area = (base*altura)/2
print("El area del triangulo es: " +str(area) + ".")
"""

# 4. Convierte grados Celsius a Fahrenheit.

"""
grados = float(input("Introduce los grados: "))
formula = float(grados * 1.8) + 32
print("es: " + str(formula))
"""

# 5. Calcula el factorial de un número.

"""
numero = 7
factorial = 1

for x in range(1, numero + 1):
    factorial = factorial * x

print(f"El factorial de {numero} es {factorial}")
"""    
    

# 6. Verifica si un número es par o impar.

"""
nuemero1=int(input("escribe el nunmero: "))

if (nuemero1 %2==0): 
    print("par")
else:
    print("impar")
"""

# 7. Calcula el máximo común divisor (MCD) de dos números.

    

# 8. Imprime los números del 1 al 10 usando un bucle for.

"""
for x in range(0 , 100 ):
    print(x+1)
"""

# 9. Calcula la suma de los números del 1 al 100.

"""
suma=0

for x in range(0, 101):
    suma = suma + x
print(suma)
"""

# 10. Crea una lista de números y calcula su promedio.

"""
lista = [1,2,3,4,5,6,7,8,9,10]

contador = len(lista)
promedio= sum(lista)/contador
print(promedio)
"""

#11. Crea una clase llamada Persona con atributos nombre y edad. Luego, crea un objeto de tipo Persona e imprime sus atributos.

"""
class Persona():
    def __init__(self, nombre, edad = ""):
        self.nombre = nombre
        self.edad = edad

persona1= Persona("Jesus", '25')
print("se llama" ,persona1.nombre, " y tiene " , persona1.edad, " años")
"""

# 12. Crea una clase llamada Rectangulo con atributos ancho y altura. Agrega un método para calcular el área del rectángulo y otro para calcular su perímetro.

"""
class Rectangulo():
    def __init__(self, ancho, altura = ""):
        self.ancho = ancho
        self.altura = altura
    
    def calcularArea(self):
        return (self.ancho*self.altura)

    def calcularPerimetro(self):
        return((self.ancho*2) + (self.altura*2))

rectangulo1= Rectangulo( 3 , 4)
print(rectangulo1.calcularArea()) 
print(rectangulo1.calcularPerimetro())
"""

# 13. Crea una clase llamada Estudiante con atributos nombre, edad y curso. Crea varios objetos de tipo. Estudiante y almacénalos en una lista. Luego, itera sobre la lista e imprime la información de cada estudiante.


class Estudiante():
    def __init__(self, nombre, edad, curso = ""):
        self.nombre = nombre
        self.edad = edad
        self.curso = curso
    
    def mostrarNombre(self):
         return("Nombre: " , self.nombre)
    
    def mostrarEdad(self):
         return("Edad: " , self.edad)
    
    def mostrarCurso(self):
         return("Curso: " , self.curso)
        
estudiante1 = Estudiante ("Jesus" , 25 , '2º')
estudiante2 = Estudiante ("Ana" , 20 , '2º')
estudiante3 = Estudiante ("Carlos" , 25 , '1º')

listaEstudiante =[estudiante1,estudiante2,estudiante3]

for estudiante in listaEstudiante:
    print(estudiante.mostrarNombre(),estudiante.mostrarEdad(),estudiante.mostrarCurso())

# 14. Crea una clase llamada CuentaBancaria con atributos titular y saldo. Agrega métodos para depositar y retirar dinero de la cuenta.

# 15. Crea una clase llamada Coche con atributos marca y modelo. Crea un método que imprima la información del coche en un formato legible.

# 16. Crea una clase base llamada Animal con un método hablar que imprima un mensaje genérico. Luego, crea dos clases derivadas, Perro y Gato,que hereden de Animal y sobrescriban el método hablar para imprimir mensajes diferentes.

# 17. Crea una clase base llamada FiguraGeometrica con atributos ancho y altura, y un método area que calcule el área de la figura. Luego, crea clases derivadas como Rectangulo y Triangulo que hereden de FiguraGeometrica y sobrescriba en el método area para calcular el área específica de cada figura.

# 18. Crea una clase base llamada Vehiculo con atributos marca y modelo, y un método informacion que imprima la información del vehículo. Luego, crea clases derivadas como Coche y Bicicleta que hereden de Vehiculo y añadan atributos y métodosespecíficos de cada tipo de vehículo.

# 19. Crea una clase base llamada InstrumentoMusical con un método tocar que imprima un mensaje genérico. Luego, crea clases derivadas como Piano y Guitarra que hereden de InstrumentoMusical y sobrescriban el método tocar para imprimir mensajes diferentes.

# 20. Crea una clase base llamada Empleado con atributos nombre y salario, y un método calcular_salario_anual que calcule el salario anual del empleado. Luego, crea clases derivadas como Gerente y Programador que hereden de Empleado y añadan atributos y métodos específicos de cada tipo de empleado