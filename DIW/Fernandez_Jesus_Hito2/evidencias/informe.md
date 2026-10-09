# FitHome · Hito 2 · UT3

**Alumno:** Apellido, Nombre (sustituir por los datos de entrega)  
**Curso:** 2.º DAW · 2026/2027  
**Proyecto:** FitHome — ejercicios de gimnasio en casa.  
**Fecha de comprobación:** completar el día en que realices las pruebas.

## Decisiones de diseño

Se mantiene la temática del Hito 1: ejercicios para entrenar en casa. La interfaz se inspira en el wireframe de FitHome: cabecera compartida, marca, navegación, bloque de bienvenida, categorías y tarjetas de ejercicios. La paleta usa azul índigo, fondo gris claro y acento lima; el tema oscuro conserva la jerarquía y el contraste. Las ilustraciones SVG son recursos locales propios del proyecto, sin frameworks ni dependencias externas.

## RA2.a · Presentación HTML

- **Archivos:** `laboratorio.html`, `css/tema-claro.css`, `css/tema-oscuro.css`.
- **Fragmento:** bloque `.muestra-comun`, con el mismo HTML bajo ambos temas.
- **Qué demuestra:** al cambiar la hoja se modifican fondo, texto, enlaces y bordes, pero no cambia la estructura ni el contenido.
- **Capturas pendientes:** `evidencias/capturas/RA2a-tema-claro.png` y `RA2a-tema-oscuro.png`. Captura el mismo bloque en ambos temas y conserva el mismo tamaño de ventana.
- **Comprobación:** repetir la comparación después de extraer el ZIP. No marcar como realizada hasta obtener ambas capturas.

## RA2.b · Estilos directos

- **Archivo:** `laboratorio.html`.
- **Fragmento:** párrafo con `style="color: ...; background-color: ...; padding: ..."` y bloque `<style>` que define `.demo-cascada`.
- **Qué demuestra:** el estilo directo se escribe en el propio elemento; el bloque interno agrupa reglas en el documento. Los dos son menos cómodos de mantener a escala que las hojas externas.
- **Captura pendiente:** `evidencias/capturas/RA2b-estilos-directos.png`. Deben verse el párrafo naranja y el ejemplo de clase interna.
- **Comprobación:** abrir el inspector y localizar ambas declaraciones. La portada y la página de ejercicios siguen usando CSS externo.

## RA2.c · Hojas externas

- **Archivos:** `index.html`, `segunda-pagina.html`, `laboratorio.html`, `css/base.css` y las hojas de tema.
- **Fragmento:** los tres documentos enlazan `css/base.css` y `css/tema-claro.css` mediante rutas relativas.
- **Qué demuestra:** estructura común separada de los colores y detalles visuales. La clase `.marca` o `.tarjeta` se define una sola vez en `base.css`.
- **Captura pendiente:** `evidencias/capturas/RA2c-css-externo.png`. Muestra el inspector con los enlaces de CSS y una regla de `base.css` aplicada.
- **Comprobación:** abrir las tres páginas desde la carpeta extraída y revisar que no hay recursos externos obligatorios.

## RA2.d · Hojas alternativas

- **Archivos:** `index.html`, `segunda-pagina.html`, `laboratorio.html`, `css/tema-claro.css`, `css/tema-oscuro.css`.
- **Fragmento:** `stylesheet` con título `Claro` y `alternate stylesheet` con título `Oscuro`.
- **Procedimiento:** en Firefox de escritorio, probar **Alt → Ver → Estilo de página → Oscuro** y volver a **Claro**. Si ese menú no aparece, editar temporalmente los dos atributos `rel` intercambiando `stylesheet` y `alternate stylesheet`, recargar y capturar; después restaurar Claro como preferido.
- **Capturas pendientes:** `evidencias/capturas/RA2d-claro.png` y `RA2d-oscuro.png`, del mismo documento y con encuadre comparable.
- **Comprobación:** no dejar las dos hojas de tema activas a la vez.

## RA2.e · Redefinición y cascada

- **Archivo:** `laboratorio.html`.
- **Reglas en conflicto:** `.demo-cascada { color: #b42318; }` e `#conflicto.demo-cascada { color: #4f46e5; }`.
- **Valor calculado esperado:** `rgb(79, 70, 229)` (índigo/morado) para el elemento con `id="conflicto"`.
- **Motivo:** ambas declaraciones son normales y del mismo origen; el selector que contiene un ID tiene más especificidad que una clase. No se utiliza `!important`.
- **Captura pendiente:** `evidencias/capturas/RA2e-cascada-inspector.png`. En el inspector debe verse la regla roja tachada y la regla con ID activa.
- **Comprobación:** seleccionar el párrafo en las herramientas de desarrollador y confirmar el color calculado.

