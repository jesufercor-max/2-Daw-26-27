#!/usr/bin/env bash
# Compilación local: no instala programas ni modifica el sistema.
set -euo pipefail
cd -- "$(dirname -- "${BASH_SOURCE[0]}")"
case "$(uname -m)" in
  x86_64) plataforma=linux-x64 ;;
  aarch64|arm64) plataforma=linux-arm64 ;;
  *) printf '%s\n' 'Este paquete admite Ubuntu de 64 bits (x86_64 o ARM64).'; exit 1 ;;
esac
motor="herramientas/$plataforma/dart-sass/src/dart"
fuente="herramientas/$plataforma/dart-sass/src/sass.snapshot"
if [[ ! -f "$motor" || ! -f "$fuente" ]]; then
  printf '%s\n' 'Falta el compilador. Extrae el ZIP completo, incluida herramientas/.' >&2
  exit 1
fi
# Solo da permiso de ejecución a un archivo de tu propia carpeta.
chmod u+x "$motor"
if [[ "${1:-}" == '--version' ]]; then
  exec "$motor" "$fuente" --version
fi
if [[ "$#" != 0 ]]; then
  printf '%s\n' 'Uso: bash compilar.sh [--version]' >&2
  exit 1
fi
mkdir -p css
salida_temporal="$(mktemp css/.compilacion-XXXXXX)"
trap 'rm -f -- "$salida_temporal"' EXIT
if "$motor" "$fuente" --load-path=vendor --quiet-deps \
    --silence-deprecation=import --no-source-map --no-error-css \
    scss/principal.scss "$salida_temporal"; then
  mv -- "$salida_temporal" css/estilos.css
  printf '%s\n' 'COMPILACION CORRECTA: css/estilos.css actualizado.' \
    'Vuelve al navegador y pulsa Ctrl+R.'
else
  printf '%s\n' 'ERROR: no se ha actualizado css/estilos.css.' \
    'Corrige el SCSS, guarda y vuelve a ejecutar bash compilar.sh.' >&2
  exit 1
fi
