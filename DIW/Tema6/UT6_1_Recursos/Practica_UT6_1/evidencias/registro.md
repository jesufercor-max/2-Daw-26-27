# UT6.1 · Registro
Nombre: Jesús Manuel Fernández Cortés
Fecha: 22/10/2026
Navegador y versión: Chrome 144.0 (o Firefox 145.0)

## 1. Observación inicial
Contenedor principal: El elemento <div id="pagina">.
Contenedor de tarjetas: El elemento <div id="tarjetas">.
Hijos directos de la cabecera: La marca (el enlace <a>) y el menú de navegación (<nav>).
Captura inicial a 360px: [agenda_inicio_360.png - Diseño inicial sin estilos con todo el contenido desmaquetado y apilado verticalmente].

## 2. Equivalencias (completa cinco)

| Elemento | CSS propio | Utilidad Tailwind | Qué cambia |
| --- | --- | --- | --- |
| Página (Base) | font-family: Arial; | font-[Arial] | Cambia la tipografía de la página a Arial. |
| Cabecera | display: flex; | flex | Activa el modelo de caja flexible en la cabecera. |
| Cabecera | justify-content: space-between; | justify-between | Distribuye el espacio separando la marca del menú. |
| Secciones | margin-top: 2rem; margin-bottom: 2rem; | my-8 | Añade margen de 32px arriba y abajo entre bloques. |
| Títulos H2 | font-weight: 700; | font-bold | Aplica texto en negrita a los encabezados de sección. |

Ancho del contenedor a 360px (raíz 16px): El ancho esperado es de **328px**. Se calcula restando 2rem (32px) a los 360px de la pantalla mediante la clase `w-[calc(100%-2rem)]`.
Diferencia entre ancho y ancho máximo: El ancho (`w-*`) obliga al elemento a ocupar un tamaño fijo o un porcentaje fluido de la pantalla, mientras que el ancho máximo (`max-w-*`) establece un límite de crecimiento: el elemento se encoge si la pantalla es pequeña pero nunca supera ese tamaño en pantallas grandes.
Significado de p-4, flex-col y mt-auto:
* p-4: Aplica un relleno interno (padding) de 1rem (16px) de forma uniforme en los cuatro lados.
* flex-col: Cambia la dirección del contenedor Flex a vertical, apilando los elementos hijos uno debajo de otro.
* mt-auto: Aplica un margin-top automático, lo que empuja el elemento hacia el extremo inferior dentro de su contenedor flex padre.

## 3. Agenda: resultados observados

| Ancho | Columnas | ¿Scroll horizontal? | ¿Contenido completo? |
| --- | --- | --- | --- |
| 360 | 1 columna | No | Sí, texto adaptado y cadena larga protegida. |
| 599 | 1 columna | No | Sí, se estira cubriendo el ancho móvil fluido. |
| 600 | 2 columnas | No | Sí, rejilla activada por min-[600px]:grid-cols-2. |
| 768 | 2 columnas | No | Sí, visualización perfectamente adaptada a tablets. |
| 999 | 2 columnas | No | Sí, mantiene la estructura de dos columnas de forma fluida. |
| 1000 | 3 columnas | No | Sí, rejilla de tres columnas por min-[1000px]:grid-cols-3. |
| 1280 | 3 columnas | No | Sí, diseño expandido con el tope de ancho máximo fijado. |

Tab y foco visible: Al pulsar la tecla Tab, el enlace o elemento seleccionado destaca visualmente gracias a las clases `focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[#9a3412]`, que crean un anillo de foco naranja-marrón muy claro y accesible.
Capturas finales 360/768/1280: [agenda_final_360.png, agenda_final_768.png, agenda_final_1280.png].

## 4. Dos incidencias o comprobaciones razonadas
1. Elemento, clases, causa, cambio y comprobación: El bloque de texto de inscripción desbordaba lateralmente la pantalla en 360px debido a una cadena continua muy larga. Se solucionó añadiendo la clase arbitraria `[overflow-wrap:anywhere]` junto a `font-mono`, `bg-[#e4eeeb]`, `border` y `p-4`. Al comprobarlo en el modo adaptable a 360px, la cadena se rompe y salta de línea correctamente sin generar scroll horizontal.
2. Elemento, clases, causa, cambio y comprobación: Los enlaces de la lista de navegación colisionaban con la marca al reducir la pantalla. Se aplicó `flex`, `flex-wrap` y `gap-3` en la etiqueta `<ul>` del menú. Al comprobarlo a 360px, los elementos del menú bajan de línea ordenadamente si les falta espacio, respetando la estructura de la cabecera.

## 5. Mi proyecto (Entrega en el Hito de la unidad)
Pantalla elegida y finalidad:
Ruta del original y de la variante:
Dos decisiones de traducción:
Breakpoints elegidos y motivo:
Pruebas a 360/768/1280:
Pareja de capturas al mismo ancho:
Diferencias visibles respecto al original:
¿Dónde cambias un color en cada versión?
¿Qué código se repite?
¿Qué versión te resulta más fácil de mantener? Ejemplo:
Parte pendiente, si la hay:

## 6. Respuestas

1. ¿Por qué la lista necesita su propio flex?
La lista necesita su propio contexto **Flexbox** para controlar de forma independiente la alineación, dirección y distribución de sus elementos hijos (los `<li>`), sin verse afectada por las reglas de flujo de su contenedor padre.

2. ¿Qué significa p-4?
En Tailwind CSS, `p-4` es una clase de utilidad que aplica un **padding de 1rem** (equivalente a **16px** por defecto) en los cuatro lados del elemento (arriba, abajo, izquierda y derecha).

3. ¿Qué cambia a 600 y a 1000px?
Estos valores actúan como **puntos de interrupción (breakpoints)** o Media Queries. El diseño se adapta de forma responsiva: a partir de **600px** el diseño suele cambiar de móvil a tableta, y a los **1000px** cambia a una configuración de escritorio (modificando columnas, tamaños de fuente o visibilidad).

4. ¿Por qué cambiar el orden de clases en conflicto no basta?
El orden de las clases dentro del atributo `class` del HTML no altera el resultado. El navegador aplica los estilos basándose en el **orden de definición dentro del archivo CSS final** y las reglas de especificidad, no en cómo se escriben en el HTML.

5. ¿Qué conserva Tailwind del HTML?
Tailwind conserva la **estructura semántica** del HTML, pero elimina casi todos los estilos visuales por defecto (como los tamaños de los `<h1>`, los márgenes y las viñetas de las listas) a través de su base de reseteo llamada **Preflight**.

6. ¿Script de aprendizaje o CSS preparado para publicar?
* El **script de aprendizaje** (como la CDN de Tailwind) compila los estilos en el navegador en tiempo real, lo que es lento y pesado para el usuario final.
* El **CSS preparado para publicar** se genera mediante una compilación previa (Tailwind CLI) que elimina el código no utilizado, optimizando el peso y la velocidad de la web para producción.

## 7. Entrega
[ ] He probado una copia extraída, también sin conexión.
[ ] Incluyo vendor y sus licencias.
[ ] Los enlaces funcionan y se ve el foco con Tab.
[ ] Incluyo seis capturas y el registro completo.
[ ] He conservado los contenidos.
