// Lightbox
Array.from(document.querySelectorAll("[data-lightbox]")).forEach((element) => {
  element.onclick = (e) => {
    e.preventDefault();
    basicLightbox.create(`<img src="${element.href}">`).show();
  };
});

function changeFontHome(el) {
  const fontName = el.dataset.fontName;
  const text = document.getElementById(fontName.split("-")[0]);
  text.style.fontFamily = fontName;
}

const coll = document.getElementsByClassName("collapsible");
for (let i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    let filtresList = this.nextElementSibling;
    if (filtresList.style.display === "block") {
      filtresList.style.display = "none";
    } else {
      filtresList.style.display = "block";
    }
  });
}