## RA2.f · Propiedades y distribución

- **Archivo:** `css/base.css`.
- **Ejemplos:** Flexbox en `.nav-contenido`, `.pie-contenido` y `.cta-final`; Grid en `.hero`, `.descubrimiento`, `.rejilla-tarjetas` y `.formulario`.
- **Caja y tipografía:** `box-sizing: border-box`, tamaños fluidos con `clamp()`, espaciados consistentes y ancho máximo de contenido.
- **Prevención de desbordamientos:** rejillas `minmax(0, 1fr)`, imágenes `max-width: 100%`, controles de formulario con `min-width: 0` y media queries para pantallas estrechas.
- **Capturas pendientes:** `RA2f-flex-grid.png` con inspector/reglas visibles y capturas responsive descritas abajo.
- **Comprobación:** revisar que no aparece desplazamiento horizontal a 360, 768 y 1280 px; anotar cualquier incidencia real.

## RA2.g · Clases reutilizables

- **Archivos:** `css/base.css`, `index.html`, `segunda-pagina.html`, `laboratorio.html`.
- **Fragmento:** `.tarjeta` se usa en seis tarjetas de `segunda-pagina.html`; `.tarjeta.tarjeta-destacada` es una variante combinada que cambia el borde y la posición sin duplicar las reglas de la tarjeta.
- **Captura pendiente:** `evidencias/capturas/RA2g-clases.png`, mostrando varias tarjetas y la variante en el laboratorio.
- **Comprobación:** inspeccionar el HTML y confirmar que la variante mantiene la clase base.

## RA2.h · Validación CSS

- **Archivos a validar:** `css/base.css`, `css/tema-claro.css`, `css/tema-oscuro.css` y las reglas CSS de `laboratorio.html` (bloque `<style>` y atributo `style`).
- **Procedimiento:** enviar cada hoja por separado al [W3C CSS Validation Service](https://jigsaw.w3.org/css-validator/) usando entrada directa. Para el bloque y el atributo del laboratorio, copiar sus declaraciones a un archivo CSS de prueba equivalente y validar también ese archivo.
- **Estado:** **pendiente de ejecutar por el alumno**. No se afirma un resultado de validez que no se haya obtenido.
- **Registro:** en `evidencias/validacion/registro.md`, anotar fecha, archivo, resultado literal y avisos pendientes. Guardar las capturas o informes obtenidos en esa carpeta.

## Responsive · evidencias preparatorias RA2.i

- **Capturas pendientes:** `evidencias/capturas/responsive-360.png`, `responsive-768.png` y `responsive-1280.png`.
- **Cómo hacerlas:** abrir `index.html`, activar las herramientas de desarrollador/responsive design, introducir exactamente cada ancho y capturar la página principal. Procura mostrar cabecera, hero y tarjetas; puedes hacer capturas adicionales para el contenido inferior.
- **Puntos de cambio CSS:** `900px` (rejilla de tarjetas pasa a dos columnas y el hero se estrecha) y `560px` (tarjetas en una columna, cabecera y formulario se reorganizan). Anota si el resultado observado coincide.
- **Comprobación:** no ocultar desbordamientos para disimular fallos; revisar scroll horizontal y legibilidad.

## Prueba final del ZIP

1. Extraer el ZIP en una carpeta nueva.
2. Abrir `index.html` y recorrer Inicio, Ejercicios y Laboratorio.
3. Probar los enlaces de tarjetas y las anclas de categorías.
4. Completar el formulario de prueba; no transmite ni almacena información.
5. Cambiar entre los temas claro y oscuro con el procedimiento de RA2.d.
6. Completar las capturas y los resultados de validación antes de entregar.

## Fuentes y ayudas

- Diseño de partida: archivo Figma del Hito 1, `H1_EjerciciosGym_JesusFernandez`.
- Ayuda de desarrollo: asistencia de ChatGPT para organizar la estructura y revisar el CSS. El alumno debe comprobar el resultado, comprender las reglas y adaptar el informe con sus propias evidencias.
- No se han incorporado frameworks ni plantillas completas externas.
