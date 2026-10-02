const selector = document.querySelector('#selector-tema');
const hojas = document.querySelectorAll('link[data-tema]');
const controles = document.querySelector('.controles');
function aplicarTema(nombre) {
  hojas.forEach((hoja) => {
    hoja.disabled = hoja.dataset.tema !== nombre;
  });
}
aplicarTema(selector.value);
controles.hidden = false;
selector.addEventListener('change', () => {
  aplicarTema(selector.value);
});