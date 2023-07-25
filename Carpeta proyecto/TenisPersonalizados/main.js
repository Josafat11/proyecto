// Abre el panel móvil
function openMobilePanel() {
    document.getElementById('mobile-panel').classList.add('open');
  }
  
  // Cierra el panel móvil
  function closeMobilePanel() {
    document.getElementById('mobile-panel').classList.remove('open');
  }
  
  // Escucha el clic del botón para abrir el panel
  document.getElementById('open-panel-btn').addEventListener('click', openMobilePanel);
  
  // Escucha el clic del botón para cerrar el panel
  document.getElementById('close-panel-btn').addEventListener('click', closeMobilePanel);

// Obtiene la posición vertical inicial del botón
var buttonOffset = document.getElementById('open-panel-btn').offsetTop;

// Actualiza la posición del botón al desplazarse
window.addEventListener('scroll', function() {
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  if (scrollTop >= buttonOffset) {
    document.getElementById('open-panel-btn').classList.add('left');
  } else {
    document.getElementById('open-panel-btn').classList.remove('left');
  }
});
