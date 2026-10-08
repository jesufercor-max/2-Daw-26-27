# Registro de Incidencias y Respuestas - UT3.2

## Registro de Incidencias Detectadas y Corregidas

### Incidencia 1: Ancho fijo del contenedor y modelo de caja predeterminado
- **Selector:** `.contenedor` / `*`
- **Propiedad anterior:** `width: 1100px;` (sin `box-sizing: border-box;` explícito global)
- **Causa:** El contenedor mantenía un ancho rígido en px, provocando scroll horizontal masivo en dispositivos móviles (360 px / 768 px).
- **Cambio realizado:** Se aplicó `box-sizing: border-box` globalmente y se redefinió la clase con `width: calc(100% - 2rem); max-width: 1120px; margin-inline: auto;`.
- **Resultado:** El contenedor ahora es completamente fluido a 360 px (midiendo 328 px) y se mantiene centrado con un ancho máximo de 1120 px a 1280 px.

### Incidencia 2: Imagen rígida desbordando su contenedor
- **Selector:** `.imagen`
- **Propiedad anterior:** `width: 900px;`
- **Causa:** La imagen forzaba un ancho fijo de 900 px dentro de las tarjetas, haciendo que sobresaliera de su celda de Grid y del viewport.
- **Cambio realizado:** Se cambió a `max-width: 100%; width: 100%; height: auto;`.
- **Resultado:** La imagen escala proporcionalmente adaptándose al ancho exacto de la tarjeta a cualquier resolución.

### Incidencia 3: Cadena de texto larga sin espacios desbordando el ancho
- **Selector:** `.codigo`
- **Propiedad anterior:** *(sin propiedad de división de palabra especificada)*
- **Causa:** La cadena monolítica de código sobrepasaba el ancho físico de la tarjeta al no tener espacios donde romper línea.
- **Cambio realizado:** Se aplicó `overflow-wrap: anywhere;`.
- **Resultado:** La cadena de texto rompe línea de forma segura cuando alcanza el borde de la tarjeta, evitando el desbordamiento.

### Incidencia 4: Columnas fijas e inadaptables en la cuadrícula
- **Selector:** `.tarjetas`
- **Propiedad anterior:** Columnas fijas sin soporte responsivo / falta de reglas de media queries.
- **Causa:** No se reestructuraban los elementos según la anchura de la pantalla.
- **Cambio realizado:** Se configuró Grid móvil primero con `grid-template-columns: minmax(0, 1fr)` y se añadieron media queries para 2 columnas (`>= 600px`) y 3 columnas (`>= 1000px`).
- **Resultado:** Visualización limpia de 1 columna a 360 px, 2 columnas a 768 px y 3 columnas a 1280 px.

---

## Respuestas a las Preguntas de Autoevaluación

### 1. ¿Qué contenedor usa Flexbox y cuáles son sus hijos directos?
Los contenedores que usan Flexbox son:
- `.cabecera`: Sus hijos directos son el enlace de marca (`.marca`) y la lista de navegación (`.menu`).
- `.menu`: Sus hijos directos son los elementos de lista o enlaces directos de navegación (`<a>`).

### 2. ¿Por qué has usado Grid para las tarjetas?
Porque Grid está optimizado para distribuciones bidimensionales (filas y columnas) organizando las tarjetas en cuadrículas alineadas de forma homogénea, permitiendo variar fácilmente el número de columnas según la pantalla manteniendo un espacio uniforme (`gap`).

### 3. ¿Qué regla cambia el número de columnas a 768 px? Indica el selector y la condición.
La regla que aplica a 768 px es el breakpoint de 600 px:
- **Condición:** `@media (min-width: 600px)`
- **Selector:** `.tarjetas`
- **Declaración:** `grid-template-columns: repeat(2, minmax(0, 1fr));`

### 4. ¿Por qué `minmax(0, 1fr)` y `overflow-wrap` resuelven problemas diferentes?
- `minmax(0, 1fr)` actúa sobre el nivel de la **celda/contenedor del Grid**: permite que una columna de Grid pueda encogerse por debajo del contenido mínimo predeterminado de sus elementos.
- `overflow-wrap` actúa sobre el nivel del **texto/contenido**: le indica al motor de renderizado cómo dividir cadenas continuas de caracteres sin espacios cuando exceden el ancho disponible de su contenedor.

### 5. ¿Qué declaración producía uno de tus desbordamientos y cómo lo comprobaste?
La declaración `width: 900px;` en el selector `.imagen`. Se comprobó abriendo las Herramientas de Desarrollo (F12), activando la vista adaptable (Ctrl+Shift+M) a 360 px y desmarcando temporalmente la regla `width: 900px` en la pestaña de estilos. Al desactivarla, la barra de scroll horizontal desapareció inmediatamente.
