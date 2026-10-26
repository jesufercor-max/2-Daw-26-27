# FitHome · Hito 2 · PureCSS

**Alumno:** Jesús Fernández · **Curso:** 2.º DAW · DIW · 2026/2027  
**Fecha de preparación:** 16/10/2026  
**Referencia visual:** PDF `H1_EjerciciosGym_JesusFernandez.pdf`, sección «Prototipo navegable». La exportación presenta Inicio, Detalle y Entrenamiento guiado, en móvil y escritorio.

## Estructura y decisiones

`index.html` es la portada; `detalle.html` presenta sentadillas; `entrenamiento.html` muestra el entrenamiento guiado; `completado.html` simula su final; `laboratorio.html` demuestra conceptos CSS. Todas las páginas tienen cabecera y navegación. Los recursos gráficos se extrajeron del PDF proporcionado por el alumno, sin enlaces externos obligatorios. El PDF contiene tres tarjetas principales: para satisfacer la exigencia de **seis**, se añadieron tres ejercicios de ejemplo con las imágenes disponibles. La búsqueda y los controles de reproducción son visuales, no implementan filtrado ni reproducción real; el formulario no tiene servidor.

## RA2.a · Presentación HTML

**Archivo:** `laboratorio.html`. **Fragmento:** dos contenedores con el mismo contenido (`h3`, `p`, `a`), clases `.demo-sin` y `.demo-con`. **Reglas:** `.demo-con` de `base.css` y `tema-claro.css`. **Efecto:** el segundo ejemplo tiene fondo, esquinas, sombra y título acentuado; el primero conserva la presentación sencilla. **Comprobación:** abrir laboratorio y comparar ambas tarjetas. **Capturas pendientes:** `capturas/ra2-a-sin.png` y `capturas/ra2-a-con.png`.

## RA2.b · Estilos directos

**Archivo:** `laboratorio.html`. El párrafo amarillo tiene `style="background:#fff0c2;..."` (atributo directo); `.ejemplo-interno` está en un bloque `<style>` dentro del `<head>`; `.demo-externa` se define en `css/base.css`. **Efecto:** fondo amarillo, borde discontinuo y borde lateral, respectivamente. **Mantenimiento:** el estilo directo afecta a un único elemento y es difícil de reutilizar; el interno se comparte dentro de la página; el externo sirve para múltiples páginas. **Comprobación:** inspeccionar los tres párrafos en herramientas de desarrollo.

## RA2.c · Hojas externas

**Archivos:** `index.html`, `detalle.html`, `entrenamiento.html`, `completado.html`, `laboratorio.html`. Todos enlazan `css/base.css` y `css/tema-claro.css` con rutas relativas. **Selector común:** `.cabecera` en `base.css`: cambiar `min-height:70px` cambia la cabecera de todas las páginas. **Comprobación:** abrir Inicio y Detalle, cambiar temporalmente la altura, comprobar y restaurar.

## RA2.d · Hojas alternativas

**Archivos:** `css/tema-claro.css` y `css/tema-oscuro.css`. En cada HTML, Claro tiene `rel="stylesheet" title="Claro"`; Oscuro tiene `rel="alternate stylesheet" title="Oscuro"`. **Procedimiento Firefox:** Alt → Ver → Estilo de página → Oscuro; repetir con Claro. **Alternativa:** intercambiar los valores de `rel` de ambos enlaces, recargar y restaurar el original. No activar ambos temas simultáneamente. **Comparar:** fondo, tarjetas, texto, botones, bordes y foco. **Capturas pendientes:** `capturas/tema-claro.png`, `capturas/tema-oscuro.png`.

## RA2.e · Redefinición y cascada

