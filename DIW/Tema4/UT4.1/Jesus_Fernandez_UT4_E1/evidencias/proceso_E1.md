# Proceso UT4.E1

**Nombre:** Jesús Fernandez

## Herramientas
Para preparar los archivos se ha utilizado procesamiento multimedia local con FFmpeg y Pillow, aplicando los parámetros indicados por el laboratorio HTML suministrado. El laboratorio se conserva en `proyecto/laboratorio.html` para revisar y repetir los ajustes desde Firefox o Chromium.

**Alternativa:** GIMP para imagen, Audacity para audio y Shotcut o Kdenlive para vídeo. Son aplicaciones de escritorio con más controles de edición; el laboratorio reúne las operaciones básicas en una sola página y no necesita instalación.

## Imagen
Original `cartel_original.png` (1600 × 900 px). Se ha recortado un 2 % de cada borde, conservando la proporción, y redimensionado a 800 × 450 px. Se ha añadido el título «Observa, edita y comparte» en una banda `#075e56`. Se han exportado PNG y JPEG con calidad solicitada 0,8. El PNG pesa 47440 bytes y el JPEG 26182 bytes. El JPEG es la opción más ligera; el PNG conserva mejor los bordes de texto al no aplicar compresión con pérdida.

## Audio
Original `sonido_original.wav`: 8 s, mono, 44100 Hz, PCM de 16 bits; no contiene voz. Se ha recortado de 1 a 7 s, con ganancia 0,8 y fundidos de entrada y salida de 0,2 s. Las dos exportaciones duran 6 s y son mono PCM de 16 bits: 44100 Hz (529278 bytes) y 22050 Hz (264678 bytes). La versión de 22050 Hz ocupa un 50.0 % menos que la de 44100 Hz. Para esta secuencia de tonos sintéticos elegiría 22050 Hz si la escucha no revela una pérdida apreciable.

**Descripción textual del audio:** secuencia breve de tonos sintéticos suaves, sin habla ni música, con silencio al principio y al final del original; el fragmento exportado contiene los tonos entre los segundos 1 y 7.

El OGG de comparación dura 8 s y pesa 14973 bytes, frente a 705644 bytes del WAV original. La reducción es grande porque OGG aplica compresión con pérdida; no debe atribuirse a un simple recorte, ya que ambos originales duran 8 s.

## Vídeo
Original `clip_original.webm`, aproximadamente 10 s y 640 × 360 px, silencioso. Se ha recortado de 1 a 7 s, reducido a 480 × 270 px y añadido el mismo título que en la imagen, sobre banda verde. Se han generado dos WebM VP8 sin audio: 600 kbps solicitados (24115 bytes) y 1200 kbps solicitados (27397 bytes). Ambos duran 6 s. El peso real no tiene por qué duplicarse al duplicar el bitrate solicitado. El contenido visual muestra un cartel y un marcador que se desplaza horizontalmente.

La práctica pide abrir `clip_comparacion.mp4` y el WebM original en los navegadores disponibles. La compatibilidad debe comprobarse en el Firefox/Chromium del equipo de clase y anotarse tras la prueba; no se afirma aquí una comprobación que no se ha realizado en ese equipo. No se ha cambiado la extensión de ningún vídeo.

## Animación
Se han utilizado `fotograma_01.png`, `fotograma_02.png` y `fotograma_03.png`, ordenados por nombre. Cada imagen aparece 1 segundo y la secuencia se repite 2 veces. El resultado `animacion.webm` dura 6 s y muestra observa → edita → comparte dos veces. Procede de tres imágenes fijas, no de una grabación continua.

## Importación y exportación
Importar consiste en abrir el archivo original para que la herramienta lo pueda interpretar y editar. Exportar crea un archivo nuevo con los ajustes aplicados y un formato de salida concreto. `ajustes.json` guarda los nombres de los originales y los parámetros (tamaño, recorte, título, frecuencia, tiempos, bitrate y repeticiones), pero no contiene los bytes de los medios; para recuperar el trabajo hay que conservar y volver a seleccionar los originales.

## Optimización
Pareja comparable: `audio_44100.wav` y `audio_22050.wav`, ambos de 6 s, mono y PCM de 16 bits. La reducción de peso es (529278 − 264678) / 529278 × 100 = **50.0 %**.

El PNG final puede pesar más que el cartel original porque se ha añadido una banda y texto, y PNG no comprime con pérdida. No todas las exportaciones tienen que ser más pequeñas.

