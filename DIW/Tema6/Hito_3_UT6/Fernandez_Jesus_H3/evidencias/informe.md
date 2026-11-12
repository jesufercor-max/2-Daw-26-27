# FitHome · Hito 3 · Variante responsive con Tailwind

**Alumno:** Jesús Fernández · **Curso:** 2.º DAW · DIW · 2026/2027 · **Fecha:** 12/11/2026
**Criterio:** RA2.i (uso de tecnologías y frameworks responsive; se completa con el Hito 4)

## 1. Pantallas y rutas

| Función | Versión CSS propio (Hito 2) | Versión Tailwind (Hito 3) |
|---|---|---|
| Listado / catálogo | `original_css/index.html` | `tailwind/index.html` |
| Detalle | `original_css/detalle.html` | `tailwind/detalle.html` |

- Recursos: `original_css/recursos/imagenes/` y `tailwind/recursos/imagenes/` (cada versión se abre por separado).
- Estilos: `original_css/css/{base,tema-claro,tema-oscuro}.css` frente a `tailwind/css/tailwind.css`, generado desde `tailwind/src/input.css`.
- Método Tailwind: **CSS compilado de Tailwind v4** (no se usa el script Browser, no hay `vendor/`). Orden para regenerarlo: `cd tailwind && bash compilar.sh` (descarga el ejecutable de Tailwind sin necesitar root).
- Navegación: Inicio → tarjeta / «Ver ejercicio» → Detalle → logo, «Ejercicios» o migas → Inicio. «Empezar entrenamiento» abre `../original_css/entrenamiento.html` porque esa pantalla queda fuera del hito.
- Sin Bootstrap en ninguna de las dos pantallas. Se retiró `base.css`, `tema-claro.css` y `tema-oscuro.css` de la variante.

## 2. Cinco equivalencias reales (más una)

**1. Rejilla del catálogo (3 → 2 → 1 columnas)**
- Original (`base.css`): `.rejilla{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}`; en `@media(max-width:900px)` pasa a `repeat(2,…)`; en `@media(max-width:600px)` a `1fr` con `gap:10px`.
- Tailwind (`index.html`, `#catalogo`): `grid grid-cols-1 gap-2.5 sm:grid-cols-2 sm:gap-4.5 lg:grid-cols-3`.
- Efecto conservado: 1, 2 y 3 columnas. `grid-cols-N` genera `repeat(N, minmax(0,1fr))`, la misma protección contra desbordamiento que escribí a mano.

**2. Cabecera: el menú pasa a otra línea en móvil**
- Original: `.cabecera{display:flex;align-items:center;justify-content:space-between;gap:16px}`; en ≤600 px `flex-wrap:wrap` y `.navegacion{order:3;width:100%;justify-content:center}`.
- Tailwind (`<header>` y `<nav>`): `flex flex-wrap items-center justify-between gap-4 sm:flex-nowrap` y `order-3 w-full justify-center sm:order-none sm:w-auto`.
- Efecto conservado: logo y racha en la primera línea y menú centrado en la segunda por debajo de 600 px.

**3. Tarjeta horizontal en móvil**
- Original: `.tarjeta{overflow:hidden;border-radius:17px}` y, en ≤600 px, `display:grid;grid-template-columns:105px minmax(0,1fr);min-height:104px`.
- Tailwind (`<article>`): `grid grid-cols-[105px_minmax(0,1fr)] min-h-26 overflow-hidden rounded-[17px] sm:block`.
- Efecto conservado: miniatura de 105 px y texto al lado en móvil, tarjeta vertical desde 600 px. Tailwind es *mobile-first*: lo móvil va sin prefijo y `sm:block` deshace la rejilla.

**4. Detalle: foto + información**
- Original: `.detalle-rejilla{display:grid;grid-template-columns:1fr 1fr;gap:40px}`; ≤900 px `gap:20px`; ≤600 px `grid-template-columns:1fr`.
- Tailwind (`detalle.html`): `grid gap-5 sm:grid-cols-2 lg:gap-10`.
- Efecto conservado: una columna en móvil, dos desde 600 px y separación mayor desde 900 px.

