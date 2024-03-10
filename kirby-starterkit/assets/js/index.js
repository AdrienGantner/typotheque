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
