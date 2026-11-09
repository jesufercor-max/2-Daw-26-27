# Registro UT6.2

**Nombre:** Jesús Manuel Fernández Cortés

## Variables

| Variable | Antes | Después | Componente y efecto comprobado |
|---|---|---|---|
| `$marca` | `#0d6efd` | `#075e56` | Botones principales. El color azul original cambia a verde oscuro. |
| `$fondo` | `#ffffff` | `#f4f7f8` | Fondo general de la página. Cambia de blanco a gris azulado claro. |
| `$radio` | `.375rem` | `.75rem` | Esquinas redondeadas de los componentes que utilizan el radio configurado. |

**Archivo de las variables:** `scss/_tema.scss`.

**Archivo donde se aplican a Bootstrap:** `scss/principal.scss`.

## Mixin panel

**Archivo y definición:**

Archivo: `scss/_utilidades.scss`.

El mixin `panel` recibe el parámetro `$fondo` y genera las siguientes propiedades:

- `background`: establece el color de fondo recibido como argumento.
- `padding`: utiliza el resultado de `espacio(6)`.
- `border-radius`: utiliza el valor de `tema.$radio`.
- `border`: establece un borde de `1px solid` utilizando `tema.$marca`.

**Dos selectores que lo incluyen y fondos utilizados:**

Archivo: `scss/principal.scss`.

```scss
.panel-info {
  @include u.panel(#e7f2ef);
}

.panel-ayuda {
  @include u.panel(#fff4df);
}
```

El panel de información utiliza un fondo verde claro (`#e7f2ef`) y el panel de ayuda utiliza un fondo amarillo claro (`#fff4df`). Ambos reutilizan el mismo mixin, pero reciben colores diferentes.

## Función espacio

**Archivo y definición:**

Archivo: `scss/_utilidades.scss`.

```scss
@function espacio($pasos) {
  @return $pasos * tema.$unidad;
}
```

La función recibe el número de pasos y lo multiplica por la unidad de espaciado definida en `scss/_tema.scss`. Devuelve una medida que puede utilizarse en las propiedades CSS.

**Argumento, cálculo y resultado usado en `margin-top`:**

Archivo donde se utiliza: `scss/principal.scss`.

```scss
.separacion-propia {
  margin-top: u.espacio(8);
}
```

Con `$unidad = .25rem`:

- Argumento: `8`.
- Cálculo: `8 × .25rem`.
- Resultado: `2rem`.
- Propiedad afectada: `margin-top` de la sección Ayuda.

Además, el mixin `panel` utiliza `u.espacio(6)` para calcular el relleno de ambos paneles:

- Cálculo: `6 × .25rem`.
- Resultado: `1.5rem`.

**Prueba temporal con `$unidad = .5rem` y resultado:**

Al cambiar temporalmente `$unidad` a `.5rem` y volver a compilar, los valores se duplican:

| Uso | Cálculo | Resultado |
|---|---|---|
| Relleno de los paneles | `6 × .5rem` | `3rem` |
| Margen superior de Ayuda | `8 × .5rem` | `4rem` |

**Confirmo que he restaurado `$unidad = .25rem`:** [Sí / No]

## Compilación

**Orden ejecutada:**

```bash
bash compilar.sh
```

El script compila `scss/principal.scss` y genera el archivo `css/estilos.css`.

**Resultado y fecha:**

- Resultado: [Indica si aparece `COMPILACION CORRECTA: css/estilos.css actualizado.`]
- Fecha de compilación: [DD/MM/AAAA]
- Archivo generado: `css/estilos.css`

**Fragmento del CSS generado (no del SCSS):**

Después de compilar, localiza los selectores en `css/estilos.css` y comprueba que contienen las declaraciones correspondientes. El resultado esperado para las propiedades principales es equivalente a:

```css
.panel-info {
  background: #e7f2ef;
  padding: 1.5rem;
  border-radius: 0.75rem;
  border: 1px solid #075e56;
}

.panel-ayuda {
  background: #fff4df;
  padding: 1.5rem;
  border-radius: 0.75rem;
  border: 1px solid #075e56;
}

.separacion-propia {
  margin-top: 2rem;
}
```

*Nota: este fragmento representa el resultado esperado para esas propiedades. Antes de entregarlo, comprueba los valores y selectores en tu CSS generado y copia el fragmento real, ya que Sass puede producir declaraciones adicionales.*

**Capturas:**

1. **Antes:** página con el color original, antes de modificar `$marca`.
2. **Después:** página con el color personalizado, al mismo ancho que la captura anterior.
3. **Terminal:** ejecución de `bash compilar.sh` con el mensaje de compilación correcta.
4. **CSS generado:** fragmento de `css/estilos.css` donde aparecen los dos paneles y el margen.

## Responsive y teclado

| Ancho | Columnas observadas | Desbordamiento | Corrección |
|---|---|---|---|
| 360 px | [Comprobar: esperado, 1] | [No] | [No fue necesario] |
| 767 px | [Comprobar: esperado, 1] | [No] | [No fue necesario] |
| 768 px | [Comprobar: esperado, 2] | [No] | [No fue necesario] |
| 991 px | [Comprobar: esperado, 2] | [No] | [No fue necesario] |
| 992 px | [Comprobar: esperado, 3] | [No] | [No fue necesario] |
| 1280 px | [Comprobar: esperado, 3] | [No] | [No fue necesario] |

Las columnas se organizan mediante las clases de Bootstrap `col-12`, `col-md-6` y `col-lg-4`. De esta forma, las tarjetas ocupan una columna en pantallas pequeñas, dos a partir de 768 px y tres a partir de 992 px.

**Prueba de formulario vacío y correo incorrecto:**

[Describe lo que has observado al intentar enviar el formulario sin completar los campos y al introducir un correo electrónico con formato incorrecto.]

**Recorrido con Tab y foco visible:**

[Indica si puedes recorrer los enlaces, botones y campos del formulario con Tab, y si se distingue visualmente el elemento que tiene el foco.]

## Explicación

**Una incidencia y cómo la he corregido:**

[Describe un problema real que hayas encontrado durante la práctica y cómo lo solucionaste. Por ejemplo, un error de compilación, una ruta incorrecta o un cambio que no se reflejaba en el navegador. Si no has tenido esos problemas, indica la incidencia que realmente hayas experimentado.]

**¿Qué diferencia hay entre SCSS y CSS?**

SCSS es una sintaxis de Sass que permite utilizar variables, mixins, funciones y otras herramientas para organizar y reutilizar estilos. El navegador no interpreta directamente SCSS, por lo que es necesario compilarlo para obtener CSS.

CSS es el lenguaje de estilos que interpreta el navegador para definir la apariencia de la página web. En esta práctica, el archivo `scss/principal.scss` es la fuente de los estilos y `css/estilos.css` es el resultado generado por la compilación.