**5. Estado hover del botón y color de marca**
- Original (`tema-claro.css`): `.boton{background:#5348ee;color:#fff}` y `.boton:hover{background:#392bca}`.
- Tailwind (`<button>` del formulario y «Empezar entrenamiento»): `bg-marca text-white hover:bg-marca-osc`, con `--color-marca:#5348ee` y `--color-marca-osc:#392bca` definidos en `@theme`.
- Efecto conservado: el botón se oscurece al pasar el ratón. Comprobado: `rgb(83,72,238)` → `rgb(57,43,202)`.

**6. Chips de categorías**
- Original: `.chips{display:flex;flex-wrap:wrap;gap:8px}`; en ≤600 px `gap:5px`.
- Tailwind: `flex flex-wrap gap-1.5 sm:gap-2`.
- Efecto conservado: los chips pasan a otra línea (a 360 px «Cardio» baja) sin desbordar.

## 3. Dos decisiones responsive

**Decisión A · 600 px: catálogo de 1 a 2 columnas y tarjeta horizontal → vertical.**
En 599 px la tarjeta mide 567 px y es horizontal (104 px de alto, miniatura de 105 px): una tarjeta vertical tan ancha obligaría a recortar mucho la foto. En 600 px el catálogo pasa a 2 columnas de 265 px con tarjeta vertical (298 px de alto). Por debajo de 600 px dos columnas dejarían tarjetas de unos 160 px en un móvil de 360 px, demasiado estrechas para «Sentadilla isométrica». El detalle también pasa a 2 columnas de 264 px en 600 px.

**Decisión B · 900 px: de 2 a 3 columnas y filtros de columna a fila.**
En 899 px hay 2 columnas de 415 px. En 900 px hay 3 de 271 px; con menos ancho, 3 columnas bajarían de ~230 px (a 768 px serían 227 px). A 900 px también el buscador y los chips pasan a una sola fila (`lg:flex-row`); por debajo, apilados, el buscador ocupa todo el ancho y los chips no se aprietan.

**Dato importante:** Tailwind usa `min-width`, así que el cambio ocurre *en* 600 y *en* 900. El CSS original usaba `max-width`, que sigue aplicando en 600 y 900. Por eso, en exactamente 600 px la variante ya tiene 2 columnas y el original todavía 1; ídem con 900 px. Lo comprobé a 599/600 y 899/900.

## 4. Cómo cambiaría un color y un espaciado global

| | CSS propio (Hito 2) | Tailwind (Hito 3) |
|---|---|---|
| **Color de marca** | El violeta está repetido con valores casi iguales (`#5348ed`, `#5546f1`, `#6354f1`, `#5348ee`) en 11 declaraciones de `base.css` y `tema-claro.css`, más el tema oscuro. Habría que buscar y reemplazar en varios archivos. | Cambio `--color-marca` en `@theme` de `src/input.css` y ejecuto `npm run build`; las 52 apariciones de `*-marca` en las dos pantallas se actualizan. |
| **Espaciado lateral global** | `26px` está en `.contenedor`, `.cabecera` y `.pie` (3 reglas) y `16px` en sus versiones móviles. | `--spacing` escala todo `p-*`, `gap-*` y `size-*`. Pero el margen lateral `px-4 sm:px-6.5` está escrito en cabecera, `<main>` y pie de cada página; tendría que editarlo en 6 sitios o extraerlo a una utilidad propia. |

## 5. Ventaja y dificultad de cada enfoque

**CSS propio**
- Ventaja: `.tarjeta` se escribe una vez y las seis tarjetas del HTML solo llevan `class="tarjeta"`; el HTML queda corto.
- Dificultad: para entender una tarjeta tengo que saltar entre `.tarjeta` (línea ~244), la versión móvil (~700) y los colores en otro archivo (`tema-claro.css`); el comportamiento responsive está lejos del elemento.

**Tailwind**
- Ventaja: el comportamiento responsive se lee en el propio elemento: `grid-cols-1 sm:grid-cols-2 lg:grid-cols-3` en el `#catalogo` dice cuántas columnas hay en cada tramo sin salir del HTML.
- Dificultad: las seis tarjetas repiten la misma cadena larga de utilidades; si quiero cambiar el radio de las tarjetas, edito seis elementos (en el Hito 2 era una regla). Una solución sería extraer un componente o usar `@apply`.

## 6. Incidencias corregidas y comprobaciones razonadas

