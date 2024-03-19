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

const fonts = document.getElementsByClassName("font-list");
function hideAll() {
  for (const font of fonts) {
    font.style.display = "none";
  }
}

function showAll() {
  for (const font of fonts) {
    font.style.display = "block";
  }
}

function filterFonts(el) {
  console.log("click");
  if (el.dataset.checked == "false") {
    hideAll();
    const filteredFonts = document.getElementsByClassName(el.dataset.filter);
    for (const filteredFont of filteredFonts) {
      filteredFont.style.display = "block";
    }
    el.dataset.checked = "true";
  } else {
    el.dataset.checked = "false";
    showAll();
  }
}
