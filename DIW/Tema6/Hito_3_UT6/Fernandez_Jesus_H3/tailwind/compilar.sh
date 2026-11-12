#!/usr/bin/env bash
# Regenera css/tailwind.css desde src/input.css.
# No necesita root ni Node: usa el ejecutable autónomo de Tailwind CSS,
# que se descarga en ./bin/ (solo la primera vez).
# Uso:   cd tailwind   &&   bash compilar.sh
set -e
cd "$(dirname "$0")"

BIN=./bin/tailwindcss
if [ ! -x "$BIN" ]; then
  case "$(uname -s)-$(uname -m)" in
    Linux-x86_64)  F=tailwindcss-linux-x64 ;;
    Linux-aarch64) F=tailwindcss-linux-arm64 ;;
    Darwin-arm64)  F=tailwindcss-macos-arm64 ;;
    Darwin-x86_64) F=tailwindcss-macos-x64 ;;
    *) echo "Sistema no reconocido: $(uname -s)-$(uname -m)"; exit 1 ;;
  esac
  mkdir -p bin
  URL="https://github.com/tailwindlabs/tailwindcss/releases/latest/download/$F"
  echo "Descargando $URL"
  if command -v curl >/dev/null; then curl -fsSL -o "$BIN" "$URL"
  else wget -q -O "$BIN" "$URL"; fi
  chmod +x "$BIN"
fi

"$BIN" -i ./src/input.css -o ./css/tailwind.css --minify
echo "Listo: css/tailwind.css regenerado ($(wc -c < css/tailwind.css) bytes)"