**Incidencia 1 · Desbordamiento con una palabra larga sin espacios.**
Al probar el detalle con un título y un paso de 70+ caracteres sin espacios, a 360 px el documento medía 719 px (barra horizontal) y a 768 px, 1097 px. `wrap-break-word` solo estaba en los títulos de las tarjetas. Lo añadí a `<main>` en las dos páginas (la propiedad `overflow-wrap` se hereda) y tras reconstruir el CSS el ancho volvió a 360 y 768 px. Comprobado con `document.documentElement.scrollWidth` frente a `clientWidth`.

**Incidencia 2 · Contenido oculto en móvil en la versión original.**
En el Hito 2, `base.css` ocultaba en ≤600 px la imagen del hero, la etiqueta del buscador y el título CATEGORÍAS, algo que la lista de comprobación de este hito pide evitar. Lo corregí en `original_css` (quitando esas tres reglas) y en la variante esos elementos siempre se ven: la imagen del hero queda debajo del texto en móvil (`h-36 w-full object-cover sm:h-full`).

**Comprobación razonada 1 · Teclado.**
Con Tab recorro 28 elementos en el listado y 8 en el detalle; el orden coincide con el visual (enlace de salto, logo, menú, buscador, chips, tarjetas, formulario, pie) y todos muestran un contorno de 3 px (`:where(a,button,input,textarea):focus-visible` con `outline-3 outline-offset-3 outline-marca`). El primer Tab muestra «Saltar al contenido».

**Comprobación razonada 2 · Zoom al 200 %.**
Un zoom de 200 % a 1280 px equivale a 640 px CSS. A 640 px el catálogo queda en 2 columnas, el menú en la primera línea y no hay desplazamiento horizontal (`scrollWidth` = 640).

## 7. Registro de pruebas

Alto de ventana 800, zoom 100 %. Medido en modo adaptable / con script en Chromium; repetir y anotar el resultado en Firefox antes de entregar.

| Ancho | Catálogo | Detalle | Filtros | Menú | Scroll horizontal | Firefox |
|---|---|---|---|---|---|---|
| 360 | 1 col, tarjeta horizontal | 1 col | apilados | 2.ª línea | No | ☐ |
| 599 | 1 col, tarjeta horizontal | 1 col | apilados | 2.ª línea | No | ☐ |
| 600 | 2 col | 2 col | apilados | 1.ª línea | No | ☐ |
| 640 (zoom 200 %) | 2 col | 2 col | apilados | 1.ª línea | No | ☐ |
| 768 | 2 col | 2 col | apilados | 1.ª línea | No | ☐ |
| 899 | 2 col | 2 col | apilados | 1.ª línea | No | ☐ |
| 900 | 3 col | 2 col | en fila | 1.ª línea | No | ☐ |
| 1280 | 3 col | 2 col | en fila | 1.ª línea | No | ☐ |

También probado: título largo con espacios y palabra larga sin espacios en tarjetas (360/640/768/1280) y en el detalle (360/768), sin recortes ni desbordes; las imágenes cargan en todos los anchos; los enlaces internos y entre pantallas existen; hay un solo `h1` por página y los títulos van en orden.

## 8. Capturas

![alt text](<capturas/Tailwind index a 360px.png>)
![alt text](<capturas/Tailwind index a 768px.png>)
![alt text](<capturas/Tailwind index a 1280px.png>)
![alt text](<capturas/Tailwind detalle a 360px.png>)
![alt text](<capturas/Tailwind detalle a 768px.png>)
![alt text](<capturas/Tailwind detalle a 1280px.png>)

Original a 768 px, para comparar con la variante:

![alt text](<capturas/Original index a 768px.png>)
![alt text](<capturas/Original detalle a 768px.png>)

## 9. Limitaciones

Todas las tarjetas del listado enlazan al único detalle (Sentadillas); «Zancadas» reutiliza la imagen del hero porque no hay una imagen propia. La búsqueda, los chips y el formulario no filtran ni envían nada: son demostración, como en el Hito 2.

## 10. Fuentes y ayudas

Diseño e imágenes: PDF de Figma `H1_EjerciciosGym_JesusFernandez.pdf`. Variante, medidas y documentación preparadas con ayuda de Claude (Anthropic) y revisadas por mí; las capturas y las comprobaciones en Firefox las hago yo.
