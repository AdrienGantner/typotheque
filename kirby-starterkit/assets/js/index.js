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

function recentSort(el) {
  // Changer le texte du bouton selon l'ordre affiché
  if (el.innerText == "Plus récent") {
    el.innerText = "Plus ancien";
  } else {
    el.innerText = "Plus récent";
  }

  const list = document.getElementsByClassName("font-list");

  // Comparer les noms des fontes pour fair le tri.
  [...list].reverse().forEach((node) => list[0].parentNode.appendChild(node));
}

function alphabeticSort(el) {
  // Changer le texte du bouton selon l'ordre affiché
  let toggle;

  if (el.innerText == "A-Z") {
    el.innerText = "Z-A";
    toggle = 1;
  } else {
    el.innerText = "A-Z";
    toggle = -1;
  }

  // Trier les éléments par leur nom
  const list = document.getElementsByClassName("font-list");

  // Comparer les noms des fontes pour fair le tri.
  [...list]
    .sort((a, b) =>
      a.querySelector(".font-name").innerText >
      b.querySelector(".font-name").innerText
        ? 1 * toggle
        : -1 * toggle,
    )
    .forEach((node) => list[0].parentNode.appendChild(node));
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