**Archivo:** `laboratorio.html`, bloque `<style>`. **Conflicto 1:** `.laboratorio .conflicto {color:#126e41}` (especificidad 0,2,0) y `.conflicto {color:#d02c42}` (0,1,0). **Valor calculado esperado:** `rgb(18, 110, 65)`; gana el verde por especificidad pese a estar primero. **Conflicto 2:** dos reglas `.empate`, primero `#126e41`, luego `#6047ec`. **Valor esperado:** `rgb(96, 71, 236)`; gana la última por orden, ya que empatan. **Comprobación pendiente:** confirmar ambos valores en el inspector y observar la regla tachada; no se usa `!important`.

## RA2.f · Propiedades y distribución

**Archivo:** `css/base.css`. **Flexbox:** `.cabecera`, `.filtros`, `.chips`, `.estadisticas`. **Grid:** `.rejilla`, `.detalle-rejilla`, `.entreno-grid`, `.contacto`. **Caja:** `*{box-sizing:border-box}`, relleno de `.tarjeta-contenido`, bordes redondeados de `.tarjeta`. **Tres medidas frente a desbordamientos:** (1) `.rejilla` usa `minmax(0,1fr)` y `.tarjeta{min-width:0}`; (2) imágenes con `max-width:100%` y `object-fit:cover`; (3) `.chips{flex-wrap:wrap}` y formulario con `min-width:0`. No se oculta el desbordamiento de la página para disimular errores. **Comprobación pendiente:** inspeccionar a 360, 768 y 1280 px sin scroll horizontal.

## RA2.g · Clases reutilizables

**Archivo:** `index.html` y `css/base.css`. **Clase:** `.tarjeta` aparece seis veces y centraliza bordes, espaciado y diseño. **Variante:** la primera tarjeta combina `class="tarjeta destacada"` para identificar una tarjeta principal; la variante se puede ajustar sin duplicar todas las reglas. **Comprobación:** inspeccionar las seis tarjetas y verificar su estructura común.

## RA2.h · Validación

**Archivos:** `base.css`, `tema-claro.css`, `tema-oscuro.css`, bloque `<style>` y atributo `style` del laboratorio. **Procedimiento:** https://jigsaw.w3.org/css-validator/ → entrada directa → pegar el contenido de cada CSS por separado → guardar captura o resultado con fecha en `evidencias/validacion/`. Para el bloque interno, pegar solo el contenido del `<style>`; para el atributo, usar una regla de prueba `.prueba {background:#fff0c2;color:#332600;padding:1rem;border-radius:8px}`. **Estado:** pendiente de validación W3C externa; no se declara un resultado no obtenido. Completar los resultados y avisos pendientes antes de entregar.

## Responsive (preparación RA2.i)

**Archivo:** `css/base.css`. Puntos de cambio: `900px` (tres a dos columnas de tarjetas y ajustes de distribución) y `600px` (una columna y tarjetas horizontales, hero compacto y detalle/entrenamiento apilados). **Evidencias por realizar:** `capturas/inicio-360.png`, `capturas/inicio-768.png`, `capturas/inicio-1280.png`. Verificar anchura de viewport con herramientas de desarrollo y ausencia de desplazamiento horizontal. En móvil, la cabecera conserva navegación accesible y las tarjetas cambian a formato horizontal.

## Comprobaciones de entrega

- Abrir `index.html` directamente desde la carpeta descomprimida.
- Recorrer Inicio → Sentadillas → Empezar entrenamiento → Completar serie → Inicio.
- Probar enlaces del menú y etiquetas del formulario (sin envío real).
- Activar Claro/Oscuro; comprobar 360/768/1280 px.
- Ejecutar validaciones W3C y guardar pruebas antes de entregar.

## Fuentes y ayudas

Diseño e imágenes: PDF de Figma aportado por el alumno, `H1_EjerciciosGym_JesusFernandez.pdf`. Código HTML/CSS y documentación generados con ayuda de ChatGPT; revisar y comprender el código, ajustar decisiones y completar personalmente las pruebas y capturas. Sin frameworks ni fuentes externas obligatorias.
