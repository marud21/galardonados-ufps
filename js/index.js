const gallerySlider = document.querySelector('.gallery-slider');
let scrollAmount = 0;

setInterval(() => {
  scrollAmount += gallerySlider.offsetWidth;
  if (scrollAmount > gallerySlider.scrollWidth) {
    scrollAmount = 0;
  }
  gallerySlider.style.transform = `translateX(-${scrollAmount}px)`;
}, 3000); // Cambia la imagen cada 3 segundos