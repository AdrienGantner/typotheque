// Lightbox
Array.from(document.querySelectorAll("[data-lightbox]")).forEach((element) => {
  element.onclick = (e) => {
    e.preventDefault();
    basicLightbox.create(`<img src="${element.href}">`).show();
  };
});

function changeWeight(index, fontStyle) {
  document.getElementById(`idname${index}`).style.fontFamily = fontStyle;
}
